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
$mid = $_GET["MID"];
$mname = $_GET["MName"];
$mquantity = $_GET["MQUANTITY"];
$ppq = $_POST["ppq"];

$sql = "INSERT INTO medicine_inventory(MID,MNAME,MQUANTITY,PPQ)
VALUES ('$mid','$mname','$mquantity','$ppq')";
if ($conn->query($sql) === TRUE) {
    $sql = "DELETE FROM temp_medicines WHERE MID='$mid'";
    if($conn->query($sql) === TRUE) {
    $corr_mess="Price has been set";
    }
    else {
     $err_mess="Unknown Error Occured";
    }
} else {
    $err_mess="Unknown Error Occured";
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
.ui.card{
  margin:10%;
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
        <a href="adminhome.php" class="ui item">
        <h4>Home</h4>
        </a>
        <a href="logout.php" class="ui item">
        <h4>Logout</h4>
        </a>
    </div>
</div>
<h1 class="sell_head">Medicine Details</h1>
<div class="ui centered container">
  <div class="ui fluid card" style="width:70%;">
  <?php
    if(!empty($err_mess)){
        echo '<div class="ui negative message" id="errorMsg" style="width:100%;">
        <i class="close icon" onclick="closeDiv1()"></i>
        <div class="header"  style="margin:2%;">
        '.$err_mess.'
        </div>
        <p>Please try again</p></div>';
    }
    if(!empty($corr_mess)){
        echo '<div class="ui positive message" id="corrMsg" style="width:100%;">
        <i class="close icon" onclick="closeDiv2()"></i>
        <div class="header" style="margin:2%;">'.$corr_mess.'</div>
        </div>';
    }
    ?>
</div>
</div>
</div>
<script>
        function closeDiv1(){
            document.getElementById('errorMsg').style.display='None';
        }
        function closeDiv2(){
            document.getElementById('corrMsg').style.display='None';
        }
    </script>
</body>
</html>
