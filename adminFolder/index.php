<?php
    include_once "includes/header.php";
    $page = "";
    //Checker om der findes en "page" efter "?" i web URL'en
    $page = (isset($_GET["page"])) ?
            //Så skal den gå til den side som bliver valgt
            "pages/" . $_GET["page"] . ".php"
            : "pages/main.php";

//Checker om siden findes, hvis den ikke gør det, går den ind på 404.php
    if (file_exists($page )){
        include_once( $page );
    } else {
        include_once "pages/404.php";
    }
    

    include_once "includes/footer.php";
?>
