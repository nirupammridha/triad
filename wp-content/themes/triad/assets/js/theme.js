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

