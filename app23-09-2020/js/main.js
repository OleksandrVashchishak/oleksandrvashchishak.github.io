      $(document).ready(function() {
        $('.home__leng').click(function(event){
        $('.home__togle-leng,.home__leng-img').toggleClass('active');   
              
        });  
                
        });

        $(document).ready(function() {
          $('.menu-toggler').click(function(event){
          $('.header__menu-burger').toggleClass('active');    
          });       
          });
  
        $(document).ready(function () {
          $('.menu-toggler').on('click', function () {
              $(this).toggleClass('open');
              $('.top-nav').toggleClass('open');
          });        
          });


          function innerTextHide() {
            let showHideText = document.getElementById("innerText");
            if (showHideText.innerHTML === "See less") {
                showHideText.innerHTML = "See more";
            } else {
                showHideText.innerHTML = "See less";
            }
        }

        $(document).ready(function () {
          $('.what-news__more').click(function (event) {
              $('.see-more-hide, .what-news__see-img').toggleClass('active');
      
          });
      
      });

var $uiAccordion = $('.js-ui-accordion');

$uiAccordion.accordion({
  collapsible: true,
  heightStyle: 'content',

  activate: function activate(event, ui) {
    var newHeaderId = ui.newHeader.attr('id');

    if (newHeaderId) {
      history.pushState(null, null, '#' + newHeaderId);
    }
  },

  create: function create(event, ui) {
    var $this = $(event.target);
    var $activeAccordion = $(window.location.hash);

    if ($this.find($activeAccordion).length) {
      $this.accordion('option', 'active', $this.find($this.accordion('option', 'header')).index($activeAccordion));
    }
  }
});

$(window).on('hashchange', function (event) {
  var $activeAccordion = $(window.location.hash);
  var $parentAccordion = $activeAccordion.parents('.js-ui-accordion');

  if ($activeAccordion.length) {
    $parentAccordion.accordion('option', 'active', $parentAccordion.find($uiAccordion.accordion('option', 'header')).index($activeAccordion));
  }
});