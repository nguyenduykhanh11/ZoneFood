<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $fillable = ['user_id','blog_id','reply_id','content'];

    public function users(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function replies(){
        return $this->hasMany(Comment::class, 'reply_id', 'id');
    }
}
