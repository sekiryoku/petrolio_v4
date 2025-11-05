document.addEventListener("DOMContentLoaded",()=>{const menu=document.querySelector(".header__navigation");const btn_open=document.querySelector(".menu-open-img");btn_open.addEventListener("click",()=>{menu.style.right=0})
function close_menu(){menu.style.right="-100%"}
const btn_close=document.querySelector(".menu-close-img");btn_close.addEventListener("click",close_menu)
document.querySelectorAll(".nav-link").forEach(link=>{link.addEventListener("click",close_menu)})})