<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Http\Controllers\verifyController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

class MasterAdmin extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function MasterHome(){
        session_start();
        try {
           if($_SESSION['id'] != "" && $_SESSION['auth'] == 2){
            $User = count(User::where('auth',0)->get());
            $Master = count(User::where('auth',2)->get());
            $Store = count(User::where('auth',1)->get());
            $countProduct = count(DB::table('products')->get());
            $countUser = count(DB::table('users')->get());
            return view('Master.home',compact('User','Store','Master','countProduct','countUser'));
           }
            elseif($_SESSION['id'] != "" && $_SESSION['auth'] == 1) {
                return redirect("/")->with("message","bạn không phải là Master!");
            }
            else return redirect("/login_view")->with("message","bạn cần đăng nhập!");
        } catch (\Throwable $th) {
            return view("Login.Login");
        }
    }
    public function AllUser(){
        $Users = User::paginate(10);
        return view('Master.AllUser',compact('Users'));
    }
    public function AllFood(){
        $Foods = Product::paginate(10);
        return view('Master.AllFood',compact('Foods'));
    }
    public function MasterDeleFood($id){
        $Food = Product::where('id',$id);
        $Food->delete();
        return redirect()->back()->with('message', 'xoa sp');
    }
    public function MasterEditFood($id){
        $Food = Product::where('id',$id)->first();
        $cate = DB::table("product_category")->get();
        return view("Master.EditFood",compact('Food','cate'));
    }
    public function MasterEditFoodDone($id, Request $request){
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image2' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]
        );
        session_start();
        $store_id = $request->input('storeid');
        $product_category_id = $request->input('category');
        $name = $request->input('name');
        $description = $request->input('description');
        $prince = $request->input('prince');
        $discount = $request->input('discount');

        $Path = public_path('/ImageUploads');
        if($request->file('image') != null){
            $image = $request->file('image');
            $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
            $image->move($Path, $input['imagename']);
            $upImage = productImage::where("product_id",$id)->first();
            $upImage->image = $input['imagename'];
            $upImage->save();
        }
        if($request->file('image2') != null){
            $image2 = $request->file('image2');
            $input['imagename2'] = time().'2.'.$image2->getClientOriginalExtension();
            $image2->move($Path, $input['imagename2']);
            $upImage = productImage::where("product_id",$id)->first();
            $upImage->image2 = $input['imagename2'];
            $upImage->save();
        }

        $updateP = Product::where("id",$id)->first();
        $updateP->store_id = $store_id;
        $updateP->name = $name;
        $updateP->product_category_id = $product_category_id;
        $updateP->description = $description;
        $updateP->prince = $prince;
        $updateP->discount = $discount;

        $pr = $updateP->save();
        return redirect("/Master-EditFood/$id")->with("message","edit food");
    }
    public function MasterDeleUser($id){
        $User = User::where('id',$id);
        $User->delete();
        return redirect()->back()->with('message', 'xoa us');
    }
    public function MasterEditUser($id){
        $User = User::where('id',$id)->first();
        return view("Master.EditUser",compact('User'));
    }

    public function MasterEditUserDone($id, Request $request){
        $User = User::where('id',$id)->first();
        $User->name = $request->input('name');
        $User->email = $request->input('email');
        $User->password = $request->input('password');
        $User->adress = $request->input('address');
        $User->phoneNumber = $request->input('phoneNumber');
        $User->auth = $request->input('auth');
        $User->save();
        return redirect("/Master-EditUser/$id")->with("message","edit user");
    }
    public function AllCategory(){
        $Categorys = ProductCategory::paginate(10);
        return view('Master.AllCategory',compact('Categorys'));
    }
    public function MasterDeleCategory($id){
        $Category = ProductCategory::where('id',$id);
        $Category->delete();
        return redirect()->back()->with('message', 'xoa cate');
    }
    public function MasterEditCategory($id){
        $Category = ProductCategory::where('id',$id)->first();
        return view("Master.EditCategory",compact('Category'));
    }
    public function MasterAddCategory(){
        return view('Master.AddCategory');
    }
    public function MasterAddCategoryDone(Request $request){
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]
        );
        $name = $request->input('nameCategory');

        $Path = public_path('/ImageUploads');
        $image = $request->file('image');
        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
        $image->move($Path, $input['imagename']);
        $newC = ([
           "name"=>$name,
           "image"=>$input['imagename'],
        ]);
        $cate = ProductCategory::create($newC);
        return redirect("/AllCategory")->with("message","add cate");
    }
    public function MasterEditCategoryDone($id, Request $request){
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]
        );
        $name = $request->input('nameCategory');;

        $Path = public_path('/ImageUploads');
        if($request->file('image') != null){
            $image = $request->file('image');
            $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
            $image->move($Path, $input['imagename']);
            $upImage = ProductCategory::where("id",$id)->first();
            $upImage->image = $input['imagename'];
            $upImage->save();
        }

        $updateC = ProductCategory::where("id",$id)->first();
        $updateC->name = $name;
        $cate = $updateC->save();
        return redirect("/Master-EditCategory/$id")->with("message","edit cate");
    }
}