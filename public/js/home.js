var splide = new Splide('.splide', {
    type: 'loop',
    focus: 'center',
    autoWidth: true,
});
splide.mount();

function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}