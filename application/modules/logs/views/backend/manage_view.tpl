

<div id="m_action_buttons">
    <button type="submit" class="btn btn-primary" id="m_active" formaction="{$m_active_url}" form="multi_form">Activate Selected</button>
    <button type="submit" class="btn btn-danger" id="m_disable" formaction="{$m_delete_url}" form="multi_form">Delete Selected</button>
</div>

<form action="{$m_action}" method="post" id="multi_form">

<button type="submit" class="btn btn-primary" name="m_active">Activate Selected</button>
<button type="submit" class="btn btn-danger" name="m_delete">Delete Selected</button>

    <table border="1">
        <thead>
            <tr>
                <th></th>
                <th>ID</th>
                <th>User ID</th>
                <th>Action</th>
                <th>Entry Type</th>
                <th>Time</th>
            </tr>
        </thead>
        <tbody>
        {if $records}
            
            {foreach from=$records key=k item=row}
                <tr>
                    <td><input type="checkbox" name="ids[]" value="{$row.log_id}" /></td>
                    <td>{$row.log_id}</td>
                    <td>{$row.user_id}</td>
                    <td>{$row.action}</td>
                    <td>{$row.entry_type}</td>
                    <td>{$row.time}</td>
                </tr>
            {/foreach}

        {else}
            <tr>
                <td colspan="6">
                    No data found
                </td>
            </tr>

        {/if}
        </tbody>
    </table>
</form>

{$pagination}

{if $pagination_stats && !empty($pagination_stats.from) && !empty($pagination_stats.to) && !empty($pagination_stats.total)}

    Showing {$pagination_stats.from} to {$pagination_stats.to} of {$pagination_stats.total}

{/if}



{$items_per_page_url|form_open:['class' => 'form-horizontal form-label-left', 'id' => 'items_per_page_form', 'method'=> 'get']}

    {assign var="attr" value='class="input-sm" onchange="this.form.submit();"'}
    {'items_per_page'|form_dropdown:$items_per_page_opts:$items_per_page:$attr}

    <button type="submit" class="btn btn-primary">Show</button>

</form>
    
{$search_url|form_open:['class'=>'form-horizontal form-label-left', 'id'=>'search_form', 'method'=>'get']}

    <div class="form-group">
        <label class="col-sm-3 control-label">Log ID</label>
        <div class="col-sm-9">
            <div class="input-group col-md-12">
                {['name' => 'log_id',
                    'id'          => 'log_id',
                    'value'       => $search.log_id,
                    'class'   => 'form-control'
                ]|form_input}
            </div>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label">Status</label>
        <div class="col-sm-9">
            <div class="input-group col-md-12">
                {'entry_type'|form_dropdown:[''=>'All', 'S'=>'Success', 'E'=>'Error', 'W'=>'Warning', 'I'=>'Information']:$search.entry_type:'class="form-control"'}
            </div>
        </div>
    </div>

     <div class="form-group">
        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
          <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </div>

</form>
