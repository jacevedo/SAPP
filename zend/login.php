<?php
session_start();
$id= $_REQUEST['id'];
$key =  $_REQUEST['key'];

if($key!="")
{
	$_SESSION['id'] = $id;
	$_SESSION['key'] = $key;
	header('Location: alumno.php');
}
else
{
	header('Location: error.php');	
}

?>
