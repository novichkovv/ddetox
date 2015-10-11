/**
 * Created by novichkov on 10.03.15.
 */
$ = jQuery.noConflict();
$(document).ready(function()
{
    $("#logout_button").click(function(e)
    {
        e.preventDefault();
        $("#log_out").submit();
    });
    $("#log-button").click(function()
    {
        $("#log").slideToggle();
    });
    $("#log").dblclick(function()
    {
        $(this).slideUp();
    });

    //$(".video-container").click(function()
    //{
    //    var frame = $("#video_frame");
    //    $(".video-container img").fadeOut('slow');
    //    $(frame).attr('src',$(frame).attr('src') + '&autoplay=1');
    //});
    var wow = new WOW();
    wow.init();
    slider(1);
});

function slider(i)
{
    var mark = true;
    var next_slide = i == 3 ? 1 : i + 1;
    setTimeout(function()
    {
        $(".slide" + i).fadeOut('slow');
        $(".slide" + next_slide).fadeIn('slow');
        slider(next_slide);
        if(mark)
        {
            $('.wow').each(function()
            {
                $(this).removeClass('animated');
                $(this).removeClass('fadeInLeft');
                $(this).removeClass('wow');
            });
            mark = null;
        }
    },5000);
}

/**
 *
 * @param params
 */

var ajax = function ajax(params)
{
    $("#preloader-bg").show();
    if(!params.values) params.values = new Object;
    params.values.ajax = true;
    params.values.action = params.action;
    params.values.common = params.common;
    if(params.get_from_form)
    {
        $("#" + params.get_from_form + " input, #" + params.get_from_form + " textarea, #" + params.get_from_form + " select").each(function()
        {
            params.values[$(this).attr('name')] = $(this).val();
        });
    }
    var res;
    $.ajax(
        {

            url: params.url ? params.url : '',
            type: 'post',
            data: params.values,
            success: function(result)
            {
                $("#preloader-bg").hide();
                params.callback(result);
            }
        }
    );
};

/**
 *
 * @param form_id
 * @returns {boolean}
 */

var validate = function validate(form_id)
{
    var form = $("#" + form_id);
    var validate = true;
    $('.error-require, .error-validate, .error-min, .error-max, .error-one_ten').each(function()
    {
        $(this).slideUp();
    });

    $(form).find('[data-require="1"], select.data-required').each(function()
    {
        if(!$(this).val() || $(this).val() == '' || $(this).val() == null)
        {
            $(this).parent().find('.error-require').slideDown();
            validate = false;
        }
    });

    $(form).find('[data-validate="email"]').each(function()
    {
        var regexp = /^[-\w.]+@([A-z0-9][-A-z0-9]+\.)+[A-z]{2,4}$/;
        if($(this).val() && !regexp.test($(this).val())) {
            if(!$(this).attr('.error-require') || $(this).parent().find('.error-require').css('display') == 'none')
                $(this).parent().find('.error-validate').slideDown();
            validate = false;
        }
    });

    $(form).find('[data-validate="password"]').each(function()
    {
        if($(this).val() != $(form).find('[data-validate="rpassword"]').val())
        {
            if(!$(this).parent().find('.error-require').length || $(this).parent().find('.error-require').css('display') == 'none') {
                $(this).parent().find('.error-validate').slideDown();
            }
            validate = false;
        }
    });

    $(form).find('[data-min]').each(function()
    {
        var min = $(this).attr('data-min');
        if($(this).val().length < min && $(this).parent().find('.error-require').css('display') == 'none') {
            $(this).parent().find('.error-min').slideDown();
            validate = false;
        }
    });

    $(form).find('[data-max]').each(function()
    {
        var min = $(this).attr('data-max');
        if($(this).val().length < min && $(this).parent().find('.error-require').css('display') == 'none') {
            $(this).parent().find('.error-max').slideDown();
            validate = false;
        }
    });

    $(form).find('[data-one_ten="1"]').each(function()
    {
        var val = $(this).val();
        if((isNaN(parseInt(val)) || parseInt(val) < 0 || parseInt(val) > 10)) {
            $(this).parent().find('.error-one_ten').slideDown();
            validate = false;
        }
    });

    return(validate);

};

/**
 *
 * @param id
 */

function ajax_datatable(id)
{
    var oTable = $("#" + id).dataTable({
        "destroy": $.fn.dataTable.isDataTable("#" + id),
        "bJQueryUI": false,
        "bAutoWidth": false,
        //"sPaginationType": "full_numbers",
        "sDom": '<"datatable-header"Tfl><"datatable-scroll"t><"datatable-footer"ip>',
        "sAjaxSource": '?',
        "bServerSide": true,
        "fnServerParams": function ( aoData ) {
            aoData.push(
                { "name": "ajax", "value": true },
                { "name": "action", "value": id }
            );
            var params = Object();
            $("#" + id + ' .filter-field').each(function(){
                if($(this).val())
                    params[$(this).attr('name')] = {"value" : $(this).val(), "sign" : $(this).attr('data-sign')};
            });
            aoData.push({"name" : "params", "value" : JSON.stringify(params)});
        },
        "oLanguage": {
            "sLengthMenu": "<span></span> _MENU_",
            "oPaginate": { "sFirst": "First", "sLast": "Last", "sNext": "<i class=\"fa fa-angle-right\"></i>", "sPrevious": "<i class=\"fa fa-angle-left\"></i>" }
        },
        "oTableTools": {
            "sRowSelect": "single",
            "sSwfPath": "/media/swf/copy_csv_xls_pdf.swf",
            "aButtons": [
                {
                    "sExtends": "copy",
                    "sButtonText": "Copy",
                    "sButtonClass": "btn"
                },
                {
                    "sExtends": "print",
                    "sButtonText": "Print",
                    "sButtonClass": "btn"
                },
                {
                    "sExtends": "collection",
                    "sButtonText": "Save <span class='caret'></span>",
                    "sButtonClass": "btn btn-primary",
                    "aButtons": [ "csv", "xls", "pdf" ]
                }
            ]
        }
    });
    $('#' + id + ' .filter-field').change(function(){
        oTable.fnFilter();
    });
}

/**
 *
 * @param selector
 * @param action
 */

function ajax_select2(selector, action)
{
    $(selector).select2({
        ajax: {
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    q: params,
                    action: action,
                    ajax: 'true'
                };
            },
            results: function(data) {
                return {  results: data };

            },
            cache: true
        },
        minimumInputLength: 2
    });
}

/**
 *
 * @param params
 */

function ajax_file_upload(params)
{
    var btnUpload = $('#'+ (params.button ? params.button : 'upload_btn'));
    var status = $('#' + (params.status ? params.status : 'upload_status'));
    new AjaxUpload(btnUpload, {
        action: params.action ? params.action : '',
        name: params.name ? params.name : 'file',
        data: params.data,
        onSubmit: function(file, ext){
            if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext))){
                status.text('Only JPG, PNG or GIF files are allowed');
                return false;
            }
            status.html(params.status_upload ? params.status_upload : '<img src="../../assets/global/img/loading-spinner-grey.gif" />');
        },
        onComplete: function(file, msg){
            status.html('');
            try {
                var respond = JSON.parse(msg);
            }
            catch (e) {
                console.log(e);
                params.error();
            }
            params.success(respond);
        }
    });
}

/**
 *
 * @param function_name
 * @returns {boolean}
 */

function function_exists( function_name ) {
    if (typeof function_name == 'string'){
        return (typeof window[function_name] == 'function');
    } else{
        return (function_name instanceof Function);
    }
}

/**
 *
 * @param needle
 * @param haystack
 * @returns {boolean}
 */

function in_array(needle, haystack) {
    var found = false, key;

    for (key in haystack) {
        if (haystack[key] == needle) {
            found = true;
            break;
        }
    }
    return found;
}

function ajax_respond(msg, success, unsuccess, ret) {

    try {
        var respond = JSON.parse(msg);
    }
    catch (e) {
        if(ret) {
            return e;
        } else {
            toastr.error('Unexpexted error!');
        }
    }
    if(respond.status == 1) {
        success(respond);
        return false;
    } else {
        if(ret) {
            return respond.error;
        } else {
            for(var i in respond.error) {
                for(var j in respond.error[i]) {
                    for(var type in respond.error[i][j]) {
                        toastr.error(respond.error[i][j][type]['text']);
                    }
                }
            }
        }
        unsuccess(respond);
    }
}

