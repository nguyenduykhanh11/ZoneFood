<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Location;

class CartController extends Controller
{


    public function cart(){

        session_start();
        if($_SESSION['id']!='') {
            $user_id = $_SESSION['id'];
            $i = 0;

            $cart = Cart::where(['user_id'=>$user_id,'status' => 0])->get();


            try {
                if($cart) {
                    $total = DB::table('carts')->where(['user_id'=>$user_id,'status' => 0])->sum('prince');

                    return view('Cart.Cart', compact('cart', 'i','total'));
                }
            }
            catch (\Throwable $er){
                return view('Cart.Cart');
            }


        }

        else{
            return redirect('/')->with("error","Chua dang nhap");

        }

    }

    public function historyCart(){
        session_start();
        if($_SESSION['id']!='') {
            $user_id = $_SESSION['id'];
            $i = 0;

            $order_details = Order::where(['user_id'=>$user_id,'status' => 1])->get();
            $order_finish = Order::where(['user_id'=>$user_id,'status' => 2])->get();

            try {
                if($order_details) {


                    return view('Cart.holyMath', compact('order_details','order_finish', 'i'));

                }
            }
            catch (\Throwable $er){
                return view('Cart.holyMath');
            }


        }

        else{
            return redirect('/')->with("error","Chua dang nhap");

        }

    }

}
