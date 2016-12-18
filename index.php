
<?php
session_start();
require_once('libs/Smarty.class.php');
include 'inc/header.inc.php';
include 'inc/connexion.inc.php';

require 'Settings/bdd.inc.php';


if (isset($_GET['p'])) {
    $pagecourante = $_GET['p']; // On récupère le numéro de la page indiqué dans l'adresse (index.php?p=4)
} else { // La variable n'existe pas, c'est la première fois qu'on charge la page
    $pagecourante = 1; // On se met sur la page 1 (par défaut)
    $_SERVER['REQUEST_URI'] = 'index.php?p=1';
}




$nbarticlepage = 4; //On mets le nombre d'article à afficher par page à 4
$debut = ($pagecourante - 1) * $nbarticlepage; //On calcule le début qui va se varier d'une page à une autre

function returnIndex() {
    //calcul des éléments.
    return $debut; 
}

//Calcul pour la pagination et lemit
$repons = $db->query('SELECT COUNT(*) AS nbArticles FROM articles WHERE PUBLIER');
$total_articles = $repons->fetch();
$nbArticles = $total_articles['nbArticles'];
$nbrpages = ceil($nbArticles / $nbarticlepage);
//echo '<b>Page :</b>' . $pagecourante . '<br><b>index :</b>' . $debut . "<br><b>Nombre de pages : </b>" . $nbrpages . "<br><b>Nombre articles :</b>" . $nbArticles;
//On déclare un nouveau objet Smarty
$smarty = new Smarty();
//On déclare les répertoires des templates smarty et du path de compilation
$smarty->setTemplateDir('templates/');
$smarty->setCompileDir('templates_c/');
//$smarty->setConfigDir('/web/www.example.com/guestbook/configs/');
//$smarty->setCacheDir('/web/www.example.com/guestbook/cache/');
//** un-comment the following line to show the debug console
//Requêtte des articles
$reponse = $db->query("select ar.*,(select count(DISTINCT v.ip) from visites v where v.id_article = ar.ID) as nbr_visites , (select count(*) from commentaires co where ar.Id = co.id_article) as nbr_commentaire from articles ar ORDER BY ar.ID DESC LIMIT $debut , $nbarticlepage");
$reponse->setFetchMode(PDO::FETCH_LAZY); //On recupére les resultats
$smarty->assign('reponse', $reponse); //On transmets les résultats à smarty
$smarty->assign('admin', $admin); //On transmets la variable qui nou serts à savoir si un admin est connecté ou pas
//$smarty->debugging = true;
include 'inc/menu.inc.php'; //Affichage du menu
include 'inc/rightside.inc.php'; //Affichage du top 4
//Si un utilisateur est connecté on affiche un message de succés
if (isset($_SESSION['connexion_test'])) {
    if ($_SESSION['connexion_test'] = true) {
        echo '<div class="alert alert-success" role="alert">
    <strong>Vous êtes maintenant connecté !</strong>
</div>';
        unset($_SESSION['connexion_test']);
    } else {
        echo '<div class="alert alert-danger" role="alert">
                    <strong>Le login / mot de passe est incorrecte !</strong>
                    </div>';
        unset($_SESSION['connexion_test']);
    }
    //header("Location: article.php");
}
$smarty->display('Index.tpl');
$repons->closeCursor();
$reponse->closeCursor();


//echo $_SERVER['REQUEST_URI'];
//pagination
for ($i = 1; $i <= $nbrpages; $i++) {
    if ($_SERVER['REQUEST_URI'] == 'index.php?p=' . $i) {
        echo '<li class="active"><a href="index.php?p=' . $i . '">' . $i . '</a></li>';
    } else {
        echo '<li><a href="index.php?p=' . $i . '">' . $i . '</a></li>';
    }

    //echo $i;
}
?>
</ul>
</div>
<?php
include 'inc/footer.inc.php';
?>
        
