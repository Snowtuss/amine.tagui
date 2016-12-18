<?php
require 'Settings/bdd.inc.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//C'est la section top 3 qui s'affiche à la droite de chaque page 
require_once('libs/Smarty.class.php');

$smarty2 = new Smarty();

$smarty2->setTemplateDir('templates/');
$smarty2->setCompileDir('templates_c/');

$sth2 = $db->prepare("select ar.*,(select count(DISTINCT v.ip) from visites v where v.id_article = ar.ID) as nbr_visites , (select count(*) from commentaires co where ar.Id = co.id_article) as nbr_commentaire from articles ar ORDER BY nbr_visites DESC LIMIT 0 , 4");
$sth2->setFetchMode(PDO::FETCH_LAZY);
$smarty2->assign('sth2',$sth2);
$sth2->execute();
$smarty2->display('rightside.tpl');
$sth2->closeCursor();
