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

          var acc = document.getElementsByClassName("accordion");
    var i;
    
    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var panel = this.nextElementSibling;
            if (panel.style.display === "block") {
                panel.style.display = "none";
            } else {
                panel.style.display = "block";
            }
        });
    }

    var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("activs");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight){
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}

  
