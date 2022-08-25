<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    public function index(){
            $blog = Blog::where('status', 0)->orderBy('created_at','DESC')->limit(4 )->get();

        return view('blog',compact('blog'));
    }

    public function blogDetail(Blog $blog){

        session_start();
        if ($_SESSION['id'] != ''){

            $users = DB::table('users')->where('id',$_SESSION['id'] )->get();


            $_SESSION['id'] = $users[0]->id;
            $_SESSION['name'] = $users[0]->name;
            $_SESSION['auth'] = $users[0]->auth;

             return view('blog_details', compact('blog','users'));

        }

        return view('blog_details', compact('blog'));
    }

}
