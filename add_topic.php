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

$conn = new mysqli($servername, $username, $password,$db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
else{
    echo " ";

}
// get data that sent from form 
$topic = (isset($_POST['topic']) ? $_POST['topic'] : '');
$detail= (isset($_POST['detail']) ? $_POST['detail'] : '');
$name = (isset($_POST['name']) ? $_POST['name'] : '');
$email = (isset($_POST['email']) ? $_POST['email'] : '');

$sql="INSERT INTO forum_question (topic, detail, name, email) VALUES('.$topic.','.$detail.','.$name.','.$email.')";
$result=mysqli_query($conn,$sql);

if($result){
echo " ";
echo "<a href=main_forum.php>View your topic</a>";
}
else {
echo "ERROR";
}
mysqli_close($conn);
?>