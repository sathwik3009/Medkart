<?php
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "pms";
 $sid = $_GET["SID"];
 $sname = $_GET["SName"];
 $mname = $_GET["MName"];
 $mq = $_GET["MQ"];
 $amt = $_GET["AMT"];
 $pono = $_GET["PONO"];
 $pay_mode = $_GET["PAYMODE"];
 $buy_date = $_GET["BDATE"];
 $days = $_POST['days'];

 $conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "INSERT INTO purchase_order(PO_NO,S_ID,SNAME,MName,MQuantity,AMOUNT,PayMode,BuyDate,Days)
      VALUES ('$pono', '$sid', '$sname','$mname','$mq','$amt','$pay_mode','$buy_date','$days')";
      if ($conn->query($sql) === TRUE) {
          readfile('adminaccept1.php');
      } else {
        readfile('adminreject1.php');
      }
//  echo "<p>".$sid." ".$sname." ".$mname." ".$mq." ".$amt." ".$pono." ".$pay_mode." ".$buy_date."</p>";
?>
