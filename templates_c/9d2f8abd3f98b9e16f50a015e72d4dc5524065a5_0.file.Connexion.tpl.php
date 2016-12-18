<?php
/* Smarty version 3.1.30, created on 2016-12-16 14:35:39
  from "C:\wamp64\www\monsite\templates\Connexion.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5853fbbb6214c6_88923017',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9d2f8abd3f98b9e16f50a015e72d4dc5524065a5' => 
    array (
      0 => 'C:\\wamp64\\www\\monsite\\templates\\Connexion.tpl',
      1 => 1481895714,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5853fbbb6214c6_88923017 (Smarty_Internal_Template $_smarty_tpl) {
?>


        <?php if (isset($_smarty_tpl->tpl_vars['connexion_test']->value) && $_smarty_tpl->tpl_vars['connexion_test']->value == FALSE) {?>
            <div class="alert alert-danger" role="alert">
                <strong>Le login / mot de passe est incorrecte !</strong>
            </div>
        <?php }?>
        
  

    
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
</div><?php }
}
