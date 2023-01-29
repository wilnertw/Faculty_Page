'use strict';

$(window).on('load', function(){
    /*Preloader*/ 
    $(".loader").fadeOut();
    $("#preloader").delay(400).fadeOut("slow");
});

/** show menu */
const navMenu = document.getElementById('nav-menu'),
      navToggle = document.getElementById('nav-toggle'),
      navClose = document.getElementById('nav-close')

/* show menu */
if(navToggle){
    navToggle.addEventListener('click', () =>{
        navMenu.classList.add('show-menu')
    })
}

/* hide menu */
if(navClose){
    navClose.addEventListener('click', () =>{
        navMenu.classList.remove('show-menu')
    })
}

/* backgroung img - faculty */
(function ($){
    $('.set-bg').each(function(){
        var bg = $(this).data('setbg');
        $(this).css('background-image', 'url('+ bg +')');

    });
})(jQuery); 

/**remove menu */
const navLink = document.querySelectorAll('.nav-link')
function linkAction(){
    const navMenu = document.getElementById('nav-menu')
    navMenu.classList.remove('show-menu')
}
navLink.forEach(n => n.addEventListener('click', linkAction))

/** change backgroud header: show scroll */
function scrollHeader(){
    const header = document.getElementById('header')
    if(this.scrollY >= 80) header.classList.add('scroll-header'); else header.classList.remove('scroll-header')
}
window.addEventListener('scroll', scrollHeader)

/** Accordion Content : FAQs */
const aItem = document.querySelectorAll('.questions-item')
aItem.forEach((item) =>{
    const aHeader = item.querySelector('.questions-header')
    aHeader.addEventListener('click', () =>{
        const itemOpen = document.querySelector('.accordion-open')
        toggleItem(item)
        if(itemOpen && itemOpen!== item){
            toggleItem(itemOpen)
        }
    })
})
const toggleItem = (item) =>{
    const aContent = item.querySelector('.questions-content')
    if(item.classList.contains('accordion-open')){
        aContent.removeAttribute('style')
        item.classList.remove('accordion-open')
    }else{
        aContent.style.height = aContent.scrollHeight + 'px'
        item.classList.add('accordion-open')
    }
}

/** scroll section - show active link */
const sections = document.querySelectorAll('section[id]')
function scrollActive(){
    const scrollY = window.pageYOffset
    sections.forEach(current =>{
        const sectionHeight = current.offsetHeight,
              sectionTop = current.offsetTop - 58,
              sectionId = current.getAttribute('id')
        if(scrollY > sectionTop && scrollY <= sectionTop + sectionHeight){
            document.querySelector('.nav-menu a[href*=' + sectionId + ']').classList.add('active-link')
        }else{
            document.querySelector('.nav-menu a[href*=' + sectionId + ']').classList.remove('active-link')
        }
    })
}
window.addEventListener('scroll', scrollActive)


/** scroll up */ 
function scrollUp(){
    const scrollUp = document.getElementById('scroll-up');
    if(this.scrollY >= 400) scrollUp.classList.add('show-scroll'); else scrollUp.classList.remove('show-scroll')
}
window.addEventListener('scroll', scrollUp)

/** scroll revel animation */
const sr = ScrollReveal({
    origin: 'top',
    distance: '60px',
    duration: 2500,
    delay: 400,
})

sr.reveal(`.word`)
sr.reveal(`.faculty-section, .academic`, {delay: 500})
sr.reveal(`.about-info, .contact-box`,{origin: 'left'})
sr.reveal(`.about-img, .contact-form`,{origin: 'right'})
sr.reveal(`.links-card, .event-card, .product-card, .questions-item, .calendar`,{interval: 100})
sr.reveal(`.calendar, .undergraduate`,{interval: 100})