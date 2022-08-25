<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productImage extends Model
{
    use HasFactory;
    protected $table = 'product_images';
    protected $primaryKey='id';
    protected $guarded = [];
    protected $fillable = ['id','product_id','image','image2'];
    public $timestamps = false;
    public function product(){
        return $this->belongsTo(Product::class,  'product_id','id');
    }
}