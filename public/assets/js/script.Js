let humbergerBar = document.querySelector(".humberger");

let navMenu = document.querySelector("nav");

let navItems = document.querySelectorAll(".navItem");


let openEye = document.querySelectorAll(".open");
let closeEye = document.querySelectorAll(".close");

let myalert = document.querySelector(".alert")

let teahcerBox = document.querySelector(".teach")
let studentBox = document.querySelector(".stud")


    setTimeout(() => {
      myalert.styel.display = "none";
    }, 1000);





let user = {
  isUserExist: false,
};



humbergerBar.addEventListener("click", () => {
  humbergerBar.classList.toggle("active");
  navMenu.classList.toggle("active");
});

navItems.forEach((e) => {
  e.addEventListener("click", () => {
    navItems.forEach((i) => {
      i.classList.remove("activeColor");
    });
    e.classList.add("activeColor");
  });
});

navItems.forEach((e) => {
  e.addEventListener("click", () => {
    humbergerBar.classList.remove("active");
    navMenu.classList.remove("active");
  });
});



function handleChange(check){
  teahcerBox.checked = false
  studentBox.checked = false
  check.checked = true
}
  
function show(e,show = true){
  if (show) {
    e.style.display = "none";
    e.previousElementSibling.style.display = "block";
    e.previousElementSibling.previousElementSibling.type = "text";
  }else{
    e.style.display = "none";
    e.nextElementSibling.style.display = "block";
    e.previousElementSibling.type = "password";
  }
}

