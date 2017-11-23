<?
	//https://www.liqpay.ua/documentation/api/callback
	ob_start();
	
	$private_key = '8g5zBece2D1usLukfB6qFafuTIg5BMrA5l1Gwo9x';
	
	$data = $_POST['data'];
	$signature = $_POST['signature'];
	
	$sign = base64_encode(sha1($private_key.$data.$private_key,1));
	
	if($signature === $sign) {
		$data = base64_decode($data);
		var_dump($data);
	} else {
		echo 'Signatures is not equal';
	}
	//var_dump($_POST);
	
	$result = ob_get_clean();
	echo file_put_contents ('1.txt', $result);
?>