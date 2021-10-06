<?php
session_start();
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "pms";
$verify_err_mess="";
$correct_mess="";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST['mn'];
    $newq = $_POST['q'];
    $newppq = $_POST['ppq'];
    $id = $_SESSION["user_id"];
    $query="SELECT * FROM seller_medicines WHERE S_ID ='$id' AND MName='$name'";
    $result = mysqli_query($conn,$query);
	$count  = mysqli_num_rows($result);
    if($count==0){
        $verify_err_mess="Medicine does not exist in your Stock";
    }
    else{
        if($newq == 0){
            $query="DELETE FROM seller_medicines WHERE MName='$name'";
            $result = mysqli_query($conn,$query);
            if(mysqli_affected_rows($conn)==1){
                $correct_mess="Medicine Details has been updated";
            }
        }
        else{
        $query="UPDATE seller_medicines SET Mquantity='$newq',PPQ='$newppq' WHERE Mname='$name'";
        $result = mysqli_query($conn,$query);
        if(mysqli_affected_rows($conn)==1){
            $correct_mess="Medicine Details has been updated";
        }
        else{
            $verify_err_mess="SQL Updation Error";
        }
    }
    }
}
?>

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
  .field{
        padding:10px;
    }
    .card{
        border-radius: 10px;
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
.ui.fluid.button{
  margin:3%;
  margin-left:auto;
  margin-right:auto;
  width: 20% !important;;
}
/* .closebtn{
position: absolute;
top: 20px;
right: 45px;
font-size: 60px;
transition: 1s;
} */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
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
<div class="ui centered grid container" style="margin:20px;">
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
            <p>Medicine Details Not Updated</p></div>';
        }
        if(!empty($correct_mess)){
            echo '<div class="ui positive message" id="corrMsg" style="width:85%;">
            <i class="close icon" onclick="closeDiv2()"></i>
            <div class="header">'.$correct_mess.'</div></div>';
        }
        ?>
        <form class="ui large form" action="" method="post">
          <h2 class="ui center aligned icon header">
            <i class="circular edit icon"></i>
            Edit Medicine
          </h2>
          <div class="field">
            <label for="stock"><b>Medicine Name</b></label>
            <input type="text" placeholder="Enter Medicine Name" name="mn" required>
          </div>
          <div class="field">
            <label for="quantity"><b>New Quantity</b><span style="font-size:1rem; font-weight:400;">(Enter 0 To Delete)</span></label>
            <input type="text" placeholder="Enter Quantity" name="q" required>
          </div>
          <div class="field">
            <label for="ppq"><b>New Price Per Quantity</b></label>
            <input type="number" step="0.01" placeholder="Enter Price Per Quantity" name="ppq" required>
          </div>
          <p style="text-align:center; font-size:1.3rem; font-family:'sans-serif';">
          Note : If you do not want to edit quantity or ppq then enter the current value</p>
          <button type="submit" class="ui fluid button btn">UPDATE</button>
        </form>
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
