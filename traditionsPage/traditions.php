<?php
header("Content-Type: text/html; charset=utf-8");

/* Allow PHP to output error messages. Remove these lines for production! */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'class.traditions.php';

traditions::createTable();
$count = traditions::loadTheTraditions();
$table = traditions::getTraditionsInfo();
?>
<!DOCTYPE html>
<html lang='en'>
<head>
	<meta charset='UTF-8'>
	<title>Big Blue Checklist</title>
</head>
<body>
	<h1>Welcome to the Big Blue Traditions Checklist</h1>
	<div><?= $table ?></div>
</body>
</html>
<!-- vim:filetype=php:-->
