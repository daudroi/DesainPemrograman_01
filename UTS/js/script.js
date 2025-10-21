let bulan = document.getElementById("bulan");
let kereta = document.getElementById("kereta");
let desert_moon = document.getElementById("desert_moon");
let man = document.getElementById("man");



window.addEventListener("scroll", () => {
    let value = window.scrollY;


    desert_moon.style.top = value * 0.5 + "px";
    console.log(desert_moon);
    man.style.left = value * 0.6 + "px";
    bulan.style.top = value * 0.9 + "px";
    console.log(bulan);
    kereta.style.left = value * 0.6 + "px";
   
});
 