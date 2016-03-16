<?php
/* Smarty version 3.1.30-dev/18, created on 2016-02-29 02:24:47
  from "E:\wamp\www\ci_login\application\views\admin\menus\form.tpl" */

if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.30-dev/18',
  'unifunc' => 'content_56d3abef8604e7_54581891',
  'file_dependency' => 
  array (
    '3ddedb1a88f8bc44f21ac29449d4bb96d70189ee' => 
    array (
      0 => 'E:\\wamp\\www\\ci_login\\application\\views\\admin\\menus\\form.tpl',
      1 => 1456712681,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56d3abef8604e7_54581891 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '2268056d3abef83d785_53475347';
?>
<div id="content_header">
    <h1 id="content_title">Create Menu</h1>

    <div id="content_buttons">

        <div id="content_buttons_basic">
            <a href="<?php echo site_url("admin/menus/create");?>
" >Add Menu</a>
        </div>

        <div id="content_buttons_advanced">
            
        </div>

    </div>

</div>


<div id="content_main">

    <form action="<?php echo site_url("admin/menus/submit");?>
" method="post">
        
        <label>Name:</label>
        <input type="text" name="menu_data[menu_name]" value="" />
        <br/>
        <label>Title:</label>
        <input type="text" name="menu_data[menu_title]" value="" />
        <br/>
        <label>URL:</label>
        <input type="text" name="menu_data[menu_url]" value="" />
        <br/>
        <label>Parent Id:</label>
        <input type="text" name="menu_data[menu_parent_id]" value="" />
        <br/>

        <button type="submit">Add</button>

    </form>

</div>

<div id="content_footer">

</div>
<?php }
}
