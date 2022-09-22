<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "carinfo";

//create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check Connection 
if ($conn->connect_error){
    die("Connection failed: ". $conn->connect_error);
}

$carid = $_GET['carid'];
//sql to delete record
$sql = "DELETE FROM cars WHERE carid=$carid";

$conn->query($sql);

$conn->close();
header("Location: index.php");
exit();