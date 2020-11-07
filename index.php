<?php

	ini_set('display_errors','On'); //activacion de errores
	session_start(); //configuracion entorno
	define('APP',__DIR__);
	require APP.'/src/route.php';
	require 'start.php';

	$controller = getRoute(); //enrutamiento	query_string http://app?url=login

	require APP.'/controllers/'.$controller.'.php'; //redirigir a ruta capturada
?>