<?php

require 'Settings/bdd.inc.php';
include 'inc/header.inc.php';
include 'inc/connexion.inc.php';
include 'inc/menu.inc.php';
include 'inc/rightside.inc.php';
require_once('libs/Smarty.class.php');
//On déclare un nouveau objet smarty
$smarty = new Smarty();
//On déclare les derectory de compilation et de templates smarty
$smarty->setTemplateDir('templates/');
$smarty->setCompileDir('templates_c/');
//On prepare notre requêtte de selection d'articles qui sont compatibles avec notre recherche
$sth = $db->prepare("select ar.*,(select count(DISTINCT v.ip) from visites v where v.id_article = ar.ID) as nbr_visites , (select count(*) from commentaires co where ar.Id = co.id_article) as nbr_commentaire from articles ar WHERE ar.TITRE LIKE :search or ar.TEXTE LIKE :search or ar.DATE LIKE :search");
$recherche = '%' . $_POST["recherche"] . '%'; //On va chercher le mot de recherche n'importe ou il est même dun mot dans une phrase ou bien une lttre dans un mot
$sth->bindValue(':search', $recherche, PDO::PARAM_STR); //On bind les paramêtres dont on a besoin
$sth->setFetchMode(PDO::FETCH_LAZY); // On récupére notre rsultat de requêtte
$smarty->assign('sth', $sth); //On transmets ce dernier à smarty
$smarty->assign('admin', $admin); //On transmets la variable qui va nous permettre de savoir si un admin est connecté ou pas à smarty
$sth->execute(); //On execute notre requêtte
$smarty->display('recherche.tpl'); //On affiche le coté smarty
//On affiche le footer
include 'inc/footer.inc.php';
?>