
{* Si le mot de passe est incorrecte on affiche ça ! *}
        {if isset($connexion_test) AND $connexion_test == FALSE}
            <div class="alert alert-danger" role="alert">
                <strong>Le login / mot de passe est incorrecte !</strong>
            </div>
        {/if}
        
  

    {* Formulaire de connexion *}
<div class="row">
		<div class="col-xs-11">
			<div class="row">
<form action="connexion.php" method="post" enctype="multipart/form-data" id="form_connexion" name="form_article" class="larticle" height="500">
                        <div class="clearfix" >
                        <label for="email">E-mail</label>
                             <div class="input"><input type="email" name="email" id="email" value=""></div>
                        </div>
                        
                        <div class="clearfix" >
                            <label for="mdp">Mot de passe</label>
                             <div class="input"><input type="password" name="mdp" id="mdp" value=""></div>
                        </div> 
    
                        <div class="" >
                            <input type="submit" name="connexion" id="connexion" value="Connexion" class="btn btn-large btn-primary ">
                        </div>
    <BR>
</form>
                        </div>
                </div>
</div>