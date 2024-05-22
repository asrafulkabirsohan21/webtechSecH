<?php

function conn()
{
	$serverName="localhost";
	$userName="root";
	$pass="";
	$dbName="admin";
	$con=new mysqli($serverName,$userName,$pass,$dbName);
	return $con;

}



?>