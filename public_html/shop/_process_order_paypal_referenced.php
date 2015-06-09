<?php

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
		
        'amt'=>$order['total_amount'], 					// Required.  Amount of the transaction.  Must have 2 decimal places. 
        'dutyamt'=>'', 				//
        'freightamt'=>$order['shipping_amount'], 			//
        'taxamt'=>'', 				//
        'taxexempt'=>'', 			// 
        'comment1'=>'', 			// Merchant-defined value for reporting and auditing purposes.  128 char max
        'comment2'=>'', 			// Merchant-defined value for reporting and auditing purposes.  128 char max
        'recurring'=>'', 			// Identifies the transaction as recurring.  One of the following values:  Y = transaction is recurring, N = transaction is not recurring. 
        'swipe'=>'', 				// Required for card-present transactions.  Used to pass either Track 1 or Track 2, but not both.
        'orderid'=>$order['id'] .'-'. date('Ymd'), 				// Checks for duplicate order.  If you pass orderid in a request and pass it again in the future the response returns DUPLICATE=2 along with the orderid

        'origid'=>$order['paypal_ref'], 				// Required by some transaction types.  ID of the original transaction referenced.  The PNREF parameter returns this ID, and it appears as the Transaction ID in PayPal Manager reports.  
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
var_dump($PayPalResult);

if (strtoupper($PayPalResult['RESPMSG']) == 'APPROVED') {

    try {
        
        $successMsg[] = 'Payment has been recorded.';
        
        $isPaymentPayPalOK = true;
        
    } catch(PDOException $ex) {            
        $errorMsg['paypal'] = "Server error occured! Try again later."; 
        $debugMsg['paypal'] = "Server error occured! Try again later. " . $ex->getMessage() . $prep . json_encode($PayPalResult); 
    }
            
} else {
    
}
