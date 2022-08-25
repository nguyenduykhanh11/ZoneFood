<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\ProductDetail;
use App\Models\User;
use App\Http\Controllers\verifyController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\productImage;
use Mail;

class adminController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function AdminStore(){
        session_start();

        if(!isset($_SESSION['id']) || $_SESSION['id'] == '' || $_SESSION['id'] == null){
            return redirect('login_view');
        }
        else{
            $store = User::where('id',$_SESSION['id'])->get();
            if($store[0]->auth == 0){
                return redirect('/');
            }
            else{
                return view('AdminStore.index');
                exit();
            }
        }
    }

    public function order_watting(){
        session_start();
        $store_id = $_SESSION['id'];

        $order = Order::where(['store_id' => $store_id,'status'=>0])->get();
        try {
            if ($order) {
                return view('AdminStore.order_watting',compact('order'));

            }

        } catch (\Throwable $er) {
                return response()->json(['num' => 'Khong co dơn nào']);
        }

    }

    public function order_watting_action( Request $request){

        $aa = DB::table('orders')
            ->where(['id' => $request->id])
            ->update(['status' => $request->cong]);
        return response()->json(['num' => 'Duyệt thành công']);

    }

    public function order_details($id){
        $order_details = OrderDetail::where(['order_id' => $id])->get();

        return view('AdminStore.order_detalis',compact('order_details'));
    }
    public function order_done(){
        session_start();
        $store_id = $_SESSION['id'];

        $order = Order::where(['store_id' => $store_id,'status'=>1])->get();
        try {
            if ($order) {
                return view('AdminStore.order_done',compact('order'));

            }

        } catch (\Throwable $er) {
            return response()->json(['num' => 'Khong có đơn đã bán']);
        }
        return view('AdminStore.order_done');
    }

    public function all_foods(){
        session_start();
        $id = $_SESSION['id'];
        $products = Product::where(['status'=>0,'store_id'=>$id])->get();
        return view('AdminStore.all_foods',compact('products'));
    }

    public function blogs(){
        return view('AdminStore.blogs');
    }

    // crud
    public function add_food(){
        $categorys = DB::table('product_category')->get();
        return view('AdminStore.CRUD.add_food', compact('categorys'));
    }
    public function add_food_done(Request $request){
        $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'image2' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]
        );
        session_start();
        $store_id = $_SESSION['id'];
        $product_category_id = $request->input('category');
        $name = $request->input('name');
        $description = $request->input('description');
        $prince = $request->input('prince');
        $discount = $request->input('discount');
        $image = $request->file('image');
        $image2 = $request->file('image2');

        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
        $input['imagename2'] = time().'2.'.$image2->getClientOriginalExtension();

        $Path = public_path('/ImageUploads');
        $image->move($Path, $input['imagename']);
        $image2->move($Path, $input['imagename2']);

        $nextProduct = DB::select("SHOW TABLE STATUS LIKE 'products'");
        $nextId = $nextProduct[0]->Auto_increment;

        $newP = ([
            "store_id"=>$store_id,
            "name"=>$name,
            "product_category_id"=>$product_category_id,
            "description"=>$description,
            "prince"=>$prince,
            "discount"=>$discount,
        ]);
        $pr = Product::create($newP);

        $image_name = ([
            "product_id"=>$nextId,
            "image"=>$input['imagename'],
            "image2"=>$input['imagename2']
        ]);
        $upImage = productImage::create($image_name);
        return redirect('all_foods');
    }

    public function delete_food($id){
        $product = Product::find($id);
        $image = productImage::where("product_id",$id);
        $product->delete();
        $image->delete();
        return redirect('all_foods')->with('success','Xóa Food thành công!');
    }

    public function edit_food($id){
        $Food = Product::where('id',$id)->first();
        $cate = DB::table('product_category')->get();
        return view("AdminStore.CRUD.edit_food", compact('Food','cate','id'));
    }

    public function edit_food_done(Request $request, $id){
        $request->validate([
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'image2' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]
        );
        session_start();
        $store_id = $_SESSION['id'];
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

        $updateP = Product::find($id);
        $updateP->store_id = $store_id;
        $updateP->name = $name;
        $updateP->product_category_id = $product_category_id;
        $updateP->description = $description;
        $updateP->prince = $prince;
        $updateP->discount = $discount;

        $pr = $updateP->save();

        return redirect('all_foods');
    }
}