<?php
session_start();
include 'inc/header.inc.php';
require 'Settings/bdd.inc.php';
require_once('libs/Smarty.class.php');
include 'inc/menu.inc.php';
include 'inc/rightside.inc.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
        $smartys = new Smarty(); //On déclare un nouveau objet smarty
        //On déclare les répertoires de templates smarty et de compilation
        $smartys->setTemplateDir('templates/');
        $smartys->setCompileDir('templates_c/');
if (isset($_SESSION["register"])) //Si e compte à été créer on affiche ce message de succes
{
    echo '<div class="alert alert-success" role="alert">
    <strong>Votre compte à été créer !</strong>
</div>';
    unset($_SESSION["register"]);
}
if (isset($_POST["sinscrire"])) { //Si le boutton s'enregistrer est set on GOOOOOOOOO !!!
    if ($_FILES["image"]["error"] == 0) { //Si l'image s'est bien téécharger sans erreur on procéde
        $date_creation = date("Y-m-d H:i:s"); //On déclare une date de création
        $var = $_POST['username']; // On mets dans une variable l'username pour qu'on puisse enregistrer son image avec son username
        //On prepare notre reqûette SQL d'insertion pour le nouveau user
        $sth = $db->prepare("INSERT INTO utilisateurs (username,nom,prenom,email,mdp,statut,date_creation,sid) VALUES (:username,:nom,:prenom,:email,:mdp,:statut,:date_creation,:sid)");
        $sid = md5($_POST['email'] . time()); //On hash l'email de l'user avec le temps actuel pour que ça devient difficile à le déchiffrer
        //On bind les paramêttres dont on aura besoin
        $sth->bindValue(':username', $_POST['username'], PDO::PARAM_STR);
        $sth->bindValue(':nom', $_POST['nom'], PDO::PARAM_STR);
        $sth->bindValue(':prenom', $_POST['prenom'], PDO::PARAM_INT);
        $sth->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
        $sth->bindValue(':mdp', $_POST['mdpr'], PDO::PARAM_STR);
        $sth->bindValue(':statut', "membre", PDO::PARAM_STR);
        $sth->bindValue(':date_creation', $date_creation, PDO::PARAM_STR);
        $sth->bindValue(':sid', $sid, PDO::PARAM_STR);
        $sth->execute(); //On execute notre requêtte
        //On déplace l'image d'avatar qui est temporaire dans un ficier img local du site
        move_uploaded_file($_FILES['image']['tmp_name'], dirname(__FILE__) . "/img/users/$var.jpg");
        $_SESSION["register"] = TRUE; //Session pour affihcer le message de succés de création du compte
        header('Location: register.php'); //On le redérige vers la même page
exit;

        $sth->closeCursor(); //On ferme la connexion
    } else {
        echo '<h2>Erreur d"image<h2>'; //Si l'image ne s'est pas bien télécharger on mets ce echo d'erreur
        exit();
    }
    
    
}
//On display le fichier smarty
$smartys->display('register.tpl');
include 'inc/footer.inc.php'; //On display le footer
?>