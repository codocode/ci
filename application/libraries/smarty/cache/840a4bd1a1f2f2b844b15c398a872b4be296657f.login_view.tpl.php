<?php
/* Smarty version 3.1.30-dev/18, created on 2016-03-08 00:49:39
  from "E:\wamp\www\ci_login\application\views\frontend\login\login_view.tpl" */

if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.30-dev/18',
  'unifunc' => 'content_56de1393ee3b68_57513729',
  'file_dependency' => 
  array (
    '75b3ef8eb830192a075a0600660068d9d0bf9259' => 
    array (
      0 => 'E:\\wamp\\www\\ci_login\\application\\views\\frontend\\login\\login_view.tpl',
      1 => 1455607291,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_56de1393ee3b68_57513729 ($_smarty_tpl) {
?>

   <h1>Simple Login with CodeIgniter</h1>
   <p>Invalid username or password</p>

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
