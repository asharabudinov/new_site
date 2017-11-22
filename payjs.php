<?

	$amount = (float) $_GET['amount'];
	$description = $_GET['description'];
	
	if($amount == 0) {
		echo '//need amount field';
		exit();
	}
	
	if(strlen($description) < 3) {
		echo '//need description field. min lenght 3';
		exit();
	}
	
	$data = array(
		'action'         => 'pay',
		'amount'         => $amount,
		'currency'       => 'UAH',
		'description'    => $description,
		'order_id'       => time(),
		'version'        => '3',
		'sandbox' => 1, //TODO delete row for real payments
		'server_url' => 'https://silkepil.com.ua/payment-result'
	);
	
	//https://www.liqpay.ua/documentation/api/aquiring/widget/doc
	require_once('LiqPay.php');
	$liqpay = new LiqPay('i79786110481', '8g5zBece2D1usLukfB6qFafuTIg5BMrA5l1Gwo9x');
	$html = $liqpay->cnb_form($data);

?>
(function() {
	$('body').append('<div class="js_silkEpil_pay_container" style="display:none"><?=$html?></div>');
}());