let nav_btn = document.getElementById("nav-btn");
let close_nav = document.getElementById("close-nav");
let menu = document.querySelector("menu");


nav_btn.addEventListener('click', ()=>{
    menu.classList.toggle("open");
});
close_nav.addEventListener('click', ()=>{
    menu.classList.remove("open");
});

const active_page = window.location.pathname;
const nav_item = document.querySelectorAll(".link").forEach(link =>{
    if(link.href.includes(active_page)){
        link.classList.toggle("active-link");
        console.log("ok");
    }
});

const nav_link = document.querySelectorAll(".nav-link").forEach(link =>{
    if(link.href.includes(active_page)){
        link.classList.toggle("active-page");
        console.log("ok");
    }
});