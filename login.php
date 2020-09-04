<?php
session_start();
if(isset($_SESSION['valid'])) {
	header('Location: /post.php');
	
} else if(!isset($_SESSION['valid'])) {
	
error_reporting(0);
include 'connection.php';
if(isset($_POST['login'])){
$username=$_POST['username']; // Get username
$password=$_POST['password']; // get password
//query for match  the user inputs
$ret=mysqli_query($conn,"SELECT * FROM admin WHERE username='$username'");
$num=mysqli_fetch_array($ret);
// if user inputs match if condition will runn
if($num>0){

            $validuser = $num['username'];
			$_SESSION['valid'] = $validuser;
			$_SESSION['name'] = $num['name'];
			$_SESSION['package']= $num['package'];
            $_SESSION['id']=$num['id']; // hold the user id in session
           
 	              
			header('Refresh:0.0; URL=/post.php'); 


$uip=$_SERVER['REMOTE_ADDR']; // get the user ip
$action="Login";
// query for inser user log in to data base
mysqli_query($con,"insert into userlog(userId,username,action,userIp) values('".$_SESSION['id']."','".$_SESSION['valid']."','$action','$uip')");
// code redirect the page after login
$extra="post.php";
$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host/$extra");
exit();
}
// If the userinput no matched with database else condition will run
else
{
$_SESSION['msg']="Invalid username or password";
$extra="index.php";
$host  = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
 }
}


?>
<!DOCTYPE html>
<html>
<link rel="shortcut icon" href="/images/slogo.png" type="image/png"/>
<link rel="apple-touch-icon" href="/images/slogo.png" type="image/png"/>
<title>Learning</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="style.css">
</head>
<body>    

<form name="login" method="post" >
  <header><h3>Login To RGU Phamra </h3></header>
  <p style="color:red;"><?php echo $_SESSION['msg'];?><?php echo $_SESSION['msg']="";?></p>
  <label>Username <span>*</span></label>
  <input name="username" type="text" value="" placeholder="Mobile..." required />
  <button type="submit" name="login">Login</button>
</form>
    
    
    
    <?php
}

    
    ?>
    
  </body>
</html>