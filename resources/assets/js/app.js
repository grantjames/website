//
// Theme toggle
//

var toggle_icon = document.getElementById('theme-toggle');
var body = document.getElementsByTagName('body')[0];
var sun_class = 'icon-sun-1';
var moon_class = 'icon-moon';
var dark_theme_class = 'dark-theme';

toggle_icon.addEventListener('click', function() {
    if (body.classList.contains(dark_theme_class)) {
        toggle_icon.classList.add(moon_class);
        toggle_icon.classList.remove(sun_class);

        body.classList.remove(dark_theme_class);

        setCookie('theme', 'light');
    }
    else {
        toggle_icon.classList.add(sun_class);
        toggle_icon.classList.remove(moon_class);

        body.classList.add(dark_theme_class);

        setCookie('theme', 'dark');
    }
});

function setCookie(name, value) {
    var d = new Date();
    d.setTime(d.getTime() + (365*24*60*60*1000));
    var expires = "expires=" + d.toUTCString();
    document.cookie = name + "=" + value + ";" + expires + ";path=/";
}

//
// Quick category switcher toggle
//

var dropdown = document.getElementById('header__dropdown');
var category_div = document.getElementById('quick-category-switcher');

if (dropdown !== null) {
    dropdown.addEventListener('click', function() {
        if (category_div.style.display != 'block') {
            category_div.style.display = 'block';
            dropdown.classList.add('header__dropdown--opened');
        }
        else {
            category_div.style.display = 'none';
            dropdown.classList.remove('header__dropdown--opened');
        }
        
    });
}
