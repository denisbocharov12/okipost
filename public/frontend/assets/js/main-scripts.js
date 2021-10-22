
$(document).ready(function() {
    $('#current-language').click(function(){
        $('#ul-languages').toggleClass('active');
        $('#language-arrow').toggleClass('active');
    });
    $('.select2').select2({
        width: '100%',
        // minimumInputLength: 1,
        language: {
            inputTooShort: function () {
                return "Введите пункт назначения...";
            },
            noResults: function(){
                return "Нет результатов ... ";
            }
        }
    });
    //FAQ
    const items = document.querySelectorAll(".col-faq .accordion a");
    function toggleAccordion(){
        this.classList.toggle('active');
        this.nextElementSibling.classList.toggle('active');
    }

    items.forEach(item => item.addEventListener('click', toggleAccordion));

});
$(document).ready(function() {
    let sliderMain = $('.slider-main');
    sliderMain.on('init', function(e, slick) {
        if(window.matchMedia('(min-width: 991.98px)').matches){
            var $firstAnimatingElements = $('div.slider-item').find('[data-animation]');
            doAnimations($firstAnimatingElements);
        }
    });
    sliderMain.on('beforeChange', function(e, slick, currentSlide, nextSlide) {
        if(window.matchMedia('(min-width: 991.98px)').matches){
            var $animatingElements = $('div.slider-item[data-slick-index="' + nextSlide + '"]').find('[data-animation]');
            doAnimations($animatingElements);
        }

    });
    sliderMain.slick({
        autoplay: true,
        dots: true,
        autoplaySpeed: 8000,
        speed: 1000,
        infinite: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        swipe: false,
        prevArrow:"<i class='icon-arrow-link prev-arrow'></i>",
        nextArrow:"<i class='icon-arrow-link next-arrow'></i>",
        cssEase: "ease-out",
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    swipe: true
                }
            },
            {
                breakpoint: 576,
                settings: {
                    swipe: true
                }
            }
        ]
    });
    function doAnimations(elements) {
        var animationEndEvents = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
        elements.each(function() {
            var $this = $(this);
            var $animationDelay = $this.data('delay');
            var $animationType = 'animate__animated ' + 'animate__'+$this.data('animation');
            $this.css({
                'animate__': $animationDelay,
                '-webkit-animation-delay': $animationDelay
            });
            $this.addClass($animationType).one(animationEndEvents, function() {
                $this.removeClass($animationType);
            });
        });
    }
});

$('#slider-partners').slick({
    autoplay: true,
    dots: false,
    autoplaySpeed: 5000,
    speed: 1000,
    infinite: true,
    slidesToShow: 4,
    slidesToScroll: 1,
    arrows: false,
    cssEase: "ease-out",
    responsive: [
        {
            breakpoint: 1200,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
                infinite: true,
            }
        },
        {
            breakpoint: 768,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2
            }
        },
        {
            breakpoint: 576,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }
    ]
});
const ham_open = $('#hamburger-open');
const ham_close = $('#hamburger-close');
const navExpand = [].slice.call(document.querySelectorAll('.nav-expand'))
const backLink = `<li class="nav-item">
        <a class="nav-link nav-back-link" href="javascript:;">
          Назад
        </a>
      </li>`

navExpand.forEach(item => {
    item.querySelector('.nav-expand-content').insertAdjacentHTML('afterbegin', backLink)
    item.querySelector('.nav-link').addEventListener('click', () => item.classList.add('active'))
    item.querySelector('.nav-back-link').addEventListener('click', () => item.classList.remove('active'))
})
ham_open.click(function(){
    $('#nav-drill').addClass('nav-is-toggled');
})
ham_close.click(function(){
    $('#nav-drill').removeClass('nav-is-toggled');
});
$(window).scroll(function() {
    var header = $(document).scrollTop();
    var headerHeight = $("#header").outerHeight();
    var image_white = '/assets/images/logo-okipost-white.svg';
    var image_color = '/assets/images/logo-color.svg';
    if (header > headerHeight) {
        $(".home #header").addClass("fixed");
        //$(".home #header #logo-standart").css('display','block');
        //$(".home #header #logo-white").css('display','none');
    } else {
        $(".home #header").removeClass("fixed");
        //$(".home #header #logo-white").css('display','block');
        //$(".home #header #logo-standart").css('display','none');
    }
    if (header > 250) {
        $(".home #header").addClass("in-view");
    } else {
        $(".home #header").removeClass("in-view");
    }


    if (header > headerHeight) {
        $(".page #header").addClass("fixed");
    } else {
        $(".page #header").removeClass("fixed");
    }
    if (header > 250) {
        $(".page #header").addClass("in-view");
    } else {
        $(".page #header").removeClass("in-view");
    }
});
// Animations
(function scrollReveal() {
    window.sr = ScrollReveal();
    sr.reveal('.services-block', {
        duration   : 500,
        distance   : '200px',
        easing     : 'ease-out',
        origin     : 'bottom',
        reset      : false,
        interval: 250,
        opacity: 0,
        scale      : 1,
        viewFactor : 0,
    }, 150);
    sr.reveal('.section-cargo .col-cargo-image img', {
        duration   : 800,
        distance   : '350px',
        easing     : 'ease-out',
        origin     : 'right',
        reset      : false,
        opacity: 0 ,
        scale      : .7,
        viewFactor : 0,
    }, 150);
    sr.reveal('.section-cargo .col-cargo-heading h1', {
        duration   : 300,
        distance   : '400px',
        easing     : 'ease-out',
        origin     : 'left',
        reset      : false,
        interval: 250,
        opacity: 0 ,
        scale      : 1,
        viewFactor : 0,
    }, 150);
    sr.reveal('.section-cargo .col-cargo-heading h2', {
        duration   : 400,
        distance   : '400px',
        easing     : 'ease-out',
        origin     : 'left',
        reset      : false,
        interval: 250,
        opacity: 0 ,
        scale      : 1,
        viewFactor : 0,
    }, 150);
    sr.reveal('.section-cargo .col-cargo-heading p', {
        duration   : 500,
        distance   : '400px',
        easing     : 'ease-out',
        origin     : 'left',
        reset      : false,
        interval: 250,
        opacity: 0 ,
        scale      : 1,
        viewFactor : 0,
    }, 150);
})();
// MENU
const app = (() => {
    let body;
    let menu;
    let menuItems;
    let openMenu;
    const init = () => {
        body = document.querySelector('body');
        menu = document.querySelector('.menu-icon');
        openMenu = document.querySelector('.menu-icon-open');
        menuItems = document.querySelectorAll('.nav__list-item');
        applyListeners();
    };

    const applyListeners = () => {
        menu.addEventListener('click', () => toggleClass(body, 'nav-active'));
        openMenu.addEventListener('click', () => toggleClass(body, 'nav-active'));
    };

    const toggleClass = (element, stringClass) => {
        if (element.classList.contains(stringClass))
            element.classList.remove(stringClass);else
            element.classList.add(stringClass);
    };
    init();
})();

