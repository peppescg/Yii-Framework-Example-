
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Layout principale</title>
<!-- Latest compiled and minified CSS -->
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> -->

<!-- Optional theme -->
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"> -->

<!-- Latest compiled and minified JavaScript -->
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> -->
<?php 
$baseUrl = Yii::app()->baseUrl;
$cs = Yii::app()->getClientScript();
// $cs->registerScriptFile($baseUrl.'/js/yourscript.js');
$cs->registerCssFile($baseUrl.'/css/stile.css');
// $cs->registerCssFile($baseUrl.'/css/form.css');
// $cs->registerCssFile($baseUrl.'/css/ie.css');
// $cs->registerCssFile($baseUrl.'/css/main.css');
// $cs->registerCssFile($baseUrl.'/css/print.css');
// $cs->registerCssFile($baseUrl.'/css/screen.css');
// var_dump($baseUrl);
?>
</head>
<body>
<?php echo $content; ?>
</body>
</html>

