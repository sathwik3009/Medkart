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

.ui.fluid.card{
  margin:2%;
  padding:1%;
  width:50%;
}
.ui.fluid.button{
  margin:1%;
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
    <!--  <a class="ui item" onclick="openNav()"><h2><span class="one" id="user">0</span><i class="shopping cart icon" name="cart"></i>
        cart</h2></a> -->
        <a href="customer.php" class="ui item">
        <h4>Home</h4>
        </a>
        <a href="adminsearch.php" class="ui item">
        <h4>Search info</h4>
        </a>
      <a href="logout.php" class="ui item">
      <h4>Logout</h4>
      </a>
  </div>
</div>
<h1 class="sell_head">Preview Purchase Order Details</h1>
<div class="ui centered grid container">
  <div class="ui fluid card">
    <div class="content">
  <?php
    session_start();
    $id = $_SESSION["user_id"];
    $sname = $_SESSION["user_name"];
    $mname = $_GET["MName"];
    $mid=$_GET['MID'];
    $mq = $_GET["MQ"];
    $ppq = $_GET["PPQ"];
    $_SESSION['MID']=$mid;
    $_SESSION['med_ppq'] = $ppq;
    $_SESSION['MName'] = $mname;
    $min=0;

    echo
    "<div>
        <h2>Buyer Name : ".$sname."</h2>
        <h2>Medicine Name : ".$mname."</h2>
        <h2>Price Per Quantity : Rs ".$ppq."</h2>
        <form class='ui large form' method='post' action='bill_next.php'>
        <div class='field'>
            <label for='quantity'><b style='font-size:1.5rem;'>Quantity</b><span style='font-size:1rem; font-weight:400;'>(value less than ".$mq.")</span></label>
            <input style='width:33%;' type='number' min='$min' max='$mq' placeholder='Enter Quantity' name='q' required>
        </div>
        <button type='submit' name='submit' class='ui fluid button btn secondary'>Next</button>
    </div>";
  ?>
  </div>
</div>
</div>
</body>
</html>
