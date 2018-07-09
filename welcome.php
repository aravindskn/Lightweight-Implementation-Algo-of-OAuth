<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by TEMPLATED
http://templated.co
Released for free under the Creative Commons Attribution License

Name       : Assembly
Description: A two-column, fixed-width design with dark color scheme.
Version    : 1.0
Released   : 20140330

-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>DATA</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link href="http://fonts.googleapis.com/css?family=Didact+Gothic" rel="stylesheet" />
    <link href="default.css" rel="stylesheet" type="text/css" media="all" />
    <link href="fonts.css" rel="stylesheet" type="text/css" media="all" />

    <!--[if IE 6]><link href="default_ie6.css" rel="stylesheet" type="text/css" /><![endif]-->

</head>
<body>
<div id="header-wrapper">
    <div id="header" class="container">
        <div id="menu">
            <ul>
                <li><a href="#" accesskey="5" id="btnfun2" name="btnfun2" title="" onClick='location.href="?btnfun2=1"'>Get Previous Temperature</a></li>
                <li><a href="logout.php" accesskey="5" title="">Sign Out</a></li>
            </ul>
        </div>
    </div>
    <div id="banner" class="container" style="margin-top: -2.3cm">
        <div class="title">
            <h2>WELCOME</h2>
        </div>
        <?php
        if($_GET['btnfun2']){fun0();}
        function fun0()
        {
            include('session.php');
            $username= $login_session;
            $sql = "SELECT email FROM admin where username= '$username'";
            $result=$db->query($sql);
            if ($result->num_rows > 0)
            {
                // output data of each row
                while($row = $result->fetch_assoc())
                {
                    $email= $row["email"];
                    if (strpos($email, '@manipal.edu') !== false)
                    {
                        header("location:previous.php");
                    }
                    else
                    {
                        echo "<script>alert('You Do Not Have Access To This Resource');</script>";
                    }
                }
            }

        }
        if($_GET['btnfun1']){fun1();}
        function fun1()
        {
            include ('session.php');
            $username = $login_session;
            $sql = "SELECT flag FROM email where username= '$username'";
            $result=$db->query($sql);
            if ($result->num_rows > 0)
            {
                // output data of each row
                while($row = $result->fetch_assoc())
                {
                    $flag= $row["flag"];
                }
            }


            if($flag=='1')
            {
                echo exec('python C:\Xampp\htdocs\Project\decrypt.py');
            }
            else
            {
                echo "Your Request not approved by admin";
            }
        }

        ?>
        <br/>
        <br/>
        <ul class="actions">
            <li><button href="#" class="button" id="btnfun1" name="btnfun1" onClick='location.href="?btnfun1=1"'>GET TEMPERATURE</button></li>
        </ul>
    </div>
</div>

</body>
</html>
