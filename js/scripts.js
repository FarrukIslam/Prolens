(function ($) {
    
    jQuery(document).ready(function($){
        
         $('#expList').find('li:has(ul)')
            .click( function(event) {
                if (this == event.target) {
                    $(this).toggleClass('expanded');
                    $(this).children('ul').toggle('medium');
                }
                return true;
            })
            .addClass('collapsed')
            .children('ul').hide();

            //Create the button funtionality
            $('#expandList')
            .unbind('click')
            .click( function() {
                $('.collapsed').addClass('expanded');
                $('.collapsed').children().show('medium');
            })
            $('#collapseList')
            .unbind('click')
            .click( function() {
                $('.collapsed').removeClass('expanded');
                $('.collapsed').children().hide('medium');
            })

       /* Smooth scroll */
        $(function() {
          $('.smoothScroll, .smoothScroll>a, .smoothScroll>li>a').click(function() {
            if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
              var target = $(this.hash);
              target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
              if (target.length) {
                $('html,body').animate({
                  scrollTop: target.offset().top
                }, 1000);
                return false;
              }
            }
          });
        });
    });

}(jQuery)); 