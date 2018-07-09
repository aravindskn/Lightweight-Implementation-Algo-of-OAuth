<?php
session_start();
$_SESSION['message'] = '';
$mysqli = new mysqli("localhost", "root", "", "database");

//the form has been submitted with post
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    
    //two passwords are equal to each other
    if ($_POST['password'] == $_POST['confirmpassword']) 
	{
        
        //set all the post variables
        $username = $mysqli->real_escape_string($_POST['username']);
        $email = $mysqli->real_escape_string($_POST['email']);
        $password = $mysqli->real_escape_string($_POST['password']);
        $access = $mysqli->real_escape_string($_POST['access']);
        
            
                //insert user data into database
                $sql = "INSERT INTO admin (username, passcode, email, access ) VALUES ('$username', '$password', '$email', '$access')";
                
                //if the query is successsful, redirect to welcome.php page, done!
                if ($mysqli->query($sql) === true)
				{
                    $_SESSION['message'] = "Registration succesful! Added $username to the database!";
                    header("location: welcome(signup).php");
                }
                else 
				{
                    $_SESSION['message'] = 'User could not be added to the database!';
                }
                $mysqli->close();          
            
        
    }
    else 
	{
        $_SESSION['message'] = 'Two passwords do not match!';
    }
}
?>
<link href="//db.onlinewebfonts.com/c/a4e256ed67403c6ad5d43937ed48a77b?family=Core+Sans+N+W01+35+Light" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="form.css" type="text/css">
<div class="body-content">
  <div class="module">
    <h1>Create an account</h1>
    <form class="form" action="form.php" method="post" enctype="multipart/form-data" autocomplete="off">
      <div class="alert alert-error"><?= $_SESSION['message'] ?></div>
      <input type="text" placeholder="User Name" name="username" required />
      <input type="email" placeholder="Email" name="email" required />
      <input type="password" placeholder="Password" name="password" autocomplete="new-password" required />
      <input type="password" placeholder="Confirm Password" name="confirmpassword" autocomplete="new-password" required />
      <input type="submit" value="Register" name="register" class="btn btn-block btn-primary" />
    </form>
  </div>
</div>