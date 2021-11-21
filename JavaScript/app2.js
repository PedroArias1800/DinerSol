const navSlide = () => {
  const burger = document.querySelector(".ab");
  const nav = document.querySelector(".nav");
  const ulLinks = document.querySelectorAll(".nav li");

  burger.addEventListener("click", () => {
    //toggle nav
    nav.classList.toggle("ul-active");

    //animated links
    ulLinks.forEach((link, index) => {
      if (link.style.animation) {
        link.style.animation = "";
      } else {
        link.style.animation = `ulFade 0.5s ease forwards ${index / 7 + 0.3}s`;
      }
    });
     //burger animation
    burger.classList.toggle('toggle');


  });

 
  

};

navSlide();
