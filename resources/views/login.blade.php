<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>个人博客</title>
        <link rel="stylesheet" href="{{URL::asset('css/blog.css')}}">
    </head>
    <body>
        <h1>个人博客</h1>
        <form class="log" action="/user/login" method="post">
            {{csrf_field()}}
            <input type="text" name="account" placeholder="输入账号">
            <input type="password" name="password" placeholder="输入密码">
            <label>{{isset($message)? $message:""}}</label>
            <input type="submit" value="登录">
        </form>
		
    </body>
</html>