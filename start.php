<?php

// map class name to file
Autoloader::map(array(
	'FileAuth' => __DIR__.'/libraries/fileauth.php',
));

// register the auth driver
Auth::extend('file', function()
{
	return new FileAuth();
});