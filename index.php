<?php
	if (getenv('HTTPS')=='on')
	{ 
		$cert=$_SERVER['SSL_CLIENT_CERT']; 
	}
	else
	{ 
		$fname = "sm_ent_old.p12";
		$f = fopen($fname, "r"); 

		$cert = fread($f, filesize($fname)); 
		fclose($f); 
	}  

	$certdata = array();
	$pass = "password goes here";

	openssl_pkcs12_read($cert, $certdata, $pass);
	$certdata= openssl_x509_parse($certdata['cert'],0);
	print_r($certdata);
?>