document.addEventListener('DOMContentLoaded', ()=>{
    const burgerButton = document.querySelector(".icon-menu");  
    const menu = document.querySelector(".header-top_menu");  
    burgerButton.addEventListener("click", () => {
        if (burgerButton.classList.contains("active")) {
            burgerButton.classList.remove("active");
            menu.style.left = "-120%";
        }
        else {
            burgerButton.classList.add("active");
            menu.style.left = "0";
        }
    })
})