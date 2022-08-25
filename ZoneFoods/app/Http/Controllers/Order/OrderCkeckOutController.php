<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mail;


class OrderCkeckOutController extends Controller
{
    public function checkOut(){

        session_start();
        if($_SESSION['id']!='') {
            $user_id = $_SESSION['id'];
            $user = User::where(['id'=>$user_id])->first();
            $order = Cart::where(['user_id'=>$user_id,'status' => 0])->get();


            try {
                if($order) {
                    $total = DB::table('carts')->where(['user_id'=>$user_id,'status' => 0])->sum('prince');
                    $total_num = DB::table('carts')->where(['user_id'=>$user_id,'status' => 0])->sum('num');
                    return view('Order.checkouts', compact('order','total','total_num', 'user'));
                }
            }
            catch (\Throwable $er){
                return view('Order.checkOut');
            }


        }
        else{
            return redirect('/')->with("error","Chua dang nhap");

        }

    }

    public function formCheckOut(Request $request){
        session_start();
        $_SESSION['reUser_email'] = $request->input('email');
        if($_SESSION['id']!='') {
            $user_id = $_SESSION['id'];
            $validated = $request->validate([
                'store_id' => 'required',
                'fullname' => 'required',
                'address' => 'required',
                'phone' => 'required',
            ]);
            $messages = [
                'store_id' => 'Không tồn tại sản phẩm.',
                'fullname' => 'Chưa nhập họ tên.',
                'address' => 'Chưa nhập địa chỉ.',
                'phone' => 'Chưa nhập Số điện thoại',
            ];



            $data = [
                'store_id' => $request->store_id,
                'user_id' => $user_id,
                'fullname' => $request->fullname,
                'address' => $request->address,
                'email' => $request->email,
                'phone' => $request->phone
            ];

            $creatOrder = Order::create($data);

            $cartUpdate = Cart::where(['user_id' => $user_id, 'status' => 0, 'store_id' => $request->store_id])->get();

            try {
                if ($cartUpdate[0]!='') {

                    $order_id = $creatOrder->id;


                    $total = DB::table('carts')->where(['user_id' => $user_id, 'status' => 0,'store_id' => $request->store_id])->sum('prince');
                    for ($i = 0; $i < count($cartUpdate); $i++) {
                        $data1 = [
                            'order_id' => $order_id,
                            'product_id' => $cartUpdate[$i]->id_product,
                            'num' => $cartUpdate[$i]->num,
                            'total' => $total,
                        ];
                        $OrderDetails = OrderDetail::create($data1);
                    }
                    $demo = OrderDetail::where(['order_id' => $order_id])->get();
                    $total = OrderDetail::where(['order_id' => $order_id])->first();
                    Mail::send('Order.OderInfo', compact('demo','total'), function($VSend){
                        $mail = $_SESSION['reUser_email'];
                        $VSend->to($mail, 'ZONEFOODS');
                        $VSend->subject("ZONEFOODS");
                    });

                    $cartUpdatee = Cart::where(['user_id' => $user_id, 'status' => 0, 'store_id' => $request->store_id])->delete();
                    return response()->json(['num' => 'Đặt hàng thành công']);
                }


            } catch (\Throwable $er) {
                return response()->json(['error' => 'khong tim thay san pham']);
            }
        }
    }
}
