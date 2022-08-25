<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mail Register</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{asset('css/Login_style.css') }}">

</head>
<video id="content-heading__video" playsinline="" muted="" autoplay="" loop="">
    <source src="{{ asset('images/loginbg.mp4') }}" type="video/mp4">

</video>
<body class="img js-fullheight">

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">ZoneFoods</h2>
                </div>
            </div>
            <div class="row justify-content-center">
            <form name="form" action="" style="z-index: 1">
                <input type="text" class="form-control" name="mailCheck" style="margin-bottom: 10px">
                <button type="button" class="form-control btn btn-primary submit px-3" onclick="check()">check</button>
                <br>
            </form>
            </div>
        </div>
    </section>
</body>
<script>
    function check(){
        var x = document.form.mailCheck.value;
        var y = <?php echo($_SESSION['verify_mail']); ?>;
        if(x == y){
            alert("SUCCESS!");
            window.location="register_pc";
        }
        else{
            alert("ERROR!");
        }
    }
</script>
</html>
