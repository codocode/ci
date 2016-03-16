<?php
/* Smarty version 3.1.30-dev/18, created on 2016-03-07 02:52:01
  from "E:\wamp\www\ci_login\application\views\admin\login\login_view.tpl" */

if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.30-dev/18',
  'unifunc' => 'content_56dcecd1d7bb00_84135929',
  'file_dependency' => 
  array (
    '696db841948163b72c2b3b5fc45a558288d05ef8' => 
    array (
      0 => 'E:\\wamp\\www\\ci_login\\application\\views\\admin\\login\\login_view.tpl',
      1 => 1455608052,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56dcecd1d7bb00_84135929 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '2841756dcecd1d37265_01439560';
?>

   <h1>Admin Login with CodeIgniter</h1>
   <?php echo validation_errors();?>

   <?php echo form_open('admin/login/submit');?>

     <label for="username">Username:</label>
     <input type="text" size="20" id="username" name="username" value="<?php if (isset($_smarty_tpl->tpl_vars['uname']->value)) {
echo $_smarty_tpl->tpl_vars['uname']->value;
}?>" />
     <br/>
     <label for="password">Password:</label>
     <input type="password" size="20" id="passowrd" name="password" value="<?php if (isset($_smarty_tpl->tpl_vars['upass']->value)) {
echo $_smarty_tpl->tpl_vars['upass']->value;
}?>" />
     <br/>
     <input type="submit" value="Login" name="user_log_in" />
     
    <label> <input type="checkbox" value="1" name="remember_me" <?php if (isset($_smarty_tpl->tpl_vars['remember_me']->value)) {?>checked="checked"<?php }?>} /> remember me </label>
   </form>
<?php }
}
