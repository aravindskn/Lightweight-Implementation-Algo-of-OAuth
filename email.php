
<!DOCTYPE HTML>
<!--
	Alpha by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<head>
    <title>Access Rights</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="assets/css/main.css" />
    <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
</head>
<body class="landing">
<div id="page-wrapper">
    <div id="page-wrapper">

        <!-- Banner -->
        <section id="banner">
            <h2>Welcome</h2>
            <p>Please choose the access rights.</p>
            <ul class="actions">
                <li><button href="#" id="temp" name="temp" class="button" onclick='location.href="?temp=1"'>Get Temperature</button></li>
                <li><button href="#" id="hum" name="hum" class="button" onclick='location.href="?hum=1"'>Get Humidity</button></li>
            </ul>
        </section>

        <?php


        if($_GET['temp']){fun1();}
        function fun1()
        {
            include ('session.php');

            $username = $login_session;
            $ccode = rand();
            $query = mysqli_query($db,"INSERT INTO `email` VALUES('$id','$username','$ccode','0')");

            $message ="    $username is requesting Temperature access
		                   Click the link below to grant access
		                   http://localhost:8080/Project/emailconfirm.php?username=$username&code=$ccode
		                   
		                   Click the link below to decline access
		                   http://localhost:8080/Project/emaildecline.php?username=$username&code=$ccode";

            mail('aravindsknair@gmail.com',"EMAIL SUBJECT",$message,"From: aravindskn97@gmail.com");
            sleep(5);
            header('Location: welcome.php');
        }
        if($_GET['hum']){fun2();}
        function fun2()
        {
            include ('session.php');

            $username = $login_session;
            $ccode = rand();
            $query = mysqli_query($db,"INSERT INTO `email` VALUES('$id','$username','$ccode','0')");

            $message ="    $username is requesting Humidity access
		                   Click the link below to grant access
		                   http://localhost:8080/Project/emailconfirm.php?username=$username&code=$ccode
		                   
		                   Click the link below to decline access
		                   http://localhost:8080/Project/emaildecline.php?username=$username&code=$ccode";

            mail('aravindsknair@gmail.com',"EMAIL SUBJECT",$message,"From: aravindskn97@gmail.com");
            sleep(5);
            header('Location: welcome.php');
        }
        ?>
    </div>

    <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.dropotron.min.js"></script>
    <script src="assets/js/jquery.scrollgress.min.js"></script>
    <script src="assets/js/skel.min.js"></script>
    <script src="assets/js/util.js"></script>
    <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
    <script src="assets/js/main.js"></script>

</body>
</html>
