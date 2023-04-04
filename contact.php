<?php
    require_once 'header.php';
    require_once 'php/contact.php';
    echo "<link rel='stylesheet' type='text/css' href='css/login.css'>";
?>

<!--this is the contact page, if user have any queries then can ask in this form-->
<div style="margin:20px; ">
<h2>Contact Us</h2>
<form action="" method="POST">

  <div class="container">
    <label for="name"><b>Full name</b></label>
    <input type="text" placeholder="Enter name" name="name" required>
    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter email" name="email" required>

    <label for="subject"><b>Subject</b></label>
    <input type="text" placeholder="Enter Subject" name="subject" required>

    <button type="submit" name="submit">Submit</button>
  <div class="container">
    <button type="reset" class="cancelbtn">Reset</button>
  </div>
  </div>
</form>
</div>
<?php
    // when user clicks on submit button
     if(isset($_POST["submit"])){
        $blog = new Contact();
        $result = $blog->write_contact($_POST["name"], $_POST["email"],$_POST['subject']);
        if($result) {
            echo "<p style='color:green;margin-left:20px;font-size:24px;'>Sent Successfully!</p>";
        } else {
           echo "<p style='color:red;margin-left:20px;font-size:24px;'>Unable to send!</p>";
        }
    }
    require_once 'footer.php';
?>