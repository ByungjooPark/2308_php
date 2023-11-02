<?php

spl_autoload_register( function($path) {
	$path = str_replace("\\", "/", $path);

	require_once($path._EXTENSION_PHP);
});
