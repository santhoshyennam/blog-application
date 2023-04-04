<?php
require_once 'connection.php';

class Contact {
     
     private $connection;
     public function __construct(){
         $this->connection = new Connection();
    } 
    function get_contacts() {
       
        $query = "select * from contacts"; 
        $result = $this->connection->getConnection()->query($query);
        return $result;
    }
    function write_contact($name,$email,$subject) {
        try {
            $query = "insert into contacts(name,email,subject,creation_date) values('{$name}','{$email}','{$subject}',CURRENT_TIMESTAMP)"; 
            $result = $this->connection->getConnection()->query($query);
            return $result;
        } catch (Exception $ex) {
            return false;
        }
        return false;
    }
    
    function get_contact($contact_id) {
        $query = "select * from contacts where id='{$contact_id}'"; 
        $result = $this->connection->getConnection()->query($query);
        return $result;
    }
    
}