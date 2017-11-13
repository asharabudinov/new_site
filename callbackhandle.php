<?php
	$responses = array();

	//amo
	//���������������� ����������
	$responsible_user_id = 7292136; //id �������������� �� ������, ��������, ��������
	$lead_name = '������ � �����'; //�������� ����������� ������
	$lead_status_id = '11331793'; //id ����� ������, ���� �������� ������
	$contact_name = $_POST['name']; //�������� ������������ ��������
	$contact_phone = $_POST['phone']; //������� ��������
	$contact_email = $_POST['email']; //����� ��������
	//�����������
	$user=array(
		'USER_LOGIN'=>'info@silkepil.com.ua', #��� ����� (����������� �����)
		'USER_HASH'=>'14e59bf0e03f313910a00ced18f3e71a' #��� ��� ������� � API (�������� � ������� ������������)
	);
	$subdomain='silkepil';
	#��������� ������ ��� �������
	$link='https://'.$subdomain.'.amocrm.ru/private/api/auth.php?type=json';
	$curl=curl_init(); #��������� ���������� ������ cURL
	#������������� ����������� ����� ��� ������ cURL
	curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
	curl_setopt($curl,CURLOPT_USERAGENT,'amoCRM-API-client/1.0');
	curl_setopt($curl,CURLOPT_URL,$link);
	curl_setopt($curl,CURLOPT_POST,true);
	curl_setopt($curl,CURLOPT_POSTFIELDS,http_build_query($user));
	curl_setopt($curl,CURLOPT_HEADER,false);
	curl_setopt($curl,CURLOPT_COOKIEFILE,dirname(__FILE__).'/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
	curl_setopt($curl,CURLOPT_COOKIEJAR,dirname(__FILE__).'/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
	curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,0);
	curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,0);
	$out=curl_exec($curl); #���������� ������ � API � ��������� ����� � ����������
	$code=curl_getinfo($curl,CURLINFO_HTTP_CODE); #������� HTTP-��� ������ �������
	curl_close($curl);  #��������� ����� cURL
	$Response=json_decode($out,true);
	$responses['auth'] = $Response;
	//echo '<b>�����������:</b>'; echo '<pre>'; print_r($Response); echo '</pre>';
	//�������� ������ ��������
	$link='https://'.$subdomain.'.amocrm.ru/private/api/v2/json/accounts/current'; #$subdomain ��� ��������� ����
	$curl=curl_init(); #��������� ���������� ������ cURL
	#������������� ����������� ����� ��� ������ cURL
	curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
	curl_setopt($curl,CURLOPT_USERAGENT,'amoCRM-API-client/1.0');
	curl_setopt($curl,CURLOPT_URL,$link);
	curl_setopt($curl,CURLOPT_HEADER,false);
	curl_setopt($curl,CURLOPT_COOKIEFILE,dirname(__FILE__).'/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
	curl_setopt($curl,CURLOPT_COOKIEJAR,dirname(__FILE__).'/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
	curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,0);
	curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,0);
	$out=curl_exec($curl); #���������� ������ � API � ��������� ����� � ����������
	$code=curl_getinfo($curl,CURLINFO_HTTP_CODE);
	curl_close($curl);
	$Response=json_decode($out,true);
	$responses['auth2'] = $Response;
	$account=$Response['response']['account'];
	//echo '<b>������ ��������:</b>'; echo '<pre>'; print_r($Response); echo '</pre>';
	//�������� ������������ ����
	$amoAllFields = $account['custom_fields']; //��� ����
	$amoConactsFields = $account['custom_fields']['contacts']; //���� ���������
	//echo '<b>���� �� ���:</b>'; echo '<pre>'; print_r($amoConactsFields); echo '</pre>';
	//��������� ������ � ������������ ������ ��������
	//����������� ���� ���:
	$sFields = array_flip(array(
			'PHONE', //�������. ��������: WORK, WORKDD, MOB, FAX, HOME, OTHER
			'EMAIL' //Email. ��������: WORK, PRIV, OTHER
		)
	);
	//����������� id ���� ����� �� ���� ���
	foreach($amoConactsFields as $afield) {
		if(isset($sFields[$afield['code']])) {
			$sFields[$afield['code']] = $afield['id'];
		}
	}
	//��������� ������
	$leads['request']['leads']['add']=array(
		array(
			'name' => $lead_name,
			'status_id' => $lead_status_id, //id �������
			'responsible_user_id' => $responsible_user_id, //id �������������� �� ������
			//'date_create'=>1298904164, //optional
			//'price'=>300000,
			//'tags' => 'Important, USA', #����
			//'custom_fields'=>array()
		)
	);
	$link='https://'.$subdomain.'.amocrm.ru/private/api/v2/json/leads/set';
	$curl=curl_init(); #��������� ���������� ������ cURL
	#������������� ����������� ����� ��� ������ cURL
	curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
	curl_setopt($curl,CURLOPT_USERAGENT,'amoCRM-API-client/1.0');
	curl_setopt($curl,CURLOPT_URL,$link);
	curl_setopt($curl,CURLOPT_CUSTOMREQUEST,'POST');
	curl_setopt($curl,CURLOPT_POSTFIELDS,json_encode($leads));
	curl_setopt($curl,CURLOPT_HTTPHEADER,array('Content-Type: application/json'));
	curl_setopt($curl,CURLOPT_HEADER,false);
	curl_setopt($curl,CURLOPT_COOKIEFILE,dirname(__FILE__).'/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
	curl_setopt($curl,CURLOPT_COOKIEJAR,dirname(__FILE__).'/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
	curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,0);
	curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,0);
	$out=curl_exec($curl); #���������� ������ � API � ��������� ����� � ����������
	$code=curl_getinfo($curl,CURLINFO_HTTP_CODE);
	$Response=json_decode($out,true);
	$responses['leads_set'] = $Response;
	//echo '<b>����� ������:</b>'; echo '<pre>'; print_r($Response); echo '</pre>';
	if(is_array($Response['response']['leads']['add']))
		foreach($Response['response']['leads']['add'] as $lead) {
			$lead_id = $lead["id"]; //id ����� ������
		};
	//��������� ������ - �����
	//���������� ��������
	$contact = array(
		'name' => $contact_name,
		'linked_leads_id' => array($lead_id), //id ������
		'responsible_user_id' => $responsible_user_id, //id ��������������
		'custom_fields'=>array(
			array(
				'id' => $sFields['PHONE'],
				'values' => array(
					array(
						'value' => $contact_phone,
						'enum' => 'MOB'
					)
				)
			),
			array(
				'id' => $sFields['EMAIL'],
				'values' => array(
					array(
						'value' => $contact_email,
						'enum' => 'WORK'
					)
				)
			)
		)
	);
	$set['request']['contacts']['add'][]=$contact;
	#��������� ������ ��� �������
	$link='https://'.$subdomain.'.amocrm.ru/private/api/v2/json/contacts/set';
	$curl=curl_init(); #��������� ���������� ������ cURL
	#������������� ����������� ����� ��� ������ cURL
	curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
	curl_setopt($curl,CURLOPT_USERAGENT,'amoCRM-API-client/1.0');
	curl_setopt($curl,CURLOPT_URL,$link);
	curl_setopt($curl,CURLOPT_CUSTOMREQUEST,'POST');
	curl_setopt($curl,CURLOPT_POSTFIELDS,json_encode($set));
	curl_setopt($curl,CURLOPT_HTTPHEADER,array('Content-Type: application/json'));
	curl_setopt($curl,CURLOPT_HEADER,false);
	curl_setopt($curl,CURLOPT_COOKIEFILE,dirname(__FILE__).'/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
	curl_setopt($curl,CURLOPT_COOKIEJAR,dirname(__FILE__).'/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
	curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,0);
	curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,0);
	$out=curl_exec($curl); #���������� ������ � API � ��������� ����� � ����������
	$code=curl_getinfo($curl,CURLINFO_HTTP_CODE);
	CheckCurlResponse($code);
	$Response=json_decode($out,true);
	$responses['add_contact'] = $Response;
	//���������� �������� - �����
	
	echo json_encode($responses);
?>