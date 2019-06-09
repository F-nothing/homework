<?php 
session_start();
include_once 'verify_code.php';
$_SESSION['vcode']=vcode(100,48,25,4);

?>