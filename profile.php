<?php

include 'inc/header.inc.php';
include 'inc/connexion.inc.php';
require 'Settings/bdd.inc.php';
include 'inc/menu.inc.php';
include 'inc/rightside.inc.php';
require_once('libs/Smarty.class.php');
$smarty = new Smarty();

$smarty->setTemplateDir('templates/');
$smarty->setCompileDir('templates_c/');
//Si l'user est connecté on execute notre reqêtte
if ($connecte) {
    //On prépare notre requêtte
    $sth = $db->prepare("SELECT * FROM utilisateurs");
    $sth->execute(); //On la execute
    $sth->setFetchMode(PDO::FETCH_LAZY); //On récupére les resultats
    $cookie = $_COOKIE["sid"]; //On mets la valeur du cookie dans une variable
    $smarty->assign('cookie', $cookie); //On transmets cette variable à smarty
    $smarty->assign('sth', $sth); //On transmets le résultat à smarty
    $smarty->display('profile.tpl');
    //Sinon on le redérige vers le 404 no found
} else {
    header('Location : nofound.php');
}
include 'inc/footer.inc.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>