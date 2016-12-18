<div class="row">
		<div class="col-xs-11">
			<div class="row">
{foreach $sth as $s}
     {if strcmp($cookie,$s.sid) ==0}
     {* Affichage des informations sur l'utilisateur *}
    <div class="larticle">
 <div class="avantarticle"><h2>PROFILE DE {$s.nom|upper} {$s.prenom|upper}</h2></div>
     <div class="alarticle">
     <div class="avatar leprofile"><h2>Avatar</h2><div class = "imagecrop"><img src="img/users/{$s.username}.jpg" class="comms"></div></div>
     <div class="infos leprofile"><h2>Tous à propros de moi</h2>
     <h4><font color="#ff6700">Username : </font><i>{$s.username}</i></h4>
        <h4><font color="#ff6700">Email : </font><i>{$s.email}</i></h4> 
            <h4><font color="#ff6700">Rang : </font><i>{$s.statut}</i></h4>
                <h4><font color="#ff6700">Membre depuis le : </font><i>{$s.date_creation}</i></h4>
                <BR>
                <BR>
      </div>
     </div>
    </div>
    {/if}
{/foreach}
                        </div>
                </div>
</div>