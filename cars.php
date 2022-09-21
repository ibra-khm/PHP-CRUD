<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "carinfo";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$model = mysqli_real_escape_string($conn, $_POST['model']);
$price = mysqli_real_escape_string($conn, $_POST['price']);
$color = mysqli_real_escape_string($conn, $_POST['color']);
$image = mysqli_real_escape_string($conn, $_POST['img']);

$sql = "INSERT INTO cars (model, price, color, img)
VALUES ('$model', '$price', '$color', '$image')";

if ($conn->query($sql) === TRUE) {
  echo "";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

header("Location: index.php");
exit();

?>