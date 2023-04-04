<?php
    require_once 'header.php';
    require_once 'php/blog.php';
    
      // when user is not logged in, redirect to index page
     if(!isset($_SESSION['isLoggedIn'])){
        header("Location: index.php");
    }
    echo "<link rel='stylesheet' type='text/css' href='css/login.css'>";
?>
<div style="margin:20px; ">
<h2>Write Blog</h2>
<form action="" method="POST">

  <div class="container">
    <label for="title"><b>Title</b></label>
    <input type="text" placeholder="Enter Title" name="title" required>

    <label for="desc"><b>Description</b></label>
    <input type="textarea" rows="5" columns="70" placeholder="Enter Description" name="desc" required>

    <button type="submit" name="submit">Submit</button>
  <div class="container">
    <button type="reset" class="cancelbtn">Reset</button>
  </div>
  </div>
</form>
</div>
<?php
    // when user clicks on submit
    if(isset($_POST["submit"])){
        $blog = new Blog();
        $result = $blog->write_blog($_POST["title"], $_POST["desc"]);
        if($result) {
            echo "<p style='color:green;margin-left:20px;font-size:24px;'>Uploaded Successfully!</p>";
        } else {
           echo "<p style='color:red;margin-left:20px;font-size:24px;'>Unable to Upload!</p>";
        }
    }
    require_once 'footer.php';
?>