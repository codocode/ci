<?php
/* Smarty version 3.1.30-dev/18, created on 2016-02-29 02:13:07
  from "E:\wamp\www\ci_login\application\views\admin\menus\index.tpl" */

if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.30-dev/18',
  'unifunc' => 'content_56d3a9331595f4_41977097',
  'file_dependency' => 
  array (
    'd978f78cd46f2ab36c4d5c2365108c2ebb685290' => 
    array (
      0 => 'E:\\wamp\\www\\ci_login\\application\\views\\admin\\menus\\index.tpl',
      1 => 1455693109,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56d3a9331595f4_41977097 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '3065156d3a933046f83_08883554';
?>
<div id="content_header">
    <h1 id="content_title">Manage Menus</h1>

    <div id="content_buttons">

        <div id="content_buttons_basic">
            <a href="<?php echo site_url("admin/menus/create");?>
" >Add Menu</a>
        </div>

        <div id="content_buttons_advanced">
            
        </div>

    </div>

</div>

<div id="content_search">

</div>

<div id="content_main">

    <table border="1">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Title</th>
                <th>URL</th>
                <th>Level</th>
                <th>Parent Id</th>
                <th>Parent Path</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['result']->value, 'data', false, 'index_key');
foreach ($_from as $_smarty_tpl->tpl_vars['index_key']->value => $_smarty_tpl->tpl_vars['data']->value) {
$_smarty_tpl->tpl_vars['data']->_loop = true;
$__foreach_data_0_saved = $_smarty_tpl->tpl_vars['data'];
?>
            <tr>
                <td><?php echo $_smarty_tpl->tpl_vars['data']->value->menu_id;?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['data']->value->menu_name;?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['data']->value->menu_title;?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['data']->value->menu_url;?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['data']->value->menu_level;?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['data']->value->menu_parent_id;?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['data']->value->menu_parent_path;?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['data']->value->menu_status;?>
</td>
                <td>
                    <a href="<?php echo site_url("admin/menus/update/".((string)$_smarty_tpl->tpl_vars['data']->value->menu_id));?>
" >Edit</a>
                    <a href="<?php echo site_url("admin/menus/delete/".((string)$_smarty_tpl->tpl_vars['data']->value->menu_id));?>
" >Delete</a>
                </td>
            </tr>
        <?php
$_smarty_tpl->tpl_vars['data'] = $__foreach_data_0_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
        </tbody>
    </table>

</div>

<div id="content_footer">

</div><?php }
}
