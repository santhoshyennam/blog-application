<?php
require_once 'connection.php';

class Blog {
     
     private $connection;
     public function __construct(){
         $this->connection = new Connection();
    } 
    function get_blogs($start_from=null,$per_page_record=null,$user_id=null) {
        $query="";
        if($user_id) {
           $query = "select * from blogs where user_id='{$user_id}'"; 
        } 
        else if($per_page_record){
            $query = "select * from blogs order by creation_date DESC LIMIT {$start_from}, {$per_page_record}"; 
        }
        else {
           $query = "select * from blogs order by creation_date DESC"; 
        }
        $result = $this->connection->getConnection()->query($query);
        return $result;
    }
    function write_blog($title,$description) {
        try {
            $query = "insert into blogs(title,description,user_id,creation_date) values('{$title}','{$description}','{$_SESSION['user_id']}',CURRENT_TIMESTAMP)"; 
            $result = $this->connection->getConnection()->query($query);
            return $result;
        } catch (Exception $ex) {
            return false;
        }
        return false;
    }
    
    function get_blog($id) {
        $query = "select * from blogs where id='{$id}'"; 
        $result = $this->connection->getConnection()->query($query);
        return $result;
    }
    function delete_blog($id) {
        $query = "delete from blogs where id='{$id}'"; 
        $result = $this->connection->getConnection()->query($query);
        return $result;
    }
    
    function update_blog($title,$description,$id){
        $query = "update blogs set title='{$title}',description='{$description}' where id='{$id}'"; 
        $result = $this->connection->getConnection()->query($query);
        return $result;
    }
}