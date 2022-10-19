<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Home\User;

class UserController extends Controller
{
    public function login(Request $request){
        //取出用户账户和密码
        $account=$request->input('account');
        $password=$request->input('password');
        //查询用户
        $user=User::where(["account"=>$account,'password'=>$password])->first();
        if($user){
            //使用用户账号保存到Session中
            session()->put("account",$account);
            //将用户id保存到Session中
            session()->put("userId",$user->id);
            //重新跳回主页
            return redirect("/index");
        }else{
            //未查询到记录，返回登陆界面，并将message消息传回页面
            return view("login",[
                "message"=>"账号或密码不一致"
            ]);
        }
    }

    public function loginoff(Request $request){
        //消除session中的account和userid
        session()->forget('account');
        session()->forget('userId');
        //跳转到主页
        return redirect("/index");
    }
}
