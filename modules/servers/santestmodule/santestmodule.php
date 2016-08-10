<?php
if (!defined("WHMCS")) {
    die("This file cannot be accessed directly");
}

function santestmodule_Pg1($params)
{
	print_r($params); exit;
	
    $vars['subpage'] = dirname(__FILE__).'/pages/sanpg1.tpl';
    $pagearray = array(
        'templatefile'  =>  'pages/clientarea',
        'breadcrumb'    =>  ' > <a href="#" onclick="return false;">Extra Page</a>',
        'vars'          =>  $vars
    );

    return $pagearray;
}

function santestmodule_mycustomfunction($vars) {
    return array(
        'templatefile' => 'customfunc',
        'breadcrumb' => array(
            'stepurl.php?action=this&var=that' => 'Custom Function',
        ),
        'vars' => array(
            'test1' => 'hello',
            'test2' => 'world',
        ),
    );
}

function santestmodule_CreateAccount($vars) {
    return "success";
}