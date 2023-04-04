<?php
    require_once 'header.php';
    require_once 'php/blog.php';
    require_once 'php/user.php';
    $blog = new Blog(); 
    if(isset($_GET['delete']) && isset($_GET['id'])){
        $result= $blog->delete_blog($_GET['id']);
        if($result){
            echo "<script>alert('Deleted Successfully');</script>";
            header("Location: index.php");
        } else {
            echo "<script>alert('Unable to delete, try again!');</script>"; 
        }
    }
    
    if(isset($_GET['id'])){
        
        $result = $blog->get_blog($_GET['id']);
        if($result->num_rows <1){
            echo "<center><p style='color:red;margin-left:20px;font-size:24px;'>The blog is not found!</p></center>";
        } else{
            while ($row = $result->fetch_assoc()) {
                echo("<h3>Title: {$row['title']}</h3>");
                echo("<p>Description: {$row['description']}</p>");
                $user = new User();
                $user_result = $user->get_user($row['user_id']);
                if($user_result){
                    while($user_row = $user_result->fetch_assoc()){
                         echo("<h4>Author Details:</h4>");
                         if(isset($_SESSION['isAdmin']) && $_SESSION["isAdmin"] == "true") {
                             echo "<p>user id:".$row['user_id'];
                         }
                        echo("<p>name: {$user_row['username']}");
                        echo("<p>email: {$user_row['email']}");
                        if(isset($_SESSION['isLoggedIn']) && ($_SESSION['user_id'] == $user_row['id'] || $_SESSION["isAdmin"] == "true")){
                            ?>
                        <br/><br/>
                        <div style="display:flex;">
                            <a href="edit_blog.php?<?php echo('id='.$row['id']);?>"> edit</a>
                            <a style="margin-left: 20px;" href="read_single_blog.php?<?php echo('id='.$row['id']."&delete=true");?>" onclick="return confirm('Are you sure?');"> delete</a>
                        </div>
<?php
                        }
                    }
                }
            }
            
        } 
    } else {
        echo("<p><center style='color:blue;font-size:28px;'>Unable to load, Try again!</center></p>");
    }
    


