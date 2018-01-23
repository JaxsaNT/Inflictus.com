<?php
require "../vendor/autoload.php";
session_start();

if (!$_SESSION["roleID"] == 1) {
  header("Location: ../index.php");
    die();
} 

?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel</title>
        <link rel="stylesheet" href="assets/css/reset.css">
        <link rel="stylesheet" href="assets/css/styles.css">
	<meta charset="utf-8">
</head>
            <div class="globalwrapper">
		<header>
			<nav class="menu">

			</nav>
		</header>
            