<?php
session_start();
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "pms";
$verify_err_mess="";
$correct_mess="";

$id = $_SESSION["user_id"];
$sname = $_SESSION["user_name"];
$id2=rand(0,1003);
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if($_SERVER["REQUEST_METHOD"] == "POST"){
  $medicineName = $_POST['mn'];
	$quantity = $_POST['q'];
	$ppq = $_POST['ppq'];

  $sql = "INSERT INTO seller_medicines(SNO,S_ID,SName,Mname,Mquantity,PPQ) VALUES ('$id2','$id','$sname','$medicineName','$quantity','$ppq')";
    if ($conn->query($sql) === TRUE) {
      $correct_mess="Medicine Details have been Added";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/semantic.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/semantic.min.js"></script>
<style>
    .field{
        padding:10px;
    }
    body{
        background-color: #37414b;
          background-image: url('back.jpg');
    }
    .card{
        border-radius: 10px;
    }
    .ui.fluid.button{
      margin:3%;
      margin-left:auto;
      margin-right:auto;
      width: 20% !important;;
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
        <a href="editstock.php" class="ui item">
        <h4>Edit Stock</h4>
        </a>
        <a href="sellerpen.php" class="ui item">
        <h4>Approve orders</h4>
        </a>
        <a href="logout.php" class="ui item">
        <h4>Logout</h4>
        </a>
    </div>
</div>
<div class="page-login main-body" style="margin:40px">
  <div class="ui centered grid container">
    <div class="nine wide column">
      <div class="ui fluid card">
        <div class="content">
        <?php
        if(!empty($verify_err_mess)){
            echo '<div class="ui negative message" id="errorMsg" style="width:85%;">
            <i class="close icon" onclick="closeDiv1()"></i>
            <div class="header">
              '.$verify_err_mess.'
            </div>
            <p>Medicine Details Not Added</p></div>';
        }
        if(!empty($correct_mess)){
            echo '<div class="ui positive message" id="corrMsg" style="width:85%;">
            <i class="close icon" onclick="closeDiv2()"></i>
            <div class="header">'.$correct_mess.'</div></div>';
        }
        ?>
        <form class="ui large form" action="" method="post">
          <h2 class="ui center aligned icon header">
            <i class="circular hospital icon"></i>
            Add New Medicine
          </h2>
          <div class="field">
            <label for="stock"><b>Medicine Name</b></label>
            <input type="text" placeholder="Enter Medicine Name" name="mn" required>
          </div>
          <div class="field">
            <label for="quantity"><b>Quantity</b></label>
            <input type="text" placeholder="Enter Quantity" name="q" required>
          </div>
          <div class="field">
            <label for="ppq"><b>Price Per Quantity</b></label>
            <input type="number" step="0.01" placeholder="Enter Price Per Quantity" name="ppq" required>
          </div>
          <button type="submit" name="submit" class="ui fluid button btn">ADD</button>
        </form>
        </div>
      </div>
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
