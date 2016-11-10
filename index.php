<?php

ini_set('date.timezone', 'Asia/Shanghai');
require 'Smarty/libs/Smarty.class.php';
$smarty = new Smarty();

$smarty->setTemplateDir('smartytmp/templates');
$smarty->setCompileDir('smartytmp/templates_c');
$smarty->setCacheDir('smartytmp/cache');
$smarty->setConfigDir('smartytmp/configs');

$json = file_get_contents('ingredient.json');
$ingredients = json_decode($json, true);
$smarty->assign('ingredients', $ingredients['list']);
$smarty->display('index.tpl');
