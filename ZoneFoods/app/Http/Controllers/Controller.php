<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Http\Controllers\verifyController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Store;
use Mail;
use mysql_xdevapi\Exception;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function home(){
        session_start();
        if(!isset($_SESSION['id'])){
            $_SESSION['id'] = '';
        }
        $product_all = Product::where(['status'=>0])->get();
        $products = Product::paginate(4);
        $product_category = DB::table('product_category')->get();
        return view('welcome', compact('products','product_category', 'product_all'));
    }
    public function productDetails(Product $product){
        $id = $product->id;
        $productt = Product::where(['id'=>$id,'status'=>0])->get();
        $product_store_id = $productt[0]->store_id;
        $product_all = Product::where(['status'=>0,'store_id'=>$product_store_id])->get();
        $productt_category = ProductCategory::where(['status'=>0])->get();
        $store_image = Store::where(['id'=>$product_store_id])->first();


        return view('Product.productDetails', compact('productt','productt_category', 'product_all','store_image'));
    }
    public function ForgotPass(){
        return view('email.ForgotPassView');
    }
    public function mail_verify(Request $request){
        $user_name = $request->input('mail_name');
        $_SESSION['mail_user_name'] = $user_name;
        $name = "ZONEFOODS";
        Mail::send('email.verify', compact('name'), function($email){
            $name_mail = $_SESSION['mail_user_name'];
            $email->to($name_mail, 'ZONEFOODS');
            $email->subject("Verify From ZONEFOODS");
        });
        return view('email.check');
    }
    public function mail_verify_register(Request $request){
        session_start();
        $user_name = $request->input('mail_name');
        $_SESSION['mail_user_name'] = $user_name;
        $name = $_SESSION['new'][0];
        Mail::send('email.verify', compact('name'), function($email){
            $name_mail = $_SESSION['mail_user_name'];
            $email->to($name_mail, "ZONEFOODS");
            $email->subject("Verify From ZONEFOODS");
        });
        return view('register.checkmail');
    }
    public function SMS_verify_view(){
        return view('SMS.view');
    }
    public function SMS_verify(){
        return view('SMS.verify');
    }
    public function login_view(){
        return view('Login.Login');
    }
    public function login_pc(Request $request){
        $email = $request->input('email');
        $pass = $request->input('password');

        $user = DB::table('users')->where('email',$email)->get();
        try {
            $user = $user[0];
            if($user->password == $pass){
                session_start();
                $_SESSION['id'] = $user->id;
                $_SESSION['name'] = $user->name;
                $_SESSION['auth'] = $user->auth;
                return redirect('/');
            }
            else{
                return redirect()->route('login.loginView')->with('error', 'Sai mật khẩu!');
            }
        } catch (\Throwable $th) {
            return redirect()->route('login.loginView')->with('error', 'Tài khoản không tồn tại!');
        }
    }
    public function logOut(){
        session_start();
        $_SESSION['id'] = '';
        $_SESSION['name'] = '';
        return redirect('/');
    }

    public function register_view(){
        return view('register.register_view');
    }
    public function register_verify(Request $request){
        $name = $request->name;
        $email = $request->email;
        $password = $request->Password;
        $adress = $request->adress;
        $phoneNumber = $request->phoneNumber;
        $user_tmp = [$name, $email, $password, $adress, $phoneNumber];
        session_start();
        $_SESSION['new'] = $user_tmp;
        return view("register.verify_user");
    }
    public function register_verify_sms(Request $request){
        return view('register.check');
    }
    public function register_verify_sms_view(){
        return view('register.sms_verify');
    }

//update
    public function register_verify_mail_check(){
        return view('register.checkmail');
    }

    public function scrolltest(){
        return view('scrolltest');
    }

    public function chitietsp(){
        return view('details.chitietsp');
    }
    public function shop(){
        return view('shop');
    }
//end update


    public function register_pc(){
        session_start();
        try {
            $create = new User;
            $create->name = $_SESSION['new'][0];
            $create->email =  $_SESSION['new'][1];
            $create->password =  $_SESSION['new'][2];
            $create->adress =  $_SESSION['new'][3];
            $create->phoneNumber =  $_SESSION['new'][4];
            $create->save();
        }catch (Exception $e){
            return redirect('/');
        }

        return redirect('/');
    }

    public function profile(){
        session_start();
        $user = DB::table('users')->where('id',$_SESSION['id'])->get();
        $user = $user[0];
        return view('user.profile',compact('user'));
    }


    public function updateProfile($user_id,Request $request){
        $User = User::where('id',$user_id)->first();
        $User->name = $request->input('name');
        $User->email = $request->input('email');
        $User->adress = $request->input('address');
        $User->phoneNumber = $request->input('phoneNumber');
        $User->save();
        return redirect("/profile")->with("message","edit user");
    }

    public function resign_store(){
        session_start();
        $id = $_SESSION['id'];
        $user = User::where('id',$id)->get();
        $user = $user[0];
        return view('reStore.resignStore',compact("user"));
    }

    public function reStorePC(Request $request){
        $request->validate([
                'storeImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]
        );
        session_start();
        $id = $_SESSION['id'];
        $user = User::where('id',$id)->first();
        $user->auth = 1;
        $user->save();
        $name = $request->input('storeName');
        $address = $request->input('StoreAddress');
        $email = $request->input('StoreEmail');
        $phoneNumber = $request->input('StorePhone');

        $storeimage = $request->file('storeImage');
        $input['imagename'] = time().'.'.$storeimage->getClientOriginalExtension();
        $Path = public_path('/ImageUploads');
        $storeimage->move($Path, $input['imagename']);

        $newStore = ([
            "id"=>$id,
            "name"=>$name,
            "address"=>$address,
            "email"=>$email,
            "phoneNumber"=>$phoneNumber,
            "storeimage"=>$input['imagename'],
        ]);
        Store::create($newStore);
        $_SESSION['auth'] = $user->auth;
        return view('AdminStore.index');
    }
}
