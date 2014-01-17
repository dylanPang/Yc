<?php

return array(
	'basePath' => dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'homeUrl'  => '',
	'defaultController' => 'home',
	'language' => 'en_US',
	'encryptionKey' => '',
	'permittedUriChars' => 'a-z 0-9~%.:_\-',
	'uriProtocol' => '/',	//URI协议：/为目录形式，-字符串连接形式,空为普通模式，也是$_GET
	'urlSuffix' => 'html',  //URL后缀:默认空为php，
	'sessionExpire' => '30',
	
	'modules'  => array(
						'admin'=>array(
									
									),
						'member'=>array(
									
									),
					),
);