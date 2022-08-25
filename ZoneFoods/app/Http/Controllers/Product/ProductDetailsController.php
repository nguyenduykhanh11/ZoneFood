<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductDetailsController extends Controller
{
    public function productDetails(Product $product){
        $id = $product->id;
        $productt = Product::where(['id'=>$id,'status'=>0])->get();
        $product_store_id = $productt[0]->store_id;
        $product_all = Product::where(['status'=>0,'store_id'=>$product_store_id])->get();
        $productt_category = ProductCategory::where(['status'=>0])->get();
        $store_image = Store::where(['id'=>$product_store_id])->first();


        return view('Product.productDetails', compact('productt','productt_category', 'product_all','store_image'));
    }

    public function product_Category($id){
        $product_Category = Product::where(['product_category_id'=>$id, 'status'=>0])->get();
        return view('Product.productCategory',compact('product_Category'));

    }
}
