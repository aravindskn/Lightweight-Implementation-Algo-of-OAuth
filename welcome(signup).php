<html>
<head>
<link rel="stylesheet" href="form.css">
<meta http-equiv="refresh" content="3;url=index.html" />
</head>
<?php session_start(); ?>
<div class="body content">
    <div class="welcome">
        <div class="alert alert-success"><?= $_SESSION['message'] ?></div>
        
        Welcome <span class="user"><?= $_SESSION['username'] ?></span>
        <?php
        $mysqli = new mysqli("localhost", "root", "", "database");
        //Select queries return a resultset
        $sql = "SELECT username FROM admin";
        $result = $mysqli->query($sql); //$result = mysqli_result object
        //var_dump($result);
        ?>
       
    </div>
</div>
</html>