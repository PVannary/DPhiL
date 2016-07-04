$(document).ready(function() {
    $('.dropdown ul').mouseover(function() {
        console.log('u hovered over a child');

        var parentLink = $(this).parent().find('.dropdown-toggle');

        if ( !parentLink.hasClass('hovered') ) {
            parentLink.addClass('hovered');
        }
    });

    $('.dropdown ul').mouseout(function() {
        console.log('u hovered over a child');

        var parentLink = $(this).parent().find('.dropdown-toggle');

        if ( parentLink.hasClass('hovered') ) {
            parentLink.removeClass('hovered');
        }
    });
});