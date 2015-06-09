<?php
if (!defined('IN_PAGE')) {
    header("Location: /");
}

function getUserIP()
{    
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];
    
    $tmp = array();
    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $tmp[] = $client;
    }
    if(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $tmp[] = $forward;
    }    
    $tmp[] = $remote;
    
    $ip = implode('|', $tmp);

    return $ip;
}


function getOrder($id)
{
    global $etdb;
    $obj = false;
    
    $stmt = $etdb->prepare('SELECT *, DATE_FORMAT(created_at, "%e %b %Y %H:%i") as date_nice  FROM ' . TABLE_ORDER . " WHERE id=:id ");
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $obj = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($obj) {
    }
    return $obj;
}

function getNextPendingSubscriptionOrder()
{
    global $etdb;
    $obj = false;
    $today = date('Y-m-d');
    $sql = 'SELECT *, DATE_FORMAT(created_at, "%e %b %Y %H:%i") as date_nice FROM ' . TABLE_ORDER . " WHERE paypal_ref != '' AND subscription_start != '0000-00-00' AND subscription_start <= '$today' AND next_payment != '0000-00-00' AND next_payment <= '$today' AND subscription_enabled = '1'  " . 
				" ORDER BY next_payment, subscription_start, created_at, id LIMIT 1 ";	

	foreach ($etdb->query($sql) as $row) {	
		$row['api_orders'] = getApiOrders($row['id']);
		return $row;
	}
    return false;
}


function getApiOrders($id)
{	
	global $etdb;
    
	$rows = array();
	$sql = 'SELECT * FROM ' . TABLE_ORDER_API . ' WHERE order_id = ' . $id . ' ORDER BY created_at ASC';
	foreach ($etdb->query($sql) as $row) {
		$rows[] = $row;
	}	
	return $rows;
}


function updateOrderPaypalRef($id, $paypalRef)
{
    
}

function updateNextPaymentDate($order, $nextDate)
{
	global $etdb;
	try {
		$stmt = $etdb->prepare("UPDATE " . TABLE_ORDER . " SET next_payment=:next_payment, modified_at=:modified_at WHERE id=:o_id ");

		$stmt->bindValue(':o_id', $order['id'], PDO::PARAM_INT);      
		$stmt->bindValue(':modified_at', date("Y-m-d H:i:s"));
		$stmt->bindValue(':next_payment', $nextDate);
		
		$stmt->execute();
	}  catch(PDOException $ex) {            
        return false;
    }
	
	return true;
}

function formatPrice($price)
{
	return number_format($price, 2);
}

function validateDate($d)
{
	echo $d;
	if ($d == '0000-00-00') return false;
	return checkdate (date('m', $d) , date('d', $d)  , date('Y', $d)  );
}

function getNextMonthDate($d)
{
	$yyyy = substr($d, 0, 4);
	$mm = substr($d, 5, 2);
	$dd = substr($d, 8, 2);
	
	$nextMonthDate = date('Y-m-d', mktime(1,1,1, $mm+1, $dd, $yyyy));
	return $nextMonthDate;
}

function maskCCInfo($info)
{
	$_REQUEST_FILTERED = $info;
	
	$tmpL = strlen($info['cc_number']);
	$_REQUEST_FILTERED['cc_number'] = substr($info['cc_number'], -4);
	$_REQUEST_FILTERED['cc_number'] = str_pad($_REQUEST_FILTERED['cc_number'], $tmpL, 'x', STR_PAD_LEFT);
	
	$tmpL = strlen($info['cc_cvv']);
	$_REQUEST_FILTERED['cc_cvv'] = '';
	$_REQUEST_FILTERED['cc_cvv'] = str_pad($_REQUEST_FILTERED['cc_cvv'], $tmpL, 'x', STR_PAD_LEFT);
	
	return $_REQUEST_FILTERED;
}

function maskPaypalResultInfo($info)
{
	$_REQUEST_FILTERED = $info;
	
	$_REQUEST_FILTERED['RAWREQUEST'] = 'FILTERED';
	
	return $_REQUEST_FILTERED;

}

function populateFormDataFromOrder($order)
{
	global $_POST;
	
	$_POST['fname'] = $order['firstname'];
	$_POST['lname'] = $order['lastname'];
	$_POST['email'] = $order['email'];
	$_POST['address1'] = $order['address1'];
	$_POST['address2'] = $order['address2'];
	$_POST['city'] = $order['city'];
	$_POST['state'] = $order['state'];
	$_POST['zip'] = $order['zip'];
	$_POST['phone'] = $order['phone'];
	$_POST['check_terms'] = 'on';
	if ($order['shipping_option'] == 'Expedite Shipping') $_POST['shipping'] = 'on';
	
	$_POST['product_id'] = $order['product_id'];
	$_POST['product_desc'] = $order['product_desc'];
	$_POST['product_amount'] = $order['product_amount'];
	$_POST['shipping_amount'] = $order['shipping_amount'];
	$_POST['total_amount'] = $order['total_amount'];
}




function time_elapsed($comment = '') 
{
    static $time_elapsed_last = null;
    static $time_elapsed_start = null;

    // $unit="s"; $scale=1000000; // output in seconds
    // $unit="ms"; $scale=1000; // output in milliseconds
    $unit="s"; $scale=1000000; // output in microseconds

    $now = microtime(true);

    if ($time_elapsed_last != null) {
        echo "\n";
        //echo '<!-- ';
        echo $comment . ' Time elapsed: ';
        echo round(($now - $time_elapsed_last)*1000000)/$scale;
        echo ' ' . $unit . ', total time: ';
        echo round(($now - $time_elapsed_start)*1000000)/$scale;
        echo ' ' . $unit;
        // echo "-->";
        echo "\n";
    } else {
        $time_elapsed_start=$now;
    }

    $time_elapsed_last = $now;
}   