//Timer function
//test3
function makeTimer() {	
var endTime = new Date('10 December 2021 00:00:00 GMT+00:00');	

  endTime = (Date.parse(endTime) / 1000);

  var now = new Date();
  now = (Date.parse(now) / 1000);

  var timeLeft = endTime - now;

  var days = Math.floor(timeLeft / 86400); 
  var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
  var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600 )) / 60);
  var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));

  jQuery('#store_timer #days .timer_counter').html(days);
  jQuery('#store_timer #hours .timer_counter').html(hours);
  jQuery('#store_timer #minutes .timer_counter').html(minutes);
  jQuery('#store_timer #seconds .timer_counter').html(seconds);		
}

//Copy button function
function copyToClipboard() {
  var textBox = document.getElementById("affiliate_copy");
  textBox.select();
  document.execCommand("copy");
}

//Play first video after page load
jQuery(window).on("load", function () {
  var video_jq = jQuery('.store_hero video.store-video')
  var video_node = video_jq.get(0);

  if (video_jq.length) {
    video_jq.on("canplaythrough", function (e) {
      video_node.play();
    });

    video_node.load();
  }
});

jQuery(document).ready(function($) {
  if( $('.store_hero__progress_line').length ) {
    $('.store_leave_nft').each( function() {
      var numbers_nft = $('.store_leave_nft').text(),
      total_nft = $('.store_total_nft').text(),
      formula_nft = numbers_nft / total_nft * 100+'%';

      $('.store_hero__progress_line_active').css('width', formula_nft);
    });
  }

  if( $('#store_timer').length ) {
    setInterval(function() { 
      makeTimer(); 
    }, 500);
  }
  
  if( $('.matic_popup').length ) {
    $('#matic_popup').on("click", function () {
      $('.matic_popup').toggleClass('matic_popup__active');
    });

    $('.matic_popup span.fa-close ').on("click", function () {
      $('.matic_popup').toggleClass('matic_popup__active');
    });
  }

  $(window).scroll(function (e) {
    var offsetRange = $(window).height() / 3,
      offsetTop = $(window).scrollTop() + offsetRange + $(".site-header").outerHeight(true),
      offsetBottom = offsetTop + offsetRange;

    $(".page-template-store-template video.store-video").each(function () {
      var y1 = $(this).offset().top;
      var y2 = offsetTop;
      if (y1 + $(this).outerHeight(true) < y2 || y1 > offsetBottom) {
        this.pause();
      } else {
        this.play();
      }
    });

  });
});