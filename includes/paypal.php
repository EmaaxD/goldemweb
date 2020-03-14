<?php 
require_once 'paypal/autoload.php';

define('URL_SITIO', 'http://localhost/proyectos/goldWeb');

$apiContext = new \PayPal\Rest\ApiContext(
	new \PayPal\Auth\OAuthTokenCredential(
		//Cliente Id
		'AQ0mH_dPq8o5YSj9SQLZljAQJTYMS7fifraYeQ1MuYRVGyBrOwZRDn0fl4p7f6aJdo3ZtLGzO5fUkU60',
		//secret
		'EHxctM_0zkf36v9-lgRxun0s0ijsrDKxraruPHeaQWIL5UCeQtc2UW8zdIYMqfHJLgQLoNEd_taUVDEo'
	)
);

