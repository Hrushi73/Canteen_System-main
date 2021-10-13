<?php

$db = mysqli_connect("localhost","root","","menu_page_db");  // database connection

if(!$db)
{
    die("Connection failed: " . mysqli_connect_error());
}

?>