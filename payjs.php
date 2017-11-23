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
	
	//$('head').append('<script src="https://silkepil.com.ua/pay.js?amount=1.2&description='+encodeURI('Дескріпш який баче юзер коли проплачує')+'&time='+Date.now()+'"></script>');
	//https://www.liqpay.ua/documentation/api/aquiring/widget/doc
	require_once('LiqPay.php');
	$liqpay = new LiqPay('i79786110481', '8g5zBece2D1usLukfB6qFafuTIg5BMrA5l1Gwo9x');
	$html = $liqpay->cnb_form($data);

	$formId = time();
?>
(function() {
	var formBase64 = '<?=base64_encode($html)?>';
	$('body').append('<div class="js_silkEpil_pay_container_<?=$formId?>" style="display:none">'+atob(formBase64)+'</div>');
	$('.js_silkEpil_pay_container_<?=$formId?> form').submit();
}());