<?php

$requestedFile = ltrim($_SERVER['REQUEST_URI'], '/');

if(file_exists($requestedFile))
{
	require($requestedFile);
	exit();
}

if($_SERVER['REQUEST_METHOD'] == 'GET')
{
	require('index.html');
	exit();
}

http_response_code(404);
echo "Page not found";