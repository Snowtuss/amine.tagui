<div class="row">
		<div class="col-xs-11">
			<div class="row">
                            {* L'affichage de l'article en question *}
{foreach $sth as $r}
    <div class="larticle">
        <h1>{$r.TITRE}<font size="1" color="grey">Posté le <B><i>{$r.DATE}</i></B></font></h1>
        <img src="img/{$r.ID}.jpg" height="184" width="610" class="viewimage"><BR>
        <p class="letexte">{$r.TEXTE}</p><BR>
        <font size="2" color="grey"><i>L'article a été vu : <b>{$r.nbr_visites} fois </b></i></font>
        <BR> 
    </div>

{/foreach}

{* Le formulaire de commentaires *}
<div class="flawt3">
<h3>Commentaires :</h3>
    <form action="{$formlink}" method="post" enctype="multipart/form-data" id="form_viewpost" name="form_viewpost" class="flawt">
    {* Si l'utilisateur est connecte on affiche que le champs commentaire et on prends le nom complet
    et l'email depuis la base de donnée*}
        {if $connecte}
    <div class="clearfix" >
         <label for="nom">Commentaire</label>
         <div class="input"><textarea name="commentaire" id="commentaire"></textarea></div>
    </div>
        {if $issetdollar }
            <input type="hidden" name="ide" id ="ide" value="{$dollar}">
        {/if}
        <div class="" >
    <input type="submit" name="commenter" id="commenter" value="Commenter" class="btn btn-large btn-primary " onclick="return valider()">
    </div>
</form>
        </div>
    {* Sinon on affiche le formulaire complet pour les visiteurs *}
    {else}
    <div class="clearfix" >
         <label for="nom">Nom</label>
         <div class="input"><input type="text" name="nom" id="nom" value=""></div>
    </div>
        <div class="clearfix" >
         <label for="email">Email</label>
         <div class="input"><input type="text" name="email" id="email" value=""></div>
    </div>
    <div class="clearfix" >
         <label for="commentaire">Commentaire</label>
         <div class="input"><textarea name="commentaire" id="commentaire"></textarea></div>
    </div>';
        {if $issetdollar }
            <input type="hidden" name="ide" id ="ide" value="{$dollar}">
        {/if}
        <div class="" >
    <input type="submit" name="commenter" id="commenter" value="Commenter" class="btn btn-large btn-primary " onclick="return valider()">
    </div>
</form>
    </div>
    {/if}
        
    {* On affiche les commentaires relié à l'article ! *}
    
        {foreach $sth1 as $s}
        {if $count > 0}

           {* Tester le propriétaire du commentaire pour mettre une image convenante  *}
            <div class ="flawt2"><div class="row" style="padding-bottom:20px" id="linkcomment"><div class="span1">
            {if strcmp($s.statut,"admin") == 0}
                <div class="imagecrop"><img src="img/users/admin.png" class="comms"></div></div><div class="aucom"><blockquote><div><b><font color="#ff0000">{$s.Name}</font></b> •  <u><i>Posté le {$s.date}
            {elseif strcmp($s.statut,"membre") == 0}
                <div class="imagecrop"><img src="img/users/{$s.username}.jpg" class="comms"></div></div><div class="aucom"><blockquote><div><b><font color="#1a20f0">{$s.Name}</font></b> •  <u><i>Posté le {$s.date}
            {elseif strcmp($s.statut,"guest") == 0}
                <div class="imagecrop"><img src="img/users/{$s.Name|upper|substr:0:1}.png" class="comms"></div></div><div class="aucom"><blockquote><div><b><font color="#1a20f0">{$s.Name}{$s.Name}</font></b> •  <u><i>Posté le {$s.date}
            {/if}

            {* L'admin peut supprimer les commentaires  *}
            </i></u> </div><div class="col-xs-6">{$s.commentaire}<footer><b><i>{$s.emaill}</b></i>   </footer>
            {if $admin} 
                <a href="delete.php?id={$s.id_commentaire}&article={$dollar}"><font color="red">Supprimer</font></a></div></blockquote></div></div></div>
            {else}
                </div></blockquote></div></div></div>
            {/if}
        {/if}
        {/foreach}
                                </div>
                </div>
</div>