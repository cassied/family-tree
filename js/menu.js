$('.mobile-toggle').click(function() {
    if ($('header').hasClass('open-nav')) {
        $('header').removeClass('open-nav');
    } else {
        $('header').addClass('open-nav');
    }
});

$('header li a').click(function() {
    if ($('header').hasClass('open-nav')) {
        $('.navigation').removeClass('open-nav');
        $('header').removeClass('open-nav');
    }
});

// navigation scroll lijepo radi materem
$('nav a').click(function(event) {
    var id = $(this).attr("href");
    var offset = 150;
    var target = $(id).offset().top - offset;
    $('html, body').animate({
        scrollTop: target
    }, 500);
    event.preventDefault();
});