<?php
	require_once 'vendor/flexi/flexi.php';

	function IBIT_SchwarzesBrett_autoload($class)
	{
		$path = dirname(__FILE__).'/classes/';
		$filename = $path.$class.'.class.php';

		if (file_exists($filename))
		{
			require_once $filename;
		}
	}

	spl_autoload_register('IBIT_SchwarzesBrett_autoload');
?>