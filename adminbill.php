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
      background-image: linear-gradient(315deg, #485461 0%, #28313b 74%);
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
  color:white;
  font-family:'sans-serif';
  font-weight:700;
  margin:3%;
}

  </style>
</head>
<body>
<div class="ui secondary menu navbar" style="padding:3px; background-color:white;">
  <a class="ui item">
  <h2><i class="shopping cart icon" size="big"></i>MedKart</h2></a>
  <div class="right menu">
    <a href="adminhome.php" class="ui item">
      <h4>Home</h4>
      </a>
      <a href="adminbuy.php" class="ui item">
      <h4>Buy Medicines</h4>
      </a>
      <a href="/" class="ui item">
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
    $id = $_GET["SID"];
    $sname = $_GET["SName"];
    $mname = $_GET["MName"];
    $mq = $_GET["MQ"];
    $ppq = $_GET["PPQ"];
    $_SESSION['med_ppq'] = $ppq;
    $_SESSION['SName'] = $sname;
    $_SESSION['MName'] = $mname;
    $min=0;
    echo
    "<div>
        <h2>Seller Name : ".$sname."</h2>
        <h2>Medicine Name : ".$mname."</h2>
        <h2>Price Per Quantity : Rs ".$ppq."</h2>
        <form class='ui large form' method='post' action='adminbillnext.php'>
        <div class='field'>
            <label for='quantity'><b style='font-size:1.5rem;'>Quantity</b><span style='font-size:1rem; font-weight:400;'>(value less than ".$mq.")</span></label>
            <input style='width:33%;' type='number' min='$min' max='$mq' placeholder='Enter Quantity' name='q' required>
        </div>
        <button type='submit' class='ui fluid button btn secondary'>Next</button>
    </div>";
  ?>
  </div>
</div>
</div>
</body>
</html>
