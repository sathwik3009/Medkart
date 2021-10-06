<!DOCTYPE html>
<html>
<head>
  <title>Buyer</title>
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

    <a class="ui item" href="customer.php">
    <h2><i class="shopping cart icon" size="big"></i>MedKart</h2></a>
    <div class="right menu">
      <!--  <a class="ui item" onclick="openNav()"><h2><span class="one" id="user">0</span><i class="shopping cart icon" name="cart"></i>
          cart</h2></a> -->
          <a href="customer.php" class="ui item">
          <h4>Home</h4>
          </a>
          <a href="billpage.php" class="ui item">
          <h4>orders bill</h4>
          </a>
          <a href="adminsearch.php" class="ui item">
          <h4>Search info</h4>
          </a>
        <a href="logout.php" class="ui item">
        <h4>Logout</h4>
        </a>
    </div>
</div>
<div class="ui huge header" style="text-align:center;color:black;">Download</div>
<div>
<hr  style="width:75%;">
<center>
<div style="width:75%">
<?php
session_start();
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "pms";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$id2=$_SESSION['user_id'];

$query2 = "SELECT * FROM sale_order WHERE BID='$id2'";
$result = mysqli_query($conn, $query2);
$count = mysqli_num_rows($result);
if($count == 0){
    echo "<h1 style='text-align:center; color:black;'>No Requests are there currently</h1>";
}
else{
$sno = 1;
$buy='Download';
echo "
<table class='ui celled table' style='background-color:black;color:white;'>
    <thead>
    <tr>

        <th>SALE NO</th>
        <th>BUYER ID</th>
        <th>MEDICINE ID</th>
        <th>MEDICINE NAME</th>
        <th>QUANTITY</th>
        <th>DATE</th>
        <th>PAYMODE</th>
        <th>TOTAL AMOUNT</th>
        <th>Days</th>
        <th>CONFIRM</th>
    </tr>
    </thead>
    <tbody>
    ";
    while($row = mysqli_fetch_array($result)){
    echo "
    <tr>
    <form method='post' action='billpagenex.php?date=".$row['SaleDate']."&&DAYS=".$row['Days']."&&AMT=".$row['AMOUNT']."&&SNO=".$row['SO_NO']."&&MID=".$row['MID']."&&MName=".$row['MName']."&&MQ=".$row['MQuantity']."&&PAYMODE=".$row['PayMode']."'>
        <td>" . $row['SO_NO'] . "</td>
        <td>" . $row['BID'] . "</td>
        <td>" . $row['MID'] . "</td>
        <td>" . $row['MName'] . "</td>
        <td>" . $row['MQuantity'] . "</td>
        <td>" . $row['SaleDate'] . "</td>
        <td>" . $row['PayMode'] . "</td>
        <td>" . $row['AMOUNT'] . "</td>
        <td>". $row['Days']."</td>
        <td><button class='ui secondary button' type='submit' name='submit'>
        ".$buy."
      </button></td>
      </form>
    </tr>";
    $sno++;
    }
echo "
</tbody>
</table>";
}
$conn->close();
?>
</div>
</center>

</body>
</html>
