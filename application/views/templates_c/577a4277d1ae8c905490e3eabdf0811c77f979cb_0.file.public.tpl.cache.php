<?php
/* Smarty version 3.1.30-dev/18, created on 2016-03-08 00:49:39
  from "E:\wamp\www\ci_login\application\views\frontend\templates\public.tpl" */

if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.30-dev/18',
  'unifunc' => 'content_56de1393e532a2_98747448',
  'file_dependency' => 
  array (
    '577a4277d1ae8c905490e3eabdf0811c77f979cb' => 
    array (
      0 => 'E:\\wamp\\www\\ci_login\\application\\views\\frontend\\templates\\public.tpl',
      1 => 1455607163,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56de1393e532a2_98747448 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '2549956de1393dc6863_57462705';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo (($tmp = @$_smarty_tpl->tpl_vars['title']->value)===null||$tmp==='' ? '' : $tmp);?>
</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"><?php echo '</script'; ?>
>
</head>
<body>
    <div id="header>" class="container">

    </div>

    <div class="container">
        <div id="content">


          
          <?php echo $_smarty_tpl->tpl_vars['this']->value->load->view($_smarty_tpl->tpl_vars['view_file']->value);?>


        </div>
    </div>

    <div id="footer" class="container">
        <p>footer</p>
    </div>
</body>
</html><?php }
}
