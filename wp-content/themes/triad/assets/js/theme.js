jQuery(function ($) {
//interval = setInterval(function(){ countFunction(); }, 1000);  

    /**
     * Online application
     */

    $('form#online_application_frm').on('submit', function (e) {
        e.preventDefault();
        var _this = $(this);
        //var _data = _this.serialize();
        var _data = new FormData(this);
        //console.log(_data);
        var l = Ladda.create(document.querySelector('#submit_online_application_btn'));
        l.start();

        $.ajax({
            url: Front.ajaxURl,
            type: 'POST',
            data: _data,
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function (resp) {
                //console.log(resp.flag);
                if (resp.flag === true) {
                    $.notify({
                        message: resp.msg,

                    }, {
                        type: 'success'
                    });
                    _this[0].reset();
                    //window.location.href = resp.url;
                } else {
                    //Error handling goes here
                    //console.log(resp.msg);
                    $.notify({
                        message: resp.msg,

                    }, {
                        type: 'danger',
                        delay: 2000,
                    });
                }

            }
        }).always(function () {
            l.stop();
        });
    });
    

});


function preventNumberInput(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}




$(function() {	

//active-menu---------->
//var pgurl = window.location.href.substr(window.location.href.lastIndexOf("/")+1);
var pgurl = window.location.href.substr(window.location.href.indexOf("/"));
var myarr = pgurl.split("/");
var filtered = myarr.filter(function (el) {
  return el != "";
});
var activepart = filtered[filtered.length - 1];
$(".activelink").each(function(){
    var url = $(this).attr("href");
    //console.log(url.indexOf(activepart) );    
  if(url.indexOf(activepart) > 0 || $(this).attr("href") == '' )
  $(this).addClass("active");
});
		
//owl-carousel------
$('.category').owlCarousel({
	loop: false,
	margin: 10,
	dots: false,
	nav: true,
//	lazyLoad : true,
//	navigation : true,
	navText: [
    "<i class='icon-arrow-left'></i>",
    "<i class='icon-arrow-right'></i>"
  ],
	autoplay:true,
    autoplayTimeout:5000,
    stopOnHover : true,
	autoplayHoverPause: true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:4
        },
		1300:{
            items:4
        },
		1600:{
            items:4
        }
    }	
});	
$('.peoplesay').owlCarousel({
	loop: false,
	margin: 10,
	dots: false,
	nav: true,
//	lazyLoad : true,
//	navigation : true,
	navText: [
    "<i class='icon-arrow-left'></i>",
    "<i class='icon-arrow-right'></i>"
  ],
	autoplay:true,
    autoplayTimeout:5000,
    stopOnHover : true,
	autoplayHoverPause: true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:2
        },
		1300:{
            items:2
        },
		1600:{
            items:2
        }
    }	
});	
});