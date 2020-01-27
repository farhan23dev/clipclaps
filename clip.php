<?php
$uuid = gen_uuid();
echo "[+] Nomor : ";
$phone = trim(fgets(STDIN));
$verify = verify($phone, $uuid);
echo "$verify \n\n";
echo "[+] Otp : ";
$otp = trim(fgets(STDIN));
$login = login($phone, $otp, $uuid);
$js = json_decode($login,true);
$token = $js['data']['token'];
$uid = $js['data']['principal']['userid'];
echo "$login \n \n";
$nama = nama();
$js1 = json_decode($nama,true);
$first = $js1['results']['0']['name']['first'];
$last = $js1['results']['0']['name']['last'];
// $uprofile = update($first, $uid, $token, $last, $uuid);
// echo "$uprofile \n\n";
echo "Reff ? : ";
$refferal = trim(fgets(STDIN));
$acak  = function($array) {return $array[array_rand($array)];};
$diacaklah = ['9U9LQ6AR', "$refferal"];
$reff =  $acak($diacaklah);

$redeem = redeem($token, $uid, $reff, $uuid);
echo "$redeem \n";
function verify($phone, $uuid) {
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, 'https://api.cc.clipclaps.tv/sms/verify');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, '{"areaCode":"1","phone":"'.$phone.'","userid":"0","verifyType":"4","token":""}');

  $headers = array();
  $headers[] = 'Host: api.cc.clipclaps.tv';
  $headers[] = 'Charset: UTF-8';
  $headers[] = 'Device-Type: 2';
  $headers[] = 'Api-Version: 2';
  $headers[] = 'External-Version: 1.6.2';
  $headers[] = 'Device: 9';
  $headers[] = 'Version: 38';
  $headers[] = 'Timezone: 17';
  $headers[] = 'Uuid: '.$uuid.'';
  $headers[] = 'Cache-Control: no-cache';
  $headers[] = 'Content-Type: application/json; charset=UTF-8';
  $headers[] = 'Content-Length: 78';
  $headers[] = 'Accept-Encoding: gzip';
  $headers[] = 'User-Agent: okhttp/4.2.1';
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

  $result = curl_exec($ch);
  return $result;
}
function login($phone, $otp, $uuid) {
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, 'https://api.cc.clipclaps.tv/account/login');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, '{"areaCode":"1","verifyCode":"'.$otp.'","phone":"'.$phone.'"}');

  $headers = array();
  $headers[] = 'Host: api.cc.clipclaps.tv';
  $headers[] = 'Charset: UTF-8';
  $headers[] = 'Device-Type: 2';
  $headers[] = 'Api-Version: 2';
  $headers[] = 'External-Version: 1.6.2';
  $headers[] = 'Device: 9';
  $headers[] = 'Version: 38';
  $headers[] = 'Timezone: 17';
  $headers[] = 'Uuid: '.$uuid.'';
  $headers[] = 'Cache-Control: no-cache';
  $headers[] = 'Content-Type: application/json; charset=UTF-8';
  $headers[] = 'Content-Length: 57';
  $headers[] = 'Accept-Encoding: gzip';
  $headers[] = 'User-Agent: okhttp/4.2.1';
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

  $result = curl_exec($ch);
  return $result;
}
// function update($first, $uid, $token, $last, $uuid) {
//   $ch = curl_init();
//
//   curl_setopt($ch, CURLOPT_URL, 'https://api.cc.clipclaps.tv/user/baseinfo/update');
//   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//   curl_setopt($ch, CURLOPT_POST, 1);
//   curl_setopt($ch, CURLOPT_POSTFIELDS, '{"birthday":"-1078066048","badge":"1","firstname":"'.$first.'","gender":"1","userid":"'.$uid.'","headpic":"","token":"'.$token.'","lastname":".$last."}');
//
//   $headers = array();
//   $headers[] = 'Host: api.cc.clipclaps.tv';
//   $headers[] = 'Charset: UTF-8';
//   $headers[] = 'Device-Type: 2';
//   $headers[] = 'Api-Version: 2';
//   $headers[] = 'External-Version: 1.6.2';
//   $headers[] = 'Device: 9';
//   $headers[] = 'Version: 38';
//   $headers[] = 'Timezone: 17';
//   $headers[] = 'Uuid: '.$uuid.'';
//   $headers[] = 'Cache-Control: no-cache';
//   $headers[] = 'Content-Type: application/json; charset=UTF-8';
//   $headers[] = 'Content-Length: 212';
//   $headers[] = 'Accept-Encoding: gzip';
//   $headers[] = 'User-Agent: okhttp/4.2.1';
//   curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
//
//   $result = curl_exec($ch);
//   return $result;
// }
function redeem($token, $uid, $reff, $uuid) {
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, 'https://api.cc.clipclaps.tv/reward/redeem');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, '{"redeemCode":"'.$reff.'","userid":"'.$uid.'","token":"'.$token.'"}');

  $headers = array();
  $headers[] = 'Host: api.cc.clipclaps.tv';
  $headers[] = 'Charset: UTF-8';
  $headers[] = 'Device-Type: 2';
  $headers[] = 'Api-Version: 2';
  $headers[] = 'External-Version: 1.6.2';
  $headers[] = 'Device: 9';
  $headers[] = 'Version: 38';
  $headers[] = 'Timezone: 17';
  $headers[] = 'Uuid: '.$uuid.'';
  $headers[] = 'Cache-Control: no-cache';
  $headers[] = 'Content-Type: application/json; charset=UTF-8';
  $headers[] = 'Content-Length: 102';
  $headers[] = 'Accept-Encoding: gzip';
  $headers[] = 'User-Agent: okhttp/4.2.1';
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

  $result = curl_exec($ch);
  return $result;
}
function nama(){
  $ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, 'https://randomuser.me/api/?nat=us');	//Evoucher
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$result = curl_exec($ch);
	return $result;
}
function gen_uuid() {
    return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
        mt_rand( 0, 0xffff ),
        mt_rand( 0, 0x0fff ) | 0x4000,
        mt_rand( 0, 0x3fff ) | 0x8000,
        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
    );
}
?>