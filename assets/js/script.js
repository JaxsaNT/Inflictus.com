 /*   Menu Button   */
 var menuBTN = document.getElementById("menu-checkbox");
 var overlay = document.getElementById("menu-overlay");
menuBTN.addEventListener("click", function(){
    if(menuBTN.checked === false){
        overlay.className = "menu-overlay none";
    }else if(menuBTN.checked === true){
        overlay.className = "menu-overlay flex";
    }
});
/*   Menu Button   */
/*
* link function for buttons
* */
/*
added "required" -> form inputs -> main.php
created function to check additional validation...didnt work deleted it x_x
 */

