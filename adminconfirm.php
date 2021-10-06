<?php
session_start();
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "pms";
$id="";
$corr_mess="";
$sno=rand(0,10000000);
$days=rand(1,5);
$mname = $_GET["MName"];
$mq = $_GET["MQ"];
$paymode = $_GET["PAYMODE"];
$bname = $_GET["BName"];
$id1=$_GET["Bid"];
$id2=$_GET["MID"];
$amt=$_GET["AMT"];
if(isset($_POST['submit'])){
  $pay=$_POST['request'];
}
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if($pay=='A'){
if($_SERVER["REQUEST_METHOD"] == "POST"){
$sql="INSERT INTO sale_order(SO_NO,BID,MID,MName,MQuantity,PayMode,Amount,Days) VALUES ('$sno','$id1','$id2','$mname','$mq','$paymode','$amt','$days')";
if ($conn->query($sql) === TRUE) {
      readfile('adminaccept.php');
   }
}
}else{
    header("Location: adminreject.php");
}
 ?>
