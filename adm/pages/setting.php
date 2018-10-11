<?php
/**
 * Created by PhpStorm.
 * User: paulo.borges
 * Date: 11/10/2018
 * Time: 10:36
 */

session_start();
require '../../config.php';

if(empty($_SESSION['kaprilogin'])){  /*Se a sessão não existir ou tiver vazia redireciona para login.php*/
    header("Location: login.php");
}

$id = $_SESSION['kaprilogin'];

?>
<?php include('../includes/headerdash.php') ?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Forms</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Basic Form Elements
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form">
                                <div class="form-group">
                                    <label>Text Input</label>
                                    <input class="form-control">
                                    <p class="help-block">Example block-level help text here.</p>
                                </div>
