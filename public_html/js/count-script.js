$ = jQuery.noConflict();
$(document).ready(function() {
    $(function(){
        var note = $("#note");
        var reg_date = $("#reg_date").val();
        if(parseInt(reg_date) + 4*24*60*60*1000 > new Date().getTime()) {
            var ts = parseInt(reg_date) + 4*24*60*60*1000;//(new Date()).getTime() + 10*24*60*60*1000;
            $('#countdown').countdown({
                timestamp	: ts,
                callback	: function(days, hours, minutes, seconds){
                    var message = "";
                    message += "Days: " + days +", ";
                    message += "Hours: " + hours + ", ";
                    message += "Minutes: " + minutes + " and ";
                    message += "Seconds: " + seconds + " <br />";
                    note.html(message);
                }
            });
        }

    });
});

