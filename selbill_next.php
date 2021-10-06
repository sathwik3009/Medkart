<?php
session_start();
$q = $_POST['q'];
$ppq=$_SESSION['med_ppq'];
$amt = $q*$ppq;
$total_amt = $amt + ($amt*8/100);
$sname = $_SESSION['SName'];
$mname = $_SESSION['MName'];
$_SESSION['total_amt'] = $total_amt;
$_SESSION['quantity'] = $q;
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "pms";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$query="SELECT * FROM seller WHERE Seller_Name='$sname'";
$result = mysqli_query($conn,$query);
while($row = mysqli_fetch_array($result)){
  $contact = $row['Seller_Contact'];
  $address = $row['Seller_Address'];
  $id = $row['Seller_ID'];
  $_SESSION['seller_id'] = $id;
}
$conn->close();
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
.field{
  padding:10px;
}
.cont{
  display:flex;
  justify-content:space-around;
}
.left_bill{
  text-align:left;
  flex:1;
}
.right_bill{
  text-align:right;
  flex:1;
}
.ui.fluid.card{
  margin:2%;
  padding:1%;
  width:50%;
}
.ui.fluid.button{
  margin:2%;
  margin-left:auto;
  margin-right:auto;
  width: 30% !important;;
}
th,td{
  max-width:80px;
  padding: 2% 4%;
}

.table {
    border-collapse: collapse;
    font-size: 0.9em;
    font-family: sans-serif;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    margin:5%;
  }

  .table thead tr {
    background-color: #37414b;
    color: #ffffff;
    text-align: center;
}

  .table th,
  .table td {
      padding: 2% 4%;
  }
  .table tr {
    border-bottom: 1px solid #dddddd;
}

.table tr:last-of-type {
    border-bottom: 2px solid #37414b;
}

.sell_head{
  text-align:center!important;
  color:black;
  font-family:'sans-serif';
  font-weight:700;
  margin:3%;
}

.tax{
  width:50%;
  align-self:flex-end;
  margin:1%;
  margin-bottom:3%;
}

  </style>
</head>
<body>
<div class="ui secondary menu navbar" style="padding:3px;">
  <a class="ui item">
  <h2><i class="shopping cart icon" size="big"></i>MedKart</h2></a>
  <div class="right menu">
      <a href="adminhome.php" class="ui item">
      <h4>Home</h4>
      </a>
      <a href="logout.php" class="ui item">
      <h4>Logout</h4>
      </a>
  </div>
</div>
<h1 class="sell_head">Final Bill</h1>
<div class="ui centered grid container">
  <div class="ui fluid card">
    <div class="cont">
      <div class="left_bill">
        <p><b>Seller Name : </b><?php echo "$sname"?></p>
        <p><b>Seller Contact : </b><?php echo "$contact"?></p>
        <p><b>Seller Address : </b><?php echo "$address"?></p>
      </div>
      <div class="right_bill">
        <p><b>Buyer Name : </b>MedKart Pvt Ltd</p>
        <p><b>Buyer Contact : </b>0000000000</p>
        <p><b>Buyer Address : </b>Anna Nagar,Chennai</p>
      </div>
    </div>
    <table class="table">
      <tr>
        <th>Medicine Name</th>
        <th>Quantity</th>
        <th>PPQ</th>
        <th>Amount</th>
      </tr>
      <tr>
        <td><?php echo "$mname" ?></td>
        <td><?php echo "$q" ?></td>
        <td><?php echo "$ppq" ?> Rs Per/U</td>
        <td><?php echo "$amt" ?> Rs</td>
      </tr>
    </table>
    <table class="tax">
      <tr>
        <td>Tax</td>
        <td style="background-color:#37414b text-color:white;">8 %</td>
      </tr>
      <tr>
        <td>Total Amount</td>
        <td style="background-color:#37414b text-color:white;"><?php echo "$total_amt"?> Rs</td>
      </tr>
    </table>
    <form action="order.php" method="post">
    <div class="field">
          <select name="pay_mode" class="ui dropdown">
            <option value="" >Select Mode of Payment</option>
            <option value="Cash On Delivery" name="pay_mode">Cash On Delivery</option>
            <option value="Cheque" name="pay_mode">Cheque</option>
            <option value="Card" name="pay_mode">Card</option>
            <option value="UPI" name="pay_mode">UPI</option>
            <option value="Net Banking" name="pay_mode">Net Banking</option>
          </select>
        </div>
    <button type="submit" class="ui fluid button btn secondary">Place Order</button>
    </form>
</div>
</div>
</body>
</html>
