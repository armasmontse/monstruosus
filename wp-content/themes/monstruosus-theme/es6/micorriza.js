import {$, w} from './constants'
import {tap} from './debug'
import './menu'
import './slider'
import './scrollit'
import Splash from './splash'

const $id = id => document.getElementById(id)
const noop = () => {}

$id('splash') ?  tap('splash', Splash()) : noop()

console.log('Hola mindo!');

const navbar = $("#product-navbar");
const navbar_placeholder = $("#product-navbar-placeholder");
var sticky;

w.load(function() {

    var btnCerrarAlert = $("#closeAlert_JS");
    
    $("body").on("click", ".closeAlert.close_JS", function() {
        var contAlert = $("body").find('.woocommerce-alert');
        contAlert.hide();
    });

    $("body").on("click", "#closeAlert", function() {
        var contAlert = $("body").find('.woocommerce-alert');
        contAlert.hide();
    });

    var CerrarAlert = $("#closeAlert");
    var contAlertJS = $('.woocommerce-error');
    var open = true;
    CerrarAlert.on("click", function() {
        if(open) {
            contAlertJS.addClass('hide');
        }
        //contAlertJS.hide();
    });


    $('.masonry').masonry({
        itemSelector: '.masonry-item',
        columnWidth: '.masonry-sizer',
        percentPosition: true,
    });

    const sliderMasonry = $('.slider__masonry');

    sliderMasonry.slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        fade: true,
    });

    const modal = $('.modal');
    const close = $('.modal__close');
    const item = $('.masonry-item');

    var slideIndex = 0;

    item.click(function() {
        modal.addClass('show');

        let index = $(this).data('index');

        sliderMasonry.slick('refresh');

        sliderMasonry.slick('slickGoTo', index);
    })

    close.click(function() {
        modal.removeClass('show');
    })

    loadSticky();

});

w.scroll(function() {

    posicionarMenu();

    $('.activate-item').each(function() {
        var currLink = $(this)
        var refElement = $(currLink.find('a').attr('href'))
        // Si el scroll del documento es mayor al offset del objeto. => window.pageYOffset >= refElement.offset().top
        // Si el scroll del documento es menor al offset del objeto más su altura. => window.pageYOffset < refElement.offset().top + refElement.height()
        if (window.pageYOffset + 50 >= refElement.offset().top && window.pageYOffset + 50 < refElement.offset().top + refElement.height()) {
           $('.activate-item').removeClass('active');
           currLink.addClass('active');
        }else {
         currLink.removeClass('active');
        }
    })

});

w.resize(function() {

    loadSticky();

});

function loadSticky() {
    if (navbar.length) {
        sticky = navbar.offset().top;
    }
}

function posicionarMenu() {
    if (navbar.length) {
        if (window.pageYOffset >= sticky) {
            navbar.addClass("fixed");
            navbar_placeholder.show()
        } else {
            navbar.removeClass("fixed");
            navbar_placeholder.hide()
        }
    }
}

function collapseMovil(sm) {
    if (sm.matches) {
        $('.collapse').click(function(){
            var $this = $(this);
            $this.find('h4').toggleClass('iconOpen');
            $this.find('.openable').toggleClass('active');
        });
    }
}

var sm = window.matchMedia("(max-width: 768px)")
collapseMovil(sm)
sm.addListener(collapseMovil)

// // Scrollit
$('a[href*="#"]:not([href="#"])').click(function(e) {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
        e.preventDefault();
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
        if (target.length) {
            $('html, body').animate({
                scrollTop: target.offset().top - 30
            }, 1000);
            return false;
        }
    }
});
