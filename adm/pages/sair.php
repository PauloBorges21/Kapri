<?php
session_start();

unset($_SESSION['kaprilogin']);
header('Location: ../../login.php');
//echo "<script>window.location='../../login.php';</script>";
