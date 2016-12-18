<?php
/* Smarty version 3.1.30, created on 2016-12-17 12:24:23
  from "C:\wamp64\www\monsite\templates\recherche.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58552e77604f79_38178871',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '660400c391a35f8261b615a6180df07e9ccefc54' => 
    array (
      0 => 'C:\\wamp64\\www\\monsite\\templates\\recherche.tpl',
      1 => 1481977460,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58552e77604f79_38178871 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_truncate')) require_once 'C:\\wamp64\\www\\monsite\\libs\\plugins\\modifier.truncate.php';
?>
<div class="row">
		<div class="col-xs-11">
			<div class="row">
                            
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['sth']->value, 'r');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['r']->value) {
?>
    <div class="col-xs-4">
    <div class="larticle">
        <div class='avantarticle'><h3>
            <a href="viewpost.php?id=<?php echo $_smarty_tpl->tpl_vars['r']->value['ID'];?>
"><?php echo $_smarty_tpl->tpl_vars['r']->value['TITRE'];?>
</a>
            <font size="1" color="grey">Posté le <B><i><?php echo $_smarty_tpl->tpl_vars['r']->value['DATE'];?>
</i></B></font>
            </h3>
            
        </div>
        <div class="alarticle"><img src="img/<?php echo $_smarty_tpl->tpl_vars['r']->value['ID'];?>
.jpg" height="184" width="610" align="center" class="firstimage"><BR>
        <?php if ((mb_strlen($_smarty_tpl->tpl_vars['r']->value['TEXTE'], 'UTF-8')) > 2) {?>
            <?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['r']->value['TEXTE'],40);?>

            <BR><a href="viewpost.php?id=<?php echo $_smarty_tpl->tpl_vars['r']->value['ID'];?>
"><font size="5" color="#ff6700">Lire la suite »</font></a>
        <?php }?>
        <BR>
        <BR>
        
            <?php if ($_smarty_tpl->tpl_vars['admin']->value == true) {?>
            <a href="article.php?id=<?php echo $_smarty_tpl->tpl_vars['r']->value['ID'];?>
">Modifier</a>
            <a href="delete.php?article_id=<?php echo $_smarty_tpl->tpl_vars['r']->value['ID'];?>
"><font color="red">Supprimer</font></a>
            <?php }?>
        </div>  
            <div class="apreslarticle"><i><u><a href="viewpost.php?id=<?php echo $_smarty_tpl->tpl_vars['r']->value['ID'];?>
#linkcomment"><?php echo $_smarty_tpl->tpl_vars['r']->value['nbr_commentaire'];?>
 commentaires </a></u></i><img src="css/img/visites.png" width="20" height="20"> <?php echo $_smarty_tpl->tpl_vars['r']->value['nbr_visites'];?>

            </div>
             
    </div>
    </div>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                        </div>
                </div>
</div><?php }
}
