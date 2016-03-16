<?php
/* Smarty version 3.1.30-dev/18, created on 2016-03-07 03:53:37
  from "E:\wamp\www\ci_login\application\views\admin\templates\admin.tpl" */

if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.30-dev/18',
  'unifunc' => 'content_56dced3191d5b5_36981752',
  'file_dependency' => 
  array (
    '98c4b702f4d1d40b9febe50016db522363af7be1' => 
    array (
      0 => 'E:\\wamp\\www\\ci_login\\application\\views\\admin\\templates\\admin.tpl',
      1 => 1455846169,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56dced3191d5b5_36981752 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '1018456dced3165e290_38480211';
?>
<!DOCTYPE html>
<html lang = "en">
   
   <head>
      <meta charset = "utf-8">
      <meta http-equiv = "X-UA-Compatible" content = "IE = edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Admin - <?php echo (($tmp = @$_smarty_tpl->tpl_vars['title']->value)===null||$tmp==='' ? '' : $tmp);?>
</title>
      
      <!-- Bootstrap -->
      <link href = "//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel = "stylesheet">
      
      <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      
      <!--[if lt IE 9]>
      <?php echo '<script'; ?>
 src = "https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"><?php echo '</script'; ?>
>
      <?php echo '<script'; ?>
 src = "https://oss.maxcdn.com/respond/1.4.2/respond.min.js"><?php echo '</script'; ?>
>
      <![endif]-->
      
   </head>
   
   <body>
        <div id="header>" class="container-fluid">

            <nav class = "navbar navbar-default" role = "navigation">
   
               <div class = "navbar-header">
                  <a class = "navbar-brand" href = "#">TutorialsPoint</a>
               </div>
               
               <div class="pull-left">
                  <ul class = "nav navbar-nav">
                     <li class = "active"><a href = "#">iOS</a></li>
                     <li><a href = "#">SVN</a></li>
                  
                     <li class = "dropdown">
                        <a href = "#" class = "dropdown-toggle" data-toggle = "dropdown">
                           Java 
                           <b class = "caret"></b>
                        </a>
                        
                        <ul class = "dropdown-menu">
                           <li><a href = "#">jmeter</a></li>
                           <li><a href = "#">EJB</a></li>
                           <li><a href = "#">Jasper Report</a></li>
                           
                           <li class = "divider"></li>
                           <li><a href = "#">Separated link</a></li>
                           
                           <li class = "divider"></li>
                           <li><a href = "#">One more separated link</a></li>
                        </ul>
                        
                     </li>
                     <li class = "dropdown">
                        <a href = "#" class = "dropdown-toggle" data-toggle = "dropdown">
                           Setting 
                           <b class = "caret"></b>
                        </a>
                        
                        <ul class = "dropdown-menu">
                            <li><a href = "<?php echo site_url("admin/menus");?>
">Menu</a></li>
                           <li><a href = "#">Activity Log</a></li>
                           <li><a href = "#">Back up Database</a></li>
                           <li class = "divider"></li>
                           <li><a href = "#">Edit Profile</a></li>
                           
                           <li class = "divider"></li>
                           <li><a href = "login/logout">Logout</a></li>
                        </ul>
                        
                     </li>

                     <?php $_smarty_tpl->_assignInScope("current_url", current_url(), null, 0, false);
?>
                    
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['menu']->value, 'link', false, 'menu_name');
foreach ($_from as $_smarty_tpl->tpl_vars['menu_name']->value => $_smarty_tpl->tpl_vars['link']->value) {
$_smarty_tpl->tpl_vars['link']->_loop = true;
$__foreach_link_0_saved = $_smarty_tpl->tpl_vars['link'];
?>

                        <?php $_smarty_tpl->_assignInScope("link_url", (($tmp = @$_smarty_tpl->tpl_vars['link']->value['url'])===null||$tmp==='' ? '#' : $tmp), null, 0, false);
?>

                        <?php $_smarty_tpl->_assignInScope("menu_active", '', null, 0, false);
?>

                        <?php if (!empty($_smarty_tpl->tpl_vars['link']->value['sub_menu'])) {?>

                            <?php $_smarty_tpl->_cache['capture_stack'][] = array("sub_menu", null, null); ob_start(); ?>
                                
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['link']->value['sub_menu'], 'sub_link', false, 'sub_menu_name');
foreach ($_from as $_smarty_tpl->tpl_vars['sub_menu_name']->value => $_smarty_tpl->tpl_vars['sub_link']->value) {
$_smarty_tpl->tpl_vars['sub_link']->_loop = true;
$__foreach_sub_link_1_saved = $_smarty_tpl->tpl_vars['sub_link'];
?>
                                    <?php $_smarty_tpl->_assignInScope("sub_link_url", (($tmp = @$_smarty_tpl->tpl_vars['sub_link']->value['url'])===null||$tmp==='' ? '#' : $tmp), null, 0, false);
?>

                                    <?php if ($_smarty_tpl->tpl_vars['current_url']->value == $_smarty_tpl->tpl_vars['sub_link_url']->value) {?>
                                        <?php $_smarty_tpl->_assignInScope("class_active", 'class="active"', null, 0, false);
?>
                                        <?php $_smarty_tpl->_assignInScope("menu_active", $_smarty_tpl->tpl_vars['class_active']->value, null, 0, false);
?>
                                    <?php } else { ?>
                                        <?php $_smarty_tpl->_assignInScope("class_active", '', null, 0, false);
?>
                                    <?php }?>


                                    <li <?php echo $_smarty_tpl->tpl_vars['class_active']->value;?>
>
                                        <a href = "<?php echo $_smarty_tpl->tpl_vars['sub_link_url']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['sub_link']->value['title'];?>
</a>
                                    </li>
                                    <li class = "divider"></li>
                                <?php
$_smarty_tpl->tpl_vars['sub_link'] = $__foreach_sub_link_1_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
                            
                            <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_cache['capture_stack']);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
$_smarty_tpl->_cache['__smarty_capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

                            <li <?php echo $_smarty_tpl->tpl_vars['menu_active']->value;?>
>
                                <a href = "<?php echo $_smarty_tpl->tpl_vars['link_url']->value;?>
" class="dropdown-toggle" data-toggle="dropdown">
                                   <?php echo $_smarty_tpl->tpl_vars['link']->value['title'];?>

                                   <b class = "caret"></b>
                                </a>

                                <?php if ((isset($_smarty_tpl->_cache['__smarty_capture']['sub_menu']) ? $_smarty_tpl->_cache['__smarty_capture']['sub_menu'] : null) != '') {?>
                                    <ul class = "dropdown-menu"><?php echo (isset($_smarty_tpl->_cache['__smarty_capture']['sub_menu']) ? $_smarty_tpl->_cache['__smarty_capture']['sub_menu'] : null);?>
</ul>
                                <?php }?>
                            </li>
                        <?php } else { ?>
                            <li class = "active"><a href = "<?php echo $_smarty_tpl->tpl_vars['link_url']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['link']->value['title'];?>
</a></li>
                        <?php }?>
                    
                    <?php
$_smarty_tpl->tpl_vars['link'] = $__foreach_link_0_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                  </ul>
               </div>
           
            </nav>

        </div>

        <div class="container">
            <div id="content">


              
              <?php echo $_smarty_tpl->tpl_vars['this']->value->load->view($_smarty_tpl->tpl_vars['view_file']->value);?>


            </div>
        </div>

        <div id="footer" class="container">
            <p>footer</p>
        </div>
      
      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <?php echo '<script'; ?>
 src = "https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"><?php echo '</script'; ?>
>
      
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <?php echo '<script'; ?>
 src = "//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"><?php echo '</script'; ?>
>
      
   </body>
</html>
<?php }
}
