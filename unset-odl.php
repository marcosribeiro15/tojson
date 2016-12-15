<?php
session_start();

unset($_SESSION['serverODL']);
header('location:index.php');
?>