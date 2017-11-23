<?
	//https://www.liqpay.ua/documentation/api/callback
	ob_start();
	var_dump($_GET);
	var_dump($_POST);
	$result = ob_get_clean();
	echo file_put_contents ('1.txt', $result);
?>