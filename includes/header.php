<?php
    require "vendor/autoload.php";
    session_start();
    header("X-XSS-Protection: 1; mode=block");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Inflictus</title>
<link rel="stylesheet" href="assets/css/styles.css">
<link rel="stylesheet" href="assets/css/reset.css">
<link rel="icon" href="assets/media/favicon.ico" type="image/x-icon">
<meta charset="UTF-8">
</head>
<body>
    <div class="global-wrapper bg-dark" id="wrapper">
    <a href="index.php?page=login" class="loginBTN trans025"><img class="btn" src="assets/media/lock.png"/><p>Login</p></a>
<!--Header Start-->

<!--Header End-->