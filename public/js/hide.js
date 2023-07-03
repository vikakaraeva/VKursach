document.addEventListener('DOMContentLoaded', () => {
    const cross = document.querySelector(".hide_ad");
    const ad = document.querySelector(".ad");
    cross.addEventListener("click", () => {
        ad.style.visibility = "hidden";
        ad.style.position = "absolute";
    })
})
