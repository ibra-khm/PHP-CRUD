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

$img = mysqli_real_escape_string($conn, $_POST['img2']);
$model= mysqli_real_escape_string($conn, $_POST['model2']);
$price= mysqli_real_escape_string($conn, $_POST['price2']);
$color= mysqli_real_escape_string($conn, $_POST['color2']);

$sql = "UPDATE cars SET img = '$img', model = '$model', price = '$price', color = '$color' WHERE carid=$carid";

if ($conn->query($sql) === TRUE){
    echo "record updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
header("Location: index.php");
exit();
