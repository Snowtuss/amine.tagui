<?php

//Supprimer un article et ses commentaires 
require 'Settings/bdd.inc.php';
include 'inc/connexion.inc.php';
//Si l'admin est connecté on execute notre reqêtte
if($admin)
{
    //Si un article id est mentionné dans l'url ça veut dire qu'on veut supprimer l'article est ses commentaires
    if (isset($_GET["article_id"])) {
    //echo"hello";
    $var2 = $_GET["article_id"]; //On transmets l'id dans une variable
    //on prépare notre requêtte
    $delprep = $db->prepare("SELECT * FROM commentaires WHERE id_article=:article_id");
    $delprep->bindValue(':article_id', $var2, PDO::PARAM_INT); //On bind les paramêtres dont on aura besoin
    $delprep->execute(); // On execute notre requêtte
    $count = $delprep->rowCount(); //On calcul combien il y a de ligne de résultat
    if(mysql_num_rows($delprep)==0) //S'il n'ya pas de commentaires dont cet article
    {
        //echo"hello4";
            //On va faire une requêtte qui supprime que l'article
            $del = $db->prepare("DELETE FROM articles WHERE ID=:article_id");
            $del->bindValue(':article_id', $var2, PDO::PARAM_INT); //On bind les paramêttres dont on a besoin
            $del->execute(); // On execute notre reqûette
            $del->closeCursor(); //On ferme notre connexion SQL
            header('Location: index.php'); //On redérige vers la page index
    }
    while ($data = $delprep->fetch()) {
        //echo"hello2";
        if ($count > 0) {
            //echo"hello3";
            //On prépare la reqêtte qui va supprimer l'article et les commentaires associé
            $del = $db->prepare("DELETE articles , commentaires  FROM articles  INNER JOIN commentaires  
WHERE articles.ID= commentaires.id_article and articles.ID =:article_id");
            $del->bindValue(':article_id', $var2, PDO::PARAM_INT); //On bind les paramêttres dont on a bsoin
            $del->execute(); //On execute notre requêtte
            $del->closeCursor(); //On ferme la connexion SQL
            //header('Location: index.php');
        } 
    }
}
//Supprimer un commentaire 
elseif (isset($_GET["article"])) {
    $var = $_GET["id"]; //On transmets l'id 
    //On prepare notre requêtte SQL
    $sth = $db->prepare("DELETE FROM commentaires WHERE id_commentaire=:id_commentaire");
    $sth->bindValue(':id_commentaire', $var, PDO::PARAM_INT); //On bind les parametres dont on aura besoin
    $sth->execute(); //On execute notre requêtte
    $sth->closeCursor(); //On ferme la connexion SQL
    header('Location: viewpost.php?id=' . $_GET["article"]); //On le redérige vers la page d'article spécifié
    //Sinon on le redérige vers un 404 no found
} else {
    echo'no found !';
}
}
else
{
    header('Location: nofound.php'); //On le redérige vers la page 404 nofound s'il n'est pas un admin
}

?>