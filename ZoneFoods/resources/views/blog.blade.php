<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>

{{--@if(isset($_COOKIE['login']))--}}
{{--    <a href="{{route('auth.logout')}}">logout</a>--}}
{{--@else--}}
{{--    <a href="{{route('auth.login')}}">login</a>--}}
{{--@endif--}}

<div class="product-new">
    <div class="product-title text-center">
        <h4>New Blog</h4>
        <h2>Our new blogs</h2>
    </div>
    <div class="container">
        <div class="col-md-6">
            @if(isset($_COOKIE['login']))

            {{var_dump($_COOKIE['login'])}}

            @endif
            @foreach($blog as $blogs)
                <div class="item">
                    <div class="card text-center">
                        <img class="card-img-top" src="{{$blogs->image}}" class="w-100">
                        <div class="card-body">
                            <h4 class="card-title" title="{{$blogs->name}}">
                                <a href="{{route('blog.blogDetail',['blog'=>$blogs->id,'slug'=>Str::slug($blogs->title)])}}">{{$blogs->title}}</a>

                            </h4>
                            <p >{{Str::Words($blogs->content,10)}}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

</body>
</html>
