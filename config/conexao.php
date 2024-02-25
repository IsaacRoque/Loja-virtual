<?php

	$host = 'localhost';
	$dbname = 'loja';
	$usuariodb = 'ifpb';
	$senhadb = 'ifpb';

	try{
		$bd = new PDO("mysql:host=$host; dbname=$dbname; charset=utf8mb4", $usuariodb, $senhadb);

	}catch(PDOException $e){
		echo $e->getMessage();
	}

?>