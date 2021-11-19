$(document).ready(function(){
    window.setTimeout(function(){$("body").addClass("showup");}, 300);


$('.menu-item a[href*="filmes"]').each(function() {
    $(this).addClass('icon-filmes')
});
$('.menu-item a[href*="documentarios"]').each(function() {
    $(this).addClass('icon-documentarios')
});
$('.menu-item a[href*="series"]').each(function() {
    $(this).addClass('icon-series')
});

});