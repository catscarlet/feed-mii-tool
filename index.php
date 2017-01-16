<?php

//ini_set('date.timezone', 'Asia/Shanghai');
require 'Smarty/libs/Smarty.class.php';
$smarty = new Smarty();

$smarty->setTemplateDir('smartytmp/templates');
$smarty->setCompileDir('smartytmp/templates_c');
$smarty->setCacheDir('smartytmp/cache');
$smarty->setConfigDir('smartytmp/configs');

$json = file_get_contents('ingredient.json');
$ingredients = json_decode($json, true);

session_start();

if (!array_key_exists('iv', $_SESSION)) {
    $_SESSION['iv'] = base64_encode(mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC), MCRYPT_RAND));
}

setcookie('iv', $_SESSION['iv']);

$smarty->assign('ingredients', $ingredients['list']);
$smarty->display('index.tpl');
