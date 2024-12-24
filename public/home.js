const toggle_btn = document.querySelector('.togle_btn')
const toggle_btn_icon = document.querySelector('.togle_btn i')
const dropdown_menu = document.querySelector('.dropdown_menu')

toggle_btn.onclick = function(){
    dropdown_menu.classList.toggle('open')
    const is_open = dropdown_menu.classList.contains('open')

    toggle_btn_icon.classList = is_open? "fa-solid fa-xmark" : "fa-solid fa-bars"
}