<?php
session_start();
unset($_SESSION['session_admin_access']);
header("Location:index_admin.php");
?>