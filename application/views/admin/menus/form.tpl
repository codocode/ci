<div id="content_header">
    <h1 id="content_title">Create Menu</h1>

    <div id="content_buttons">

        <div id="content_buttons_basic">
            <a href="{"admin/menus/create"|site_url}" >Add Menu</a>
        </div>

        <div id="content_buttons_advanced">
            
        </div>

    </div>

</div>


<div id="content_main">

    <form action="{"admin/menus/submit"|site_url}" method="post">
        
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
