<?php
	$connect = mysql_connect("localhost","root","") or die(mysql_error());
	if (!$connect) {
		die('Ошибка соединения: ' . mysql_error());
	}
	$db = mysql_select_db("_tutonal", $connect);

	
	function fn_print_die()
	{
		$args = func_get_args();
		call_user_func_array('fn_print_r', $args);
		die();
	}

	function fn_print_r()
	{
		static $count = 0;
		$args = func_get_args();

			$prefix = '<ol style="font-family: Courier; font-size: 12px; border: 1px solid #dedede; background-color: #efefef; float: left; padding-right: 20px;">';
			$suffix = '</ol><div style="clear:left;"></div>';


		if (!empty($args)) {
			fn_echo($prefix);
			foreach ($args as $k => $v) {

				if (defined('CONSOLE')) {
					fn_echo(print_r($v, true));
				} else {
					fn_echo('<li><pre>' . htmlspecialchars(print_r($v, true)) . "\n" . '</pre></li>');
				}
			}
			fn_echo($suffix);

		}
		$count++;
	}

	function fn_echo($value)
	{
		echo $value;
		fn_flush();
	}

	function fn_flush()
	{
		if (function_exists('ob_flush')) {
			@ob_flush();
		}
		flush();
	}
?>