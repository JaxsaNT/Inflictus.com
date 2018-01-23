<?php
include_once "includes/header.php";
$page = "";
    //Checks if a "page" exist after the "?" in the web URL
$page = (isset($_GET["page"])) ?
    //If it exists the it should goto the chosen page -
    "pages/" . $_GET["page"] . ".php"
    : "pages/main.php";
    //Checks if the "page" exists, if not then it redirects to 404.php
if (file_exists($page )){
    include_once( $page );
} else {
    include_once "pages/404.php";
}


include_once "includes/footer.php";
?>
