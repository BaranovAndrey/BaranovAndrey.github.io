<?php

$requestedFile = ltrim($_SERVER['REQUEST_URI'], '/');

if(file_exists($requestedFile))
{
	if(pathinfo($requestedFile)['extension'] == 'php')
	{
		require($requestedFile);
		exit();
	}
	
	if(in_array(pathinfo($requestedFile)['extension'], ['jpg', 'png']))
	{
		header('Content-Type: image/jpeg');
	}

	echo file_get_contents($requestedFile);
	exit();
}

if($_SERVER['REQUEST_METHOD'] == 'GET')
{
	require('index.php');
	exit();
}

http_response_code(404);
echo "Page not found";