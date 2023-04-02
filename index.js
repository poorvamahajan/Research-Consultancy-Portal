
const navMenu = document.getElementById('nav-menu'),
toggleMenu = document.getElementById('nav-toggle'),
closeMenu = document.getElementById('nav-close')


// SHOW========

toggleMenu.addEventListener('click', () => {
navMenu.classList.toggle('show')
})