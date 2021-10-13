
<?php

$servername="localhost";
$username="root";
$password="";
$database="canteen";
$conn=mysqli_connect($servername,$username,$password,$database);
if(!$conn)
{
    die("hi to connect ".mysqli_connect_error());
}
//echo "connection is suusefull";
$sql="SELECT * FROM `users`";
$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
if($num>0)
{
    $row=mysqli_fetch_assoc($result);
    //echo $row['id']. "-". $row['name'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Title</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Nunito+Sans&display=swap');
    </style>
  <link rel="stylesheet" href="./styles3.css">
  <meta name="description" content="PICT College Canteen Website">
  <meta name="keywords" content="PICT Canteen, Canteen Website">
  <meta name="author" content="Group II">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $('.sidebarbtn').click(function(){
        $('.sidebar').toggleClass('active');
        $('.sidebarbtn').toggleClass('toggle');
      })
    })
  </script>
  <style>
    body, html {
    height: 100%;
    margin: 0;
}
.bckimg {
  /* The image used */
  background-image: url("./B3.jpeg");
  /* Full height */
  height: 100%; 

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}

</style>
</head>
<body>
  <header> 
  
    <div  class = "container">
      <div id="title">
      <h1><span class="highlight">USER</span> ACCOUNT</h1>
      <div id="titleicons">
        <ul>
          <li><a href="#" title="Help"><i class="material-icons" style="font-size:35px;text-shadow: 0 0 5px #fff;"> help_outline</i></a></li>
        <li><a href="#" title="Logout"><i class="material-icons" style="font-size:35px;text-shadow: 0 0 5px #fff;">logout</i></a></li>
        </ul>
      </div>
      </div>
    </div>
  </header>
  <div class="sidebar">
    <ul>
      <li><a href="#"><div class="center"><i class="material-icons" style="font-size:100px;text-shadow: 0 0 5px #fff;">account_circle</i><p>User Account</p></div></a></li>
      <li><a href="#"><i class="material-icons" style="font-size:27px;text-shadow: 0 0 5px #fff;">restaurant_menu</i> Today's Menu</a></li>
      <li><a href="#"><i class="material-icons" style="font-size: 27px;text-shadow: 0 0 2px #fff;">summarize</i>Subscription History</a></li>
      <li><a href="#"><i class="material-icons"style="font-size: 27px;text-shadow: 0 0 3px #fff;">receipt_long</i>Order History</a></li>
      <li><a href="#"><i class="material-icons"style="font-size: 27px;text-shadow: 0 0 3px #fff;">account_balance_wallet</i>Wallet Balance</a></li>
    </ul>
    <button class="sidebarbtn">
      <span></span>
    </button>
  </div>
  
 
  <div id="content">
    <!-- put content here -->
    
    <div id="user_logo">
        <img src="logo.png" alt="Unable to reload">
    </div >
    <div id ="box">
        <p id="info"> User Deatails:</p>
        <br>
        <p id ="info">USERNAME: <span style="padding-left: 20px;"></span> <?php echo strtoupper($row['username'] )?> </p>
        <p id ="info">USER_ID:  <span style="padding-left: 40px;"></span> <?php echo strtoupper($row['id'] )?></p>
        <hr id="line">
        <p id="info"> Personal Details:</p>
        <br>
        <p id ="info">NAME: <span style="padding-left: 40px;"></span><?php echo strtoupper($row['name'] )?></p>
        <p id ="info">EMAIL-ID:<span style="padding-left: 20px;"></span><?php echo ($row['email'] )?></p>
        <p id ="info">CONTACT:<span style="padding-left: 20px;"></span><?php echo strtoupper($row['wallet'] )?></p>
    </div>
    <div class="bckimg"></div>
</body>
</html>
