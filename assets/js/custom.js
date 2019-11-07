$(document).ready(function(){
	// 	$(".btn1").css("background-color","yellow");
	// $('.btn2').click(function(){
	// 	$(".btn2").css("background-color","yellow");
	$('#time').timepicker({
        timeFormat: 'h:mm p',
        interval: 15,
        minTime: '7',
        maxTime: '6:00pm',
        startTime: '7:00',
        scrollbar:true
    });

alert("");


    $('#time1').timepicker({
        timeFormat: 'h:mm p',
        interval: 30,
        minTime: '7',
        maxTime: '6:00pm',
        startTime: '7:00',
        scrollbar:true
    });

     $('#time2').timepicker({
        timeFormat: 'h:mm p',
        interval: 30,
        minTime: '7',
        maxTime: '6:00pm',
        startTime: '7:00',
         scrollbar:true
    });

      $('#time3').timepicker({
        timeFormat: 'h:mm p',
        interval: 30,
        minTime: '7',
        maxTime: '6:00pm',
        startTime: '7:00',
         scrollbar:true
    });



   $(".yearpicker").yearpicker({
      year: 2019,
      startYear:1960,
      endYear: 2050,
      selectedClass: 'selected',
	  disabledClass: 'disabled',
	  hideClass: 'hide',
	  highlightedClass: 'highlighted',
   });

//    $(".btn").click(function(){

// alert($(this).val);




  

var slideIndex = 0;
showSlides();


function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}
  slides[slideIndex-1].style.display = "block";
  setTimeout(showSlides, 3000); // Change image every 2 seconds
} 


});







   // Get the container element
// var btnContainer = document.getElementById("myTopnav");

// // Get all buttons with class="btn" inside the container
// var btns = btnContainer.getElementsByClassName("btn2");

// // Loop through the buttons and add the active class to the current/clicked button
// for (var i = 0; i < btns.length; i++) {
//   btns[i].addEventListener("click", function() {
//     var current = document.getElementsByClassName("active");
//     current[0].className = current[0].className.replace(" active", "");
//     this.className += " active";
//   });
// }  


 // function myFunction() {
 //  var x = document.getElementById("myTopnav");
 //  if (x.className === "topnav") {
 //    x.className += " responsive";
 //  } else {
 //    x.className = "topnav";
 //  }

	// }


 // function myFunction() {
 //  var x = document.getElementById("First");
 //  if (x.className === "mycontainer") {
 //    x.className += " responsive";
 //  } else {
 //    x.className = "mycontainer";
 //  }

	// }














