<script src="<?php echo SITE_DIR; ?>js/jquery.flippage.min.js"></script>
<link href="<?php echo SITE_DIR; ?>css/jquery.flippage.css" type="text/css" rel="stylesheet" />
<script>
    (function($){
        $(document).ready(function(){
            $('.exemples:eq(0)').flippage({
                width: 960,
                height: 741
            });

            $('.exemples:eq(1)').flippage({
                width: 300,
                height: 150
            });
        });
    })(jQuery);
</script>
<div class="text-center">
    <div class="exemples" style="margin: 0 auto;">
        <div><img src="<?php echo SITE_DIR; ?>images/ebook/Page_00001.jpg" style="margin-left: 0px;" /></div>
        <div><img src="<?php echo SITE_DIR; ?>images/ebook/Page_00001.jpg" style="margin-left: -480px;" /></div>
        <div><img src="<?php echo SITE_DIR; ?>images/ebook/Page_00002.jpg" style="margin-left: 0px;" /></div>
        <div><img src="<?php echo SITE_DIR; ?>images/ebook/Page_00002.jpg" style="margin-left: -480px;" /></div>
        <div><img src="<?php echo SITE_DIR; ?>images/ebook/Page_00003.jpg" style="margin-left: 0px;" /></div>
        <div><img src="<?php echo SITE_DIR; ?>images/ebook/Page_00003.jpg" style="margin-left: -480px;" /></div>
        <div><img src="<?php echo SITE_DIR; ?>images/ebook/Page_00004.jpg" style="margin-left: 0px;" /></div>
        <div><img src="<?php echo SITE_DIR; ?>images/ebook/Page_00004.jpg" style="margin-left: -480px;" /></div>
        <div><img src="<?php echo SITE_DIR; ?>images/ebook/Page_00005.jpg" style="margin-left: 0px;" /></div>
        <div><img src="<?php echo SITE_DIR; ?>images/ebook/Page_00005.jpg" style="margin-left: -480px;" /></div>
        <div><img src="<?php echo SITE_DIR; ?>images/ebook/Page_00006.jpg" style="margin-left: 0px;" /></div>
        <div><img src="<?php echo SITE_DIR; ?>images/ebook/Page_00006.jpg" style="margin-left: -480px;" /></div>
        <div><img src="<?php echo SITE_DIR; ?>images/ebook/Page_00007.jpg" style="margin-left: 0px;" /></div>
        <div><img src="<?php echo SITE_DIR; ?>images/ebook/Page_00007.jpg" style="margin-left: -480px;" /></div>
        <div><img src="<?php echo SITE_DIR; ?>images/ebook/Page_00008.jpg" style="margin-left: 0px;" /></div>
        <div><img src="<?php echo SITE_DIR; ?>images/ebook/Page_00008.jpg" style="margin-left: -480px;" /></div>
    </div>
    <div style="margin-top:25px;"><a href="#" onClick="$('.exemples:eq(0)').trigger('previous'); return false;"><img src="<?php echo SITE_DIR; ?>images/ebook/previous.png" /></a> <font style="font-size: 25px;">&nbsp;</font> <a href="#" onClick="javascript:$('.exemples:eq(0)').trigger('next'); return false;"><img src="<?php echo SITE_DIR; ?>images/ebook/next.png" /></a></div>
    <p style="font-weight:bold; line-height:1.5; font-family:'Roboto', sans-serif;"><a href="<?php echo SITE_DIR; ?>21daydetox.pdf" target="_blank">Download a full PDF of the 21 Day Detox E-Book</a></p>
</div>