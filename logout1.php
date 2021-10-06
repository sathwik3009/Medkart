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
  <script>
  var seconds=4;
  function display(){
    seconds -=1;
    document.getElementById("seconddisplay").innerText="Redirecting automatically in "+seconds+" seconds ";
  }
  setInterval(display,1000);
  function redirect(){
    window.location.href="login.php";
  }
  setTimeout('redirect()',3000);
  </script>
</head>
<body>
  <center>
  <div class="ui success message" style="width:500px;height:300px;padding:20px;margin:20px;">
  <i class="close icon"></i>
  <div class="header">
    <h1>Thank You</h1>
  </div>
  <div id="seconddisplay"></div>
  <p>or</p>
  <h3>Your logout successful now u can login using <a href="login.php">login</a></h3></div>
</center>
</body>
</html>
