
<?php
//Commencer les sessions
session_start();
//Beblio necessaires :
require_once('libs/Smarty.class.php');
include 'inc/connexion.inc.php';
require 'Settings/bdd.inc.php';
//Déclaration d'un nouveau objet smarty
$smarty = new Smarty();
//Si l'admin est connecté on continue vers la page
if ($admin) {
    $date_ajout = date("Y-m-d"); //La date d'ajout d'article
    $smarty->assign('date_ajout', $date_ajout); // Transmettre la date d'ajout à smarty
//PARTIE DE LA CREATION D'UN NOUVEL ARTICLE
    if (isset($_POST["ajouter"])) {
        //print_r($_FILES);
        //exit();
        $date_ajout = date("Y-m-d");
        $_POST['date_ajout'] = $date_ajout; //On tranmets la date d'ajout à un champs input
        if (isset($_POST['publie'])) { //Si publié est set on mets la valeur de publié à 1
            $_POST["publie"] = 1;
        } else {
            $_POST["publie"] = 0; //Sinon on la mets à 0
        } //CONDITION SIMPLE
        // print_r($_POST);



        $_POST["publie"] = isset($_POST["publie"]) ? 1 : 0; //CONDITION TERNAIRE
        if ($_FILES["image"]["error"] == 0) {

            //Si l'image a été bien charger on insére dans notre Base de donné le nouveau article
            $sth = $db->prepare("INSERT INTO articles (TITRE,TEXTE,PUBLIER,DATE) VALUES (:titre,:texte,:publie,:date)");
            //On bind les valeurs dont on a besoin
            $sth->bindValue(':titre', $_POST['titre'], PDO::PARAM_STR);
            $sth->bindValue(':texte', $_POST['texte'], PDO::PARAM_STR);
            $sth->bindValue(':publie', $_POST['publie'], PDO::PARAM_INT);
            $sth->bindValue(':date', $_POST['date_ajout'], PDO::PARAM_STR);
            //On execute notre reqêtte
            $sth->execute();
            //On prends le dernier id
            $id = $db->lastInsertId();
            //Un petit echo de l'id pour savoir si ça marche bien
            echo '<BR><b>' . $id . '</b><BR>';
            //Un petit echo pour savoir que tout s'est bien passé et l'image s'est télécharger 
            echo '<h2>Image bien télécharger !<h2>';
            //On déplace l'image qui est comme fichier temporaire maintenant dans un fichier de site local img
            move_uploaded_file($_FILES['image']['tmp_name'], dirname(__FILE__) . "/img/$id.jpg");
            //On enable la session ajout_article pour qu'on puisse afficher un message de succés plutard
            $_SESSION['ajout_article'] = TRUE;
            //On le redérige vers la même page
            header("Location: article.php");
            //On ferme notre connexion de base de donnée
            $sth->closeCursor();
        } else {
            //S'il y a une erreur lors du téléchargement d'image on affiche ce petit echo
            echo '<h2>Erreur d"image<h2>';
            exit();
        }
    } else {
        // include 'inc/header.inc.php';
        if (isset($_SESSION['ajout_article'])) {
            //Si la session ajout_article existe on affiche ce echo de succés
            //Comme quoi l'article à été bien ajouté
            //header("Location: article.php");
            echo '<div class="alert alert-success" role="alert">
    <strong>Félicitation !</strong> Votre article a été ajouter.
</div>';
            //On unset notre session
            unset($_SESSION['ajout_article']);
        } else {
            if (isset($_GET['id'])) {
                //Si un id à été passé en URL ça veut dire qu'on va modifier un article déja existant
                //On prepare notre requêtte 
                $service = $db->prepare("SELECT ID,TEXTE,TITRE,DATE FROM articles WHERE ID=:id");
                //Un bind value de la variable id
                $service->bindValue(':id', $_GET['id'], PDO::PARAM_STR);
                //On execute notre reqûete SQL
                $service->execute();
                //$smarty->assign('service', $service);
                //On récupére de la base des données les informations
                $service->setFetchMode(PDO::FETCH_LAZY);
                //On transmets ça à smarty
                $smarty->assign('service', $service);
                //$smarty->assign('donnees', $donnees);
            }
        }
        
        //On définit les fichiers de compilations et de templates smarty
        $smarty->setTemplateDir('templates/');
        $smarty->setCompileDir('templates_c/');
        //$smarty->setConfigDir('/web/www.example.com/guestbook/configs/');
        //$smarty->setCacheDir('/web/www.example.com/guestbook/cache/');
        //$donnees = $service->fetch();


        if (isset($_GET['id'])) {
            //On transmets l'id de l'article à smarty
            $smarty->assign('id', $_GET['id']);
        }





        //On transmets le lien complet à smarty
        $smarty->assign('REQUEST_URI', $_SERVER['REQUEST_URI']);
        if (isset($_POST['modifier'])) {
            //La partie pour modifier l'article
            if (isset($_POST['publie'])) {
                $_POST["publie"] = 1;
            } else {
                $_POST["publie"] = 0;
            } //CONDITION SIMPLE
            // print_r($_POST);
            
            //var_dump($_POST['titre']);
            //On transmets l'id
            $id = $_POST['ide'];
            //On prepare notre requêtte
            $sth = $db->prepare("UPDATE articles SET TITRE =:titre,TEXTE=:texte,PUBLIER=:publie,DATE=:date WHERE ID=:id");
            //On bind les paramêtres dont on a besoin
            $sth->bindValue(':titre', $_POST['titre'], PDO::PARAM_STR);
            $sth->bindValue(':texte', $_POST['texte'], PDO::PARAM_STR);
            $sth->bindValue(':publie', $_POST['publie'], PDO::PARAM_INT);
            $sth->bindValue(':date', $_POST['date'], PDO::PARAM_STR);
            $sth->bindValue(':id', $id, PDO::PARAM_INT);
            //On execute notre requêtte
            $sth->execute();
            //On définit une variable pour spécifier l'endroit des images
            $base_directory = 'img/';
            //On supprime l'image de l'article qu'on va le modifier pour en mettre une nouvelle
            if (unlink($base_directory . $id . '.jpg'))
                echo "File Deleted.";
            //On déplace la nouvelle image
            move_uploaded_file($_FILES['image']['tmp_name'], dirname(__FILE__) . "/img/$id.jpg");
            //header("Location: article.php");
            //On ferme notre connexion sql
            $sth->closeCursor();
        }

        // $smarty->debugging = true;
        //Les include des éléments visibles
        include 'inc/header.inc.php';
        include 'inc/menu.inc.php';
        include 'inc/rightside.inc.php';
        $smarty->display('Article.tpl');


        include 'inc/footer.inc.php';
    }
}
//Sinon on le redérige vers le 404 no found
else {
    header("Location: nofound.php");
}
?>