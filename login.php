<?php
include("config.php");
session_start();

if(isset($_POST['button'])) {
    // username and password sent from form

    $myusername = mysqli_real_escape_string($db,$_POST['username']);
    $mypassword = mysqli_real_escape_string($db,$_POST['password']);

    $sql = "SELECT id FROM admin WHERE username = '$myusername' and passcode = '$mypassword'";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    //   $active = $row['active'];

    $count = mysqli_num_rows($result);

    // If result matched $myusername and $mypassword, table row must be 1 row

    if($count == 1)
    {
        //    session_register("myusername");
        $_SESSION['login_user'] = $myusername;
        $sql="SELECT flag FROM email WHERE username = '$myusername'";
        $result = $db->query($sql);
        if($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc())
            {
                $flag= $row["flag"];
            }
            if($flag == '1')
                header("location:welcome.php");


        }
        else
        {
            header("location: email.php");
        }


    }
    else
    {
        $error = "Your Login Name or Password is invalid";
    }
}
?>
<html lang="en" >

<head>
    <meta charset="UTF-8">
    <title>Login</title>



    <link rel="stylesheet" href="css/login.css">


</head>

<body>

<div class="wrapper">
    <div class="container">
        <h1>Welcome</h1>

        <form action = "" method = "post">
            <input type = "text" name = "username" class = "box" placeholder="Username"/>
            <input type = "password" name = "password" class = "box" placeholder="Password"/>
            <button type="submit" name="button" id="login-button">Login</button>
        </form>

        <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div><br/><br/>
    </div>

    <ul class="bg-bubbles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
</div>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>







</body>

</html>