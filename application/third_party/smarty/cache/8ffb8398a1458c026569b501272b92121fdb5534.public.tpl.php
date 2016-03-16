<?php
/* Smarty version 3.1.30-dev/18, created on 2016-02-16 06:17:40
  from "E:\wamp\www\ci_login\application\views\templates\frontend\templates\public.tpl" */

if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.30-dev/18',
  'unifunc' => 'content_56c2bf046e7185_39514190',
  'file_dependency' => 
  array (
    '053139f3f24b864eb8f651a1e8b59d0a8ac6dcf6' => 
    array (
      0 => 'E:\\wamp\\www\\ci_login\\application\\views\\templates\\frontend\\templates\\public.tpl',
      1 => 1455603076,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_56c2bf046e7185_39514190 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo '<?php ';?>echo $title; <?php echo '?>';?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
    <div id="header>" class="container">

    </div>

    <div class="container">
        <div id="content">


          
          
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


        </div>
    </div>

    <div id="footer" class="container">
        <p>footer</p>
    </div>
</body>
</html><?php }
}
