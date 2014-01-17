<?php
$system = '../system/Yc.php';
$config = './site/config/main.php';

define('DEBUG',TRUE);

require_once($system);

Yc::createCApplication($config);