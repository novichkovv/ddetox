<?php
$creditCard = preg_replace("/[^0-9]/", "", $_POST['cc_number']);

if (!defined('IN_PAGE')) {
    header("Location: /");
}


// Create PayPal object.
$PayPalConfig = array(
                        'Sandbox' => $sandbox, 
                        'APIUsername' => $payflow_username, 
                        'APIPassword' => $payflow_password, 
                        'APIVendor' => $payflow_vendor, 
                        'APIPartner' => $payflow_partner, 
                        'Verbosity' => 'LOW'		// Detail level for API response.  Values are:  LOW, MEDIUM, HIGH
                      );

$PayPal = new angelleye\PayPal\PayFlow($PayPalConfig);

// Prepare request arrays
$PayPalRequestData = array(
        'tender'=>'C', 				// Required.  The method of payment.  Values are: A = ACH, C = Credit Card, D = Pinless Debit, K = Telecheck, P = PayPal
        'trxtype'=>'S', 				// Required.  Indicates the type of transaction to perform.  Values are:  A = Authorization, B = Balance Inquiry, C = Credit, D = Delayed Capture, F = Voice Authorization, I = Inquiry, L = Data Upload, N = Duplicate Transaction, S = Sale, V = Void
        'acct'=>$creditCard, 				// Required for credit card transaction.  Credit card or purchase card number.
        'expdate'=>$_POST['expmonth'] . substr($_POST['expyear'], -2), 				// Required for credit card transaction.  Expiration date of the credit card.  Format:  MMYY
        'amt'=>$totalAmount, 					// Required.  Amount of the transaction.  Must have 2 decimal places. 
        'dutyamt'=>'', 				//
        'freightamt'=>$shippingAmount, 			//
        'taxamt'=>'', 				//
        'taxexempt'=>'', 			// 
        'comment1'=>'', 			// Merchant-defined value for reporting and auditing purposes.  128 char max
        'comment2'=>'', 			// Merchant-defined value for reporting and auditing purposes.  128 char max
        'cvv2'=>$_POST['cc_cvv'], 				// A code printed on the back of the card (or front for Amex)
        'recurring'=>'', 			// Identifies the transaction as recurring.  One of the following values:  Y = transaction is recurring, N = transaction is not recurring. 
        'swipe'=>'', 				// Required for card-present transactions.  Used to pass either Track 1 or Track 2, but not both.
        'orderid'=>$order['id'], 				// Checks for duplicate order.  If you pass orderid in a request and pass it again in the future the response returns DUPLICATE=2 along with the orderid
        'billtoemail'=>$_POST['email'], 			// Account holder's email address.
        'billtophonenum'=>$_POST['phone'], 		// Account holder's phone number.
        'billtofirstname'=>$_POST['fname'], 		// Account holder's first name.
        'billtomiddlename'=>'', 	// Account holder's middle name.
        'billtolastname'=>$_POST['lname'], 		// Account holder's last name.
        'billtostreet'=>$_POST['address1'] . ' ' . $_POST['address2'], 		// The cardholder's street address (number and street name).  150 char max
        'billtocity'=>$_POST['city'], 			// Bill to city.  45 char max
        'billtostate'=>$_POST['state'], 			// Bill to state.  
        'billtozip'=>$_POST['zip'], 			// Account holder's 5 to 9 digit postal code.  9 char max.  No dashes, spaces, or non-numeric characters
        'billtocountry'=>DEFAULT_COUNTRY_ID, 		// Bill to Country Code.
        'shiptofirstname'=>$_POST['fname'], 		// Ship to first name.  30 char max
        'shiptomiddlename'=>'', 	// Ship to middle name. 30 char max
        'shiptolastname'=>$_POST['lname'], 		// Ship to last name.  30 char max
        'shiptostreet'=>$_POST['address1'] . ' ' . $_POST['address2'], 		// Ship to street address.  150 char max
        'shiptocity'=>$_POST['city'], 					// Ship to city.
        'shiptostate'=>$_POST['state'], 			// Ship to state.
        'shiptozip'=>$_POST['zip'], 			// Ship to postal code.  10 char max
        'shiptocountry'=>DEFAULT_COUNTRY_ID, 		// Ship to country code.
        'origid'=>'', 				// Required by some transaction types.  ID of the original transaction referenced.  The PNREF parameter returns this ID, and it appears as the Transaction ID in PayPal Manager reports.  
        'custref'=>'', 				// 
        'custcode'=>'', 			// 
        'custip'=>'', 				// 
        'invnum'=>'', 				// 
        'ponum'=>'', 				// 
        'starttime'=>'', 			// For inquiry transaction when using CUSTREF to specify the transaction.
        'endtime'=>'', 				// For inquiry transaction when using CUSTREF to specify the transaction.
        'securetoken'=>'', 			// Required if using secure tokens.  A value the Payflow server created upon your request for storing transaction data.  32 char
        'partialauth'=>'', 			// Required for partial authorizations.  Set to Y to submit a partial auth.    
        'authcode'=>'' 			// Rrequired for voice authorizations.  Returned only for approved voice authorization transactions.  AUTHCODE is the approval code received over the phone from the processing network.  6 char max
        );

// Pass data into class for processing with PayPal and load the response array into $PayPalResult
$PayPalResult = $PayPal->ProcessTransaction($PayPalRequestData);


if (strtoupper($PayPalResult['RESPMSG']) == 'APPROVED') {

    try {
        $stmt = $etdb->prepare("UPDATE " . TABLE_ORDER . " SET paypal_ref=:paypal_ref, paypal_response=:paypal_response,modified_at=:modified_at WHERE id=:o_id ");
        
        $stmt->bindValue(':o_id', $order['id'], PDO::PARAM_INT);      
        $stmt->bindValue(':modified_at', date("Y-m-d H:i:s"));
        $stmt->bindValue(':paypal_ref', $PayPalResult['PNREF'], PDO::PARAM_STR);
        $stmt->bindValue(':paypal_response', json_encode(maskPaypalResultInfo($PayPalResult)), PDO::PARAM_STR);
        
        $stmt->execute();
        $successMsg[] = 'Payment has been recorded.';
        
        $isPaymentPayPalOK = true;
        
    } catch(PDOException $ex) {            
        $errorMsg['paypal'] = "Server error occured! Try again later."; 
        $debugMsg['paypal'] = "Server error occured! Try again later. " . $ex->getMessage() . $prep . json_encode($PayPalResult); 
    }
            
} else {

    try {
        $stmt = $etdb->prepare("UPDATE " . TABLE_ORDER . " paypal_response=:paypal_response,modified_at=:modified_at WHERE id=:o_id ");
        
        $stmt->bindValue(':o_id', $order['id'], PDO::PARAM_INT);      
        $stmt->bindValue(':modified_at', date("Y-m-d H:i:s"));
        $stmt->bindValue(':paypal_response', json_encode($PayPalResult), PDO::PARAM_STR);
        
        $stmt->execute();
            
        $errorMsg['paypal'] = "Error encountered while processing payment. Try again later."; 
        $debugMsg['paypal'] = "Error encountered while processing payment. " . json_encode($PayPalResult);  
    } catch(PDOException $ex) {            
        $errorMsg['paypal'] = $PayPalResult['RESPMSG'];
        $debugMsg['paypal'] = "Server error occured! Try again later. " . $ex->getMessage() . $prep . json_encode($PayPalResult); 
    }
    
}
