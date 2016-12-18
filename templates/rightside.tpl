<div class="rightside larticle1">
    <div class="topten"><h3><font color="white">TOP 4 articles</font></h3></div>';
    {foreach $sth2 as $k}
<div class="row">    
<div class="col-xs-4">
    <div class=" rightside">
        <div class="avantarticle1"><h4 align="center">
            <a href="viewpost.php?id={$k.ID}">{$k.TITRE}</a>
            <font size="1" color="grey">Posté le <B><i>{$k.DATE}</i></B></font>
            </h4>
        </div>  
            
            <div class="alarticle">
                <img src="img/{$k.ID}.jpg" height="90" width="300" class="sideimage">
            </div>
            
             
    </div>
    </div>
    </div>
    {/foreach}
</div>