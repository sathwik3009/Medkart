<?php
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "pms";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$Name=$_POST['Name'];
$Password=$_POST['Password'];
$Email=$_POST['Email'];
$Address=$_POST['Address'];
$Contact=$_POST['Contact'];
$rand=rand(101,200);

$sql = "INSERT INTO seller (Seller_Name,Seller_Password,Seller_Email,Seller_Contact,Seller_Address,Seller_ID)
VALUES ('$Name', '$Password', '$Email','$Contact','$Address','$rand')";

if ($conn->query($sql) === TRUE) {
   readfile('success.html');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
