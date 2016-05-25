<h1>{$title}</h1>


{$errors}

<form action="{$form_url}" method="post">
    {* <input type="hidden" name="row[log_id]" value="{$row.log_id}" /> *}
    <br>
    <input type="text" name="row[date]" value="{$row.date}" />
    <br>
    <input type="text" name="row[user_id]" value="{$row.user_id}" />
    <br>
    <input type="text" name="row[action]" value="{$row.action}" />
    <br>
    <input type="text" name="row[type]" value="{$row.type}" />
    <br>
    <input type="text" name="row[data]" value="{$row.data}" />
    <br>
    <button name="{$btn_name}">Update</button>
</form>