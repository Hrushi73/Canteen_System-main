
<?php
 
 // Starting the session, to use and
 // store data in session variable
 session_start();
   
 // If the session variable is empty, this
 // means the user is yet to login
 // User will be sent to 'login.php' page
 // to allow the user to login
 if (!isset($_SESSION['usname'])) {
     $_SESSION['msg'] = "You have to log in first";
     header('location: ../signup.php');
 }
   
 // Logout button will destroy the session, and
 // will unset the session variables
 // User will be headed to 'login.php'
 // after loggin out
 if (isset($_GET['logout'])) {
     session_destroy();
     unset($_SESSION['usname']);
     header("location: ../signup.php");
 }
 
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
 $tosearch = $_SESSION['usname'];
 $sql="SELECT * FROM `users` WHERE username = '$tosearch'";
 $result=mysqli_query($conn,$sql);
 $num=mysqli_num_rows($result);
 if($num>0)
 {
     $row=mysqli_fetch_assoc($result);
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
  <link rel="stylesheet" href="./Wallet_balance.css">
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


</style>
</head>
<body>
  <header> 
  
    <div  class = "container">
      <div id="title">
      <h1><span class="highlight">WALLET</span> BALANCE</h1>
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
        <li><a href="../USER_INFO/Mysql.php"><div class="center"><i class="material-icons" style="font-size:100px;text-shadow: 0 0 5px #fff;">account_circle</i><p> <?php echo $_SESSION['usname']; ?></p></div></a></li>
        <li><a href="../Menu_page_final_version/menu.php"><i class="material-icons" style="font-size:27px;text-shadow: 0 0 5px #fff;">restaurant_menu</i> Today's Menu</a></li>
        <li><a href="button.html"><i class="material-icons" style="font-size: 27px;text-shadow: 0 0 2px #fff;">summarize</i>Subscription History</a></li>
        <li><a href="button.html"><i class="material-icons"style="font-size: 27px;text-shadow: 0 0 3px #fff;">receipt_long</i>Order History</a></li>
        <li><a href="../Wallet_balance/Wallet_balance.php"><i class="material-icons"style="font-size: 27px;text-shadow: 0 0 3px #fff;">account_balance_wallet</i>Wallet Balance</a></li>
      </ul>
    <button class="sidebarbtn">
      <span></span>
    </button>
  </div>
  <div id="box">
        <p id ="info">ACCOUNT BALANCE: <span style="padding-left: 150px;"></span><?php echo strtoupper($row['wallet'] ),"$"?></p>
        <p id ="info">ACCOUNT ID:  <span style="padding-left: 210px;"></span> <?php echo strtoupper($row['id'] )?></p>
  </div>
  <div>
    
    <li><a href="button.html"> <button class="btn">Check Order History</button></a></li>

  </div>
    
  
      
   
    <div class="bckimg"></div>
</body>
</html>
