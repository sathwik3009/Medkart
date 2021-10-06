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
  .ui.fluid.card{ margin-left:1.25%!important;
                  margin-right:1.25%!important;
                }
  </style>
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
  <center style="color:black;">
    <h2>Admin Dashboard</h2>
    <hr style="width:75%;margin-bottom:2%;">

    <div class="ui three stackable cards" style="width:75%;">

    <div class="ui fluid card" style="height:200px;background-color:black;">

  <div class="content">
    <div class="center aligned header"><h2 style="color:white;">MANAGE BUYER REQUESTS</h2></div>
    <div class="center aligned description" style="margin-top:10px;">
      <a href="adminbuyer.php" ><p><i class="massive users icon"></i></p></a>
    </div>
  </div>


</div>

<div class="ui fluid card" style="height:200px;background-color:black;">
  <div class="content">
    <div class="center aligned header"><h2 style="color:white;">VIEW MEDICINE INVENTORY</h2></div>
    <div class="center aligned description" style="margin-top:10px;">
    <a href="medicine.php"><p><i class="massive eye icon"></i></p></a>
    </div>
  </div>
</div>
<div class="ui fluid card" style="height:200px;background-color:black;">
  <div class="content">
    <div class="center aligned header" ><h2 style="color:white;">BUY MEDICINES</h2></div>
    <div class="center aligned description" style="margin-top:40px;">
    <a href="buymed.php"><p><i class="massive edit plus icon"></i></p></a>
    </div>
  </div>
</div>
</div>
<div class="ui three stackable cards" style="width:75%;">

<div class="ui fluid card" style="height:200px;background-color:black;">

<div class="content" >
<div class="center aligned header"><h2 style="color:white;">EDIT MEDICINE INVENTORY</h2></div>
<div class="center aligned description" style="margin-top:10px;">
  <a href="editadm.php" ><p><i class="massive pencil alternate icon"></i></p></a>
</div>
</div>

</div>


<div class="ui fluid card" style="height:200px;background-color:black;">
<div class="content">
<div class="center aligned header"><h2 style="color:white;">SET MEDICINE PRICE</h2></div>
<div class="center aligned description" style="margin-top:40px;">
<a href="setprice.php"><p><i class="massive rupee sign icon"></i></p></a>
</div>
</div>

</div>
<div class="ui fluid card" style="height:200px;background-color:black;">
<div class="content">
<div class="center aligned header"><h2 style="color:white;">PLACED ORDERS</h2></div>
<div class="center aligned description" style="margin-top:40px;">
<a href="pendingorder.php"><p><i class="massive history sign icon"></i></p></a>
</div>
</div>

</div>
</div>

</center>
  </body>
