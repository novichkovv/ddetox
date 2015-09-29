<?php
if (!defined('IN_PAGE')) {
    header("Location: /");
}


try {
    $prep = "INSERT INTO " . TABLE_ORDER . 
                    "(   firstname,lastname,email,address1,address2,city,state,zip,phone," .
                    "    c_type,c_last,c_exp_month,c_exp_year," .
                    "    product_id,product_desc,product_amount,shipping_option,shipping_amount,total_amount," .
                    "    subscription_enabled,subscription_start,next_payment,paypal_ref," .
                    "    created_at,modified_at," .
                    "    request_vars, detox_type" .
                    ") " .
                    " VALUES( " .
                    "    :firstname,:lastname,:email,:address1,:address2,:city,:state,:zip,:phone, " .
                    "    :c_type,:c_last,:c_exp_month,:c_exp_year," .
                    "    :product_id,:product_desc,:product_amount,:shipping_option,:shipping_amount,:total_amount," .
                    "    :subscription_enabled,:subscription_start,:next_payment,:paypal_ref," .
                    "    :created_at,:modified_at," .
                    "    :request_vars,:detox_type" .
                   ") ";
    $stmt = $etdb->prepare($prep);
    
    $stmt->bindValue(':firstname', $_POST['fname'], PDO::PARAM_STR);
    $stmt->bindValue(':lastname',  $_POST['lname'], PDO::PARAM_STR);
    $stmt->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
    $stmt->bindValue(':address1', $_POST['address1'], PDO::PARAM_STR);
    $stmt->bindValue(':address2', $_POST['address2'], PDO::PARAM_STR);
    $stmt->bindValue(':city', $_POST['city'], PDO::PARAM_STR);
    $stmt->bindValue(':state', $_POST['state'], PDO::PARAM_STR);
    $stmt->bindValue(':zip', $_POST['zip'], PDO::PARAM_STR);
    $stmt->bindValue(':phone', $_POST['phone'], PDO::PARAM_STR);
    
    
    $stmt->bindValue(':c_type', $_POST['cc_type'], PDO::PARAM_STR);    
    $stmt->bindValue(':c_last', substr($_POST['cc_number'], -4), PDO::PARAM_STR);    
    $stmt->bindValue(':c_exp_month', $_POST['expmonth'], PDO::PARAM_STR);  
    $stmt->bindValue(':c_exp_year', $_POST['expyear'], PDO::PARAM_STR);  
    
    $stmt->bindValue(':product_id', $selectedProductID);  
    $stmt->bindValue(':product_desc', $products[$selectedProductID]['description'], PDO::PARAM_STR);  
    $stmt->bindValue(':product_amount', $products[$selectedProductID]['price']);    
    $stmt->bindValue(':shipping_option', $shippingOption, PDO::PARAM_STR);
    $stmt->bindValue(':shipping_amount', $shippingAmount);
    $stmt->bindValue(':total_amount', $totalAmount);  
    
    $stmt->bindValue(':subscription_enabled', $products[$selectedProductID]['subscription']);   
    $stmt->bindValue(':subscription_start', $subscriptionStartDate);   
    $stmt->bindValue(':next_payment', $subscriptionNextPaymentDate);   
    $stmt->bindValue(':paypal_ref', '', PDO::PARAM_STR);    
    
    $stmt->bindValue(':created_at', date("Y-m-d H:i:s"));
    $stmt->bindValue(':modified_at', date("Y-m-d H:i:s"));
	
    $stmt->bindValue(':request_vars', json_encode(maskCCInfo($_REQUEST)), PDO::PARAM_STR);
    $stmt->bindValue(':detox_type', $products[$selectedProductID]['type']);   

	                         
    $stmt->execute();
    $affected_rows = $stmt->rowCount();
    
    $newOrderId = $etdb->lastInsertId();   
    $order = getOrder($newOrderId);
    
    $successMsg[] = 'Order has been recorded.';
        
} catch(PDOException $ex) {            
    $errorMsg['pdo'] = "Server error occured! Try again later. _process_order_local_data.php" . $prep; 
    $debugMsg['pdo'] = "Server error occured! Try again later. " . $ex->getMessage() . $prep; 
}	