//theme switch from https://uglyduck.ca/quick-dirty-theme-switcher/
// Set a given theme/color-scheme
function setTheme(themeName) {
    localStorage.setItem('theme', themeName);
    document.documentElement.className = themeName;
}

// Toggle between color themes
function toggleLightTheme() {
    if (localStorage.getItem('theme') !== 'theme-light'){
        setTheme('theme-light');
    }
}
function toggleDarkTheme() {
    if (localStorage.getItem('theme') !== 'theme-dark'){
        setTheme('theme-dark');
    }
}
function toggleLvTheme() {
    if (localStorage.getItem('theme') !== 'theme-lv'){
        setTheme('theme-lv');
    }
}
function toggleLanTheme() {
    if (localStorage.getItem('theme') !== 'theme-lan'){
        setTheme('theme-lan');
    }
}
function toggleHuangTheme() {
    if (localStorage.getItem('theme') !== 'theme-huang'){
        setTheme('theme-huang');
    }
}

// Immediately set the theme on initial load
(function () {
    if (localStorage.getItem('theme') === 'theme-light') {
        setTheme('theme-light');
    }
    if (localStorage.getItem('theme') === 'theme-dark') {
        setTheme('theme-dark');
    }
    if (localStorage.getItem('theme') === 'theme-lv') {
        setTheme('theme-lv');
    }
    if (localStorage.getItem('theme') === 'theme-lan') {
        setTheme('theme-lan');
    }
    if (localStorage.getItem('theme') === 'theme-huang') {
        setTheme('theme-huang');
    }
})();