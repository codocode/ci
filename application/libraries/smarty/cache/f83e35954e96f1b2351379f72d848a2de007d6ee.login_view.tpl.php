<?php
/* Smarty version 3.1.30-dev/18, created on 2016-03-07 02:52:01
  from "E:\wamp\www\ci_login\application\views\admin\login\login_view.tpl" */

if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.30-dev/18',
  'unifunc' => 'content_56dcecd1d913b5_40595773',
  'file_dependency' => 
  array (
    '696db841948163b72c2b3b5fc45a558288d05ef8' => 
    array (
      0 => 'E:\\wamp\\www\\ci_login\\application\\views\\admin\\login\\login_view.tpl',
      1 => 1455608052,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_56dcecd1d913b5_40595773 ($_smarty_tpl) {
?>

   <h1>Admin Login with CodeIgniter</h1>
   
   <form action="http://localhost/ci_login/index.php/admin/login/submit" method="post" accept-charset="utf-8">
     <label for="username">Username:</label>
     <input type="text" size="20" id="username" name="username" value="" />
     <br/>
     <label for="password">Password:</label>
     <input type="password" size="20" id="passowrd" name="password" value="" />
     <br/>
     <input type="submit" value="Login" name="user_log_in" />
     
    <label> <input type="checkbox" value="1" name="remember_me" } /> remember me </label>
   </form>
<?php }
}
