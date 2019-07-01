const $ = jQuery
var btnCerrar = $(".header-close_JS");

var btnCerrarOpen = $(".header__logo-close.open");
var btnCerrarClose = $(".header__logo-close.close");

var menu = $(".header__menu");
var open = false;

btnCerrar.on("click", function() {
  
  // Si está abierto hay que cerrarlo.
  if(open) {
    menu.removeClass('show');
    // btnCerrar.html("menu");
    btnCerrarClose.removeClass('view');
    btnCerrar.removeClass('opacity');
    open = false;
  }else {
    menu.addClass('show');
    // btnCerrar.html("close");
    btnCerrarClose.addClass('view');
    btnCerrar.addClass('opacity');
    open = true;
  }   

});















function searchHeader(breakSm) {
    if (breakSm.matches) {
        //search movil
        var $searchlink = $('#header__iconMovil__JS');
        var $searchbar  = $('#header__searchbar__JS');

        $('#header__iconMovil__JS').on('click', function(e){
            e.preventDefault();
            if($(this).attr('id') == 'header__iconMovil__JS') {
                if(!$searchbar.is(":visible")) { 
                    $searchlink.removeClass('open').addClass('close');
                } else {
                    $searchlink.removeClass('close').addClass('open');
                } 
                $searchbar.slideToggle(500, function(){
                });
            }
        });
    } else {
        
        //search desktop
        var $searchlink = $('#header__icon__JS');
        var $searchbar  = $('#header__searchbar__JS');

        $searchlink.on('click', function(e){
            e.preventDefault();
            if($(this).attr('id') == 'header__icon__JS') {
                if(!$searchbar.is(":visible")) { 
                    $searchlink.removeClass('open').addClass('close');
                } else {
                    $searchlink.removeClass('close').addClass('open');
                } 
                $searchbar.slideToggle(500, function(){
                });
            }
        });
    }
}

var breakSm = window.matchMedia("(max-width: 768px)")
searchHeader(breakSm)
breakSm.addListener(searchHeader)

