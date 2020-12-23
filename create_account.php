<?php
session_start();
include "functions.php";

// Get JSON inputs, store in variable
$json = file_get_contents('php://input');
$obj = json_decode($json,true);

$fname = $obj['fname'];

?>
