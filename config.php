<?php 
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "meghana";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sqli = "INSERT INTO users ( username, password)
VALUES ( '$username', '$password', )";

if (mysqli_query($conn, $sqli)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>