<?php

/**
 * Created by PhpStorm.
 * User: paulo.borges
 * Date: 01/10/2018
 * Time: 16:31
 */
try{
    $pdo = new PDO("mysql:dbname=db_kapri;host=db-kapri.mysql.uhserver.com", "kapri","200814L@ur@");
} catch(PDOException $e){
    echo "ERRO: ".$e->getMessage();
}
