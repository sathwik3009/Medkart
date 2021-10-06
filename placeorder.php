<?php
session_start();
$mid= $_SESSION['MID'];
$q = $_SESSION['QUA'];
$total_amt=$_SESSION['AMT'];
$ppq=$_SESSION['med_ppq'];
$sname = $_SESSION['user_name'];
$mname = $_SESSION['MName'];
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "pms";
$id="";
$corr_mess="";
$id2=$_SESSION["user_id"];
$sno=rand(201,300);
if(isset($_POST['submit'])){
  $pay=$_POST['pay_mode'];
}
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$query="SELECT * FROM buyer WHERE Buyer_ID='$id2'";
$result = mysqli_query($conn,$query);
while($row = mysqli_fetch_array($result)){
  $contact = $row['Buyer_Contact'];
  $address = $row['Buyer_Address'];
}
if ($_SERVER['REQUEST_METHOD']=='POST') {
  $sql="INSERT INTO temp_sale_order1 (SONO,BID, BNAME, BCONTACT, BADDRESS,MID, MEDICINE, QUANTITY, PPQ, PAYMODE, TOTAMOUNT) VALUES ('$sno','$id2', '$sname', '$contact', '$address','$mid', '$mname', '$q', '$ppq', '$pay', '$total_amt')";
  if ($conn->query($sql) === TRUE) {
     $corr_mess="Purchase Order has been Placed";
     } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
  }
?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin</title>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/semantic.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/semantic.min.js"></script>
  <style>
  body{
      background-color: #37414b;
          background-image: url('back.jpg');
  }
  </style>
</head>
<body>
<div class="ui secondary menu navbar" style="padding:3px;">
  <a class="ui item">
  <h2><i class="shopping cart icon" size="big"></i>MedKart</h2></a>
  <div class="right menu">
    <a href="customer.php" class="ui item">
    <h4>Home</h4>
    </a>
    <a href="adminsearch.php" class="ui item">
    <h4>Search Info</h4>
    </a>
      <a href="logout.php" class="ui item">
      <h4>Logout</h4>
      </a>
  </div>
</div>
<center>
<div style="width:50%;">
<div class="ui success message" >
  <i class="close icon"></i>
  <div class="header" style="height:250px;">
    <h1><i class="check circle icon" style="color: green"></i><br>
    Thank You Your Order Placed  successfully.
  </h1>
  </div>
  <p></p>
</div>
</div>
</center>
</body>
</html>
