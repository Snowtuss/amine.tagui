<?php

include 'inc/header.inc.php';
include 'inc/connexion.inc.php';

require 'Settings/bdd.inc.php';
include 'inc/menu.inc.php';
include 'inc/rightside.inc.php';
require_once('libs/Smarty.class.php');
//On déclare un nouveau fichier smarty
$smarty = new Smarty();
//On déclare les fichier de compilation et de templates
$smarty->setTemplateDir('templates/');
$smarty->setCompileDir('templates_c/');
$smarty->display('nofound.tpl');
include 'inc/footer.inc.php';

