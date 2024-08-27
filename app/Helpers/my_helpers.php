<?php

if (!function_exists('dd')) {
	function dd($value)
	{
		print_r($value);
		exit;
	}
}

if (!function_exists('dd_json')) {
	function dd_json($value)
	{
		echo '<pre>';
		echo json_encode($value, JSON_PRETTY_PRINT);
		echo '</pre>';
		exit;
	}
}
