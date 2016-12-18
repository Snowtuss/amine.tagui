
<div class="row">
		<div class="col-xs-11">
			<div class="row">
		{* L'affichage des articles *}		
{foreach $reponse as $r}
    
    <div class="col-xs-4">
    <div class="larticle">
        <div class='avantarticle'><h3>
            <a href="viewpost.php?id={$r.ID}">{$r.TITRE}</a>
            <font size="1" color="grey">Posté le <B><i>{$r.DATE}</i></B></font>
            </h3>
            
        </div>
        <div class="alarticle"><img src="img/{$r.ID}.jpg" height="184" width="610" align="center" class="firstimage"><BR>
        {if ($r.TEXTE|count_characters:true) > 2}
            {$r.TEXTE|truncate:40}
            <BR><a href="viewpost.php?id={$r.ID}"><font size="5" color="#ff6700">Lire la suite »</font></a>
        {/if}
        <BR>
        <BR>
        {* L'admin peut modifier ou bien supprimer l'article  *}
            {if $admin == true}
            <a href="article.php?id={$r.ID}">Modifier</a>
            <a href="delete.php?article_id={$r.ID}"><font color="red">Supprimer</font></a>
            {/if}
        </div>  
            <div class="apreslarticle"><i><u><a href="viewpost.php?id={$r.ID}#linkcomment">{$r.nbr_commentaire} commentaires </a></u></i><img src="css/img/visites.png" width="20" height="20"> {$r.nbr_visites}
            </div>
             
    </div>
    </div>
{/foreach}
                        </div>
                </div>
</div>
                        {* La pagination *}
<div class ="pagination">
    <ul>
        <li><a>Page : </a></li>