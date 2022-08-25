
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>
<body>

<div class="jumbotron container">
    <div class="container">
        <img src="{{$blog->image}}" alt="">
        <h1>{{$blog->title}}</h1>
        <p>{{$blog->constent}}</p>
    </div>

    <div class="container">
        <h3>Bình luận</h3>



        @if(($_SESSION['id'] !=''))

        <form action="" method="POST">
            <span>Xin chào <h3>{{$users[0]->name}}</h3></span>
            <div>

                <label for="">Nội dung bình luận</label>
                <input type="hidden" value="{{$blog->id}}" name="blog_id">
                <textarea id="comment-content" name="content" class="form-control"   rows="3" placeholder="Nhập nội dung(*)"></textarea>
                <small id="comment-error" class="help-blog"></small>
            </div>
            <button type="submit" class="btn btn-primary" id="btn-comment">Gửi bình luận</button>
        </form>
        @else
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                Đăng nhập
            </button>


        @endif

        <h3>Các bình luận</h3>
        <br>

        <div id="comment">
            <!--List Comment-->
            @include('list-comment',['comment'=>$blog->commentt]);

        </div>
    </div>
</div>


    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
        Open modal
    </button>

    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Đăng nhập</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div id="error"></div>
                    <form action="" method="POST" role="form">

                        <div class="form-group">
                            <label for="">Email</label>
                            <input class="form-control" type="email" id="email" name="email" placeholder="Nhập Email">
                        </div>

                        <div class="form-group">
                            <label for="">Mật khẩu</label>
                            <input class="form-control" type="password"  id="password" name="password" placeholder="Nhập Password">

                        </div>
                        <button type="button" class="btn btn-primary btn-block" id="btn-login">Đăng nhập</button>

                    </form>
                </div>



            </div>
        </div>
    </div>


<script>
    var _csrf = '{{csrf_token()}}';
    $('#btn-login').click(function (ev){
        ev.preventDefault();
        var _loginUrl = '{{route("ajax.login")}}';
        var email = $('#email').val();
        var password = $('#password').val();
        console.log(email,password,_loginUrl,_csrf);
        $.ajax({
            url: _loginUrl,
            type: 'POST',
            data: {
                email: email,
                password: password,
                _token: _csrf
            },

            success:function (request){
                if(request.error){
                    let _html_error ='<div class="alert alert-danger"><li style="font-weight: bold">';

                        _html_error += (request.error);

                    _html_error +='</li></div>';
                    $('#error').html(_html_error);
                }
                else{
                    location.reload();
                }

            }
        });


        //console.log(email, password, _csrf, _loginUrl);
    });

    let content_url = '{{route("ajax.comment",$blog->id)}}';
    $('#btn-comment').click(function (ev){
        ev.preventDefault();
        let comment = $('#comment-content').val();

        console.log(comment,content_url );
        $.ajax({
            url: content_url,
            type: 'POST',
            data: {
                comment: comment,

                _token: _csrf
            },


            success:function (request){
                if(request.error){
                    $('#comment-error').html(request.error)
                }else{
                    $('#comment-error').html('');
                    $('#comment-content').val('');
                    $('#comment').html(request)
                    console.log(request);
                }


            }
        });
    });

    //$('.btn-show-form-reply').click(function (ev){
    $(document).on('click', '.btn-show-form-reply', function(ev){
        ev.preventDefault();
        var id = $(this).data('id');
        var comment_reply_id = '#content-reply-'+id;
        var form_reply = '.form-reply-'+ id;
        var comment_reply = $(comment_reply_id).val();
        $('.formReply').slideUp();
        $(form_reply).slideDown();

    });

    $(document).on('click', '.btn-send-comment-reply', function(ev){
        ev.preventDefault();
        var id = $(this).data('id');
        var comment_reply_id = '#content-reply-'+id;
        var comment_reply = $(comment_reply_id).val();
        var form_reply = '.form-reply-'+ id;


        console.log(comment_reply,content_url );
        $.ajax({
            url: content_url,
            type: 'POST',
            data: {
                comment: comment_reply,
                reply_id: id,
                _token: _csrf
            },
            success:function (request){
                if(request.error){
                    $('#comment-error').html(request.error)
                }else{
                    $('#comment-error').html('');
                    $('#comment-content').val('');
                    $('#comment').html(request)
                    console.log(request);
                }
            }
        });


    });
</script>
</body>
</html>
