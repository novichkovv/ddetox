/**
 * Created by novichkov on 18.12.14.
 */
$ = jQuery.noConflict();
$(document).ready(function()
{
    $(".video-container").click(function()
    {
        var frame = $("#video_frame");
        $(".video-container img").fadeOut('slow');
        $(frame).attr('src',$(frame).attr('src') + '&autoplay=1');
    });
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
