
/** Подсвечивания активного меню */

$('.sidebar-menu a').each(function () {
    var location = window.location.protocol + '//' + window.location.host + window.location.pathname;
    var link = this.href;

    if (link === location){
        if ($(this).closest('li')){
            $(this).closest('li').addClass('active');
        }
        if ($(this).closest('.nav-item')){
            $(this).closest('.nav-item').addClass('active');
        }

    }
});
