<?php
	require_once 'db/Class.Database.php';

	$reference = null;
	$pesapal_tracking_id = null;
	if(isset($_GET['pesapal_merchant_reference']))
	{
		$reference = $_GET['pesapal_merchant_reference'];
	}
	
	if(isset($_GET['pesapal_transaction_tracking_id']))
	{
		$pesapal_tracking_id = $_GET['pesapal_transaction_tracking_id'];
	}
	

	//Store refrence and tracking id in a db
	$Db = new Database('localhost', 'ndw', 'root', '');

	$inserted = $Db->executeQuery(
		"INSERT INTO  transactions (merchant_reference, pesapal_tracking_id) 
		 VALUES ('$reference', '$pesapal_tracking_id')")->wasInserted();
	if($inserted)
	{
		echo "The Transaction is being processed. <a href='pesapal-ipn-listener.php?pesapal_notification_type=CHANGE&
		pesapal_transaction_tracking_id=$pesapal_tracking_id&pesapal_merchant_reference=$reference'>View Transaction</a>" ;
	}

?>