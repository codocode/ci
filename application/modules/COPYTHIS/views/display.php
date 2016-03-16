<h1>Your Tasks</h1>
<?php
foreach($query->result() as $row) {
	echo '<h2>'.$row->title.'</h2>';
}
/* Dont need to load module */
echo '<hr>';
$firstname='David';
$lastname='Connelly';
$this->load->module('nofun');
$this->nofun->sayhello($firstname, $lastname);

echo '<hr>';
echo Modules::run('nofun/sayhello', $firstname, $lastname);