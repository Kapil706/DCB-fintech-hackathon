<?php
$name=$_POST['loc'];
$loc_array= Array($name);		//data validated in foreach. 
$api_key="dd514825ee0343c2b36170533170909";		//should be embedded in your code, so no data validation necessary, otherwise if(strlen($api_key)!=24)
$date="2017-07-20";					//validated as $date_safe
$enddate="2017-07-27";				//optional included in example, validated as $enddate_safe

$loc_safe=Array();
foreach($loc_array as $loc){
	$loc_safe[]= urlencode($loc);
}
$loc_string=implode(",", $loc_safe);
$date_safe=urlencode($date);		//this SHOULD return the same value, but if malformed this will correct
$enddate_safe=urlencode($enddate);		//this SHOULD return the same value, but if malformed this will correct

$premiumurl=sprintf('http://api.worldweatheronline.com/premium/v1/weather.ashx?key=%s&q=%s&date=%s&format=xml', 
	$api_key, $loc_string, $date_safe);



$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $premiumurl);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER , 1); 
$xml_response =curl_exec($ch);
curl_close($ch);

$xml = simplexml_load_string($xml_response);

$xml = json_decode(json_encode($xml),1);

$sum=0;
for($i=0;$i<12;$i++){
$temp=(float)($xml["ClimateAverages"]["month"][$i]['absMaxTemp']);
$sum=$sum+$temp;
}
$savg=$sum/12;

echo number_format((float)$savg, 2, '.', '');



?>
