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

$conn = new mysqli($servername,$username,$password,$db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else
{echo " ";}

$sql="SELECT * FROM forum_question";
// OREDER BY id DESC is order result by descending

$result=mysqli_query($conn,$sql);
?>

<table width="90%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<td width="6%" align="center" bgcolor="#E6E6E6"><strong>id</strong></td>
<td width="53%" align="center" bgcolor="#E6E6E6"><strong>Topic</strong></td>
<td width="15%" align="center" bgcolor="#E6E6E6"><strong>Views</strong></td>
<td width="13%" align="center" bgcolor="#E6E6E6"><strong>Replies</strong></td>
<td width="13%" align="center" bgcolor="#E6E6E6"><strong>Date/Time</strong></td>
</tr>

<?php
//$id=isset($_POST['id'];? $_POST['id'] : '';
//$topic=isset($_POST['topic'];? $_POST['topic'] : '';
//$views=isset($_POST['views'];? $_POST['views'] : '';
//$reply=isset($_POST['reply'];? $_POST['reply'] : '';
//$datetime=isset($_POST['datetime']? $_POST['datetime'] : '';
	//$rows['id']=null;
    //$rows['topic']=null; 
                            
	//$rows['views']=null;
	//$rows['reply']=null;
	//$rows['datetime']=null;
// Start looping table row
while($rows = mysqli_fetch_array($result)){

?>

<tr>
<td bgcolor="#FFFFFF"><?php echo $rows[1]; ?></td>
<td bgcolor="#FFFFFF"><a href="view_topic.php?id=<?php echo $rows['id']; ?>"><?php echo $rows[2]; ?></a><BR></td>
<td align="center" bgcolor="#FFFFFF"><?php echo $rows[3]; ?></td>
<td align="center" bgcolor="#FFFFFF"><?php echo $rows[4]; ?></td>
<td align="center" bgcolor="#FFFFFF"><?php echo $rows[5]; ?></td>
</tr>
 

<?php
// Exit looping and close connection 
}
mysqli_close($conn);
?>

<tr>
<td colspan="5" align="right" bgcolor="#E6E6E6"><a href="create_topic.php"><strong>Create New Topic</strong> </a></td>
</tr>
</table>
</div>

