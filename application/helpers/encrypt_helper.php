<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


if ( ! function_exists('encrypt_pass'))
{
	function encrypt_pass($pass=""){

		$pass=md5($pass);
		return $pass;
	}
}