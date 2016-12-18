<div class="row">
		<div class="col-xs-11">
			<div class="row">
                            {* Formulaire d'enregistrement *}
<form action="register.php" method="post" enctype="multipart/form-data" id="form_article" name="form_register" class='register' runat="server">
    <div class="larticle">
        <div class="clearfix" >
            <label for="username">Username : </label>
            <div class="input"><input type="text" name="username" id="username" value=""></div>
        </div>
        <div class="clearfix" >
            <label for="texte">Nom : </label>
            <div class="input"><input type="text" name="nom" id="nom" value=""></div>
        </div>
        <div class="clearfix" >
            <label for="texte">Prenom : </label>
            <div class="input"><input type="text" name="prenom" id="prenom" value=""></div>
        </div>
        <div class="clearfix" >
            <label for="texte">E-mail : </label>
            <div class="input"><input type="email" name="email" id="email" value=""></div>
        </div>
        <div class="clearfix" >
            <label for="image">Avatar</label>
            <div class="input"><input type="file" name="image" id="image" onchange="readURL(this);"></div>
        </div>
        <img id="blah" src="css/img/avatar.jpg" alt="your image" class="thumb1">
        <div class="clearfix" >
            <label for="mdpr">Mot de passe</label>
            <div class="input"><input type="password" name="mdpr" id="mdpr" value=""></div>
        </div>
        <div class="clearfix" >
            <label for="mdpr2">Confirmation du mot de passe</label>
            <div class="input"><input type="password" name="mdpr2" id="mdpr2" value=""></div>
        </div>
        <div class="" >
            <input type="submit" name="sinscrire" id="sinscrire" value="S'inscrire" class="btn btn-large btn-primary " onclick="return register();return valider2();">
        </div>
        <BR>
    </div>
    </form>
                        </div>
                </div>
</div>