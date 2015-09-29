<?php

//21 Day Detox
$host = "localhost"; // If you don't know what your host is, it's safe to leave it localhost
$dbName = "ddetox_backend"; // Database name
$dbUser = "ddetox_admin"; // Username
$dbPass = "Starcraft12"; // Password

//7 Day Detox
$host = "localhost"; // If you don't know what your host is, it's safe to leave it localhost
$dbName = "ddetox_backend"; // Database name
$dbUser = "ddetox_admin"; // Username
$dbPass = "Starcraft12"; // Password

$con = mysqli_connect($host,$dbUser,$dbPass,$dbName); 

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

if ($_POST['email'] == NULL) {
	$email = "Empty";	
}
else {
	$email = $_POST['email'];
}

//$email = mysqli_real_escape_string($_POST['email'], $con);


$query="SELECT * FROM `detox_order` WHERE 'email' = $email";
$result = mysqli_query($con, $query);
$row_cnt = mysqli_num_rows($result);

if ($row_cnt < 1) {
	header( 'Location: https://www.divinehealthdetox.com/shop/home.php' );
}


?>