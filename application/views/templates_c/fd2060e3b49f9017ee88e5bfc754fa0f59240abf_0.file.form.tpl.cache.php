<?php
/* Smarty version 3.1.30-dev/18, created on 2016-04-01 08:17:47
  from "J:\www\git\ci\application\modules\users\views\admin\form.tpl" */

if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.30-dev/18',
  'unifunc' => 'content_56fe2eab41ef21_01471433',
  'file_dependency' => 
  array (
    'fd2060e3b49f9017ee88e5bfc754fa0f59240abf' => 
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
function content_56fe2eab41ef21_01471433 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '397356fe2eaa75d066_23296953';
?>
<h2><?php echo $_smarty_tpl->tpl_vars['page_title']->value;?>
</h2>

<?php echo validation_errors();?>




<?php $_smarty_tpl->_assignInScope('attribute', array('method'=>'post','id'=>'form_data'), null, 0, false);
$_smarty_tpl->_assignInScope('hidden', array(), null, 0, false);
if (isset($_smarty_tpl->tpl_vars['update_id']->value)) {?>
    <?php $_smarty_tpl->_assignInScope('hidden', array('update_id'=>$_smarty_tpl->tpl_vars['update_id']->value,'prev_id'=>$_smarty_tpl->tpl_vars['prev_id']->value,'next_id'=>$_smarty_tpl->tpl_vars['next_id']->value), null, 0, false);
}?>

<?php echo form_open_multipart(((string)$_smarty_tpl->tpl_vars['module']->value)."/submit",$_smarty_tpl->tpl_vars['attribute']->value,$_smarty_tpl->tpl_vars['hidden']->value);?>


<!-------------------------------- START HERE -------------------------------->

<!-------------------------------- END HERE -------------------------------->
</form>
<?php }
}
