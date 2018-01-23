<?php
use SSFTH\DBcon;
use SSFTH\login;

$mysqli = DBcon::db_connect();
if(isset($_POST['submit'])){
    $login = new login($mysqli, 'inflictus_user_table');
    $login->setUsername($_POST['username']);
    $login->setPassword($_POST['password']);
    $login = $login->login();
    if(!$login == "Wrong Password or Username"){
        header("Location: index.php?page=website");
    }
}
/*
if(isset($_POST['username']) && isset($_POST['password'])){
    $username = $_POST['username'];
    $password =  password_hash($_POST['password'], PASSWORD_DEFAULT);
    $ipaddress = $_SERVER['REMOTE_ADDR'];
    $login = new login($mysqli, 'inflictus_user_table');
    $login->setIp($ipaddress);
    $login->setPassword($password);
    $login->setUsername($username);
    $login->create();
}
*/


?>
<div class="shield" id="shield">
    <img src="assets/media/left.svg" class="left" id="left">
    <img src="assets/media/right.svg" class="right" id="right">
</div>
<form method="post" class="form" id="form">
    <label for="username">Username</label>
    <input type="text" id="username" name="username">
    <span class="gradiant"></span>
    <label for="password">Password</label>
    <input type="password" id="password" name="password">
    <span class="gradiant"></span>
    <input type="submit" id="submit" name="submit">
</form>




<script type="text/javascript">
    var right = document.getElementById("right");
    var form = document.getElementById("form");
    var left = document.getElementById("left");
    var logo = document.getElementById("shield");


    logo.addEventListener("click", function(e){
        if (e.target && e.target.matches("img")){
            if(left.className != 'lefty' && right.className != 'righty'){
                left.className = 'lefty';
                right.className = 'righty';
                window.setTimeout(function () {
                    form.style.zIndex = "2";
                }, 1600);
            }else if(left.className == 'lefty' && right.className == 'righty'){
                left.className = 'left';
                right.className = 'right';
                form.style.zIndex = "";

            }

        }
    });

</script>