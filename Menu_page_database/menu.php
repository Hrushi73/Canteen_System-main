<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Title</title>
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Nunito+Sans&display=swap");
    </style>
    <link rel="stylesheet" href="./menu_styles.css" />
    <meta name="description" content="PICT College Canteen Website" />
    <meta name="keywords" content="PICT Canteen, Canteen Website" />
    <meta name="author" content="Group II" />
   
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
    />
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script type="text/javascript">
      $(document).ready(function () {
        $(".sidebarbtn").click(function () {
          $(".sidebar").toggleClass("active");
          $(".sidebarbtn").toggleClass("toggle");
          $(".availble_item_container").toggleClass("goRight");
          $(".subscribed_item_bar").toggleClass("goRight");
        });
      });
      
      var food_items_ids = []
      function send_data(id) {
        if(food_items_ids.indexOf(id) == -1)
        {
          food_items_ids.push(id);
          console.log(food_items_ids);
        }
        else{
          var temp = food_items_ids[food_items_ids.indexOf(id)];
          food_items_ids[food_items_ids.indexOf(id)] =  food_items_ids[food_items_ids.length-1];
          food_items_ids[food_items_ids.lenght-1] = temp;
          food_items_ids.pop();
          console.log(food_items_ids);
        }
      }
    </script>
    <style>
      body,
      html {
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
      
    </div>
      <div class="bckimg"></div>
    </div>
      <div>
        <div id="title">
          <h1>TODAY'S MENU</h1>
          <div id="titleicons">
            <ul>
              <li>
                <a href="#" title="Help"
                  ><i
                    class="material-icons"
                    style="font-size: 35px; text-shadow: 0 0 5px #fff"
                  >
                    help_outline</i
                  ></a
                >
              </li>
              <li>
                <a href="#" title="Logout"
                  ><i
                    class="material-icons"
                    style="font-size: 35px; text-shadow: 0 0 5px #fff"
                    >logout</i
                  ></a
                >
              </li>
            </ul>
          </div>
        </div>
      </div>
    </header>

    <div id="content">
      <!-- search bar -->
      <div class="search_container"></div>

      <!-- subscribed item bar -->
      <div class="subscribed_item_bar">
        <h2>Your subscriptions</h2>
        <!-- Food component -->
        <div class="food_comp">
          <input type="checkbox" class="chkbox" />
          <div class="name_and_price">
            <h2>White Coffee</h2>
            <h2>20 Rs.</h2>
          </div>
          <div class="image_container">
            <img src="images/coffe.jpg" class="image" />
          </div>
        </div>
        <div class="food_comp">
          <input type="checkbox" class="chkbox" />
          <div class="name_and_price">
            <h2>White Coffee</h2>
            <h2>20 Rs.</h2>
          </div>
          <div class="image_container">
            <img src="images/coffe.jpg" class="image" />
          </div>
        </div>
      </div>

      <div class="availble_item_container">
        <h2>Available items</h2>
        <?php

        include "dbConn.php"; // Using database connection file here

        $records = mysqli_query($db,"select * from food_items"); // fetch data from database

        while($data = mysqli_fetch_array($records))
        {
        ?>
        <div class="food_comp">
          <input type="checkbox" class="chkbox"  onchange="send_data(<?php echo $data['id']; ?>)"/>
          <div class="name_and_price">
            <h2><?php echo $data['name']; ?></h2>
            <h2><?php echo $data['price']; ?> Rs.</h2>
          </div>
          <div class="image_container">
            <img src="images/<?php echo $data['image']; ?>" class="image"/>
          </div>
        </div>
        <?php
        }
        ?>
      </div>
    </div>

  <div >
    <button style="position:fixed; left:40%;bottom:15px; padding:10px;width:300px;border-radius:20px;background-color: #04AA6D; color:white; font-size:20px;">Order</button>
  </div>


    <!-- sidebar -->
    <div class="sidebar">
      <ul>
        <li>
          <a href="#"
            ><div class="center">
              <i
                class="material-icons"
                style="font-size: 100px; text-shadow: 0 0 5px #fff"
                >account_circle</i
              >
              <p>User Accout</p>
            </div></a
          >
        </li>
        <li>
          <a href="#"
            ><i
              class="material-icons"
              style="font-size: 27px; text-shadow: 0 0 5px #fff"
              >restaurant_menu</i
            >
            Today's Menu</a
          >
        </li>
        <li>
          <a href="#"
            ><i
              class="material-icons"
              style="font-size: 27px; text-shadow: 0 0 2px #fff"
              >summarize</i
            >Subscription History</a
          >
        </li>
        <li>
          <a href="#"
            ><i
              class="material-icons"
              style="font-size: 27px; text-shadow: 0 0 3px #fff"
              >receipt_long</i
            >Order History</a
          >
        </li>
        <li>
          <a href="#"
            ><i
              class="material-icons"
              style="font-size: 27px; text-shadow: 0 0 3px #fff"
              >account_balance_wallet</i
            >Wallet Balance</a
          >
        </li>
      </ul>
      <button class="sidebarbtn">
        <span></span>
      </button>
    </div>
  </body>
</html>
