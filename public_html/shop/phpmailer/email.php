<body style="background:#F6F6F6; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; margin:0; padding:0;">
<div style="background:#F6F6F6; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; margin:0; padding:0;">
<table cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
    <td align="center" valign="top" style="padding:20px 0 20px 0">
        <table bgcolor="#FFFFFF" cellspacing="0" cellpadding="10" border="0" width="650" style="border:1px solid #E0E0E0;">
            <!-- [ header starts here] -->
            <tr>
                <td valign="top"><a href="http://www.divinehealthdetox.com"><img src="http://divinehealthdetox.com/img/21daydetox_final.png" alt="21 Day Detox" style="margin-bottom:10px;" border="0"/></a></td>
            </tr>
            <!-- [ middle starts here] -->
            <tr>
                <td valign="top">
                    <h1 style="font-size:22px; font-weight:normal; line-height:22px; margin:0 0 11px 0;"">Hello,</h1>
                    <p style="font-size:12px; line-height:16px; margin:0;">
                        Thank you for your order from <a href="http://www.drcolbert.com">Divine Health</a>.
                        <?php /* IF BY JOEL */ if ($_SESSION['flashOrderId']) { echo "Once your package ships we will send an email with a link to track your order."; } ?>
                        If you have any questions about your order please contact us at <a href="mailto:info@drcolbert.com" style="color:#1E7EC8;">info@drcolbert.com</a>
                    </p>
                    <p style="font-size:12px; line-height:16px; margin:0;">Your order confirmation is below. Thank you again for your business.</p>
            </tr>
            <tr>
                <td>
                    <h2 style="font-size:18px; font-weight:normal; margin:0;">Your Order <?php /* IF BY JOEL */ if ($_SESSION['flashOrderId']) { echo "#" . $_SESSION['flashOrderId']; } ?> <small>(placed on <?php echo $order['date_nice']; ?>)</small></h2>
                </td>
            </tr>
            <tr>
                <td>
                    <table cellspacing="0" cellpadding="0" border="0" width="650">
                        <thead>
                        <tr>
                            <th align="left" width="325" bgcolor="#EAEAEA" style="font-size:13px; padding:5px 9px 6px 9px; line-height:1em;">Billing Information:</th>
                            <th width="10"></th>
                            <th align="left" width="325" bgcolor="#EAEAEA" style="font-size:13px; padding:5px 9px 6px 9px; line-height:1em;">Payment Method:</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td valign="top" style="font-size:12px; padding:7px 9px 9px 9px; border-left:1px solid #EAEAEA; border-bottom:1px solid #EAEAEA; border-right:1px solid #EAEAEA;">
                                <?php echo nl2br($billingAddress); ?>
                            </td>
                            <td>&nbsp;</td>
                            <td valign="top" style="font-size:12px; padding:7px 9px 9px 9px; border-left:1px solid #EAEAEA; border-bottom:1px solid #EAEAEA; border-right:1px solid #EAEAEA;">
                                <p><strong>Credit Card Type: </strong><?php echo $order['c_type']; ?><br />
                                <strong>Credit Card Number: </strong><?php echo $order['c_last']; ?><br />
                                <strong>Order Total: </strong><?php echo $order['total_amount']; ?><br /></p>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <br/>
                    <table cellspacing="0" cellpadding="0" border="0" width="650">
                        <thead>
                        <tr>
                            <th align="left" width="325" bgcolor="#EAEAEA" style="font-size:13px; padding:5px 9px 6px 9px; line-height:1em;">Shipping Information:</th>
                            <th width="10"></th>
                            <th align="left" width="325" bgcolor="#EAEAEA" style="font-size:13px; padding:5px 9px 6px 9px; line-height:1em;">Shipping Method:</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td valign="top" style="font-size:12px; padding:7px 9px 9px 9px; border-left:1px solid #EAEAEA; border-bottom:1px solid #EAEAEA; border-right:1px solid #EAEAEA;">
                         		<?php echo nl2br($shippingAddress); ?>
                            </td>
                            <td>&nbsp;</td>
                            <td valign="top" style="font-size:12px; padding:7px 9px 9px 9px; border-left:1px solid #EAEAEA; border-bottom:1px solid #EAEAEA; border-right:1px solid #EAEAEA;">
                                <?php echo $shippingOption; ?>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <br />
                    <table cellspacing="0" cellpadding="0" border="0" width="650">
                        <thead>
                        <tr>
                            <th align="left" width="325" bgcolor="#EAEAEA" style="font-size:13px; padding:5px 9px 6px 9px; line-height:1em;">Item</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td valign="top" style="font-size:12px; padding:7px 9px 9px 9px; border-left:1px solid #EAEAEA; border-bottom:1px solid #EAEAEA; border-right:1px solid #EAEAEA;">
                         		<?php echo $order['product_desc']; ?>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td bgcolor="#EAEAEA" align="center" style="background:#EAEAEA; text-align:center;"><center><p style="font-size:12px; margin:0;">Thank you</p></center></td>
            </tr>
        </table>
    </td>
</tr>
</table>
<img src="http://www.google-analytics.com/collect?v=1&tid=UA-23947860-4&cid=jsp0421@&t=event&ec=email&ea=open&el=jsp0421@&cs=newsletter&cm=email&cn=GarciniaSuccess&cm1=1" />
</div>
</body>