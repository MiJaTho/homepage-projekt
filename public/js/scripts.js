(function (window, document, $) {
    "use strict";
$(function(){
        //LightBox Gallery-----------------
        $("#gallery a").lightBox({
            txtImage: "Bild",
            txtOf: "von",
            imageBtnClose: "img/icons/lightbox-btn-close.gif",
            imageBtnPrev: "img/icons/lightbox-btn-prev.gif",
            imageBtnNext: "img/icons/lightbox-btn-next.gif",
            imageLoading: "img/icons/lightbox-ico-loading.gif"
        });

        // Navi
        
        var  verticalNavigation = $('.cd-vertical-nav'),
             navTrigger = $('.cd-nav-trigger');
     
        navTrigger.on('click', function(event){
            event.preventDefault();
            verticalNavigation.toggleClass('open');
        });
 
          

   
    
    // Uhr--------------------------------------------
    function digits(str,count,sign) {
        str = String(str);
        if(sign === undefined) {
            sign = "0";
        }
        if(count === undefined) {
            count = 2;
        }
        while(str.length < count) {
            str = sign + str;
        }
        return str;
    }
    
    
    function timer() {
        var d = new Date();
        return digits(d.getHours()) + ":" +digits( d.getMinutes()) + ":" +digits( d.getSeconds());
    }
    function calendar(){
        let t = new Date();
        return digits(t.getDate())+"."+digits((t.getMonth()+1))+ "."+ t.getFullYear();
    }
    
    setInterval(
        function(){
            document.getElementById("zeit").innerHTML = timer();
           document.getElementById("calendar").innerHTML = calendar();
        },1000
 
    );
/////////////////////////////////////////////
//             Portfolio                 ////
/////////////////////////////////////////////
$('#code1').hide();
$('#code2').hide();
$('#code3').hide();

$('#js').click(function () {
   
    if ( $("#code1").is( ":hidden" ) ) {
      $( "#code1" ).slideDown( "slow" );
    } 
    else {
      $( "#code1" ).slideUp("hide");
    }
  });
$('#css').click(function () {
   
    if ( $("#code3").is( ":hidden" ) ) {
      $( "#code3" ).slideDown( "slow" );
    } 
    else {
      $( "#code3" ).slideUp("hide");
    }
  });
$('#php').click(function () {
   
    if ( $("#code2").is( ":hidden" ) ) {
      $( "#code2" ).slideDown( "slow" );
    } 
    else {
      $( "#code2" ).slideUp("hide");
    }
  });
// get code
//  var $out = $("#out");

//  $("#js").on("click", function (e) {
//     e.preventDefault();
//     $.ajax({
//         url: "../app/templates/portfolio/javascript.html",
//         success: function (data) {
//             $out.empty().append(data);
//         }
//     });
// });


});   
}(window, document, jQuery));