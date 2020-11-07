<?php
	include 'config.php';
	//require 'src/connect.php';
	require 'src/db.php';
	
	$db = connectMysql($dsn,$dbuser,$dbpass);
	$sql = file_get_contents('prouf1.sql');
	try{
		$db->exec($sql);
	}
	catch(PDOException $e){
		die($e->getMessage());
	}
?>
