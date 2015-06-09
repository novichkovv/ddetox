<?php define('IN_PAGE', true); include_once '_process_order.php'; ?>
<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title>Living Green Supremefood</title>
    <link rel="icon" href="/img/icon.png" type="image/x-icon"/>
	<link rel="shortcut icon" href="/img/icon.png" type="image/x-icon"/>
	<meta name="description" content="">
	<meta name="author" content="">

	<meta name="viewport" content="width=device-width">

	<link rel="stylesheet" href="css/grid.css">
	<link rel="stylesheet" href="css/shop.css">
    
	<script src="js/modernizr-2.6.2.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/1.4.5/numeral.min.js"></script>
    <script>
		window.onbeforeunload = popup;
		
		function popup() {
		  //return "***************************************************\r\n   WAIT! WAIT! WAIT! WAIT! WAIT! WAIT! WAIT! \r\n***************************************************\r\n\r\n      Living Green Supremefood is a powerful doctor  recommended powder that will increase your energy,   imrpove your digestion, boost your immune health,        support weight loss, and MUCH MUCH MORE. \r\n\r\n                 LIMITED TIME SPECIAL OFFER! \r\n                      EXCLUSIVELY FOR YOU\r\n\r\nGET LIVING GREEN SUPREMEFOOD BEFORE IT'S GONE\r\n            **************************************\r\n\r\nClick STAY ON PAGE below to rush your order today.";
		}
	</script>

	
</head>
<body id="buy">
<div class="container clearfix">
	<div id="shop-outer-content" class="grid_12">
    <div id="content" class="grid_12 sub-content">
        <form name="form_cart" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <div id="shopping-left" class="grid_8">
            <div id="cart-products">
                <label for="package0">
                <div class="package0">
                   <input type="radio" value="0.0000" name="extra" id="package0" class="cart-radio" checked />
                </div>
                </label>
                
                <div class="package1 grid_8">
                     <img src="/shop/img/1_a.png" id="package1" class="grid_8" />
                </div>
                <div class="package2 grid_8">
                    <img src="/shop/img/2_a.png" id="package2" class="grid_8" />
                </div>
                <div class="package3 grid_8">
                    <img src="/shop/img/3_a.png" id="package3" class="grid_8" />
                </div>
            </div>
            <div id="cart-name" class="grid_5"></div>
            <div class="cart-totals" class="grid_4">
               <table>
                    <tr class="shipping">
                        <td class="total"><input type="checkbox"  id="shipping" name="shipping" /><label for="shipping">Expedite Shipping:</label>
                        <td class="p_price">$4.99</td>
                    </tr>
                     <tr>
                         <td class="total">Sub Total:</label>
                         <td class="p_price" id="p_price">$0.00</td>
                     </tr>
                     <tr>
                         <td class="total">Shipping & Handling:</label>
                         <td class="p_price" id="shipping_price">$0.00</td>
                     </tr>
                     <tr>
                        <td colspan="2"><div class="divider-price"></div></td>
                     </tr>
                     <tr>
                         <td class="total-bold">Total:</label>
                         <td class="price-bold" id="total_amount">$0.00</td>
                     </tr>
              </table>
            </div>
            <div id="cart-arrow"><img src="/shop/img/arrow.gif" alt="Act Now to Claim Your Supply" /></div>
        </div>
        <div id="shopping-right" class="grid_4">
        	<div id="shopping-right-top">
            	<p><span class="row1">Tell Us Where To</span><br /><span class="row2">Send Your Package</p>
            </div>
            <div id="shopping-right-body">
            	<div class="cart-title">Secure 128-bit SSL Connection</div>
                		<div class="form-group"><label for="fname" >Username:</label> 
                        <input type="text"  id="username" name="username" value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : '' ?>" /></div>
                        
                        <div class="form-group"><label for="fname" >Password:</label> 
                        <input type="password"  id="password" name="password" value="<?php echo isset($_POST['password']) ? htmlspecialchars($_POST['password']) : '' ?>" /></div>
                
                        <div class="form-group"><label for="fname" >First Name:</label> 
                        <input type="text"  id="fname" name="fname" value="<?php echo isset($_POST['fname']) ? htmlspecialchars($_POST['fname']) : '' ?>" /></div>
                        
                        <div class="form-group"><label for="lname">Last Name:</label> 
						<input type="text"  id="lname" name="lname" value="<?php echo isset($_POST['lname']) ? htmlspecialchars($_POST['lname']) : '' ?>" /></div>
                        
                        <div class="form-group"><label for="email">Email:</label> 
						<input type="text"  id="email" name="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>" /></div>
                    
                        <div class="form-group"><label for="phone">Phone:</label> 
                        <input type="text"  id="phone" name="phone" value="<?php echo isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : '' ?>" /></div>
                        
                        <div class="form-group"><label for="address1">Address:</label> 
                        <input type="text"  id="address1" name="address1" value="<?php echo isset($_POST['address1']) ? htmlspecialchars($_POST['address1']) : '' ?>" /></div>
                        
                        <div class="form-group"><label for="address2">Address 2:</label> 
                        <input type="text"  id="address2" name="address2" value="<?php echo isset($_POST['address2']) ? htmlspecialchars($_POST['address2']) : '' ?>" /></div>
                        
                        <div class="form-group"><label for="city">City:</label> 
                        <input type="text"  id="city" name="city" value="<?php echo isset($_POST['city']) ? htmlspecialchars($_POST['city']) : '' ?>" /></div>
                        
                        <div class="form-group"><label for="state">State:</label>                     
                                <select  class="" id="state" style="" name="state"  size="1" onchange="SetStateHid(this);" >
                                <option value="" >Select State</option>
                                <option value="AL" >Alabama (AL)</option>
                                <option value="AK" >Alaska (AK)</option>
                                <option value="AS" >American Samoa (AS)</option>
                                <option value="AZ" >Arizona (AZ)</option>
                                <option value="AR" >Arkansas (AR)</option>
                                <option value="AE-A" >Armed Forces Africa (AE)</option>
                                <option value="AA" >Armed Forces Americas (AA)</option>
                                <option value="AE-C" >Armed Forces Canada (AE)</option>
                                <option value="AE-E" >Armed Forces Europe (AE)</option>
                                <option value="AE-M" >Armed Forces Middle East (AE)</option>
                                <option value="AP" >Armed Forces Pacific (AP)</option>
                                <option value="CA" >California (CA)</option>
                                <option value="CO" >Colorado (CO)</option>
                                <option value="CT" >Connecticut (CT)</option>
                                <option value="DE" >Delaware (DE)</option>
                                <option value="DC" >District of Columbia (DC)</option>
                                <option value="FM" >Federated States of Micronesia (FM)</option>
                                <option value="FL" >Florida (FL)</option>
                                <option value="GA" >Georgia (GA)</option>
                                <option value="GU" >Guam (GU)</option>
                                <option value="HI" >Hawaii (HI)</option>
                                <option value="ID" >Idaho (ID)</option>
                                <option value="IL" >Illinois (IL)</option>
                                <option value="IN" >Indiana (IN)</option>
                                <option value="IA" >Iowa (IA)</option>
                                <option value="KS" >Kansas (KS)</option>
                                <option value="KY" >Kentucky (KY)</option>
                                <option value="LA" >Louisiana (LA)</option>
                                <option value="ME" >Maine (ME)</option>
                                <option value="MD" >Maryland (MD)</option>
                                <option value="MA" >Massachusetts (MA)</option>
                                <option value="MI" >Michigan (MI)</option>
                                <option value="MN" >Minnesota (MN)</option>
                                <option value="MS" >Mississippi (MS)</option>
                                <option value="MO" >Missouri (MO)</option>
                                <option value="MT" >Montana (MT)</option>
                                <option value="NE" >Nebraska (NE)</option>
                                <option value="NV" >Nevada (NV)</option>
                                <option value="NH" >New Hampshire (NH)</option>
                                <option value="NJ" >New Jersey (NJ)</option>
                                <option value="NM" >New Mexico (NM)</option>
                                <option value="NY" >New York (NY)</option>
                                <option value="NC" >North Carolina (NC)</option>
                                <option value="ND" >North Dakota (ND)</option>
                                <option value="MP" >Northern Mariana Islands (MP)</option>
                                <option value="OH" >Ohio (OH)</option>
                                <option value="OK" >Oklahoma (OK)</option>
                                <option value="OR" >Oregon (OR)</option>
                                <option value="PA" >Pennsylvania (PA)</option>
                                <option value="PR" >Puerto Rico (PR)</option>
                                <option value="MH" >Republic of Marshall Islands (MH)</option>
                                <option value="RI" >Rhode Island (RI)</option>
                                <option value="SC" >South Carolina (SC)</option>
                                <option value="SD" >South Dakota (SD)</option>
                                <option value="TN" >Tennessee (TN)</option>
                                <option value="TX" >Texas (TX)</option>
                                <option value="UT" >Utah (UT)</option>
                                <option value="VT" >Vermont (VT)</option>
                                <option value="VI" >Virgin Islands of the U.S. (VI)</option>
                                <option value="VA" >Virginia (VA)</option>
                                <option value="WA" >Washington (WA)</option>
                                <option value="WV" >West Virginia (WV)</option>
                                <option value="WI" >Wisconsin (WI)</option>
                                <option value="WY" >Wyoming (WY)</option></select> 
                            </div>
                      
                        <div class="form-group"><label for="zip">Zip:</label> 
                        <input type="text"  id="zip" name="zip" value="<?php echo isset($_POST['zip']) ? htmlspecialchars($_POST['zip']) : '' ?>" /></div>
						<div id="payment-information" style="display:none;">
                            <div class="cart-title">Payment Information</div>                   
                            <div class="form-group"><label for="cc_type">Card Type:</label>
                                <select  onchange="payment_change(this)" onkeydown="this.onchange();" onkeyup="this.onchange();"  id="cc_type" name="cc_type" >
                                    <option value="">Select Payment Method</option>
                                    <option value = "Visa" >Visa</option>
                                    <option value = "Mastercard" >Mastercard</option>
                                    <option value = "Discover" >Discover</option>
                                    <option value = "American Express" >American Express</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="cc_number">Credit Card #:</label>
                                <input type="text" maxlength="20" onkeydown="return onlyNumbers(event,'cc')" id="cc_number" name="cc_number" autocomplete="off"/>
                                <input type="hidden" id="thm_session_id" name="thm_session_id" value=""/>
                            </div>
                            <div class="form-group">
                                <label for="expmonth">Expiration Date:</label>
                                <select name="expmonth" onchange="javascript:update_expire()" id="expmonth" class="input1">
                                    <option  selected  value="">Month</option>
                                    <option  value="01">01</option>
                                    <option  value="02">02</option>
                                    <option  value="03">03</option>
                                    <option  value="04">04</option>
                                    <option  value="05">05</option>
                                    <option  value="06">06</option>
                                    <option  value="07">07</option>
                                    <option  value="08">08</option>
                                    <option  value="09">09</option>
                                    <option  value="10">10</option>
                                    <option  value="11">11</option>
                                    <option  value="12">12</option>
    
                                </select> /
                                <select name="expyear" onchange="javascript:update_expire()" id="expyear" class="input1">
                                    <option value='14' selected>2014</option>
                                    <option value='15'>2015</option>
                                    <option value='16'>2016</option>
                                    <option value='17'>2017</option>
                                    <option value='18'>2018</option>
                                    <option value='19'>2019</option>
                                    <option value='20'>2020</option>
                                    <option value='21'>2021</option>
                                    <option value='22'>2022</option>
                                    <option value='23'>2023</option>
                                    <option value='24'>2024</option>
                                    <option value='24'>2025</option>
                                    <option value='24'>2026</option>
                                    <option value='24'>2027</option>
                                    <option value='24'>2028</option>
                                </select>
                                <input type="hidden" id="cc_expires" name="cc_expires" />
                            </div>
                            <div class="form-group"><label for="cc_cvv">Security Code:</label>
                           <input  autocomplete="off"  type="text" id="cc_cvv" name="cc_cvv" /><a class="white-link" href="javascript:window.open('/shop/cvv.html','CVV','width=470,height=230,scrollbars=no')">What's This?</a>
                        </div></div>
                            <div class="form-group">
                                <input type="checkbox" class="form-checkbox" id="terms" name="check_terms" />
                                <label for="terms" id="cart-terms">I am at least 18 years old and agree<br>to the <a href="javascript:window.open('/shop/terms.html','GetYourGarcinia.com Terms and Conditions','width=640,height=480,scrollbars=yes')">Terms and Conditions</a>
</label></div>
                                <!-- <div id="cart-autoship">*For purchases which include the AutoShip option, you will be charged based on your selection today, and will be enrolled in a 30 day supply auto shipment of your purchase. If the order is not canceled before the end of the 30 day period, on the 30th day after the purchase you will be charged the for a fresh 30 day supply of your purchase. Your account will be charged by Divine Health.</div> -->
                                
                        <div id="total-right">
                                <b>For This Order Today Your Total Charge Will Be:</b><br />
                                <div><span id="total_amount2">$0.00</span></div>
                            </div>
                            <input name="selected_product_SN" id="selected_product_SN" type="hidden" />
                            <input type='submit' name="submit" class="cart-submit" value='' title="Submit">
                            <img class="cart-submitted" src="/shop/img/submitted.png" alt="Your Order Has Been Submitted" />
                            
                            <?php if (isset($errorMsg) && sizeof($errorMsg)): ?>
                            <div id="error" style="display:block;">
                            <ul>
                            <?php foreach ($errorMsg as $msg): ?>
                            <li><?php echo $msg ?></li>
                            <?php endforeach; ?>
                            </ul>         
                            <?php else: ?>
                            <div id="error">
                            <?php endif;?>
                            </div>
                            <div id="security-right"><img src="/shop/img/secure.png" /></div>
            </div>
            </div>
        </div>
        </div>
        
        </form>
        <div id="security-corner"><img src="/shop/img/comodo-corner.png" /></div>
	</div>
    

    
    </div>
</div>
<!-- end .container -->

<script type='text/javascript'> 
(function ($) {
		var shipping = 4.99;
		var price = 0;
		$(function(){
		  checkShipping(price);
		  $('#shipping').change(function(){
			checkShipping(price);
		  });
		$('#payment_product_id').remove();
		$('#selected_product_SN').val('');

		$('img').click(function(){
		  if (this.id == 'package0' && this.checked) {
          
            $('#selected_product_SN').val('0');
			//$('#shipping').html('<option title="0.00" value="4">$0.00</option>');
			$('.package0').addClass("active");
			$('.package1').removeClass("active");
			$('.package2').removeClass("active");
			$('.package3').removeClass("active");
			$('.package4').removeClass("active");
			$('#shipping').prop('checked', true);
			//$('#shipping_price').html("<span class='green'>$0.00</span>");
			$('#cart-name').html('');
			$('#retail').html("<del>$349.75</del>");
			$('#savings').html("<span class='highlight'>$249.00</span>");
			
		 }else if (this.id == 'package1') {
          
		  $('#selected_product_SN').val('1');
			price = 0.00;
			$('#shipping').prop('checked', false);
			checkShipping(price);
			//$('#shipping').html('<option title="0.00" value="4">$0.00</option>');
			$('#package1').attr('src',"/shop/img/1_b.png")
			$('#package2').attr('src',"/shop/img/2_a.png")
			$('#package3').attr('src',"/shop/img/3_a.png")
			$('#package4').attr('src',"/shop/img/4_a.png")
			$('#payment-information').hide();
			$('#p_price').html(numeral(price).format('$0,0.00'));
			$('#cart-name').html('21 Day Detox Membership Access');
			$('#retail').html("<del>$209.85</del>");
			$('#savings').html("<span class='highlight'>$129.00</span>");
			
		}else if (this.id == 'package2') {
          
		  
            $('#selected_product_SN').val('2');
			price = 9.99;
			$('#shipping').prop('checked', false);
			checkShipping(price);
			//$('#shipping').html('<option title="0.00" value="4">$0.00</option>');
			$('#package2').attr('src',"/shop/img/2_b.png")
			$('#package3').attr('src',"/shop/img/3_a.png")
			$('#package4').attr('src',"/shop/img/4_a.png")
			$('#package1').attr('src',"/shop/img/1_a.png")
			$('#payment-information').show();
			$('#p_price').html(numeral(price).format('$0,0.00'));
			$('#cart-name').html('<b>21 Day Detox Online Premium Membership');
			$('#retail').html("<del>$209.85</del>");
			$('#savings').html("<span class='highlight'>$129.00</span>");

		}
		else if (this.id == 'package3') {
			
			 $('#selected_product_SN').val('3');
			price = 169.99;
			$('#shipping').prop('checked', true);
			checkShipping(price);
			//$('#shipping').html('<option title="0.00" value="4">$0.00</option>');
			$('#package3').attr('src',"/shop/img/3_b.png")
			$('#package4').attr('src',"/shop/img/4_a.png")
			$('#package1').attr('src',"/shop/img/1_a.png")
			$('#package2').attr('src',"/shop/img/2_a.png")
			$('#payment-information').show();
			//$('#shipping_price').html("$" + shipping);
			$('#p_price').html(numeral(price).format('$0,0.00'));
			$('#cart-name').html('<b>21 Day Detox Package + Online Premium Membership<br /><span>Living Green Supremefood<br />MaxOne<br />Yellow Pea Plant Protein<br />Fiber Formula (Berry Flavor)');
		  
		}
		else if (this.id == 'package4') {
          
		   $('#selected_product_SN').val('4');
			price = 179.98;
			$('#shipping').prop('checked', true);
			checkShipping(price);
			//$('#shipping').html('<option title="0.00" value="4">$0.00</option>');
			$('#package4').attr('src',"/shop/img/4_b.png")
			$('#package1').attr('src',"/shop/img/1_a.png")
			$('#package2').attr('src',"/shop/img/2_a.png")
			$('#package3').attr('src',"/shop/img/3_a.png")
			$('#payment-information').show();
			$('#p_price').html(numeral(price).format('$0,0.00'));
			$('#cart-name').html('<b>21 Day Detox Package + Premium Membership<br /><span>Living Green Supremefood<br />MaxOne<br />Yellow Pea Plant Protein<br />Fiber Formula (Berry Flavor)');
			$('#retail').html("<del>$209.85</del>");
			$('#savings').html("<span class='highlight'>$129.00</span>");
			
		}
		});
		function checkShipping(price) {
		  var shipping = 0;
		  var total = 0;
		  //if ($('#shipping').is(':checked')) { //jQuery version
		  if(document.getElementById('shipping').checked) { //JS version
		  	shipping = 4.99;
			total = price + shipping;
		  } else {	
			total = price + shipping;
		  }
		  if (shipping == 0)
		  {
			  $('#shipping_price').html('FREE');
		  }
		  else {
		  	$('#shipping_price').html(numeral(shipping).format('$0,0.00'));
		  }
		  $('#total_amount').html(numeral(total).format('$0,0.00'));
		  $('#total_amount2').html(numeral(total).format('$0,0.00'));

		}

	  }); 
	  
	  $(".cart-submit").click(function(){
		  $(".cart-submit").hide();
		  $(".cart-submitted").show();
		});
})(jQuery);
	
</script>
</body>
</html>