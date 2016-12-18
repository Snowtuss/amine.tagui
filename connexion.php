<?php

session_start();
require 'Settings/bdd.inc.php';
require_once('libs/Smarty.class.php');

/*
  Nouvelle page : connexion.php
  Formulaire HTML 2 champs et boutton


  PHP
  Vérifications champs postés
  Comparer en base le couple login / MDP
  Si OK :
  Créer une variable aléatoire
  Insérer cette variable en base
  Créer le cookie
  Rediriger l'utilisateur vers l'acceuil
  Aficher message de confirmation
  Si NOK :
  Rediriger vers la page login
  Afficher message erreur
 */
//Si le boutton connexion est set on GO !!
if (isset($_POST["connexion"])) {
    //On prepare notre requêtte SQL
    $sth = $db->prepare("SELECT * FROM utilisateurs WHERE email= :email AND mdp = :mdp");
    //On bind les paramêtres dont on a besoin
    $sth->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
    $sth->bindValue(':mdp', $_POST['mdp'], PDO::PARAM_STR);
    //On execute notre requêtte SQL
    $sth->execute();
    //On compte combien de lignes y'en a dans notre résultat
    $count = $sth->rowCount();
    //Si le nombre de ligne est superieur à 0
    if ($count > 0) {
        //On récupére les resultats
        while ($donnees = $sth->fetch()) {
            //Si l'email et le mot de passe sont correcte
            if (($_POST['email'] == $donnees['email']) && ($_POST['mdp'] == $donnees['mdp'])) {
                $var=$donnees["statut"]; //On déclare une variable pour qu'on puisse tester le statut du membre plutard
                $uid=$donnees["id"]; // On aura besoin de l'id d'utilisateur plutard
                $nom=$donnees["nom"].' '.$donnees["prenom"]; //On mets dedant le nom et prenom de l'utilisateur
                $email=$donnees["email"]; //On recupére l'email d'utilisateur
                $sth->closeCursor(); //On fermer notre connexion SQL
                // echo 'ça marche<BR>';
                $sid = md5($_POST['email'] . time()); //On hash par le md5 l'email de l'utilisateur avec le temps actuel pour que ça soit difficile à déchifrer
                // echo $sid;
                //On prepare notre requêtte pour qu'on puisse metre à jour la table avec le nouveau hash
                $service = $db->prepare("UPDATE utilisateurs SET sid=:sid WHERE email=:email");
                //On bind les paramêtres dont on a besoin
                $service->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
                $service->bindValue(':sid', $sid, PDO::PARAM_STR);
                //On execute notre requêtte
                $service->execute();
                setcookie('sid', $sid, time() + 1530); //Ce cookie va nous permettre de savoir si un utilisateur est connecté
                setcookie('nom', $nom, time() + 1530);//On va utiliser ce cookie dans la partie des commentaires oû on va recuperer le nom d'utilisateur connecté et de le placé dans la base de données des commentaires sans que l'utilisateur le saisie
                setcookie('email', $email, time() + 1530);//On va utiliser ce cookie dans la partie des commentaires oû on va recuperer l'email d'utilisateur connecté et de le placé dans la base de données des commentaires sans que l'utilisateur le saisie
                setcookie('uid', $uid, time() + 1530);//On va l'utiliser plutard dans les commentaires aussi
                if(strcmp($var,"admin") == 0) //On test si l'utilisateur connecté est un admin ou un utilisateur normal
                {
                    setcookie('admin', $sid, time() + 1530);//Ce cookie va nous permettre de savoir qu'un admin est connecté et lui afficher des fonctionalités que l'admin qui a le droit de les voir
                }
                $_SESSION['connexion_test'] = TRUE; //Session facultatif pour informer l'utilisateur qu'il est bien connecté
                $service->closeCursor(); //On ferme notre connexion SQL
                header("Location: index.php"); //On redérige l'utilisateur vers la page d'acceuil avec un message de succés
                //  break;
            }
        }
    } else {
        //
        $_SESSION['connexion_test'] = FALSE; //Sinon la session est à false
       // echo 'lo';
        header("Location: connexion.php"); //On redérife vers la même page
       // $_SESSION['connexion_test'] ? 'true' : 'false';
       // var_dump($_SESSION['connexion_test']);
    }

}
//if(isset($_SESSION['connexion']) == FALSE)
//{
//echo'oui';
//header("Location: index.php");
/* echo '<div class="alert alert-danger" role="alert">
  <strong>Le login / mot de passe est incorrecte !</strong>
  </div>';
 *///unset($_SESSION['connexion']);
//} 
else {
    //echo $_SESSION['connexion'] ? 'true' : 'false';
    $smarty = new Smarty(); //On déclare un nouveau objet smarty
    //On declare les répertoires des templates et oû on va mettre les fichier compiler
    $smarty->setTemplateDir('templates/');
    $smarty->setCompileDir('templates_c/');
    //$smarty->setConfigDir('/web/www.example.com/guestbook/configs/');
    //$smarty->setCacheDir('/web/www.example.com/guestbook/cache/');
    if (isset($_SESSION['connexion_test'])) {
        $smarty->assign('connexion_test', $_SESSION['connexion_test']); //On transmets la valeur de la session à smarty
    }
    


    //** un-comment the following line to show the debug console
    //$smarty->debugging = true;
    unset($_SESSION['connexion_test']); //On unset la session
    //Les indludes de coté visible 
    include 'inc/header.inc.php';
    include 'inc/menu.inc.php';
    include 'inc/rightside.inc.php';
    $smarty->display('Connexion.tpl');
    echo'<span class"n3edloha"></span>';
    include 'inc/footer.inc.php';
}
?>
