<?php
    session_start();
     // if user is logged in,redirect to index page
    if(isset($_SESSION['isLoggedIn'])){
        header("Location: index.php");
    }
    require_once 'php/user.php';
    echo "<link rel='stylesheet' type='text/css' href='css/login.css'>";
?>
<form action="" method="POST">
  <div class="container">
    <h2>Login Form</h2>
    <label for="email"><b>Email</b></label>
    <input type="email" placeholder="Enter Email" name="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <button type="submit" name="submit">Login</button>
      <div class="container">
    <button type="button" class="cancelbtn">Cancel</button>
    <span class="psw">New User? <a href="register.php">Create Account<a></span>
  </div>
  </div>
</form>

<?php
    // when user clicks on login button
    if(isset($_POST['submit'])) {
        $user = new User();
        if(!$user->login($_POST['email'], $_POST['psw'])){
            echo "<p style='color:red;margin-left:20px;font-size:24px;'>Login is failed</p>";
        } else {
              header("Location: index.php");
        }
    }
    require_once 'footer.php';
?>