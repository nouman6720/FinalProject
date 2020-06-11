<?php
include 'core/init.php';
/*
session_start();
session_destroy();
header('Location: userlogin.php');
exit();
*/
//destroy cookies 

// cookies
setcookie("type","",time()-3600);
header('Location: userlogin.php');

?> 