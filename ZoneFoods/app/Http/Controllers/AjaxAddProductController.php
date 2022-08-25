<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AjaxAddProductController extends Controller
{
    public function actionAddProduct(Request $request)
    {

        session_start();
        if ($_SESSION['id'] != '') {
            $user_id = $_SESSION['id'];
            $checkStore_id = Product::where(['id' => $request->id, 'status' => 0])->get();
            $cartUpdate = Cart::where(['user_id' => $user_id, 'id_product' => $request->id, 'store_id' => $checkStore_id[0]->store_id, 'status' => 0])->get();

//        Update

            $data = [
                'store_id' => $checkStore_id[0]->store_id,
                'user_id' => $user_id,
                'id_product' => $request->id,
                'num' => $request->num,
                'prince' => $request->prince,
                'status' => 0,
            ];


            try {
                if ($cartUpdate) {
                    $num = $cartUpdate[0]->num + $request->num;
                    $prince = $cartUpdate[0]->prince + $request->prince;

                    $aa = DB::table('carts')
                        ->where(['user_id' => $user_id, 'id_product' => $request->id, 'status' => 0])
                        ->update(['num' => $num, 'prince' => $prince]);
                    return response()->json(['num' => 'Cập nhật giỏ hàng thành công']);
                }
            } catch (\Throwable $er) {
                $checkcart_store = Cart::where(['user_id' => $user_id, 'status' => 0])->get();

                try {
                    if ($checkcart_store[0]->store_id != $checkStore_id[0]->store_id) {
                        return response()->json(['num' => 'Khác cửa hàng']);

                    }
                    if ($checkcart_store[0]->store_id == $checkStore_id[0]->store_id) {
                        $cart = Cart::create($data);
                        return response()->json(['num' => 'Thêm Thành Công']);

                    }

                } catch (\Throwable $er) {
                    if ($cart = Cart::create($data)) {
                        return response()->json(['num' => 'Thêm Thành Công']);
                    }
                }


            }
        }
        else{
            return response()->json(['num' => 'Bạn cần phải đăng nhập']);
        }
    }
///*xữ lý ajax, nut num product*/


    public function addNumCart(Request $request)
    {

        $aa =DB::table('carts')
            ->where('id', $request->id)
            ->update(['num' => $request->num, 'prince' => $request->prince,]);

        if($aa){
            return response()->json(['num' => 'thanh cong']);
        }
        return response()->json(['num' => 'that bai']);

    }

    public function deleteProductCart(Request $request)
    {

        if($aa = DB::table('carts')->where(['id'=>$request->id])->delete()){
            return response()->json(['num' => 'thanh cong']);
        }
        return response()->json(['num' => 'that bai']);

    }

}