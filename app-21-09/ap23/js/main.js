// toogle leng block
$(document).ready(function () {
    $('.home__leng').click(function (event) {
      $('.home__togle-leng,.home__leng-img').toggleClass('active');
    });
  });
  
  //toogle boorger menu
  $(document).ready(function () {
    $('.menu-toggler, .header__menu-burger').click(function (event) {
      $('.header__menu-burger').toggleClass('active');
    });
  });
  
  // $(document).ready(function () {
  //   $('.menu-toggler, .header__menu-burger').click(function (event) {
  //     $('.top-nav').toggleClass('open');
  //   });
  // });
  
  $(document).ready(function () {
    $('.menu-toggler').on('click', function () {
      $(this).toggleClass('open');
      $('.top-nav').toggleClass('open');
    });
  });
  
  $(document).ready(function () {
    $('.header__menu-burger').on('click', function () {
      $('.menu-toggler').toggleClass('open');
      $('.top-nav').toggleClass('open');
    });
  });

  //credits to change
    $(document).ready(function () {
      $('.footer__credits-to--click').click(function (event) {
        $('.footer__hide,.footer__credits-to--click').toggleClass('active');
      });
    });
  
  
  // change 'see less' - 'see more'
  function innerTextHide() {
    let showHideText = document.getElementById("innerText");
    if (showHideText.innerHTML === "See less") {
      showHideText.innerHTML = "See more";
    } else {
      showHideText.innerHTML = "See less";
    }
  }
  
  
  //  change border
  
  function innerBgType() {
    if (windowedButton.style.border ='2px solid #bd30ff') {
      windowedButton.style.border ='2px solid #FE7DF9';
      bgButton.style.border ='2px solid #bd30ff';
  }
  downloadFree.href="windowedVersion";
  warningText.style.display ='flex';
  }
  
  function innerWindowedType() {
    if (bgButton.style.border ='2px solid #bd30ff') {
      bgButton.style.border ='2px solid #FE7DF9';
      windowedButton.style.border ='2px solid #bd30ff';
  }
  downloadFree.href="backgroundVersion";
  warningText.style.display ='none';
  }
  
  
  
  
  $(document).ready(function () {
    $('.what-news__more').click(function (event) {
      $('.see-more-hide, .what-news__see-img').toggleClass('active');
    });
  });
  
  
  //acordion
  var $uiAccordion = $('.js-ui-accordion');
  
  $uiAccordion.accordion({
    collapsible: true,
    heightStyle: 'content',
    active: 20,
    
  
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
  
  
  // send mail
  
  $(document).ready(function () {
  
    $("form").submit(function () { //Change
      var th = $(this);
      $.ajax({
        type: "POST",
        url: "mail.php", //Change
        data: th.serialize()
      }).done(function () {
        alert("Thank you!");
        setTimeout(function () {
          // Done Functions
          th.trigger("reset");
        }, 1000);
      });
      return false;
    });
  
  });
  
  
  // your status toogle select
  
  $(document).ready(function () {
    $('.input-value,.input-status-block').click(function (event) {
      $('.input-status-block,.input-status').toggleClass('active');
    });
  });
  
  // select you status input functions
  
  designerValue.addEventListener("click", designerV);
  function designerV() {
    inputValue.value = designerValue.innerHTML
    helpOrWorkDesign.style.display = 'flex'
    helpOrWorkDevelop.style.display = 'none'
    helpOrWorkBusines.style.display = 'none'
  }
  developerValue.addEventListener("click", developerV);
  function developerV() {
    inputValue.value = developerValue.innerHTML
    helpOrWorkDevelop.style.display = 'flex'
    helpOrWorkBusines.style.display = 'none'
    helpOrWorkDesign.style.display = 'none'
  }
  userValue.addEventListener("click", userV);
  function userV() {
    inputValue.value = userValue.innerHTML
    helpOrWorkBusines.style.display = 'none'
    helpOrWorkDevelop.style.display = 'none'
    helpOrWorkDesign.style.display = 'none'
  }
  businesValue.addEventListener("click", businesV);
  function businesV() {
    inputValue.value = businesValue.innerHTML
    helpOrWorkBusines.style.display = 'flex'
    helpOrWorkDevelop.style.display = 'none'
    helpOrWorkDesign.style.display = 'none'
  }
  
   let helpSpanDevelop = document.getElementById('helpSpanDevelop')
   let helpSpanDesign = document.getElementById('helpSpanDesign')
  helpSpanDevelop.addEventListener("click", getHelpPopap);
  helpSpanDesign.addEventListener("click", getHelpPopap);
  function getHelpPopap() {
    helpUs.style.display = 'block'
    body.style.overflow ="hidden"
  }
  
  let workSpanDevelop = document.getElementById('workSpanDevelop')
   let workSpanDesign = document.getElementById('workSpanDesign')
   let coloboratePopap = document.getElementById('coloboratePopap')
   coloboratePopap.addEventListener("click", getColoboratePopap);
   workSpanDevelop.addEventListener("click", getWorkPopapDevelop);
   workSpanDesign.addEventListener("click", getWorkPopapDesign);
   function getWorkPopapDevelop() {
    workWhichDevelop.style.display = 'block'
    body.style.overflow ="hidden"
  }
  function getWorkPopapDesign() {
    workWhichDesign.style.display = 'block'
    body.style.overflow ="hidden"
  }
  function getColoboratePopap() {
    coloborateBusines.style.display = 'block'
    body.style.overflow ="hidden"
  }
  
  
  helpUsBut.addEventListener("click", getHelpUsForm);
  workWhichDesignBut.addEventListener("click", getWorkWhichDesignForm);
  workWhichDevelopBut.addEventListener("click", getWorkWhichDevelopForm);
  coloborateBusinesBut.addEventListener("click", getColoborateBusinesForm);
   function getHelpUsForm() {
    helpUs.style.display = 'none'
    body.style.overflow ="hidden"
    helpFormPopap.style.display = 'block'
  }
  function getWorkWhichDesignForm() {
    workPopForm.style.display = 'block'
    workWhichDesign.style.display = 'none'
    body.style.overflow ="hidden"
  }
  function getWorkWhichDevelopForm() {
    workPopForm.style.display = 'block'
    workWhichDevelop.style.display = 'none'
    body.style.overflow ="hidden"
    
  }
  function getColoborateBusinesForm() {
    coloborateBusines.style.display = 'none'
    coloborateFormPopap.style.display = 'block'
    body.style.overflow ="hidden"
  }
  
  
  formButtWork.addEventListener("click", getThankPopap);
  helpPopButt.addEventListener("click", getThankPopap);
  colorboratePopButt.addEventListener("click", getThankPopap);
  function getThankPopap() {
    coloborateFormPopap.style.display = 'none'
    helpFormPopap.style.display = 'none'
    workPopForm.style.display = 'none'
    thankPopap.style.display = 'block'
    body.style.overflow ="hidden"
  }
  
  
  buttClosePopap.addEventListener("click", getClosePopap);
  function getClosePopap() {
    thankPopap.style.display = 'none'
    body.style.overflowY ="scroll"
  }
  
  
  //foonction copy link
  
  function copyTextToClipboard(text) {
    var textArea = document.createElement("textarea");
    textArea.style.position = 'fixed';
    textArea.style.top = 0;
    textArea.style.left = 0;
    textArea.style.width = '2em';
    textArea.style.height = '2em';
    textArea.style.padding = 0;
    textArea.style.border = 'none';
    textArea.style.outline = 'none';
    textArea.style.boxShadow = 'none';
    textArea.style.background = 'transparent';
    textArea.value = text;
    document.body.appendChild(textArea);
    textArea.select();
  
    try {
      var successful = document.execCommand('copy');
      var msg = successful ? 'successful' : 'unsuccessful';
      console.log('Copying text command was ' + msg);
    } catch (err) {
      console.log('Oops, unable to copy');
    }
  
    document.body.removeChild(textArea);
  }
  
  function CopyLink() {
    copyTextToClipboard(location.href);
  }
  
  
  // hide header scroll
  var leng = $('.home__leng')
  var header = $('.header'),
      scrollPrev = 0;
  
  $(window).scroll(function() {
      var scrolled = $(window).scrollTop();
   
      if ( scrolled > 100 && scrolled > scrollPrev ) {
      header.addClass('out');
      leng.addClass('out');
      } else {
      header.removeClass('out');
      leng.removeClass('out');
      }
      scrollPrev = scrolled;
  });