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
$tbl_name="forum_answers"; // Table name 

$conn = new mysqli($servername, $username, $password,$db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
// Get value of id that sent from hidden field 

$id = (isset($_POST['id']) ? $_POST['id'] : '');
$forum_answers = (isset($_POST['forum_answers']) ? $_POST['forum_answers'] : '');

// Find highest answer number. 
$sqli="SELECT MAX(a_id) AS Maxa_id FROM forum_answers WHERE question_id= '".$id."'";
$result=mysqli_query($conn,$sqli);
if (!$result) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}
$rows=mysqli_fetch_array($result);

// add + 1 to highest answer number and keep it in variable name "$Max_id". if there no answer yet set it = 1 
if ($rows) {
$Max_id = $rows['Maxa_id']+1;
}
else {
$Max_id = 1;
}

// get values that sent from form 
$a_name = (isset($_POST['a_name']) ? $_POST['a_name'] : '');
$a_email = (isset($_POST['a_email']) ? $_POST['a_email'] : '');
$a_answer = (isset($_POST['a_answer']) ? $_POST['a_answer'] : '');

//$a_email=$_POST['a_email'];
//$a_answer=$_POST['a_answer']; 


// Insert answer 
$sqli2="INSERT INTO forum_answers(question_id, a_id, a_name, a_email, a_answer,)VALUES('$id', '$Max_id', '$a_name', '$a_email', '$a_answer')";
$result2=mysqli_query($conn ,$sqli2 );

if($result2){
echo "Successful<BR>";
echo "<a href='view_topic.php?id=".$id."'>View your answer</a>";

// If added new answer, add value +1 in reply column 
$tbl_name2="forum_question";
$sqli3="UPDATE $tbl_name2 SET reply='$Max_id' WHERE id='$id'";
$result3=mysqli_query($conn,$sqli3 );
}
else {
echo "ERROR";           
}
// Close connection
mysqli_close($conn);
?>