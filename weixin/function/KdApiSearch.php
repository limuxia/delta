<?php
//����ID
defined('EBusinessID') or define('EBusinessID', 1259586);
//���̼���˽Կ��������ṩ��ע�Ᵽ�ܣ���Ҫй©
defined('AppKey') or define('AppKey', '5bb66e78-bea5-4b95-90d6-2372c1f310f1');
//����url
defined('ReqURL') or define('ReqURL', 'http://api.kdniao.cc/Ebusiness/EbusinessOrderHandle.aspx');
 
/**
 * Json��ʽ ��ѯ���������켣
 */
function getOrderTracesByJson($shipperCode,$logisticCode){
	$requestData= "{'OrderCode':'','ShipperCode':'$shipperCode','LogisticCode':'$logisticCode'}";
	
	$datas = array(
        'EBusinessID' => EBusinessID,
        'RequestType' => '1002',
        'RequestData' => urlencode($requestData) ,
        'DataType' => '2',
    );
    $datas['DataSign'] = encrypt($requestData, AppKey);
	$result=sendPost(ReqURL, $datas);	
	
	//���ݹ�˾ҵ�����ص���Ϣ......
	
	return $result;
}

/**
 * XML��ʽ ��ѯ���������켣
 */
function getOrderTracesByXml(){
	$requestData= "<?xml version=\"1.0\" encoding=\"utf-8\" ?>".
						"<Content>".
						"<OrderCode></OrderCode>".
						"<ShipperCode>SF</ShipperCode>".
						"<LogisticCode>589707398027</LogisticCode>".
						"</Content>";
	
	$datas = array(
        'EBusinessID' => EBusinessID,
        'RequestType' => '1002',
        'RequestData' => urlencode($requestData) ,
        'DataType' => '1',
    );
    $datas['DataSign'] = encrypt($requestData, AppKey);
	$result=sendPost(ReqURL, $datas);	
	
	//���ݹ�˾ҵ�����ص���Ϣ......
	
	return $result;
}
 
/**
 *  post�ύ���� 
 * @param  string $url ����Url
 * @param  array $datas �ύ������ 
 * @return url��Ӧ���ص�html
 */
function sendPost($url, $datas) {
    $temps = array();	
    foreach ($datas as $key => $value) {
        $temps[] = sprintf('%s=%s', $key, $value);		
    }	
    $post_data = implode('&', $temps);
    $url_info = parse_url($url);
	if(!isset($url_info['port'])|| $url_info['port']=='')
	{
		$url_info['port']=80;	
	}
	//echo $url_info['port'];
    $httpheader = "POST " . $url_info['path'] . " HTTP/1.0\r\n";
    $httpheader.= "Host:" . $url_info['host'] . "\r\n";
    $httpheader.= "Content-Type:application/x-www-form-urlencoded\r\n";
    $httpheader.= "Content-Length:" . strlen($post_data) . "\r\n";
    $httpheader.= "Connection:close\r\n\r\n";
    $httpheader.= $post_data;
    $fd = fsockopen($url_info['host'], $url_info['port']);
    fwrite($fd, $httpheader);
    $gets = "";
	$headerFlag = true;
	while (!feof($fd)) {
		if (($header = @fgets($fd)) && ($header == "\r\n" || $header == "\n")) {
			break;
		}
	}
    while (!feof($fd)) {
		$gets.= fread($fd, 128);
    }
    fclose($fd);  
    
    return $gets;
}

/**
 * ����Signǩ������
 * @param data ����   
 * @param appkey Appkey
 * @return DataSignǩ��
 */
function encrypt($data, $appkey) {
    return urlencode(base64_encode(md5($data.$appkey)));
}

?>