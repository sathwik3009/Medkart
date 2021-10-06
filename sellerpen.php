<!DOCTYPE html>
<html>
<head>
  <title>SELLER</title>
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
  .open-button {
  background-color: #555;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: fixed;
  bottom: 23px;
  right: 28px;
  width: 280px;
  transition: 0.5s;
}

.form-popup {
  display: none;
  position:fixed ;
  bottom: 0;
  right: 15px;
  border: 3px solid #f1f1f1;
  z-index: 9;
}

.form-container {
  max-width: 300px;
  padding: 10px;
  background-color: white;
}

.form-container input[type=text], .form-container input[type=password],
.form-container input[type=number],.form-container input[type=email]  {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}
.form-container input[type=text]:focus, .form-container input[type=password],
.form-container input[type=number],.form-container input[type=email] :focus {
  background-color: #ddd;
  outline: none;
}
.form-container .btn {
  background-color: black;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

.form-container .cancel {
  background-color: red;
}
.closebtn{
position: absolute;
top: 20px;
right: 45px;
font-size: 60px;
transition: 1s;
}
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}
.ui.card{
  margin:10%;
}
.ui.fluid.button{
  margin:5%;
  margin-left:auto;
  margin-right:auto;
  width: 20% !important;;
}
th,td{
  max-width:80px;
  text-align:center !important;
}
.sell_head{
  text-align:center!important;
  color:black;
  font-family:'sans-serif';
  font-weight:700;
  margin:3%;
}

  </style>
</head>
<body>
<div class="ui secondary menu navbar" style="padding:3px;">

    <a class="ui item">
    <h2><i class="shopping cart icon" size="big"></i>MedKart</h2></a>
    <div class="right menu">
      <a href="seller.php" class="ui item">
        <h4>Home</h4>
        </a>
        <a href="newmed.php" class="ui item">
        <h4>New Stock</h4>
        </a>
        <a href="sellerpen.php" class="ui item">
        <h4>Approve Orders</h4>
        </a>
        <a href="editstock.php" class="ui item">
        <h4>Edit Stock</h4>
        </a>
        <a href="logout.php" class="ui item">
        <h4>Logout</h4>
        </a>
    </div>
</div>
<h1 class="sell_head">Seller Medicine Details</h1>
<div class="ui centered container">
  <div class="card">
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
$id = $_SESSION['user_id'];
$query = "SELECT * FROM temp_purchase_order WHERE S_ID='$id'";
$result = mysqli_query($conn, $query);
$sno=1;
echo "
<table class='ui celled table' style='background-color:black;color:white;'>
  <thead>
    <tr>
      <th>SNO</th>
      <th>MEDICINE NAME</th>
      <th>QUANTITY</th>
      <th>AMOUNT</th>
      <th>PAY_MODE</th>
      <th>NO OF DAYS</th>
      <th>APPROVE</th>
    </tr>
  </thead>
  <tbody>
 ";
 while($row = mysqli_fetch_array($result)){
    echo "
    <tr>
    <form method='post' action='approved.php?SName=".$row['SNAME']."&&MName=".$row['MNAME']."&&SID=".$row['S_ID']."&&MQ=".$row['MQUANTITY']."&&AMT=".$row['AMOUNT']."&&PONO=".$row['PO_NO']."&&PAYMODE=".$row['PAY_MODE']."&&BDATE=".$row['BUY_DATE']."'>
      <td>" . $sno . "</td>
      <td>" . $row['MNAME'] . "</td>
      <td>" . $row['MQUANTITY'] . "</td>
      <td>" . $row['AMOUNT'] . "</td>
      <td>" . $row['PAY_MODE'] . "</td>
      <td><input style='width:70%;' min=0 type='number'placeholder='Enter Days' name='days' required></td>
      <td><button class='ui secondary button' type='submit'>Approve</td>
      </form>
    </tr>";
    $sno++;
 }
 echo "
  </tbody>
</table>";
$conn->close();
?>
</div>
</div>
</div>
</body>
</html>
