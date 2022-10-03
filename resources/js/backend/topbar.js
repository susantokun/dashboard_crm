(function () {
    "use strict";

    let toggle = document.querySelector('.toggle');
    let topbar_menu = document.querySelector('.topbar-menu');
    let sidebar_title = document.querySelector('.sidebar-title');
    let navigation = document.querySelector('.sidebar');
    let content = document.querySelector('.content');

    toggle.onclick = function() {
        navigation.classList.toggle('active')
        topbar_menu.classList.toggle('active');
        sidebar_title.classList.toggle('active');
    }

    let list = document.querySelectorAll('.navigation li');
    function activeLink() {
        list.list.forEach((item) => {
            item.classList.remove('');
            item.classList.add('hovered');
        });
        list.forEach((item) => {
            item.addEventListener('mouseover', activeLink)
        })
    }
})();
