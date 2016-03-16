<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
if ( ! function_exists('test_method'))
{
    function test_method($var = '')
    {
        return $var;
    }   
}
*/


function fn_flush()
{
    /*if (defined('AJAX_REQUEST') && !Registry::get('runtime.comet')) { // do not flush output during ajax request, but flush it for COMET

        return false;
    }*/

    if (function_exists('ob_flush')) {
        @ob_flush();
    }

    flush();
}

function fn_echo($value)
{
    /*if (defined('CONSOLE')) {
        $value = str_replace(array('<br>', '<br />', '<br/>'), "\n", $value);
        $value = strip_tags($value);
    }*/

    echo($value);

    fn_flush();
}

/**
 * Prints any data like a print_r function
 * @param mixed ... Any data to be printed
 */
function fn_print_r()
{
    static $count = 0;
    $args = func_get_args();

    /*if (defined('CONSOLE')) {
        $prefix = "\n";
        $suffix = "\n\n";
    } else {*/
        $prefix = '<ol style="font-family: Courier; font-size: 12px; border: 1px solid #dedede; background-color: #efefef; float: left; padding-right: 20px;">';
        $suffix = '</ol><div style="clear:left;"></div>';
   //}

    if (!empty($args)) {
        fn_echo($prefix);
        foreach ($args as $k => $v) {

           /* if (defined('CONSOLE')) {
                fn_echo(print_r($v, true));
            } else {*/
                fn_echo('<li><pre>' . htmlspecialchars(print_r($v, true)) . "\n" . '</pre></li>');
            //}
        }
        fn_echo($suffix);

        /*if (defined('AJAX_REQUEST')) {
            $ajax_vars = Tygh::$app['ajax']->getAssignedVars();
            if (!empty($ajax_vars['debug_info'])) {
                $args = array_merge($ajax_vars['debug_info'], $args);
            }
            Tygh::$app['ajax']->assign('debug_info', $args);
        }*/
    }
    $count++;
}

//
// fn_print_r wrapper
// outputs variables data and dies
//
function fn_print_die()
{
    $args = func_get_args();
    call_user_func_array('fn_print_r', $args);
    exit(1);
}