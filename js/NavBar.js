const togglemenu = document.getElementsByClassName('toggle-menu')[0]
const navlinks = document.getElementsByClassName('navbar-links')[0]

togglemenu.addEventListener('click', () => {
    navlinks.classList.toggle('active-menu');
});