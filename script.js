 $(document).ready(function () {
$(window).scroll(function () {
     // console.log($(window).scrollTop());
      //cuando detecte un scroll mayor a 150 realizará el cambio de barras
      if ($(window).scrollTop() > 20) {
        //añadimos clase barraFlotante y eliminamos la clase barraNormal
        $('.men').addClass('barraFlotante');
       // $('.menu').removeClass('barraNormal');
      }
      else {
        //borramos la clase barraFlotante y añadimos la clase barraNormal
        $('.men').removeClass('barraFlotante');
       // $('.menu').addClass('barraNormal');
      }


//********************************************************************* */
       if ($(window).scrollTop() > 500) {
  $(' .scroll-up-btn').css({
 "opacity": "1", "pointer-events": "auto"

  });
       }else{
         $(' .scroll-up-btn').css({
 "opacity": "0", "pointer-events": "none"
       });
       }
    });

   //slide-up script
     $('.scroll-up-btn').click(function () {
       $('html').animate({scrollTop: 0}, 500);
     });
/*********************************************************************** */

//***************animacion en home******************* */

var typed = new Typed(".typing",{ 
strings: ["Desarrollador", "Blogger", "Diseñador", "Freelancer"],
typeSpeed: 100,
backSpeed: 60,
loop: true
} );

var typed = new Typed(".typing-2",{ 
strings: ["Diseñador", "Blogger", "Diseñador", "Freelancer"],
typeSpeed: 100,
backSpeed: 60,
loop: true
} );

//***********/********************* /****************************/ */
    //toggle menu/navbar scritp
    $('.menu-btn').click(function() {
      $('.navbar .menu').toggleClass("active");
      $('.menu-btn i').toggleClass("active");
    });
/***************************************************** */
    //owl carousel script
    $('.carousel').owlCarousel({
      margin: 20,
      loop: true,
      autoplayTimeOut: 2000,
      autopayHoverPause: true,
      responsive:{
        0:{
          items: 1,
          nav: false
        },

         600:{
          items: 2,
          nav: false
        },

        1000:{
          items: 3,
          nav: false
        }
      }
});
  });
/********************************************************************* */
/*$(document).ready(function () {
      $("body").hide().fadeIn(5000);
    });*/
    
    