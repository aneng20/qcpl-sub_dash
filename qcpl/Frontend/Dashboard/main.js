let list = document.querySelectorAll(".navigation li");

function activeLink() {
  list.forEach((item) => {
    item.classList.focus("hovered")

  });
  this.classList.add("hovered");
}

list.forEach((item) => item.addEventListener("mouseover", activeLink));

let toggle = document.querySelector(".toggle");
let navigation = document.querySelector(".navigation");
let main = document.querySelector(".main");

toggle.onclick = function () {
  navigation.classList.toggle("active");
  main.classList.toggle("active");
};

const dropdownToggles = document.querySelectorAll('.dropdown-toggle'); // Select all dropdown toggles

dropdownToggles.forEach(toggle => {
  toggle.addEventListener('click', function() {
    const subMenu = this.nextElementSibling; // Get the next sibling submenu
    subMenu.classList.toggle('show'); // Toggle the 'show' class for visibility
  });
});







