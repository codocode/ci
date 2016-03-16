<?php
/* Smarty version 3.1.30-dev/18, created on 2016-02-29 02:13:07
  from "E:\wamp\www\ci_login\application\views\admin\menus\index.tpl" */

if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.30-dev/18',
  'unifunc' => 'content_56d3a9331a7861_19144195',
  'file_dependency' => 
  array (
    'd978f78cd46f2ab36c4d5c2365108c2ebb685290' => 
    array (
      0 => 'E:\\wamp\\www\\ci_login\\application\\views\\admin\\menus\\index.tpl',
      1 => 1455693109,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_56d3a9331a7861_19144195 ($_smarty_tpl) {
?>
<div id="content_header">
    <h1 id="content_title">Manage Menus</h1>

    <div id="content_buttons">

        <div id="content_buttons_basic">
            <a href="http://localhost/ci_login/index.php/admin/menus/create" >Add Menu</a>
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
                    <tr>
                <td>1</td>
                <td>link_1</td>
                <td>Link 1</td>
                <td>link1.php</td>
                <td>1</td>
                <td>0</td>
                <td></td>
                <td>1</td>
                <td>
                    <a href="http://localhost/ci_login/index.php/admin/menus/update/1" >Edit</a>
                    <a href="http://localhost/ci_login/index.php/admin/menus/delete/1" >Delete</a>
                </td>
            </tr>
                    <tr>
                <td>2</td>
                <td>sub_menu_1</td>
                <td>Sub Menu 1</td>
                <td>sub_menu_1.php</td>
                <td>2</td>
                <td>1</td>
                <td>1</td>
                <td>1</td>
                <td>
                    <a href="http://localhost/ci_login/index.php/admin/menus/update/2" >Edit</a>
                    <a href="http://localhost/ci_login/index.php/admin/menus/delete/2" >Delete</a>
                </td>
            </tr>
                </tbody>
    </table>

</div>

<div id="content_footer">

</div><?php }
}
