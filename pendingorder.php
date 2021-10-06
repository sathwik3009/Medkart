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
 .ui.card{
  margin:10%;
}
th,td{
  max-width:80px;
  text-align:center !important;
}
.sell_head{
  text-align:center!important;
  color:black;
  font-family:'sans-serif';
  font-weight:900;
  margin:3%;
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
<h1 class="sell_head">Placed Orders</h1>
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
$query = "SELECT * FROM temp_purchase_order";
$result = mysqli_query($conn, $query);
$count = mysqli_num_rows($result);
if($count == 0){
  echo "<h2 style='text-align:center; color:black;'>No Medicine Orders Placed</h2>";
}
else{
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
      <th>STATUS</th>
      <th>DELETE</th>
    </tr>
  </thead>
  <tbody>
 ";
 while($row = mysqli_fetch_array($result)){
    echo "
    <tr>
      <form action='pendingdelete.php?PO_NO=".$row['PO_NO']."' method='post'>
      <td>" . $sno . "</td>
      <td>" . $row['MNAME'] . "</td>
      <td>" . $row['MQUANTITY'] . "</td>
      <td>" . $row['AMOUNT'] . "</td>
      <td>" . $row['PAY_MODE'] . "</td>
      <td>" . $row['STATUS'] . "</td>
      <td><button class='ui secondary button' type='submit'>DELETE</button></td>
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
</div>
</div>
</body>
</html>
