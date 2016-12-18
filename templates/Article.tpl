<div class="row">
		<div class="col-xs-11">
			<div class="row">
<form action="article.php" method="post" enctype="multipart/form-data" id="form_article" name="form_article" class='larticle'>
    
        {* Partie de modification de l'article *}
        {if isset($id)}
            {foreach $service as $r}
                <div class="clearfix" >
                            <label for="titre">Titre</label>
                             <div class="input"><input type="text" name="titre" id="titre" value="{$r.TITRE}"></div>
                        </div>
                        
                        <div class="clearfix" >
                            <label for="texte">Texte</label>
                             <div class="input"><input type="text" name="texte" id="titre" value="{$r.TEXTE}"></div>
                        </div>
    
                        <div class="clearfix" >
                               <label for="image">Image</label>
                               <div class="input"><input type="file" name="image" id="image" value=""></div>
                        </div>
    
                        <div class="clearfix" >
                               <label for="publie">Publié</label>
                               <div class="input"><input type="checkbox" name="publie" id="publie"></div>
                        </div>
                        
                         <input type="hidden" name="date" id ="date" value="{$date_ajout}">
                           <input type="hidden" name="ide" id ="ide" value="{$id}">  
    
                        <div class="mybutton" >
            {/foreach}
            {$service->closeCursor()}
            
       {* Partie de création d'un nouveau article *}
        {elseif !isset($id)}
            <div class="clearfix" >
                               <label for="titre">Titre</label>
                               <div class="input"><input type="text" name="titre" id="titre" value=""></div>
                        </div>
                        
                        <div class="clearfix" >
                            <label for="texte">Texte</label>
                             <div class="input"><input type="text" name="texte" id="titre" value=""></div>
                        </div>
    
                        <div class="clearfix" >
                               <label for="image">Image</label>
                               <div class="input"><input type="file" name="image" id="image" value=""></div>
                        </div>
    
                        <div class="clearfix" >
                               <label for="publie">Publié</label>
                               <div class="input"><input type="checkbox" name="publie" id="publie"></div>
                        </div>
    
                        <div class="mybutton" >
        {/if}
      {* Tester si le lien est celui de création ou bien de modification pour afficher le bon boutton *}
    {if $REQUEST_URI == "/monsite/article.php" }
        <input type="submit" name="ajouter" id="ajouter" value="Ajouter" class="btn btn-large btn-primary ">
        {else}
            <input type="submit" name="modifier" id="modifier" value="Modifier" class="btn btn-large btn-primary ">
    {/if}
    </div>
    </form>   
        </div>
                        </div>
                </div>