<?php
/* Smarty version 3.1.30-dev/18, created on 2016-04-01 10:41:32
  from "J:\www\git\ci\application\modules\users\views\admin\form.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.30-dev/18',
  'unifunc' => 'content_56fe505c7205c6_39150856',
  'file_dependency' => 
  array (
    'c318a182555423ce736b6f4f22931a6a0074a569' => 
    array (
      0 => 'J:\\www\\git\\ci\\application\\modules\\users\\views\\admin\\form.tpl',
      1 => 1457409607,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56fe505c7205c6_39150856 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '148156fe505c691c14_82554710';
?>
<h2><?php echo $_smarty_tpl->tpl_vars['page_title']->value;?>
</h2>

<?php echo validation_errors();?>




<?php $_smarty_tpl->tpl_vars['attribute'] = new Smarty_Variable(array('method'=>'post','id'=>'form_data'), null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'attribute', 0);
$_smarty_tpl->tpl_vars['hidden'] = new Smarty_Variable(array(), null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'hidden', 0);
if (isset($_smarty_tpl->tpl_vars['update_id']->value)) {?>
    <?php $_smarty_tpl->tpl_vars['hidden'] = new Smarty_Variable(array('update_id'=>$_smarty_tpl->tpl_vars['update_id']->value,'prev_id'=>$_smarty_tpl->tpl_vars['prev_id']->value,'next_id'=>$_smarty_tpl->tpl_vars['next_id']->value), null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'hidden', 0);
}?>

<?php echo form_open_multipart(((string)$_smarty_tpl->tpl_vars['module']->value)."/submit",$_smarty_tpl->tpl_vars['attribute']->value,$_smarty_tpl->tpl_vars['hidden']->value);?>


<!-------------------------------- START HERE -------------------------------->

<!-------------------------------- END HERE -------------------------------->
</form>
<?php }
}
