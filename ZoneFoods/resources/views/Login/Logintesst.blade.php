<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="{{route('login.loginPc')}}" method="POST">
        <input type="text" name="email">@if(session('error'))
                                        <Strong>{{session('error')}}</Strong>
                                    @endif<br>
        <input type="password" name="pass"><br>
        <input type="submit" value="Đăng nhập"><br>
        @csrf
    </form>
</body>
</html>