$(document).ready(function () {


    $('.modalbtn').click(function () {
        $('.modal-tywrapp').addClass('showmodal');
        $('body').append('<div class="modalbg"></div>');
        $('body').addClass('hidden');

    });

    $('.closemodalbtn').click(function () {
        $('.modal-tywrapp').removeClass('showmodal');
        $('.modalbg').remove();
        $('body').removeClass('hidden');
    });



    $(document).click(function (event) {
        let $target = $(event.target);
        if (!$target.closest('.modal-tywrapp').length && !$target.closest('.modalbtn').length) {
            $('.modal-tywrapp').removeClass('showmodal');
            $('.modalbg').remove();
        }
    });


    // hover pic

    $('.ourworkbox .expertisebtn').mouseenter(function () {
        $(this).parents('.ourworkbox').addClass('hoverpic');
    });

    $('.ourworkbox .expertisebtn').mouseleave(function () {
        $(this).parents('.ourworkbox').removeClass('hoverpic');
    });

    $('.productbox a').mouseenter(function () {
        $(this).parents('.productbox').addClass('hoverpic');
    });

    $('.productbox a').mouseleave(function () {
        $(this).parents('.productbox').removeClass('hoverpic');
    });










});