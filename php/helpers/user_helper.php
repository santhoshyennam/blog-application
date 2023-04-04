<?php
    require_once 'header.php';
    require_once 'php/user.php';
    //if user is not admin, redirect to index page
    if(!(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == "true")){
        header("Location: index.php");
    }
   $user = new User();
  //when admin clicks on update
    if(isset($_POST['update'])){
        $result = $user->update_user($_POST['email'],$_POST['name'],$_POST['psw'],$_POST['isAdmin'],$_GET['id']);
        if($result) {
            echo "<script>alert('Updated Successfully');</script>";
        } else {
            echo "<script>alert('Unable to update, try again!');</script>";
        }
    }
    
    // when admin clicks on delete user
    if(isset($_GET['delete']) && isset($_GET['id'])){
            $result = $user->delete_user($_GET['id']);
            if($result) {
                header("Location: manage_users.php");
            } else {
                echo "<script>alert('Unable to delete, try again!');</script>"; 
            }
       }

