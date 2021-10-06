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
$rand=rand(1,100);

$sql = "INSERT INTO buyer (Buyer_Name,Buyer_Password,Buyer_Email,Buyer_Contact,Buyer_Address,Buyer_ID)
VALUES ('$Name', '$Password', '$Email','$Contact','$Address','$rand')";

if ($conn->query($sql) === TRUE) {
   readfile('success.html');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
