$(document).ready(function() {


    $(".register").css('border-bottom', '1px solid white');
    $(".login").css('border-bottom', '1px solid orange');
    $(".profile").css('border-bottom', '1px solid white');
    $(".view_history").css('border-bottom', '1px solid white');

        $('#Login').css('display', 'flex');
        $('#Profile').css('display', 'none');
        $('#Register').css('display', 'none');
        $('#History').css('display', 'none');



    $('.login').click(function(e) {
        
      $(".register").css('border-bottom', '1px solid white');
        $(".login").css('border-bottom', '1px solid orange');
        $(".profile").css('border-bottom', '1px solid white');
        $(".view_history").css('border-bottom', '1px solid white');


        $('#Login').css('display', 'flex');
        $('#Profile').css('display', 'none');
        $('#Register').css('display', 'none');
        $('#History').css('display', 'none');

    });

    $('.register').click(function(e) {
        $(".register").css('border-bottom', '1px solid orange');
        $(".login").css('border-bottom', '1px solid white');
        $(".profile").css('border-bottom', '1px solid white');
        $(".view_history").css('border-bottom', '1px solid white');


        $('#Register').css('display', 'block');
        $('#Login').css('display', 'none');
        $('#Profile').css('display', 'none');
        $('#History').css('display', 'none');

    });

    $('.profile').click(function(e) {
        
        $(".register").css('border-bottom', '1px solid white');
        $(".login").css('border-bottom', '1px solid white');
        $(".profile").css('border-bottom', '1px solid orange');
        $(".view_history").css('border-bottom', '1px solid white');

        $('#Profile').css('display', 'block');
        $('#Login').css('display', 'none');
        $('#Register').css('display', 'none');
        $('#History').css('display', 'none');


    });

    $('.view_history').click(function(e) {
        $(".register").css('border-bottom', '1px solid white');
        $(".login").css('border-bottom', '1px solid white');
        $(".profile").css('border-bottom', '1px solid white');
        $(".view_history").css('border-bottom', '1px solid orange');

        $('#History').css('display', 'block');
        $('#Login').css('display', 'none');
        $('#Register').css('display', 'none');
        $('#Profile').css('display', 'none');
    });

});

function readURL(input) {
       if (input.files && input.files[0]) {
           var reader = new FileReader();

           reader.onload = function (e) {
               $('.pic')
                   .attr('src', e.target.result);
           };

           reader.readAsDataURL(input.files[0]);
       }
   }