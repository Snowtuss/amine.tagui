<?php

include 'inc/header.inc.php';
include 'inc/menu.inc.php';
include 'inc/rightside.inc.php';
require 'Settings/bdd.inc.php';
include 'inc/connexion.inc.php';
require_once('libs/Smarty.class.php');
//On déclare un nouveau objet smarty
$smarty = new Smarty();
//On déclare les répértoires de templates de msarty et de compilation
$smarty->setTemplateDir('templates/');
$smarty->setCompileDir('templates_c/');
if (isset($_GET["id"])) { //Si l'id a bien passé dans l'URL de la page
    $date_ajout = date("Y-m-d H:i:s"); ///On déclare une date d'ajout de commentaire
    if (isset($_POST["commenter"])) { //Si le boutton commenter est set on GOOO
        //La requête pour ajouter un nouveau commentaire
        $service = $db->prepare("INSERT INTO commentaires (id_article,name,emaill,commentaire,date,id_user) VALUES (:id_article,:nom,:email,:commentaire,:date,:id_user)");
        //On bind les paramêtres dont on aura besoin
        $service->bindValue(':id_article', $_POST['ide'], PDO::PARAM_INT);
        $service->bindValue(':commentaire', $_POST['commentaire'], PDO::PARAM_STR);
        $service->bindValue(':date', $date_ajout, PDO::PARAM_STR);
        if ($connecte) { //Si l'utilisateur est connecté
            //On bind les paramêtres depuis les cookies qu'on a préparer dans la page connexion.php
            $service->bindValue(':nom', $_COOKIE['nom'], PDO::PARAM_STR);
            $service->bindValue(':email', $_COOKIE['email'], PDO::PARAM_STR);
            $service->bindValue(':id_user', $_COOKIE["uid"], PDO::PARAM_INT);
        } else { //Sinon on prends les paramêtres à binder depuis le fomulaire
            $service->bindValue(':nom', $_POST['nom'], PDO::PARAM_STR);
            $service->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
            $service->bindValue(':id_user', 5, PDO::PARAM_INT);
        }

        $service->execute(); //On execute notre requêtte
        // header("Location: article.php");
        $service->closeCursor();
    }
    //La requêtte pour afficher l'article et le nombre de visite
    $sth = $db->prepare("select ar.*,(select count(DISTINCT v.ip) from visites v where v.id_article = ar.ID) as nbr_visites , (select count(*) from commentaires co where ar.Id = co.id_article) as nbr_commentaire from articles ar WHERE ar.ID=:id");
    //On bind l'id
    $sth->bindValue(':id', $_GET['id'], PDO::PARAM_STR);
    $sth->execute(); //On execute notre requêtte
    $sth->setFetchMode(PDO::FETCH_LAZY); //On récupere le resultat
    $smarty->assign('sth', $sth); //On le transmets à smarty
    $dollar = $_GET["id"]; //On mets l'id dans un variable
    $issetdollar = isset($_GET["id"]); //On mets le isset de l'id dans une variable
    $formlink = $_SERVER['PHP_SELF'] . '?id=' . $_GET["id"]; //On mets le lien complet dans une variable
    $smarty->assign('connecte', $connecte); //On transmets la variable qui peut nous dire si l'utilisateur est connecté ou pas
    $smarty->assign('dollar', $dollar); // On transmets l'id
    $smarty->assign('formlink', $formlink); // On transmets le lien complet
    $smarty->assign('issetdollar', $issetdollar); //On transmet le isset de l'id
    //La requête pour afficher les commentaires
    $sth1 = $db->prepare("SELECT utilisateurs.*,commentaires.* FROM commentaires INNER JOIN utilisateurs ON commentaires.id_user=utilisateurs.id WHERE commentaires.id_article=:id_article ORDER BY commentaires.date DESC");
    //On bind l'id de l'article
    $sth1->bindValue(':id_article', $dollar, PDO::PARAM_STR);
    $sth1->execute(); // On execute ntre requêtte
    $count = $sth1->rowCount(); //On compre le nombre de ligne qu'on a dans le résultat de notre requêtte
    $smarty->assign('count', $count); // On transmets le nombre de ligne à smarty
    $smarty->assign('admin', $admin); // On transmets la variable qui nous permets de savori si l'admin est connecté ou pas
    $smarty->assign('date_ajout', $date_ajout); // On transmets la date d'ajout à smarty
    $sth1->setFetchMode(PDO::FETCH_LAZY); // On récupére les résultats de la requêtte
    $smarty->assign('sth1', $sth1); // On passe cette valeur à smarty

    $smarty->display('viewpost.tpl'); // On affiche le coté smarty de cette page
    $sth1->closeCursor(); // On ferme la connexion SQL 2
    //La requête pour ajouter une visite
    $add = $db->prepare("INSERT INTO visites (id_article,ip,date) VALUES (:id_article,:ip,:date)");
    //On bind les paramêtres dont on aura besoin
    $add->bindValue(':id_article', $_GET['id'], PDO::PARAM_INT);
    $add->bindValue(':ip', $_SERVER['REMOTE_ADDR'], PDO::PARAM_STR);
    $add->bindValue(':date', $date_ajout, PDO::PARAM_STR);
    $add->execute(); // On execute notre requêtte
    $add->closeCursor(); // On ferme la connexion SQL 3

    $sth->closeCursor(); // On ferme la connexion SQL 1
}

//include 'inc/menu.inc.php';
include 'inc/footer.inc.php'; //On affiche le footer
?>