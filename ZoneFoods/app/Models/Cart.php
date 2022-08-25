<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'carts';
    protected $fillable = ['store_id','user_id','id_product','num','prince'];
    public function product_id(){
        return $this->belongsTo(product::class, 'id_product','id');
    }
}
