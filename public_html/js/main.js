
$(document).ready(function(){
$(".main-section .main-left a, .login-nav , .cta a, .signup-buttons a").hover(
function() {
	$(this).toggleClass("button-hover", 300);
    $(".diva-icon" , this).toggleClass("diva-hover", 300);
    $(".diva-icon span" , this).toggleClass("diva-hover2", 300);


},
function() {
	$(this).toggleClass("button-hover", 300);
	$(".diva-icon" , this).toggleClass("diva-hover", 300);

});

$(".login-nav a , .signup-nav a").hover(
function() {
	$(this).toggleClass("button-hovera", 200);

},
function() {
	$(this).toggleClass("button-hovera", 200);
});

$(".signup-nav").hover(
function() {
	$(this).toggleClass("button-hover2", 300);

},
function() {
	$(this).toggleClass("button-hover2", 300);
});


$('.featu, #navi2').hover( 
    function() { 
        $('.slider1').cycle('pause'); 
    }, 
    function() { 
        $('.slider1').cycle('resume'); 
    } 
);

$('.featu1, #navi').hover( 
    function() { 
        $('.slider2').cycle('pause'); 
    }, 
    function() { 
        $('.slider2').cycle('resume'); 
    } 
);


});







$(function() {

    $('.slider1').cycle({
       fx:     'custom',
        cssBefore: {  
        left: -1000,  
        top:  0,  
        width: 0,  
        height: 300,  
        opacity: 1, 
        display: 'block' 
    }, 
    animOut: {  
        opacity: 0,
        left:1000,  
  
    }, 
    animIn: {  
        left:0,  
        top: 0,  
        width: 940,  
        height: 300
    }, 
    cssAfter: {  
        zIndex: 0,
        left:5000  

    }, 
       speed:   1500,
       timeout: 8000,
	   pager: '#navi2',
	   cleartypeNoBg: true,
	   slideResize: 0 ,
	   	   
 pagerAnchorBuilder: function (index) {
            return '<a href="#"> <span></span> </a>';
        }
 
    });
     
});


$(function() {

    $('.slider2').cycle({
       fx:     'fade',
       speed:   600,
       timeout: 6000,
	   cleartypeNoBg: true,
	   slideResize: 0 ,
	   next:   '#next2', 
       prev:   '#prev2',      
	   pager: '#navi21',
	   cleartypeNoBg: true,
	   slideResize: 0 ,
	   	   
 pagerAnchorBuilder: function (index) {
            return '<a href="#"> <span></span> </a>';
        }
 
    });
     
});




$(function() {

    $('.slider3').cycle({
       fx:     'custom',
        cssBefore: {  
        left: -1000,  
        top:  0,  
        width: 0,  
        height: 300,  
        opacity: 1, 
        display: 'block' 
    }, 
    animOut: {  
        opacity: 0,
        left:1000,  
  
    }, 
    animIn: {  
        left:0,  
        top: 0,  
        width: 940,  
        height: 400
    }, 
    cssAfter: {  
        zIndex: 0,
        left:5000  

    }, 
       speed:   1000,
       timeout: 6000,
	   cleartypeNoBg: true,
	   slideResize: 0 ,
	   next:   '#next3', 
       prev:   '#prev3'
 
    });
     
});

$(function() {

    $('.slider4').cycle({
       fx:     'fade',
       speed:   300,
       timeout: 10000,
	   cleartypeNoBg: true,
	   slideResize: 0 ,
	   next:   '#next2', 
       prev:   '#prev2'
 
    });
     
});


$(document).ready(function(){
$("div.b").hover(
function() {
$(this).stop().animate({"opacity": "0.5","-ms-filter":"progid:DXImageTransform.Microsoft.Alpha(opacity=50)"}, "800");
},
function() {
$(this).stop().animate({"opacity": "0","-ms-filter":"progid:DXImageTransform.Microsoft.Alpha(opacity=0)"}, "fast");
});

});


$(document).ready(function(){
$(".testi").hover(
function() {
$("img.c", this).stop().animate({"opacity": "0.5","-ms-filter":"progid:DXImageTransform.Microsoft.Alpha(opacity=50)"}, "800");
$(".testi-company" , this).toggleClass("company-hover", 300);

},
function() {
$("img.c", this).stop().animate({"opacity": "0","-ms-filter":"progid:DXImageTransform.Microsoft.Alpha(opacity=0)"}, "fast");
$(".testi-company" , this).toggleClass("company-hover", 300);

});

});


$(document).ready(function(){
$("#pop-register, #pop-register2").click(function(){
$("#overlay_form").fadeIn(1000);
$("#popi-bg").css({
"opacity": "1"
}); 
$("#popi-bg").fadeIn("slow");
positionPopup();
});
$("#close2").click(function(){
$("#overlay_form").fadeOut(500);
$("#popi-bg").fadeOut("slow");

});
 
});

 
function positionPopup(){
if(!$("#overlay_form, #overlay_form2, #overlay_form3").is(':visible')){
return;
}
$("#overlay_form, #overlay_form2, #overlay_form3").css({
left: ($(window).width() - $('#overlay_form, #overlay_form2, #overlay_form3').width()) / 2,
top: ($(window).width() - $('#overlay_form, #overlay_form2, #overlay_form3').width()) / 4,
position:'absolute'
});
}
$(window).bind('resize',positionPopup);


$(document).ready(function(){
$("#login, #login2").click(function(){
$("#overlay_form2").fadeIn(1000);
$("#popi-bg").css({
"opacity": "1"
}); 
$("#popi-bg").fadeIn("slow");
positionPopup();
});
$("#close3").click(function(){
$("#overlay_form2").fadeOut(500);
$("#popi-bg").fadeOut("slow");

});
 
});


$(document).ready(function(){
$("#contact, #contact2").click(function(){
$("#overlay_form").fadeIn(1000);
$("#popi-bg").css({
"opacity": "1"
}); 
$("#popi-bg").fadeIn("slow");
positionPopup();
});
$("#close4").click(function(){
$("#overlay_form3").fadeOut(500);
$("#popi-bg").fadeOut("slow");

});
 
});


 
 

function validateEmail(email) { 
		var reg = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		return reg.test(email);
	}

	$(document).ready(function() {
		 
		$("#contactform").submit(function() { return false; });

		
		$("#send").on("click", function(){
			var emailval  = $("#email").val();
			var msgval    = $("#message").val();
			var msglen    = msgval.length;
			var mailvalid = validateEmail(emailval);
			
			if(mailvalid == false) {
				$("#email").addClass("error");
			}
			else if(mailvalid == true){
				$("#email").removeClass("error");
			}
			
			if(msglen < 2) {
				$("#msg").addClass("error");
			}
			else if(msglen >= 2){
				$("#msg").removeClass("error");
			}
			
			if(mailvalid == true && msglen >= 2) {
				 $("input.submit").replaceWith("<em>sending...</em>");
				
				$.ajax({
					type: 'POST',
					url: 'mailer.php',
					data: $("#contactform").serialize(),
					success: function(data) {
						if(data == "true") {
							$("em").fadeOut("fast", function(){
								$(this).before("<p> Your Message has been sent.</p>");
								setTimeout("$.fancybox.close()", 1000);
							});
						}
					}
				});
			}
		});
	});
	
	
$(document).ready(function(){
$("#mobile").click(function(){

	$('#mobi-menu').toggleClass('on').toggleClass('off');
	$(this).toggleClass('opened').toggleClass('closed');

});});

