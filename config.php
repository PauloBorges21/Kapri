<?php

/**
 * Created by PhpStorm.
 * User: paulo.borges
 * Date: 01/10/2018
 * Time: 16:31
 */
try{

    $pdo = new PDO("mysql:dbname=db_kapri;host=localhost", "root","");
} catch(PDOException $e){
echo "ERRO: ".$e->getMessage();
}
