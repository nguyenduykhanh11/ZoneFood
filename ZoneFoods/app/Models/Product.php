<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $primaryKey='id';
    protected $guarded = [];
    protected $fillable = ['store_id','name','product_category_id','description','prince','discount'];


    public function product_category(){
        return $this->belongsTo(ProductCategory::class, 'product_category_id','id');
    }

    public function product_comments(){
        return $this->hasMany(ProductComment::class, 'product_id','id');
    }

    public function product_images(){
        return $this->hasMany(productImage::class,'product_id', 'id');
    }

    public function product_detalails(){
        return $this->hasMany(ProductDetail::class, 'product_id','id');
    }

    public function order_details(){
        return $this->hasMany(OrderDetail::class, 'product_id','id');
    }
    public function product_store(){
        return $this->belongsTo(Store::class, 'store_id','id');
    }
}
