<?php
 
 function verify_SMS($id, $token, $from, $to, $body){
    $url = "https://api.twilio.com/2010-04-01/Accounts/".$id."/SMS/Messages";
    $data = array (
        'From' => $from,
        'To' => $to,
        'Body' => $body,
    );
    $post = http_build_query($data);
    $x = curl_init($url );
    curl_setopt($x, CURLOPT_POST, true);
    curl_setopt($x, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($x, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($x, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($x, CURLOPT_USERPWD, "$id:$token");
    curl_setopt($x, CURLOPT_POSTFIELDS, $post);
    $y = curl_exec($x);
    curl_close($x);
    return $y;
 }

$request = Request();
$phoneNumber = $request->input('PhoneNumber');
$id = 'AC24008d4401b9d8b1f568a211b9abf0ff';
$token = 'f376b621d315e6f5c36a67f2d803c14e';
$from = '+14706641537';
$to = $phoneNumber;

$_SESSION['verify_SMS'] = rand(1000, 9999);
$body = '
This is Verify From ZoneFoods
YOUR CODE : '.$_SESSION['verify_SMS'];
$x = verify_SMS($id, $token, $from, $to, $body);
echo("Đã gửi OTP<br>");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Register</title>
</head>

<body>
    <form name="form" action="">
        <input type="text" name="smsCheck">
        <button type="button" onclick="check()">check</button>
        <br>
    </form>
</body>
<?php echo($x) ?>
<script>
function check() {
    var x = document.form.smsCheck.value;
    var y = <?php echo($_SESSION['verify_SMS']); ?>;
    if (x == y) {
        alert("SUCCESS!");
        window.location = "register_pc";
    } else {
        alert("ERROR!");
    }
}
</script>

</html>