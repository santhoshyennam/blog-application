<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

class Connection {
     
     private $hostName = "localhost",$userName = "root",$password = "",$dbName = "blog_application";
     private $connection;
     public function __construct(){
         $this->connection = new mysqli($this->hostName,$this->userName,$this->password,$this->dbName);
    } 
    function getConnection(): mysqli {
        return $this->connection;
    }
}