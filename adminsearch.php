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
    .bar{
      margin:auto;
      width:575px;
      border-radius:30px;
      border:1px solid black;
    }
    .bar:hover{
      box-shadow: 1px 1px 8px 1px black;
    }
    .bar:focus-within{
      box-shadow: 1px 1px 8px 1px black;
      outline:none;
    }
    .searchbar{
      height:45px;
      border:1px solid black;
      width:575px;
      font-size:16px;
      border-radius:30px;
      outline: none;
    }
</style>
</head>
<body>
<div class="ui secondary menu navbar" style="padding:3px;">
    <a class="ui item">
    <h2><i class="shopping cart icon" size="big"></i>MedKart</h2></a>
    <div class="right menu">
      <a href="customer.php" class="ui item">
      <h4>Home</h4>
      </a>
      <a href="adminsearch.php" class="ui item">
      <h4>Search Info</h4>
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
        if(!empty($err)){
            echo '<div class="ui negative message">' . $err . '</div>';
        }
        ?>
        <center>
        <form class="ui large form" action="" method="post">
          <h2 class="ui center aligned icon header">
            <i class="circular plus icon"></i>
            Search Medicine
          </h2>
      <div class="ui search">
      <div class="ui icon input searchbar">
        <input class="prompt" type="text" name="mn" placeholder="Search Medkart..." style="background-color:white;border-radius:30px;">
        <i class="search icon"></i>
      </div>
    </div>
        <div style="display:flex; justify-content:space-evenly; padding:10px;">
            <button class="ui secondary button" type="submit" name="search">
                Search
              </button>
        </div>
        </form>
      </center>
        </div>
      </div>
    </div>
    <h1 id="heading"></h1>
    <?php
        session_start();
        $servername = "localhost:3307";
        $username = "root";
        $password = "";
        $dbname = "pms";
        $err="";
        $conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if(isset($_POST['search']))
{
  $id=$_POST['mn'];
$query2 = "SELECT * FROM medicine_inventory WHERE MName='$id'";
$result = mysqli_query($conn, $query2);
$count = mysqli_num_rows($result);
if($count == 0){
    echo "<h1 style='text-align:center; color:white;'>No Medicine stock currently</h1>";
}
else{
$sno = 1;
echo "
<table class='ui celled table'>
    <thead>
    <tr>
        <th>SNO</th>
        <th>MEDICINE ID</th>
        <th>MEDICINE NAME</th>
        <th>MEDICINE STOCK</th>
        <th>PRICE PER QUANTITY</th>
    </tr>
    </thead>
    <tbody>
    ";
    while($row = mysqli_fetch_array($result)){
    echo "
    <tr>
        <td>" . $sno . "</td>
        <td>" . $row['MID'] . "</td>
        <td>" . $row['MName'] . "</td>
        <td>" . $row['MQuantity'] . "</td>
        <td>" . $row['PPQ'] . "</td>
    </tr>";
    $sno++;
    }
echo "
</tbody>
</table>";
}
}

        ?>
  </div>
</div>
</body>
</html>
