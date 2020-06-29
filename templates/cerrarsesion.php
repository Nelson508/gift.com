<?php
session_start();
session_destroy();
setcookie("User", null, time()-1, "/");
header('Location:../login.php');
?>