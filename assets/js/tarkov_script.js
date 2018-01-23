var menu = document.getElementById('menu');
menu.addEventListener("click", function(e){
    if (e.target && e.target.matches("a")) {
        var i = document.getElementsByClassName('nav-item').length;
        while (i--) {
            document.getElementsByClassName('nav-item')[i].setAttribute("style", "color:rgba(255, 255, 255, 0.15)");
        }
        e.target.style.color = "#ff0000";
    }
});
