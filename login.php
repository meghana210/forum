<?php
include("logincheck.php");
?>
<html>
<head>
<meta content='text/html; charset=UTF-8' http-equiv='Content-Type'/>
<link rel="stylesheet" type="text/css" href="styles.css" />
<title> Login </title>
</head>
<body>
<div id="formbox">
<?php
if(isset($msg) & !empty($msg)){
echo $msg;
}
?>


</div>
</body>
<html>