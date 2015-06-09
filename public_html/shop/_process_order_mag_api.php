<?php
if (!defined('IN_PAGE')) {
    header("Location: /");
}


//time_elapsed();

$sessionId = false;
$client = false;
try {
    $client = new SoapClient($mageUrl); 
    $sessionId = $client->login($mageUser, $mageApiKey);
} catch (Exception $e) {
    $errorMsg[] = 'Failed to connect to API.';
}

//time_elapsed();

/*
$products = array();

if ($client && $sessionId) {
    try {
        foreach ($productIDs as $pid) {
            $result = $client->call($sessionId, 'catalog_product.info', $pid);
            if ($result) {
                $products[] = $result;
            }
        }
    } catch (Exception $e) {
        $errorMsg[] = 'Failed to retrieve product information.';    
    }
}
*/


//time_elapsed();
do if ($client && $sessionId) {    
    
    if (sizeof($errorMsg) > 0) {
        $debugMsg[] = 'Input checked: NOT OK';
    
    } else {
        $debugMsg[] = 'Input checked: OK';
        
        
        $debugMsg[] = "Registering new shopping cart... ";
        try {
            $shoppingCartId = $client->call( $sessionId, 'cart.create', array( MAGENTO_STORE_ID) );
            $debugMsg[] = "Result: Shopping Cart ID: " . $shoppingCartId;
            //time_elapsed();
        } catch (Exception $e) {
            $errorMsg[] = 'Failed -> ' . $e->getMessage();   
        }
        if (sizeof($errorMsg) > 0) break;
        
        
        $customerAsGuest = array(
            "firstname" => $_POST['fname'],
            "lastname" => $_POST['lname'],
            "email" => $_POST['email'],
            "website_id" => MAGENTO_WEBSITE_ID,
            "store_id" => MAGENTO_STORE_ID,
            "mode" => "guest"
        );
        $debugMsg[] = "Registering new guest customer... ";
        $debugMsg[] = print_r($customerAsGuest, true);
        try {
            $resultCustomerSet = $client->call($sessionId, 'cart_customer.set', array( $shoppingCartId, $customerAsGuest) );    
            $debugMsg[] = "Result:  " . ($resultCustomerSet == '1' ? 'OK' : 'Failed');
            //time_elapsed();
        } catch (Exception $e) {
            $errorMsg[] = 'Failed -> ' . $e->getMessage();   
        }
        if (sizeof($errorMsg) > 0) break;

        
        
        $arrAddresses = array(
            array(
                "mode" => "shipping",
                "firstname" => $_POST['fname'],
                "lastname" => $_POST['lname'],
                //"company" => "testCompany",
                "street" => $_POST['address1'] . "\n" . $_POST['address2'],
                "city" => $_POST['city'],
                "region" => $_POST['state'],
                "postcode" => $_POST['zip'],
                "country_id" => DEFAULT_COUNTRY_ID,
                "telephone" => $_POST['phone'],
                //"fax" => "0123456789",
                "is_default_shipping" => 0,
                "is_default_billing" => 0
            ),
            array(
                "mode" => "billing",
                "firstname" => $_POST['fname'],
                "lastname" => $_POST['lname'],
                //"company" => "testCompany",
                "street" => $_POST['address1'] . "\n" . $_POST['address2'],
                "city" => $_POST['city'],
                "region" => $_POST['state'],
                "postcode" => $_POST['zip'],
                "country_id" => DEFAULT_COUNTRY_ID,
                "telephone" => $_POST['phone'],
                //"fax" => "0123456789",
                "is_default_shipping" => 0,
                "is_default_billing" => 0
            )
        );
        $debugMsg[] = "Registering customer address... ";
        $debugMsg[] = print_r($arrAddresses, true);
        try {
            $resultCustomerAddresses = $client->call($sessionId, "cart_customer.addresses", array($shoppingCartId, $arrAddresses));  
            $debugMsg[] = "Result:  " . ($resultCustomerAddresses == '1' ? 'OK' : 'Failed');
            //time_elapsed();
        } catch (Exception $e) {
            $errorMsg[] = 'Failed -> ' . $e->getMessage();   
        }
        if (sizeof($errorMsg) > 0) break;
        

        // add products into shopping cart
        if ($selectedProductID) {
            $arrProducts = array(
                array(
                    "product_id" => $selectedProductID,
                    "qty" => DEFAULT_PURCHASE_QUANTITY
                )
            );
            $debugMsg[] = "Adding product to cart... ";
            $debugMsg[] = print_r($arrProducts, true);
            try {
                $resultCartProductAdd = $client->call($sessionId, "cart_product.add", array($shoppingCartId, $arrProducts));
                $debugMsg[] = "Result:  " . ($resultCartProductAdd == '1' ? 'OK' : 'Failed');
                //time_elapsed();
            } catch (Exception $e) {
                $errorMsg[] = 'Failed -> ' . $e->getMessage();   
            }
        }
        if (sizeof($errorMsg) > 0) break;

        /*
        $debugMsg[] = "Get (to confirm) list of products in cart... ";
        try {
           // $shoppingCartProducts = $client->call($sessionId, "cart_product.list", array($shoppingCartId));
			// bernie
			$shoppingCartProducts = $client->call($sessionId, "cart_product.list", $shoppingCartId);
            $debugMsg[] = print_r( $shoppingCartProducts, true);
            //time_elapsed();
        } catch (Exception $e) {
            $errorMsg[] = 'Failed -> ' . $e->getMessage();   
        }
        if (sizeof($errorMsg) > 0) break;
		*/
		
		/*
        $debugMsg[] = "get list of shipping methods... ";
        try {
           // $resultShippingMethods = $client->call($sessionId, "cart_shipping.list", array($shoppingCartId));
		// bernie
			$resultShippingMethods = $client->call($sessionId, "cart_shipping.list", $shoppingCartId);
            $debugMsg[] = print_r( $resultShippingMethods, true );
            //time_elapsed();
        } catch (Exception $e) {
            $errorMsg[] = 'Failed -> ' . $e->getMessage();   
        }
        if (sizeof($errorMsg) > 0) break;
		*/
        
        // set shipping method
        $shippingMethod = '';
		if (array_key_exists($shippingOption, $SHIPPING_METHODS_MAPS)) $shippingMethod = $SHIPPING_METHODS_MAPS[$shippingOption];

        $debugMsg[] = "set shipping method... ";
        $debugMsg[] = print_r($shippingMethod, true);
        try {
            $resultShippingMethod = $client->call($sessionId, "cart_shipping.method", array($shoppingCartId, $shippingMethod));
            $debugMsg[] = "Set Shipping Method Result:  " . ($resultShippingMethod == '1' ? 'OK' : 'Failed');
            //time_elapsed();
        } catch (Exception $e) {
            $errorMsg[] = 'Failed -> ' . $e->getMessage();   
        }
        if (sizeof($errorMsg) > 0) break;

	

		/*
        $debugMsg[] = "get list of payment methods... ";
		
		$debugMsg[] = "Shopping Cart ID:".$shoppingCartId ;
		
        try {
            //$resultPaymentMethods = $client->call($sessionId, "cart_payment.list", $shoppingCartId, 1);
			// get list of payment methods
			$resultPaymentMethods = $client->call($sessionId, "cart_payment.list", array($shoppingCartId, MAGENTO_STORE_ID));
            $debugMsg[] = print_r($resultPaymentMethods, true);
			 
            //time_elapsed();
        } catch (Exception $e) {
            $errorMsg[] = 'Failed Payment Methods -> ' . $e->getMessage();   
        }
		
        if (sizeof($errorMsg) > 0) break;
		*/
        
          
            
		// set payment method
		$paymentMethod = array(
			"method" => DEFAULT_PAYMENT_METHOD
		);
		
		
		$debugMsg[] = "Select Payment Method... ";
		$debugMsg[] = print_r($paymentMethod, true);
		try {
			$resultPaymentMethod = $client->call($sessionId, "cart_payment.method", array($shoppingCartId, $paymentMethod));
			$debugMsg[] = print_r($resultPaymentMethod, true);
			//time_elapsed();
		} catch (Exception $e) {
			$errorMsg[] = 'Failed -> ' . $e->getMessage();   
		}
		if (sizeof($errorMsg) > 0) break;
        
		/*
        $debugMsg[] = "get total prices.... ";
        try {
            $shoppingCartTotals = $client->call($sessionId, "cart.totals", array($shoppingCartId));
            $debugMsg[] = print_r( $shoppingCartTotals, true );
            //time_elapsed();
        } catch (Exception $e) {
            $errorMsg[] = 'Failed -> ' . $e->getMessage();   
        }
        if (sizeof($errorMsg) > 0) break;

        
        $debugMsg[] = "get full information about shopping cart.... ";
        try {
            $shoppingCartInfo = $client->call($sessionId, "cart.info", array($shoppingCartId));
            $debugMsg[] = "Result:  " . (isset($shoppingCartInfo['created_at']) ? 'OK' : 'Failed');
            //time_elapsed();
        } catch (Exception $e) {
            $errorMsg[] = 'Failed -> ' . $e->getMessage();   
        }
        if (sizeof($errorMsg) > 0) break;
		*/

        $debugMsg[] = "Finally, Create order";//... SKIPPED (for now, don't actually place any order)";
        try {
			
			if (IS_SIMULATE_MAGENTO_PLACE_ORDER) $resultOrderCreation = 'SIMULATED' . rand(1, 999999);
			else {
				$resultOrderCreation = $client->call($sessionId,"cart.order",array($shoppingCartId, null));				
				
				if ($resultOrderCreation) {
					$orderInfo = false;
					try {
						$debugMsg[] = "get order information.... ";
						$orderInfo = $client->call($sessionId, 'sales_order.info', $resultOrderCreation); 
						//print_r( $orderInfo);
						//$debugMsg[] = print_r( $orderInfo, true );
						
					} catch (Exception $e) {
						$errorMsg[] = 'Failed -> ' . $e->getMessage();   
					}
					
				
					
					$itemQtys = array();
					if ($orderInfo && $orderInfo['items']) {
						foreach ($orderInfo['items'] as $item) {
							$itemQtys[$item['item_id']] = $item['qty_ordered'] - $item['qty_invoiced'];
						}
					}
					$debugMsg[] = "Item IDs and qty to be invoiced.... ";
					$debugMsg[] = print_r( $itemQtys, true );
					
					$createInvoice = false;
					if (sizeof($itemQtys)) {	
						$debugMsg[] = "Create invoice.... ";		
						$createInvoice = $client->call(
							$sessionId,
							'sales_order_invoice.create',
							array('orderIncrementId' => $resultOrderCreation, $itemQtys)
						);
						$debugMsg[] = $createInvoice;
					}
					
					
					// this status setting is redundant if we've created invoice above
					if (!$createInvoice) {
						$debugMsg[] = "Set status to processing.... ";
						$setStatus = $client->call($sessionId, 'sales_order.addComment', array('orderIncrementId' => $resultOrderCreation, 'status' => 'processing'));
						$debugMsg[] = $setStatus;
					}					
				}
			}
			
            $debugMsg[] = print_r($resultOrderCreation, true);
            //time_elapsed();
            $successMsg[] = "Order created with ID: " . $resultOrderCreation;
            
            // redirect to success page
            $_SESSION['flashOrderId'] = $resultOrderCreation;
			$_SESSION['detoxType'] = $products[$selectedProductID]['type'];
			$_SESSION['detoxName'] = $_POST['fname'] . $_POST['lname'];
			$_SESSION['detoxEmail'] = $_POST['email'];
			$_SESSION['detoxPhone'] = $_POST['phone'];
			$_SESSION['orderTotal'] = $totalAmount;

			
			

			$prep = "INSERT INTO " . TABLE_ORDER_API . 
							"(   order_id,api_order_number,api_invoice_number," .
							"    created_at,modified_at" .
							") " .
							" VALUES( " .
							"    :order_id,:api_order_number,:api_invoice_number, " .
							"    :created_at,:modified_at" .
						   ") ";
			$stmt = $etdb->prepare($prep);
			
			$stmt->bindValue(':order_id', $order['id'], PDO::PARAM_STR);
			$stmt->bindValue(':api_order_number',  $resultOrderCreation, PDO::PARAM_STR);
			$stmt->bindValue(':api_invoice_number',  $createInvoice, PDO::PARAM_STR);
			
			$stmt->bindValue(':created_at', date("Y-m-d H:i:s"));
			$stmt->bindValue(':modified_at', date("Y-m-d H:i:s"));
								 
			$stmt->execute();
			$affected_rows = $stmt->rowCount();
			$debugMsg[] = 'API Order has been recorded.';
			
			
            
        } catch (Exception $e) {
            $errorMsg[] = 'Failed -> ' . $e->getMessage();   
        }
        if (sizeof($errorMsg) > 0) break;   
            
    }    
        
    // If you don't need the session anymore
    $client->endSession($sessionId);
} while (false);
