var $ = document.querySelector.bind(document);
var $$ = document.querySelectorAll.bind(document);

var sidebarList = $$('.option-item-icon')
var contentSidebarList = $$('.content-sidebar-item')
var slides = $$('.slide-item')
var dots = $$('.tab-item')
var progressList = $$('.percent-track')
var btnPrev = $('.btn-prev')
var btnNext = $('.btn-next')
var boxSkill = $('.box-skill')

// onclick slidebar menu
sidebarList.forEach((e, index) => {
  e.onclick = function() {
    contentSidebar = contentSidebarList[index];
    $('.option-item-icon.active').classList.remove('active');
    $('.content-sidebar-item.active').classList.remove('active');

    e.classList.add('active');
    contentSidebar.classList.add('active');
  }
})

// onclick dots change slider
dots.forEach((e, index) => {
  e.onclick = function() {
    console.log(e)
    $('.tab-item.active').classList.remove('active');
    slides.forEach((e) => {
      e.style.display = "none";  
    })
    slides[index].style.display = 'block';
    slideIndex = index + 1;
    e.classList.add('active');
  }
  
})

var slideIndex = 0;
showSlides();

// auto change slide
function showSlides() {
  slides.forEach((e) => {
    e.style.display = "none";  
  })
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}   
  dots.forEach((e) => {
    e.className = e.className.replace('active', "");
  }) 
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 5000); // Change image every 5s seconds
}

// next Slide
btnNext.onclick = function() { 
  slideIndex++;
  showSlide();
  slides[slideIndex - 1].style.display = "block";
  dots[slideIndex - 1].classList.add('active');
}

// prev Slide
btnPrev.onclick = function() { 
  slideIndex--;
  showSlide();
  slides[slideIndex - 1].style.display = "block";
  dots[slideIndex - 1].classList.add('active');
}

function showSlide() {
  slides.forEach((e) => {
    e.style.display = "none";  
  })
  dots.forEach((e) => {
    e.classList.remove('active');
  })
  if(slideIndex > slides.length) {
    slideIndex = 1;
  }
  if(slideIndex < 1) {
    slideIndex = slides.length;
  }
}

const showProgress = function() {
  progressList.forEach((e) => {
    const value = e.dataset.progress;
    e.style.opacity = 1;
    e.style.width = `${value}%`;
  })
}

const hideProgress = function() {
  progressList.forEach((e) => {
    e.style.opacity = 0;
    e.style.width = 0;
  })
}

window.addEventListener('scroll', () => {
  const skillPosition = boxSkill.getBoundingClientRect().top;
  const screenPosition = window.innerHeight;
  console.log(skillPosition);
  console.log(screenPosition);
  if(skillPosition < screenPosition) {
    showProgress();
  } else {
    hideProgress();
  }
})


