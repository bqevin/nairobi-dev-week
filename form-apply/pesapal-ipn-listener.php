<?php
include_once('OAuth.php');
require_once 'db/Class.Database.php';
$consumer_key = 'DnvpmbMYmpiF4TbM4+JbWTzGk5zG/8iV';
$consumer_secret = 'ajHrtXRtcodaQbY2uXivSy4DXE8=';
$statusrequestAPI = 'https://www.pesapal.com/API/QueryPaymentStatus';
// $statusrequestAPI = 'https://www.pesapal.com/API/QueryPaymentStatus';

// Parameters sent to you by PesaPal IPN
$pesapalNotification=$_GET['pesapal_notification_type'];
$pesapalTrackingId=$_GET['pesapal_transaction_tracking_id'];
$pesapal_merchant_reference=$_GET['pesapal_merchant_reference'];

if($pesapalNotification=="CHANGE" && $pesapalTrackingId!='')
{
   $token = $params = NULL;
   $consumer = new OAuthConsumer($consumer_key, $consumer_secret);

   //get transaction status
   $request_status = OAuthRequest::from_consumer_and_token($consumer, $token, "GET", $statusrequestAPI, $params);
   $request_status->set_parameter("pesapal_merchant_reference", $pesapal_merchant_reference);
   $request_status->set_parameter("pesapal_transaction_tracking_id",$pesapalTrackingId);
   $signature_method = new OAuthSignatureMethod_HMAC_SHA1();
   $request_status->sign_request($signature_method, $consumer, $token);

   $ch = curl_init();
   curl_setopt($ch, CURLOPT_URL, $request_status);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
   curl_setopt($ch, CURLOPT_HEADER, 1);
   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
   if(defined('CURL_PROXY_REQUIRED')) if (CURL_PROXY_REQUIRED == 'True')
   {
      $proxy_tunnel_flag = (defined('CURL_PROXY_TUNNEL_FLAG') && strtoupper(CURL_PROXY_TUNNEL_FLAG) == 'FALSE') ? false : true;
      curl_setopt ($ch, CURLOPT_HTTPPROXYTUNNEL, $proxy_tunnel_flag);
      curl_setopt ($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
      curl_setopt ($ch, CURLOPT_PROXY, CURL_PROXY_SERVER_DETAILS);
   }

   $response = curl_exec($ch);
   $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
   $raw_header  = substr($response, 0, $header_size - 4);
   $headerArray = explode("\r\n\r\n", $raw_header);
   $header      = $headerArray[count($headerArray) - 1];

   //transaction status
   $elements = preg_split("/=/",substr($response, $header_size));
   $status = $elements[1];

   curl_close ($ch);
   
  //Save response
  $Db = new Database('localhost', 'ndw', 'root', '');
  $updated = $Db->executeQuery("UPDATE transactions SET status = '$status' WHERE pesapal_tracking_id = '$pesapalTrackingId'")->wasUpdated();
  //$updated = $Db->executeQuery('UPDATE transactions SET status = $status WHERE pesapal_tracking_id = $pesapalTrackingId')->wasUpdated(); 

  $resp="pesapal_notification_type=$pesapalNotification&pesapal_transaction_tracking_id=$pesapalTrackingId&pesapal_merchant_reference=$pesapal_merchant_reference";
  ob_start();
  echo $resp;
  ob_flush();
  exit;
}
?>