  $(document).ready(function() {
        $(".mat-input").focus(function(){
          $(this).parent().addClass("is-active is-completed");
        });

        $(".mat-input").focusout(function(){
          if($(this).val() === "")
            $(this).parent().removeClass("is-completed");
          $(this).parent().removeClass("is-active");
        });


         var offset = $('#nav').outerHeight();
         $('a[href^="#"]').on('click', function (e) {
              e.preventDefault();
                 var id = $(this).attr("href");
                 var target = $(id).offset().top - offset;

              $('html, body').stop(true, true).animate({
                  scrollTop: target
              }, 1000);

            return false;
        });

        $(window).on("load resize scroll",function(){
            offset = $('#nav').outerHeight();
            function goToByScroll(id) {
                $('html,body').animate({
                    scrollTop: $("#" + id).offset().top - offset
                });
            }
        if (window.location.hash != '') {
            goToByScroll(window.location.hash.substr(2));
        }
      });
  });
