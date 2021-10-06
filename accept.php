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
      <a href="logout.php" class="ui item">
      <h4>Logout</h4>
      </a>
  </div>
</div>
<center>
<div style="width:50%;">
  <div class="ui success message" >
    <i class="close icon"></i>
    <div class="header" style="height:250px;">
      <h1><i class="check circle icon" style="color: green"></i><br>
      The Customers Order Accepted
    </h1>
    </div>
    <p></p>
  </div>
</div>
</center>
</body>
</html>
