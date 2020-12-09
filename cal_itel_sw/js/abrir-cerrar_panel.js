// JavaScript Document
jQuery('document').ready(function ($) {

    var menu = $('nav'),
        btn_menu = $('.btn-menu'),
        cont_panel = $('.cont-panel'),
        cont_tarjeta = $('.cont-opacity-pago'),
        con_tarjeta2 = $('.cont-pag-card');
        btn_vis_tarjeta = $('.btn-compp'),
        btn_close_tarjeta = $('.btn-cancelar-pago');
    
    
    btn_vis_tarjeta.click(function (e) {
        e.preventDefault();
        
        cont_tarjeta
            .toggleClass('abrir-tarjeta');
        
        cont_tarjeta
             .removeClass('cerrar-tarjeta');
        
    });
    
    btn_close_tarjeta.click(function (e) {
        e.preventDefault();
        
        cont_tarjeta
            .toggleClass('cerrar-tarjeta');
        
        cont_tarjeta
             .removeClass('abrir-tarjeta');
    });
    

    btn_menu.click(function (e) {

        e.preventDefault();

        menu
            .toggleClass('abrir-cerrar');
        
        cont_panel
            .toggleClass('opacity-cont');
    });

    cont_panel.click(function (e) {
        
        e.preventDefault();

        menu
            .removeClass('abrir-cerrar');
        
        cont_panel
            .removeClass('opacity-cont');
    });    
});