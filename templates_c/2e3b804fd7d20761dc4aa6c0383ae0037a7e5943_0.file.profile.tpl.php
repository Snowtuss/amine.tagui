<?php
/* Smarty version 3.1.30, created on 2016-12-17 11:59:54
  from "C:\wamp64\www\monsite\templates\profile.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_585528ba617ce2_90761662',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2e3b804fd7d20761dc4aa6c0383ae0037a7e5943' => 
    array (
      0 => 'C:\\wamp64\\www\\monsite\\templates\\profile.tpl',
      1 => 1481895586,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_585528ba617ce2_90761662 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="row">
		<div class="col-xs-11">
			<div class="row">
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['sth']->value, 's');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['s']->value) {
?>
     <?php if (strcmp($_smarty_tpl->tpl_vars['cookie']->value,$_smarty_tpl->tpl_vars['s']->value['sid']) == 0) {?>
     
    <div class="larticle">
 <div class="avantarticle"><h2>PROFILE DE <?php echo mb_strtoupper($_smarty_tpl->tpl_vars['s']->value['nom'], 'UTF-8');?>
 <?php echo mb_strtoupper($_smarty_tpl->tpl_vars['s']->value['prenom'], 'UTF-8');?>
</h2></div>
     <div class="alarticle">
     <div class="avatar leprofile"><h2>Avatar</h2><div class = "imagecrop"><img src="img/users/<?php echo $_smarty_tpl->tpl_vars['s']->value['username'];?>
.jpg" class="comms"></div></div>
     <div class="infos leprofile"><h2>Tous à propros de moi</h2>
     <h4><font color="#ff6700">Username : </font><i><?php echo $_smarty_tpl->tpl_vars['s']->value['username'];?>
</i></h4>
        <h4><font color="#ff6700">Email : </font><i><?php echo $_smarty_tpl->tpl_vars['s']->value['email'];?>
</i></h4> 
            <h4><font color="#ff6700">Rang : </font><i><?php echo $_smarty_tpl->tpl_vars['s']->value['statut'];?>
</i></h4>
                <h4><font color="#ff6700">Membre depuis le : </font><i><?php echo $_smarty_tpl->tpl_vars['s']->value['date_creation'];?>
</i></h4>
                <BR>
                <BR>
      </div>
     </div>
    </div>
    <?php }
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                        </div>
                </div>
</div><?php }
}
