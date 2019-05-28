var toggle_icon = document.getElementById('theme-toggle');
var body = document.getElementsByTagName('body')[0];
var sun_class = 'icon-sun-1';
var moon_class = 'icon-moon';

toggle_icon.addEventListener('click', function() {
    if (toggle_icon.classList.contains(sun_class)) {
        toggle_icon.classList.add(moon_class);
        toggle_icon.classList.remove(sun_class);

        body.classList.remove('dark-theme');
    }
    else {
        toggle_icon.classList.add(sun_class);
        toggle_icon.classList.remove(moon_class);

        body.classList.add('dark-theme');
    }
});