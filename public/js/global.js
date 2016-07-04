$(document).ready(function() {
    $('.dropdown ul').mouseover(function() {
        var parentLink = $(this).parent().find('.dropdown-toggle');

        if ( !parentLink.hasClass('hovered') ) {
            parentLink.addClass('hovered');
        }
    });

    $('.dropdown ul').mouseout(function() {
        var parentLink = $(this).parent().find('.dropdown-toggle');

        if ( parentLink.hasClass('hovered') ) {
            parentLink.removeClass('hovered');
        }
    });

    $('.dropdown-toggle').click(function(e) {
        if ( $(this)[0].hasAttribute('href') ) {
            window.location.href = $(this).attr('href');
        } else {
            e.stopPropagation();
            $(this).addClass('hovered');
        }
    });

    $('.dropdown-toggle').mouseout(function(e) {
        $(this).removeClass('hovered');
    });
});