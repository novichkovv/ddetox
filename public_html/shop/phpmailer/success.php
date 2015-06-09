<?php 

session_start();



$orderNumber = false;

if (isset($_SESSION['flashOrderId'])) {

    $orderNumber = $_SESSION['flashOrderId'];

    $_SESSION['flashOrderId'] = null;

}

?>

<!doctype html>

<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->

<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->

<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->

<!--[if gt IE 8]><!--><html class="no-js" lang="en"> <!--<![endif]-->

<head>

	<meta charset="utf-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">



	<title>Get Your Garcinia Cambogia</title>

	<meta name="description" content="">

	<meta name="author" content="">



	<meta name="viewport" content="width=device-width">



	<link rel="stylesheet" href="/css/normalize.css">

	<link rel="stylesheet" href="/css/base.css">

	<link rel="stylesheet" href="/css/grid.css">

	<link rel="stylesheet" href="/css/style.css">



	<script src="/js/modernizr-2.6.2.min.js"></script>

	

</head>

<body>

<div class="container clearfix">

	<?php include_once '/_header.html'; ?>

    <div id="content" class="grid_12 sub-content">

        <h1>Your order has been received.</h1>

		<h2>Thank you for your purchase!</h2>

        <p>Your order # is: <?php echo $orderNumber ?>.<br />You will receive an order confirmation email with details of your order.

	</div>
     <?php include_once '/_footer.html'; ?>
    </div>

</div>

<!-- end .container -->



<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>

<script src="js/scripts.js"></script>

</body>

</html>

