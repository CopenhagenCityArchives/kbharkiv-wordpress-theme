<?php

/*
CopenhagenCityArchive's permalink handler
Supported endpoints:
Posts: /permalink/post/{id}[/{context}]
Pages: /permalink/pages/{page}
 */

//Get url and parse path
$url = $_SERVER['REQUEST_URI'];
$pathParts = explode('/', parse_url($url, PHP_URL_PATH));

//Check if request is supported
if (!in_array($pathParts[2], ['post', 'sitepages']) || is_null($pathParts[3])) {
	http_response_code(404);
	exit();
}

if ($pathParts[2] == 'sitepages') {
	switch ($pathParts[3]) {
	case 'search':
		header('Location: https://www.kbharkiv.dk/sog-i-arkivet/sog-i-indtastede-kilder');
		break;
	case 'politforum':
		header('Location: https://kbharkiv.dk/forumarkiv');
		break;
	default:
		header('Location: https://kbharkiv.dk');
	}
	die();
}

//Post
$postUrl = 'https://www.kbharkiv.dk/sog-i-arkivet/sog-i-indtastede-kilder#/post/' . $pathParts[3];
header('Location: ' . $postUrl);
die();

?>
