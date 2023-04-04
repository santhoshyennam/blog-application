<?php
    session_start();
    require_once 'php/user.php';
    // if user is logged in,redirect to index page
    if(isset($_SESSION['isLoggedIn'])){
        header("Location: index.php");
    }
    echo "<link rel='stylesheet' type='text/css' href='css/login.css'>";
?>
<form action="" method="POST">
  <div class="container">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for="email"><b>Email</b></label>
    <input type="email" placeholder="Enter email" name="email" id="email" required>
    <label for="name"><b>Full Name</b></label>
    <input type="text" placeholder="Enter name" name="name" id="name" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" id="psw" required>

    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="psw-repeat" id="psw-repeat" required>
    <hr>
    <button type="submit" class="registerbtn" name="submit">Register</button>
    <p>Already have an account? <a href="login.php">Sign in</a>.</p>
  </div>
</form>
<?php
   //when user clicks on register button
 if(isset($_POST['submit'])) {
        $user = new User();
        if(!$user->is_valid_password($_POST["psw"], $_POST["psw-repeat"])) {
            echo "<p style='color:red;margin-left:20px;font-size:24px;'>password is not valid (it should contain more than 8 digits)!</p>";
        } else if(!$user->signup($_POST['email'],$_POST['name'], $_POST['psw'])){
            echo "<p style='color:red;margin-left:20px;font-size:24px;'>Registration is failed,Try after sometime!</p>";
        } else {
              echo "<p style='color:green;margin-left:20px;font-size:24px;'>Successfully Registered!,go to login page</p>";
        }
    }
