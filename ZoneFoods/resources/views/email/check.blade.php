<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>verify</title>
    <style>
        #resend{
            display: none;
        }
    </style>
</head>
<body>
    <form name="form" action="">
        <input type="text" name="txtCheck">
        <button type="button" onclick="check()">check</button>
    </form>
    <form action="{{route('resend')}}" method="GET">
        <button type="submit" id="resend">gửi lại mail</button>
    </form>
    
    <script>
        function unhide(){
            document.getElementById("resend").style.display = 'block';
        }
        setTimeout(unhide,10000);
        function check(){
            var x = document.form.txtCheck.value;
            var y = <?php echo($_SESSION['verify_mail']); ?>;
            if(x == y){
                alert("SUCCESS!");
            }
            else{
                alert("ERROR!");
            }
        }
    </script>
</body>
</html>