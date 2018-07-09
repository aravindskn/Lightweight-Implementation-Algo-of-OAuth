<?php
include('session.php');
?>
<html>

<head>
    <title>Welcome </title>
</head>

<body>
<h1>Welcome <?php echo $login_session; ?></h1>
<?php
if($_GET['btnfun1']){fun1();}
function fun1()
{
$curl=curl_init();

curl_setopt_array($curl,array(
        CURLOPT_URL => "https://api.thingspeak.com/channels/426518/fields/1?api_key=T1NYXI7RNC5PBWE9&results=7",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array("cache-control: no-cache"),
));

$data = curl_exec($curl);
$err=curl_error($curl);
curl_close($curl);

$arr=(json_decode($data,true));

echo '<br>Temperature: '.$data;
}

?>
<br>
<br>

<button id="btnfun1" name="btnfun1" onClick='location.href="?btnfun1=1"'>Get TEMPERATURE</button>

<h2><a href = "logout.php">Sign Out</a></h2>

</body>

</html>