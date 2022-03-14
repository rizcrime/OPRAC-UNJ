var toggle = 0
var nav_menu = document.getElementById('nav-menu')

function menuToggle() {
    if (toggle == 0) {
        nav_menu.style.visibility = "visible"
        return toggle = 1
    } else {
        nav_menu.style.visibility = "hidden";
        return toggle = 0
    }
}