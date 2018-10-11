<?php
/**
 * Created by PhpStorm.
 * User: paulo.borges
 * Date: 11/10/2018
 * Time: 11:03
 */
class Contato {
    private $pdo;
    public function __construct()
    {
        $this->$pdo = new PDO("mysql:dbname=db_kapri;host=localhost", "root","");
    }
}