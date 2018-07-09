<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Email Confirmation Tutorial</title>
</head>

<body>
<?php

include ('config.php');

$username = $_GET['username'];
$code = $_GET['code'];

$query = mysqli_query($db,"SELECT * FROM `email` WHERE `username`='$username'");
while($row = mysqli_fetch_assoc($query))
{
	$db_code = $row['ccode'];
}
if($code == $db_code)
{
	mysqli_query($db,"UPDATE `email` SET `flag`='1'");
	//mysqli_query($db,"UPDATE `email` SET `ccode`=$ccode");
	
	echo "Thank You. Your email has been confimed and you may now login";
}
else
{
	echo "Username and code dont match";	
}

?>
</body>
</html>