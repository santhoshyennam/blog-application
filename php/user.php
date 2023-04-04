<?php
require_once 'connection.php';

class User {
     
     private $connection;
     public function __construct(){
         $this->connection = new Connection();
    } 
    function login($email,$password) {
        $query = "select username,isAdmin,id,password from users where email='$email'"; 
        $result = $this->connection->getConnection()->query($query);
        if($result->num_rows <1) return false;
        while ($row = $result->fetch_assoc()) {
            $db_pwd = $row['password'];
            if (!password_verify($password,$db_pwd)) {
                return false;
            }
            $_SESSION["username"] = $row['username'];
            $_SESSION["isAdmin"] = $row['isAdmin'];
            $_SESSION["email"] = $email;
            $_SESSION["user_id"] = $row['id'];
            $_SESSION['isLoggedIn'] = "true";
        }
        return $result;
    }
    function signup($email,$name,$new_pass) {
        try {
            $pwd_encrypted = password_hash($new_pass, PASSWORD_BCRYPT,['cost' => 12]);
            $query = "insert into users(username,password,isAdmin,email,creation_date) values('{$name}','{$pwd_encrypted}','false','{$email}',CURRENT_TIMESTAMP)"; 
            $result = $this->connection->getConnection()->query($query); 
            return $result;
        } catch (Exception $ex) {
            return false;
        }
        return false;
    }
    
    function is_valid_password($new,$confirm) {
        return $new === $confirm && strlen($new) > 8;
    }
    
     function get_user($id) {
        $query = "select username,email,id,password,isAdmin from users where id='{$id}'"; 
        $result = $this->connection->getConnection()->query($query);
        if($result->num_rows <1) return null;
        return $result;
    }
    
    function get_users() {
        $query = "select username,email,isAdmin,id,creation_date from users"; 
        $result = $this->connection->getConnection()->query($query);
        if($result->num_rows <1) return null;
        return $result;
    }
    
    function update_user($email,$name,$password,$is_admin,$id){
        $query="";
        if($password != ""){
           $pwd_encrypted = password_hash($password, PASSWORD_BCRYPT,['cost' => 12]);  
           $query = "update users set email='{$email}',password='{$pwd_encrypted}',username='{$name}',isAdmin='{$is_admin}' where id='{$id}'"; 
        } else {
           $query = "update users set email='{$email}',username='{$name}',isAdmin='{$is_admin}' where id='{$id}'";   
        }
        $result = $this->connection->getConnection()->query($query);
        return $result;
    }
    
    function delete_user($id){
        try{
             $blogs_query = " delete from blogs where user_id='{$id}'";
             $query = "delete from users where id='{$id}'"; 
             $this->connection->getConnection()->query($blogs_query);
            $result = $this->connection->getConnection()->query($query);
            return $result;
        } catch (Exception $ex) {
               return false;
        }
    }

}