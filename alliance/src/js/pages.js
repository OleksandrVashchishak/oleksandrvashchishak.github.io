import $ from "jquery";

 


function burgerMenu(selector) {
    let menu = $(selector);
    let button = menu.find('.burger-menu_button', '.burger-menu_lines');
    let links = menu.find('.burger-menu_link');
    let overlay = menu.find('.burger-menu_overlay');

    button.on('click', (e) => {
        e.preventDefault();
        toggleMenu();
    });

    links.on('click', () => toggleMenu());
    overlay.on('click', () => toggleMenu());

    function toggleMenu() {
        menu.toggleClass('burger-menu_active');

        if (menu.hasClass('burger-menu_active')) {
            $('footer').css("opacity","0");
            $('body').css('overlow', 'hidden');
        } else {
            $('footer').css("opacity","1");
            $('body').css('overlow', 'visible');
        }
    }
}
burgerMenu('.burger-menu');
//
if ($('*').is('main')) {

    $.fn.toggleClick = function (funcArray) {
        return this.click(function () {
            var elem = $(this);
            var index = elem.data('index') || 0;

            funcArray[index]();
            elem.data('index', (index + 1) % funcArray.length);
        });
    };
    $('.burger-dropt').toggleClick([
        function () {
            $('.dropt-about a').css("display","none");
            $('.footer-elem').css("display","none");
            $('.burg-dropt_content').css("display","inline");
            $('.burg-dropt').css("transform","rotate(180deg)");
            $('.burger-dropt').css("color","#64AAFC");
            $('.svg-arr1').css("fill","#64AAFC");
        },

        function () {
            $('.dropt-about a').css("display","inline");
            $('.footer-elem').css("display","block");
            $('.burg-dropt_content').css("display","none");
            $('.burg-dropt').css("transform","rotate(0deg)");
            $('.svg-arr1').css("fill","#0A0908");
            $('.burger-dropt').css("color","#0A0908");
        }
    ]);
//black
    $('.burger-dropt-d').toggleClick([
        function () {
            $('.dropt-about a').css("display","none");
            $('.footer-elem').css("display","none");
            $('.burg-dropt_content').css("display","inline");
            $('.burg-dropt').css("transform","rotate(180deg)");
            $('.burger-dropt-d').css("color","#64AAFC");
            $('.svg-arr1').css("fill","#64AAFC");
        },

        function () {
            $('.dropt-about a').css("display","inline");
            $('.footer-elem').css("display","block");
            $('.burg-dropt_content').css("display","none");
            $('.burg-dropt').css("transform","rotate(0deg)");
            $('.svg-arr1').css("fill","#FFFFFF");
            $('.burger-dropt-d').css("color","#FFFFFF");
        }
    ]);

    $(document).ready(function () {
        $('.treeitem').click(function () {
            $(this).next('ul.subtree').toggle();
        });
    });
    
    $('#Remove').click(function () {
        var selectedItem = $('#jqxTree').jqxTree('selectedItem');
        if (selectedItem != null) {
      
            $('#jqxTree').jqxTree('removeItem', selectedItem.element, false);
            // update the tree.
            $('#jqxTree').jqxTree('render');
        }
    });
    // $('#jqxTree').on('removed', function (event) {
    //     alert("You removed  item");
    // });
     

    $('.burger-dropt-about').toggleClick([
        function () {
            $('.burg-dropt_content2').fadeIn();
            $('.burg-dropt2').css("transform","rotate(180deg)");
            $('.burger-dropt-about').css("color","#64AAFC");
            $('.svg-arr2').css("fill","#64AAFC");
        },
        function () {
            $('.burg-dropt_content2').fadeOut();
            $('.burg-dropt2').css("transform","rotate(0deg)");
            $('.svg-arr2').css("fill","#0A0908");
            $('.burger-dropt-about').css("color","#0A0908");
        }
    ]);
//dark
$('.burger-dropt-about-d').toggleClick([
    function () {
        $('.burg-dropt_content2').fadeIn();
        $('.burg-dropt2').css("transform","rotate(180deg)");
        $('.burger-dropt-about-d').css("color","#64AAFC");
        $('.svg-arr2').css("fill","#64AAFC");
    },
    function () {
        $('.burg-dropt_content2').fadeOut();
        $('.burg-dropt2').css("transform","rotate(0deg)");
        $('.svg-arr2').css("fill","#FFFFFF");
        $('.burger-dropt-about-d').css("color","#FFFFFF");
    }
]);

    $('.burg-item1').toggleClick([
        function () {
            $('.dr1').css("display","block");
            $('.burg-item2').css("display","none");
            $('.burg-item3').css("display","none");  
             $('.burg-item4').css("display","none");
            $('.burg-item5').css("display","none");
        },
        function () {
            $('.dr1').css("display","none");
            $('.burg-item2').css("display","block");
            $('.burg-item3').css("display","block");
            $('.burg-item4').css("display","block");
            $('.burg-item5').css("display","block");
        }
    ]);
    $('.burg-item2').toggleClick([
        function () {
            $('.dr2').css("display","block");
            $('.burg-item1').css("display","none");
            $('.burg-item3').css("display","none");  
            $('.burg-item4').css("display","none");
            $('.burg-item5').css("display","none");

        },
        function () {
            $('.dr2').css("display","none");
            $('.burg-item1').css("display","block");
            $('.burg-item3').css("display","block");
            $('.burg-item4').css("display","block");
            $('.burg-item5').css("display","block");
        }
    ]);
    $('.burg-item3').toggleClick([
        function () {
            $('.dr3').css("display","block");
            $('.burg-item1').css("display","none");
            $('.burg-item2').css("display","none");  
            $('.burg-item4').css("display","none");
            $('.burg-item5').css("display","none");
        },
        function () {
            $('.dr3').css("display","none");
            $('.burg-item1').css("display","block");
            $('.burg-item2').css("display","block");
            $('.burg-item4').css("display","block");
            $('.burg-item5').css("display","block");
        }
    ]);
    $('.burg-item4').toggleClick([
        function () {
            $('.dr4').css("display","block");
            $('.burg-item1').css("display","none");
            $('.burg-item2').css("display","none");  
            $('.burg-item3').css("display","none");
            $('.burg-item5').css("display","none");
        },
        function () {
            $('.dr4').css("display","none");
            $('.burg-item1').css("display","block");
            $('.burg-item2').css("display","block");
            $('.burg-item3').css("display","block");
            $('.burg-item5').css("display","block");
        }
    ]);
    $('.burg-item5').toggleClick([
        function () {
            $('.dr5').css("display","block");
            $('.burg-item1').css("display","none");
            $('.burg-item2').css("display","none");  
            $('.burg-item3').css("display","none");
            $('.burg-item4').css("display","none");
        },
        function () {
            $('.dr5').css("display","none");
            $('.burg-item1').css("display","block");
            $('.burg-item2').css("display","block");
            $('.burg-item3').css("display","block");
            $('.burg-item4').css("display","block");
        }
    ]);
    //accordion
    $('.serv-btn-1').toggleClick([
        function () {
            $('.svg-plus1').css("display","block");
            $('.svg-minus1').css("display","none");
        },
        function () {
            $('.svg-plus1').css("display","none");
            $('.svg-minus1').css("display","block");
        }
    ]);
    $('.serv-btn-2').toggleClick([
        function () {
            // $('.svg-plus1').css("display","block");
            // $('.svg-minus1').css("display","none");
            $('.svg-plus2').css("display","none");
            $('.svg-minus2').css("display","inline");
        },
        function () {
            $('.svg-plus2').css("display","inline");
            $('.svg-minus2').css("display","none");
        }
    ]);
    $('.serv-btn-3').toggleClick([
        function () {
            $('.svg-plus3').css("display","none");
            $('.svg-minus3').css("display","inline");
        },
        function () {
            $('.svg-plus3').css("display","inline");
            $('.svg-minus3').css("display","none");
        }
    ]);
}

// $( ".burger-menu_lines" ).click(function() {
//    
//   });



//animation
 
$( ".btn-general" ).mouseover(function() {
    $( ".under-btn" ).css("margin-top","-56px");
    $( ".under-btn" ).css("margin-left","0px");
  });
  $( ".btn-general" ).mouseout(function() {
    $( ".under-btn" ).css("margin-top","-44px");
    $( ".under-btn" ).css("margin-left","16px");
  });

  $( ".btn-general2" ).mouseover(function() {
    $( ".under-btn2" ).css("margin-top","-56px");
    $( ".under-btn2" ).css("right","16px");
  });
  $( ".btn-general2" ).mouseout(function() {
    $( ".under-btn2" ).css("margin-top","-44px");
    $( ".under-btn2" ).css("right","0px");
  });


