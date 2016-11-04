<?php

require 'Smarty/libs/Smarty.class.php';
$smarty = new Smarty();

$smarty->setTemplateDir('smartytmp/templates');
$smarty->setCompileDir('smartytmp/templates_c');
$smarty->setCacheDir('smartytmp/cache');
$smarty->setConfigDir('smartytmp/configs');
if ($rst) {
    $smarty->assign('results', $rst['result']);
}
$smarty->display('recipe_table.tpl');
