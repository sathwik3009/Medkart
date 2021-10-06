<?php
session_start();
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "pms";
$corr_mess="";
$err_mess="";
$sell_id = $_SESSION['seller_id'];
$sname = $_SESSION['SName'];
$mname=$_SESSION['MName'];
$q = $_SESSION['quantity'];
$amt=$_SESSION['total_amt'];
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$po_no = mt_rand(0,10000000);
$pay_mode = $_POST['pay_mode'];
$sql = "INSERT INTO temp_purchase_order(PO_NO,S_ID,SNAME,MNAME,MQUANTITY,AMOUNT,PAY_MODE)
VALUES ('$po_no','$sell_id','$sname','$mname','$q','$amt','$pay_mode')";
if ($conn->query($sql) === TRUE) {
    $corr_mess="Purchase Order has been Placed";
} else {
    $err_mess="Unknown Error Occured";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/semantic.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/semantic.min.js"></script>
    <title>Document</title>
    <style>
        body{
            background-color: #37414b;
              background-image: url('back.jpg');
        }
    </style>
</head>
<body>
    <div class="ui secondary menu navbar" style="padding:3px;">
        <!-- <a class="ui item">
            <i class="shopping cart icon" size="big"></i>
        </a> -->
        <a class="ui item">
        <h2>MedKart</h2></a>
        <div class="right menu">
            <a href="adminhome.php" class="ui item">
            <h4>Home</h4>
            </a>
            <a href="medicine.php" class="ui item">
            <h4>View Inventory</h4>
            </a>
            <a href="setprice.php" class="ui item">
            <h4>Set Price</h4>
            </a>
            <a href="buymed.php" class="ui item">
            <h4>Buy Medicines</h4>
            </a>
            <a href="adminbuyer.php" class="ui item">
            <h4>Approve Orders</h4>
            </a>
            <a href="editadm.php" class="ui item">
            <h4>Edit Medicine Stock</h4>
            </a>
            <a href="logout.php" class="ui item">
            <h4>Logout</h4>
            </a>
        </div>
    </div>
    <div class="page-login main-body" style="margin:40px;">
        <div class="ui centered grid container">
          <div class="nine wide column">
            <div class="ui fluid card" style="margin-top:15%;">
              <div class="content" style="text-align:center; height:30vh;">
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
                    <p>Waiting for Approval from Seller</p>
                    <p>You can check the placed orders in <a href="pendingorder.php">Placed Orders</a></p></div>';
                }
                ?>
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
