import './bootstrap';

document.addEventListener('DOMContentLoaded', function () {
    var dropdownToggle = document.getElementById('navbarDropdown');
    if (dropdownToggle) {
        dropdownToggle.addEventListener('click', function (event) {
            var dropdownMenu = this.nextElementSibling;
            if (dropdownMenu) {
                dropdownMenu.classList.toggle('show');
            }
        });
    }
});