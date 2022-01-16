<?php

$dbhost="localhost";
$dbname="kena-becha.com";
$dbuser="root";
$dbpass="";

try{
	$db=new PDO("mysql:host={$dbhost};dbname={$dbname}",$dbuser,$dbpass);
	$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	
	
	}


catch(PDOEXCEPTION $e){
	
	echo"conection error:".$e->getMessage();
	
	
	
	
	}









?>