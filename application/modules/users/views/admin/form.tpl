<h2>{$page_title}</h2>

{validation_errors()}

{*
<?php 

$attribute['method'] = 'post';
$attribute['id'] = 'form_data';
$hidden = array();
if (isset($update_id)) {
    $hidden['update_id'] = $update_id;
    $hidden['prev_id'] = $prev_id;
    $hidden['next_id'] = $next_id;
}
echo form_open_multipart($module.'/submit', $attribute, $hidden);

// buttons
//$this->load->view('form_buttons');
?>
*}

{assign var=attribute value=['method'=>'post','id'=>'form_data']}
{assign var=hidden value=[]}
{if isset($update_id) }
    {assign var=hidden value=['update_id'=>$update_id,'prev_id'=>$prev_id,'next_id'=>$next_id]}
{/if}

{"`$module`/submit"|form_open_multipart:$attribute:$hidden}

<!-------------------------------- START HERE -------------------------------->

<!-------------------------------- END HERE -------------------------------->
</form>
{*
<?php //echo $this->load->view('form_navigation_data'); ?>

<?php //add_footer_js('modules/my_users/index.js'); ?>
*}