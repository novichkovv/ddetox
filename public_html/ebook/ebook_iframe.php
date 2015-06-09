<?php include_once('../classes/check.class.php'); ?>
<?php if( protectThis("1,2,3,4") ) : ?>
    <!-- jQuery -->
		<script src="/ebook/jquery.min.js"></script>
		
		<!--  Flippage -->
		<script src="/ebook/jquery.flippage.min.js"></script>
		<link href="/ebook/jquery.flippage.css" type="text/css" rel="stylesheet" />
		
		
		<script>
			(function($){
				$(document).ready(function(){
					$('.exemples:eq(0)').flippage({
						width: 960,
						height: 680
					});
					
					$('.exemples:eq(1)').flippage({
						width: 300,
						height: 150
					});
				});
			})(jQuery);
		</script>
			<center>
            
            <div class="exemples">
				<div><img src="/ebook/img/ebook_p1.jpg" style="margin-left: 0px;" /></div>
				<div><img src="/ebook/img/ebook_p1.jpg" style="margin-left: -480px;" /></div>
				<div><img src="/ebook/img/ebook_p2.jpg" style="margin-left: 0px;" /></div>
				<div><img src="/ebook/img/ebook_p2.jpg" style="margin-left: -480px;" /></div>
				<div><img src="/ebook/img/ebook_p3.jpg" style="margin-left: 0px;" /></div>
				<div><img src="/ebook/img/ebook_p3.jpg" style="margin-left: -480px;" /></div>
				<div><img src="/ebook/img/ebook_p4.jpg" style="margin-left: 0px;" /></div>
				<div><img src="/ebook/img/ebook_p4.jpg" style="margin-left: -480px;" /></div>
				<div><img src="/ebook/img/ebook_p5.jpg" style="margin-left: 0px;" /></div>
				<div><img src="/ebook/img/ebook_p5.jpg" style="margin-left: -480px;" /></div>
				<div><img src="/ebook/img/ebook_p6.jpg" style="margin-left: 0px;" /></div>
				<div><img src="/ebook/img/ebook_p6.jpg" style="margin-left: -480px;" /></div>   
                <div><img src="/ebook/img/ebook_p7.jpg" style="margin-left: 0px;" /></div>                                        
                
			</div>
			<div style="margin-top:25px;"><a href="#" onClick="$('.exemples:eq(0)').trigger('previous'); return false;"><img src="/ebook/img/previous.png" /></a> <font style="font-size: 25px;">&nbsp;</font> <a href="#" onClick="javascript:$('.exemples:eq(0)').trigger('next'); return false;"><img src="/ebook/img/next.png" /></a></div>
		</div>
		<p style="font-weight:bold; line-height:1.5; font-family:'Roboto', sans-serif;"><a href="/ebook/21daydetox.pdf" target="_blank">Download a full PDF of the 21 Day Detox E-Book</a></p>	</center>
<?php endif; ?>