<?php
/* Smarty version 3.1.30-dev/18, created on 2016-03-15 01:45:51
  from "E:\wamp\www\ci_login\application\modules\users\views\ADMIN\form.tpl" */

if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.30-dev/18',
  'unifunc' => 'content_56e7694fac5211_67264640',
  'file_dependency' => 
  array (
    '6e746d4c7071489846e917a916f0477a3afc1cf9' => 
    array (
      0 => 'E:\\wamp\\www\\ci_login\\application\\modules\\users\\views\\ADMIN\\form.tpl',
      1 => 1457409607,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56e7694fac5211_67264640 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '410856e7694f9e2917_48020764';
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
