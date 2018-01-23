<?php

if($_SESSION['inflictus_loggedin'] != TRUE){
    header("Location: ../index.php");
}

?>
<div class="circles">
    <a href='index.php?page=tarkov'><div class='circle'></div></a>
    <a href='index.php?page=rocket'><div class='circle'></div></a>
    <a href='index.php?page=csgo'><div class='circle'></div></a>
    <a href='index.php?page=league'><div class='circle'></div></a>
</div>

