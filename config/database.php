<?php
//Start session
session_start();

// create constanst for admin page
define('SITEURL', "http://localhost:8080/Restaurant_Project");

// Creating constants for database info
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'Sam_1604');
define('DB_NAME', 'food-order');


$conn = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME) or die(mysqli_connect_error()); // Connecting to database
?>