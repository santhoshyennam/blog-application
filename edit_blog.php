<?php
    require_once 'header.php';
    require_once 'php/blog.php';
    echo "<link rel='stylesheet' type='text/css' href='css/login.css'>";
    
    $blog = new Blog(); 
    if(isset($_POST['submit'])){
        $result= $blog->update_blog($_POST['title'],$_POST['desc'],$_GET['id']);
        if($result){
            echo "<script>alert('updated Successfully');</script>";
        } else {
            echo "<script>alert('Unable to update, try again!');</script>"; 
        }
    }
    if(isset($_GET['id'])) {
        $result = $blog->get_blog($_GET['id']);
        if($result->num_rows <1){
            echo "<center><p style='color:red;margin-left:20px;font-size:24px;'>The blog is not found!</p></center>";
        } else{
        while ($row = $result->fetch_assoc()) {
            if(($row['user_id'] != $_SESSION['user_id']) && $_SESSION['isAdmin'] != "true") {
                echo "<p style='color:red;margin-left:20px;font-size:24px;'>You dont have permissions to edit this blog!</p>";
            } else{
 ?>
        <div style="margin:20px; ">
            <h2>Update Blog</h2>
            <form action="" method="POST">

              <div class="container">
                <label for="title"><b>Title</b></label>
                <input type="text" placeholder="Enter Title" name="title" value="<?php echo($row['title']); ?>" required>

                <label for="desc"><b>Description</b></label>
                <input type="text" placeholder="Enter Description" name="desc" value="<?php echo($row['description']); ?>" required>

                <button type="submit" name="submit">Submit</button>
              <div class="container">
              </div>
              </div>
            </form>
        </div>

<?php
            }       
            
        }
       }
    } else {
        header("Location: index.php");
    }
   ?> 


