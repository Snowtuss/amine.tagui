<?php
/* Smarty version 3.1.30, created on 2016-12-17 12:26:59
  from "C:\wamp64\www\monsite\templates\viewpost.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58552f13b1cee3_38501667',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd7297cbbb491d2dbba710296e36654cdfbfa74d7' => 
    array (
      0 => 'C:\\wamp64\\www\\monsite\\templates\\viewpost.tpl',
      1 => 1481977599,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58552f13b1cee3_38501667 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="row">
		<div class="col-xs-11">
			<div class="row">
                            
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['sth']->value, 'r');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['r']->value) {
?>
    <div class="larticle">
        <h1><?php echo $_smarty_tpl->tpl_vars['r']->value['TITRE'];?>
<font size="1" color="grey">Posté le <B><i><?php echo $_smarty_tpl->tpl_vars['r']->value['DATE'];?>
</i></B></font></h1>
        <img src="img/<?php echo $_smarty_tpl->tpl_vars['r']->value['ID'];?>
.jpg" height="184" width="610" class="viewimage"><BR>
        <p class="letexte"><?php echo $_smarty_tpl->tpl_vars['r']->value['TEXTE'];?>
</p><BR>
        <font size="2" color="grey"><i>L'article a été vu : <b><?php echo $_smarty_tpl->tpl_vars['r']->value['nbr_visites'];?>
 fois </b></i></font>
        <BR> 
    </div>

<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>



<div class="flawt3">
<h3>Commentaires :</h3>
    <form action="<?php echo $_smarty_tpl->tpl_vars['formlink']->value;?>
" method="post" enctype="multipart/form-data" id="form_viewpost" name="form_viewpost" class="flawt">
    
        <?php if ($_smarty_tpl->tpl_vars['connecte']->value) {?>
    <div class="clearfix" >
         <label for="nom">Commentaire</label>
         <div class="input"><textarea name="commentaire" id="commentaire"></textarea></div>
    </div>
        <?php if ($_smarty_tpl->tpl_vars['issetdollar']->value) {?>
            <input type="hidden" name="ide" id ="ide" value="<?php echo $_smarty_tpl->tpl_vars['dollar']->value;?>
">
        <?php }?>
        <div class="" >
    <input type="submit" name="commenter" id="commenter" value="Commenter" class="btn btn-large btn-primary " onclick="return valider()">
    </div>
</form>
        </div>
    
    <?php } else { ?>
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
        <?php if ($_smarty_tpl->tpl_vars['issetdollar']->value) {?>
            <input type="hidden" name="ide" id ="ide" value="<?php echo $_smarty_tpl->tpl_vars['dollar']->value;?>
">
        <?php }?>
        <div class="" >
    <input type="submit" name="commenter" id="commenter" value="Commenter" class="btn btn-large btn-primary " onclick="return valider()">
    </div>
</form>
    </div>
    <?php }?>
        
    
    
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['sth1']->value, 's');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['s']->value) {
?>
        <?php if ($_smarty_tpl->tpl_vars['count']->value > 0) {?>

           
            <div class ="flawt2"><div class="row" style="padding-bottom:20px" id="linkcomment"><div class="span1">
            <?php if (strcmp($_smarty_tpl->tpl_vars['s']->value['statut'],"admin") == 0) {?>
                <div class="imagecrop"><img src="img/users/admin.png" class="comms"></div></div><div class="aucom"><blockquote><div><b><font color="#ff0000"><?php echo $_smarty_tpl->tpl_vars['s']->value['Name'];?>
</font></b> •  <u><i>Posté le <?php echo $_smarty_tpl->tpl_vars['s']->value['date'];?>

            <?php } elseif (strcmp($_smarty_tpl->tpl_vars['s']->value['statut'],"membre") == 0) {?>
                <div class="imagecrop"><img src="img/users/<?php echo $_smarty_tpl->tpl_vars['s']->value['username'];?>
.jpg" class="comms"></div></div><div class="aucom"><blockquote><div><b><font color="#1a20f0"><?php echo $_smarty_tpl->tpl_vars['s']->value['Name'];?>
</font></b> •  <u><i>Posté le <?php echo $_smarty_tpl->tpl_vars['s']->value['date'];?>

            <?php } elseif (strcmp($_smarty_tpl->tpl_vars['s']->value['statut'],"guest") == 0) {?>
                <div class="imagecrop"><img src="img/users/<?php echo substr(mb_strtoupper($_smarty_tpl->tpl_vars['s']->value['Name'], 'UTF-8'),0,1);?>
.png" class="comms"></div></div><div class="aucom"><blockquote><div><b><font color="#1a20f0"><?php echo $_smarty_tpl->tpl_vars['s']->value['Name'];
echo $_smarty_tpl->tpl_vars['s']->value['Name'];?>
</font></b> •  <u><i>Posté le <?php echo $_smarty_tpl->tpl_vars['s']->value['date'];?>

            <?php }?>

            
            </i></u> </div><div class="col-xs-6"><?php echo $_smarty_tpl->tpl_vars['s']->value['commentaire'];?>
<footer><b><i><?php echo $_smarty_tpl->tpl_vars['s']->value['emaill'];?>
</b></i>   </footer>
            <?php if ($_smarty_tpl->tpl_vars['admin']->value) {?> 
                <a href="delete.php?id=<?php echo $_smarty_tpl->tpl_vars['s']->value['id_commentaire'];?>
&article=<?php echo $_smarty_tpl->tpl_vars['dollar']->value;?>
"><font color="red">Supprimer</font></a></div></blockquote></div></div></div>
            <?php } else { ?>
                </div></blockquote></div></div></div>
            <?php }?>
        <?php }?>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                </div>
                </div>
</div><?php }
}
