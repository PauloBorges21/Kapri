<?php
/**
 * Created by PhpStorm.
 * User: paulo.borges
 * Date: 01/10/2018
 * Time: 16:41
 */
session_start();
require '../config.php';

if(empty("kaprilogin")){
    header("Location: login.php");
    exit;

}
?>
<?php include('../includes/header.php') ?>


<?php include('../includes/menu.php') ?>


<?php include('../includes/footer.php') ?>










