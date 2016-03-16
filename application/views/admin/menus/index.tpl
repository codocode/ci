<div id="content_header">
    <h1 id="content_title">Manage Menus</h1>

    <div id="content_buttons">

        <div id="content_buttons_basic">
            <a href="{"admin/menus/create"|site_url}" >Add Menu</a>
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
        {foreach from=$result key="index_key" item="data"}
            <tr>
                <td>{$data->menu_id}</td>
                <td>{$data->menu_name}</td>
                <td>{$data->menu_title}</td>
                <td>{$data->menu_url}</td>
                <td>{$data->menu_level}</td>
                <td>{$data->menu_parent_id}</td>
                <td>{$data->menu_parent_path}</td>
                <td>{$data->menu_status}</td>
                <td>
                    <a href="{"admin/menus/update/`$data->menu_id`"|site_url}" >Edit</a>
                    <a href="{"admin/menus/delete/`$data->menu_id`"|site_url}" >Delete</a>
                </td>
            </tr>
        {/foreach}
        </tbody>
    </table>

</div>

<div id="content_footer">

</div>