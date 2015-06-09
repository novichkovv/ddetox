<?php
if (!defined('IN_PAGE')) {
    header("Location: /");
}

if(isset($_POST['email']) || !trim($_POST['email']) == '' || (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)))
{
	$name = $_POST['fname'] . " " . $_POST['lname'];
	$password = md5($_POST['password']);
			
	$statement = $etdb->prepare("select * from login_users where email=:email");
		$statement->execute(array(':email' => $_POST[email]));
		$count=$statement->rowCount();
		  if($count>0){		
				$prep = "UPDATE " . TABLE_LOGIN_USERS . " SET user_level=:user_level, username=:username, name=:name, password=:password WHERE email=:email";
				$stmt = $etdb->prepare($prep);
				
				$stmt->bindValue(':user_level', $products[$selectedProductID]['permission'], PDO::PARAM_STR);
				$stmt->bindValue(':username',  $_POST['username'], PDO::PARAM_STR);
				$stmt->bindValue(':name',  $name, PDO::PARAM_STR);
				$stmt->bindValue(':email',  $_POST['email'], PDO::PARAM_STR);
				$stmt->bindValue(':password',  $password, PDO::PARAM_STR);
									 
				$stmt->execute();
				$affected_rows = $stmt->rowCount();
				$debugMsg[] = 'API Order has been recorded.';
		   }
	   else {
			
			$prep = "INSERT INTO " . TABLE_LOGIN_USERS . 
							"(user_level, username, name, email, password)
							VALUES(
							:user_level,:username,:name,:email,:password) ";
			$stmt = $etdb->prepare($prep);
			
			$stmt->bindValue(':user_level', $products[$selectedProductID]['permission'], PDO::PARAM_STR);
			$stmt->bindValue(':username',  $_POST['username'], PDO::PARAM_STR);
			$stmt->bindValue(':name',  $name, PDO::PARAM_STR);
			$stmt->bindValue(':email',  $_POST['email'], PDO::PARAM_STR);
			$stmt->bindValue(':password',  $password, PDO::PARAM_STR);
								 
			$stmt->execute();
			$affected_rows = $stmt->rowCount();
			$debugMsg[] = 'API Order has been recorded.';
	   }
}
?>