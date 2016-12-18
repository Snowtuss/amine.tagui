<?php
    include ('Settings/bdd.inc.php');
/* 
Créer un fichier d'include qui s'appelle connexion.inc.php
Tester la présence du cookie sidet s'assurer qu'il n'est pas vide
	Si condition OK :
	Requûete dans la table d'utilisateurs pour vérifir la correspendance du sid
	RowCount >0 alors créer une variable  $connecte = true

	Si RowCount == 0 : $connecte = false
	-------------------------------------------------
 * if (isset($_COOKIE['sid']) && !empty($_COOKIE['sid']))
 */
//initialiser les deux variable en false
$connecte = false;
$admin = false;
if (isset($_COOKIE['sid']) && !empty($_COOKIE['sid']))
{
    //Si un utilisateur est connecté on mets le connecte en true sinon on le laisse à false
    $sid = $_COOKIE['sid'];
    $sth = $db->prepare("SELECT sid FROM utilisateurs");
    $sth->execute();
    $count = $sth ->rowCount();
    while ($donnees = $sth->fetch())
    {
        if($count >0)
        {
            if($sid == $donnees["sid"])
                 {
            $connecte = true;
            
                    }
        }
        elseif($count ==0)
        {
            $connecte = false;
            
        }
                    
        
    }
       $sth->closeCursor();
}

if (isset($_COOKIE['admin']) && !empty($_COOKIE['admin']))
{
    //Si un admin est connecté on mets le connecte en true sinon on le laisse à false
    $sid = $_COOKIE['admin'];
    $sth = $db->prepare("SELECT sid FROM utilisateurs");
    $sth->execute();
    $count = $sth ->rowCount();
    while ($donnees = $sth->fetch())
    {
        if($count >0)
        {
            if($sid == $donnees["sid"])
                 {
            $admin = true;
            
                    }
        }
        elseif($count ==0)
        {
            $admin = false;
            
        }
                    
        
    }
        $sth->closeCursor();
}
//echo $connecte ? 'connecte true' : 'connecte false';
//echo $admin ? 'admin true' : 'admin false';
?>
