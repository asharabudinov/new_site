<?
	//https://www.liqpay.ua/documentation/api/callback
	ob_start();
	
	$private_key = '8g5zBece2D1usLukfB6qFafuTIg5BMrA5l1Gwo9x';
	
	$data = $_POST['data'];
	$signature = $_POST['signature'];
	
	$sign = base64_encode(sha1($private_key.$data.$private_key,1));
	
	if($signature === $sign) {
		$data = json_decode(base64_decode($data), true);
		var_dump($data);
		$strToCrm = 'Status:'.$data['status'].' Amount:'.$data['amount'].' OrderId:'.$data['order_id'].' Description:'.$data['description'];
	} else {
		echo 'Signatures is not equal';
	}
	
	$result = ob_get_clean();
	
	$beforPayments = file_get_contents('payments.txt');
	file_put_contents('payments.txt', $beforPayments."\n".$strToCrm);
	
	require_once('Helper.php');
	Helper::sendToCrm('7292136', 'Покупка', '11331793', $strToCrm, 'none', 'none');
?>