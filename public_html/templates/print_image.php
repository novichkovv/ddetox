<html>
<head>
    <title>Печать изображения</title>
</head>
<body>
<?php if($_GET['img']): ?>
    <img src="<?php echo $_GET['img']; ?>">
<?php endif; ?>
<?php if($template): ?>
    <?php echo $template; ?>
<?php endif; ?>
<script type="text/javascript">
    print();
</script>
</body>
</html>