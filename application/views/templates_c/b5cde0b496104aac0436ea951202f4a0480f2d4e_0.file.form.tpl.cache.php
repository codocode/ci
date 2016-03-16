<?php
/* Smarty version 3.1.30-dev/18, created on 2016-03-15 10:43:12
  from "E:\wamp\www\ci_login\application\modules\users\views\admin\form.tpl" */

if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.30-dev/18',
  'unifunc' => 'content_56e7d930c60a94_44711552',
  'file_dependency' => 
  array (
    'b5cde0b496104aac0436ea951202f4a0480f2d4e' => 
    array (
      0 => 'E:\\wamp\\www\\ci_login\\application\\modules\\users\\views\\admin\\form.tpl',
      1 => 1457409607,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56e7d930c60a94_44711552 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '944656e7d92fefc4e6_92071989';
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
