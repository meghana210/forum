 <html>
  <head>
	<script type="text/javascript" src="tinymce/js/jquery.min.js"></script>
		<script type="text/javascript" src="tinymce/plugin/tinymce/tinymce.min.js"></script>
		<script type="text/javascript" src="tinymce/plugin/tinymce/init-tinymce.js"></script>
	</head>
  <link rel="stylesheet" type="text/css" href="css/style.css"/>

 <div id="container">
 <?php
                include "header/header.php";
                include "menu/menu.php";
                ?>
             <br>  
<?php
$servername="localhost"; // Host name 
$username="root"; // Mysql username 
$password="root"; // Mysql password 
$db_name="mydb"; // Database name 
$tbl_name="forum_question"; // Table name 

// Create connection
$conn = new mysqli($servername, $username, $password,$db_name);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
else
{
echo "";
}
// get value of id that sent from address bar 
 $id = (isset($_POST['id']) ? $_POST['id'] : '');

$sqli="SELECT * FROM forum_question WHERE id='$id'";
$result=mysqli_query($conn,$sqli);
$rows=mysqli_fetch_array($result);
?>

<table width="400" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<td><table width="100%" border="0" cellpadding="3" cellspacing="1" bordercolor="1" bgcolor="#FFFFFF">
<tr>
<td bgcolor="#F8F7F1"><strong><? echo $rows['topic']; ?></strong></td>
</tr>

<tr>
<td bgcolor="#F8F7F1"><? echo $rows['detail']; ?></td>
</tr>


</table>
<BR>

<?php

$tbl_name2="forum_answers"; // Switch to table "forum_answer"
$sqli2="SELECT * FROM $tbl_name2 WHERE question_id='$id'";
$result2=mysqli_query($conn,$sqli2);
while($rows=mysqli_fetch_array($result)){
?>

<?php
}

$sqli3="SELECT view FROM $tbl_name WHERE id='$id'";
$result3=mysqli_query($conn,$sqli3);
$rows=mysqli_fetch_array($result3);
$view=$rows['view'];
 
// if have no counter value set counter = 1
if(empty($view)){
$view=1;
$sqli4="INSERT INTO $tbl_name(view) VALUES('$view') WHERE id='$id'";
$result4=mysqli_query($conn,$sqli4);
}
 
// count more value
$addview=$view+1;
$sqli5="update $tbl_name set view='$addview' WHERE id='$id'";
$result5=mysqli_query($conn,$sqli5);
mysqli_close($conn);
?>

<BR>
<table width="400" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<form name="form1" method="post" action="add_answer.php">
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<td width="18%"><strong>Name</strong></td>
<td width="3%">:</td>
<td width="79%"><input name="a_name" type="text" id="a_name" size="45"></td>
</tr>
<tr>
<td><strong>Email</strong></td>
<td>:</td>
<td><input name="a_email" type="text" id="a_email" size="45"></td>
</tr>
<tr>
<td valign="top"><strong>Answer</strong></td>
<td valign="top">:</td>
<td><textarea class="tinymce"></textarea>
</tr>
<tr>
<td>&nbsp;</td>
<td><input name="id" type="hidden" value="<? echo $id; ?>"></td>
<td><input type="submit" name="Submit" value="Submit"> <input type="reset" name="Submit2" value="Reset"></td>
</tr>
</table>
</td>
</form>
</tr>
</table> 
</html>