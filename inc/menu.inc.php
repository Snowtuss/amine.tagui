<?php
include 'inc/connexion.inc.php';
?>
</div>
<!-- Notre menu -->
          <div class="row">
          <nav class="col-xs-11 nav-bar navigation">
          <div class="col-xs-11 ">    
           <!-- <h3 align = "center">Menu</h3>-->
            <ul>
                <!-- Tout le monde peut voire le boutton acceuil -->
               <a href="index.php"> <li class="top">Accueil</li></a>
               
                <?php
                if($connecte)
                {
                    //Autoriser la création/modification d'un article seulement aux admins
                    if($admin)
                    {
                        echo'<a href="article.php"><li class ="top">Rédiger article</li></a>';
                    }
                    //Afficher ces options si un utilisateur est connecté
                    echo'<a href="profile.php"><li class ="top">Profile</li></a>';
                    echo'<a href="deconnexion.php"><li class ="top">Deconnexion</li></a>';
                }
                else
                {
                    //Tout le monde peut voir ces options
                    echo '<a href="register.php"><li class ="top">S\'inscrire</li></a>';
                    echo '<a href="connexion.php"><li class ="top">Connexion</li></a>';
                }
                ?>
                
            </ul>
          </div>
          </nav>
          </div>
        </div>