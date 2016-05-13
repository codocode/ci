<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['test'] = 'this is a test';



$query_string = !empty($_SERVER['QUERY_STRING'])? '?'.$_SERVER['QUERY_STRING'] : '';

$config['pagination'] = array();
$config['pagination']['use_page_numbers'] = TRUE;

$config['pagination']['first_link'] = 'First';
$config['pagination']['first_tag_open'] = '<li>';
$config['pagination']['first_tag_close'] = '</li>';

$config['pagination']['last_link'] = 'Last';
$config['pagination']['last_tag_open'] = '<li>';
$config['pagination']['last_tag_close'] = '</li>';

//$config['pagination']['attributes'] = array('class' => 'jpagination'); // 3.0 new version of anchor_class
$config['pagination']['anchor_class'] = 'class="jpagination"';
//$config['pagination']['reuse_query_string'] = TRUE; // works only in 3+
$config['pagination']['suffix'] = $query_string; // http_build_query($_GET, '', "&")

$config['pagination']['num_tag_open'] = '<li>';
$config['pagination']['num_tag_close'] = '</li>';

$config['pagination']['prev_link'] = 'Previous';
$config['pagination']['prev_tag_open'] = '<li>';
$config['pagination']['prev_tag_close'] = '</li>';

$config['pagination']['next_link'] = 'Next';
$config['pagination']['next_tag_open'] = '<li>';
$config['pagination']['next_tag_close'] = '</li>';

$config['pagination']['cur_tag_open'] = '<li class="active"><a>';
$config['pagination']['cur_tag_close'] = '</a></li>';

// ci 2
$config['pagination']['first_url'] = '1'.$query_string;