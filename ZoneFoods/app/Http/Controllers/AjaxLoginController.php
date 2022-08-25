<?php


namespace App\Http\Controllers;

//use Dotenv\Validator;
use http\Env\Response;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Models\Comment;


class AjaxLoginController extends Controller
{
    public function login(Request $request){

        $validator = Validator::make($request->all(),[
            'email' => 'required|email|exists:users',
            'password'=> 'required'
        ],
            $error=[

                'required' => 'Email,Password Không được để trống',

        ]);




        try {
            $user = DB::table('users')->where('email', $request->email)->get();

            if($user[0]->password == $request->password){
                session_start();
                $_SESSION['id'] = $user[0]->id;

            }
            else{
                return response()->json(['error'=>['Mật khẩu bạn nhập không dúng']]);
            }
        }
        catch (\Throwable $er){


                return response()->json(['error'=>['Tài khoản Không tồn tại']]);


        }




    }

    public function comment($blog_id, Request $request){
        session_start();
        $user_id = $_SESSION['id'];

        $validator = Validator::make($request->all(),[
            'comment' => 'required',
        ],[
            'comment.required'=>'Nội dung không được để trống'
        ]);

        if(isset($request->reply_id)){
            $reply_id = $request->reply_id;
        }else{
            $reply_id = 0;
        }

        if ($validator->passes()){
            $data = [
                'user_id' => $user_id,
                'blog_id' => $blog_id,
                'content' => $request->comment,
                'reply_id' => $reply_id
            ];

            if($comments = Comment::create($data)){

            $comment = Comment::where(['blog_id'=> $blog_id,'reply_id' => 0])->orderBy('id','DESC')->get();

            return view('list-comment',compact('comment'));
            }
        }
        else {

            return response()->json(['error'=>$validator->errors()->first()]);

        }

    }



}
