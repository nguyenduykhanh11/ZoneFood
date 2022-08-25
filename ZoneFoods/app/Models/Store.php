<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;
    protected $table = 'store';
    protected $primaryKey='id';
    protected $guarded = [];
    protected $fillable = ['id','name','address','email','phoneNumber','storeimage'];

    public function products(){
        return $this->hasMany(Product::class, 'store_id', 'id');
    }


}
