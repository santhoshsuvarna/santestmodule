<?php
if (!defined("WHMCS")) {
    die("This file cannot be accessed directly");
}

function santestmodule_config()
{
    $configarray = array(
    "name" => "SAN TEST",
    "description" => '',
    "version" => "1.0",
    "author" => "santhosh",
    "language" => "english",
);
    return $configarray;
}

function santestmodule_output($vars)
{
	echo '<pre/>';
	print_r($vars);
	
	define('MODULE_VER', $vars['version']);

	
	require_once 'adminview.php';
	
	
	
}
