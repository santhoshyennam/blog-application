<?php
session_start();
echo "<link rel='stylesheet' type='text/css' href='css/header.css'>";
?>
<!DOCTYPE html>
<head>
    <title>Blog Application</title>
</head>
<body>
    <ul>
  <li><a href="index.php">Home</a></li>
  <li><a href="contact.php">Contact Us</a></li>
  <?php
  
    // shows when user is logged in
    if(isset($_SESSION['isLoggedIn'])){
        echo '<li><a href="my_info.php">My Blogs</a></li>';
        echo '<li><a href="write_blog.php">Write Blog</a></li>';
        if(isset($_SESSION["isAdmin"]) && $_SESSION["isAdmin"] == "true"){ //shows these tabs when user is admin
            echo '<li><a href="manage_users.php">Manage Users</a></li>';
        }
        echo '<li style="float:right">'
        .'<div style="display:flex;"><span style="margin-right:20px;color:white;margin-top:15px;"> Welcome,'.$_SESSION["username"]
                . '</span><a href="index.php?logout=true">Logout</a></div></li>';
    } else { 
        echo '<li style="float:right"><a href="login.php">Login</a></li>'; // when user is not loggedIn
    }
  ?>
  
   </ul>