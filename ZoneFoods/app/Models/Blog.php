<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $table = 'blogs';
    protected $primaryKey='id';
    protected $guarded = [];

    public function blog_comments(){
        return $this->hasMany(BlogComment::class,'blog_id', 'id');
    }
    public function commentt(){
        return $this->hasMany(Comment::class, 'blog_id', 'id')
            ->where(['reply_id' => 0])->orderBy('id','DESC');
    }
}
