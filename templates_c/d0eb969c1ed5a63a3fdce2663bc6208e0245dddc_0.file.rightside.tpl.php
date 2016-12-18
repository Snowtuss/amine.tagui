<?php
/* Smarty version 3.1.30, created on 2016-12-17 12:32:08
  from "C:\wamp64\www\monsite\templates\rightside.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58553048331540_33831241',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd0eb969c1ed5a63a3fdce2663bc6208e0245dddc' => 
    array (
      0 => 'C:\\wamp64\\www\\monsite\\templates\\rightside.tpl',
      1 => 1481977927,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58553048331540_33831241 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="rightside larticle1">
    <div class="topten"><h3><font color="white">TOP 4 articles</font></h3></div>';
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['sth2']->value, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value) {
?>
<div class="row">    
<div class="col-xs-4">
    <div class=" rightside">
        <div class="avantarticle1"><h4 align="center">
            <a href="viewpost.php?id=<?php echo $_smarty_tpl->tpl_vars['k']->value['ID'];?>
"><?php echo $_smarty_tpl->tpl_vars['k']->value['TITRE'];?>
</a>
            <font size="1" color="grey">Posté le <B><i><?php echo $_smarty_tpl->tpl_vars['k']->value['DATE'];?>
</i></B></font>
            </h4>
        </div>  
            
            <div class="alarticle">
                <img src="img/<?php echo $_smarty_tpl->tpl_vars['k']->value['ID'];?>
.jpg" height="90" width="300" class="sideimage">
            </div>
            
             
    </div>
    </div>
    </div>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

</div><?php }
}
