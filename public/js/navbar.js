function openCloseNav() {
    const clicNav = document.getElementById('clic-nav');
    const navToogle = document.getElementById('nav-toogle');
    clicNav.addEventListener('click', event => {
        navToogle.classList.toggle("nav-close");
      });
}