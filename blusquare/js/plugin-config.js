$(".review-slider__slider").slick({
  slidesToShow: 3,
  autoplay: false,
  infinite: true,
  arrows: false,
  dots: true,
  useTransform: true,
  centerMode: true,
  centerPadding: '0px',
  responsive: [
    {
      breakpoint: 1023,
      settings: {
        slidesToShow: 2,
      }
    },
    {
      breakpoint: 690,
      settings: {
        slidesToShow: 1,
        centerPadding: '10%',

      }
    },
    {
      breakpoint: 450,
      settings: {
        slidesToShow: 1,
        centerPadding: '0%',

      }
    },
  ]
})

if (document.querySelector('.anchors-link')) {
  let sections = $('section')
  let nav = $('.anchors-link')
  let nav_height = nav.outerHeight();

  $(window).on('scroll', function () {
    let cur_pos = $(this).scrollTop();
    sections.each(function () {
      let top = $(this).offset().top - nav_height,
        bottom = top + $(this).outerHeight();

      if (cur_pos >= top && cur_pos <= bottom) {
        nav.find('a').removeClass('active');
        sections.removeClass('active');

        $(this).addClass('active');
        nav.find('a[href="#' + $(this).attr('id') + '"]').addClass('active');
      }
    });
  });

  nav.find('a').on('click', function () {
    let $el = $(this)
      , id = $el.attr('href');

    $('html, body').animate({
      scrollTop: $(id).offset().top - nav_height
    }, 1000);

    return false;
  });
} else {
  $('html').css("scroll-behavior","smooth");
}


// start load more js
jQuery(function ($) {
  $('.btn-loadmore').on('click', function () {
    let _this = $(this);
    _this.html('<span class="fas fa-redo fa-spin"></span> Load...');

    let data = {
      'action': 'loadmore',
      'query': _this.attr('data-param-posts'),
      'page': this_page,
      'tpl': _this.attr('data-tpl')
    }

    $.ajax({
      url: '/wp-admin/admin-ajax.php',
      data: data,
      type: 'POST',
      success: function (data) {
        if (data) {
          _this.html('<span class="fas fa-redo"></span> Load more');
          document.querySelector('.blog-main__wrapper').innerHTML += data;
          this_page++;
          if (this_page == _this.attr('data-max-pages')) {
            _this.remove();
          }
        } else {
          _this.remove();
        }
      }
    });
  });

});

// end load more js


// start ajax search
jQuery(function ($) {
  var searchTerm = '';

  $('.search-input').keydown(function () {
    searchTerm = $.trim($(this).val());
  });

  $('.search-input').keyup(function () {
    if ($.trim($(this).val()) != searchTerm) {
      searchTerm = $.trim($(this).val());
      if (searchTerm.length > 2) {
        $.ajax({
          url: '/wp-admin/admin-ajax.php',
          type: 'POST',
          data: {
            'action': 'ba_ajax_search',
            'term': searchTerm
          },
          beforeSend: function () {
            $('.result-search .result-search-list').fadeOut();
            $('.result-search .result-search-list').empty();
            $('.result-search .preloader').show();
          },
          success: function (result) {
            $('.result-search .preloader').hide();
            $('.result-search .result-search-list').fadeIn().html(result);
          }
        });
      }
    }
  });

  $('.search-input').focusin(function () {
    $('.result-search').fadeIn();
  })

  $(document).mouseup(function (e) {
    if ((!$('.result-search').is(e.target) && $('.result-search').has(e.target).length === 0) && (!$('.search-input').is(e.target) && $('.search-input').has(e.target).length === 0)) {
      $('.result-search').fadeOut();
    }
  });
});
// end ajax search