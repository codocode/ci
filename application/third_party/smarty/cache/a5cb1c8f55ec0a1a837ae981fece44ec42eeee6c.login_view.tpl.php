<?php
/* Smarty version 3.1.30-dev/18, created on 2016-02-16 06:17:40
  from "E:\wamp\www\ci_login\application\views\templates\frontend\login\login_view.tpl" */

if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.30-dev/18',
  'unifunc' => 'content_56c2bf046cae67_84941903',
  'file_dependency' => 
  array (
    '5dace329e1172f6376be98b50cb0b9ab05bb00f1' => 
    array (
      0 => 'E:\\wamp\\www\\ci_login\\application\\views\\templates\\frontend\\login\\login_view.tpl',
      1 => 1455599794,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_56c2bf046cae67_84941903 ($_smarty_tpl) {
?>

   <h1>Simple Login with CodeIgniter</h1>
   
   <form action="http://localhost/ci_login/index.php/login/submit" method="post" accept-charset="utf-8">
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
