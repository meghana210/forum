<?php
 include('config.php');
 session_start();
$user_check=$_SESSION['login_user'];
$ses_sqli=mysqli_query($conn"select username from users where username='$user_check' ");
$row=mysqli_fetch_array($ses_sqli,MYSQLI_ASSOC);
$loggedin_session=$row['username'];
if(!isset($loggedin_session))
{
header("Location: login.php");
}
?>