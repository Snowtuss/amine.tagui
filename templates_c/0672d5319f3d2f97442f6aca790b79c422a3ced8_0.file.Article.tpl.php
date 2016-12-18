<?php
/* Smarty version 3.1.30, created on 2016-12-17 11:33:38
  from "C:\wamp64\www\monsite\templates\Article.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58552292a05c85_16999504',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0672d5319f3d2f97442f6aca790b79c422a3ced8' => 
    array (
      0 => 'C:\\wamp64\\www\\monsite\\templates\\Article.tpl',
      1 => 1481895679,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58552292a05c85_16999504 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="row">
		<div class="col-xs-11">
			<div class="row">
<form action="article.php" method="post" enctype="multipart/form-data" id="form_article" name="form_article" class='larticle'>
    
        
        <?php if (isset($_smarty_tpl->tpl_vars['id']->value)) {?>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['service']->value, 'r');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['r']->value) {
?>
                <div class="clearfix" >
                            <label for="titre">Titre</label>
                             <div class="input"><input type="text" name="titre" id="titre" value="<?php echo $_smarty_tpl->tpl_vars['r']->value['TITRE'];?>
"></div>
                        </div>
                        
                        <div class="clearfix" >
                            <label for="texte">Texte</label>
                             <div class="input"><input type="text" name="texte" id="titre" value="<?php echo $_smarty_tpl->tpl_vars['r']->value['TEXTE'];?>
"></div>
                        </div>
    
                        <div class="clearfix" >
                               <label for="image">Image</label>
                               <div class="input"><input type="file" name="image" id="image" value=""></div>
                        </div>
    
                        <div class="clearfix" >
                               <label for="publie">Publié</label>
                               <div class="input"><input type="checkbox" name="publie" id="publie"></div>
                        </div>
                        
                         <input type="hidden" name="date" id ="date" value="<?php echo $_smarty_tpl->tpl_vars['date_ajout']->value;?>
">
                           <input type="hidden" name="ide" id ="ide" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">  
    
                        <div class="mybutton" >
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            <?php echo $_smarty_tpl->tpl_vars['service']->value->closeCursor();?>

            
       
        <?php } elseif (!isset($_smarty_tpl->tpl_vars['id']->value)) {?>
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
        <?php }?>
      
    <?php if ($_smarty_tpl->tpl_vars['REQUEST_URI']->value == "/monsite/article.php") {?>
        <input type="submit" name="ajouter" id="ajouter" value="Ajouter" class="btn btn-large btn-primary ">
        <?php } else { ?>
            <input type="submit" name="modifier" id="modifier" value="Modifier" class="btn btn-large btn-primary ">
    <?php }?>
    </div>
    </form>   
        </div>
                        </div>
                </div><?php }
}
