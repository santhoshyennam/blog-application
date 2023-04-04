<?php
    require_once 'php/helpers/user_helper.php';
    echo "<link rel='stylesheet' type='text/css' href='css/login.css'>";
    
    // wher admin edit a particular user
    if(isset($_GET['edit']) && isset((($_GET['id'])))){
        $user = new User();
        $result = $user->get_user($_GET['id']);
         while ($row = $result->fetch_assoc()) {
             ?>
    <form action="" method="POST">
      <div class="container">
        <h1>Update user</h1>
        <hr>
        <label for="email"><b>Email</b></label>
        <input type="email" placeholder="Enter email" name="email" id="email" value="<?php echo($row['email']);?>" required>
        <label for="name"><b>Full Name</b></label>
        <input type="text" placeholder="Enter name" name="name" id="name" value="<?php echo($row['username']);?>" required>

        <label for="psw"><b>Password</b></label>
        <input type="text" placeholder="Enter new password if you want to change it,else ignore it" name="psw" id="psw">
        <label for="admin"><b>Admin</b></label>
        <input type="text" placeholder="Enter Password" name="isAdmin" id="admin" value="<?php echo($row['isAdmin']);?>" required>
        <hr>
        <button type="submit" class="registerbtn" name="update">Update</button>
      </div>
    </form>
<?php
         }
    } else{ // list of users shown to admin
         echo '<h3>Manage Users</h3>';
        $result = $user->get_users();
        if(!$result) {
            echo("<p><center style='color:red;font-size:28px;'>Unable to get the users, Try again!</center></p>");
        }
        if($result->num_rows <= 1){ // only admin is present
            echo("<p><center style='color:red;font-size:28px;'>No users found!</center></p>");
        } else {
            echo '<table border="1" style="width: 100%;margin-top:30px;">
                <tr>
                    <th>
                    User id
                    </th>
                    <th>
                      User name  
                    </th>
                    <th>
                        Email
                    </th>
                    <th>
                        is Admin
                    </th>
                    <th>
                        Created date
                    </th>
                    <th>
                        Edit
                    </th>
                </tr>';
            while ($row = $result->fetch_assoc()) {
                if($_SESSION["user_id"] != $row['id']) {
                    echo "<tr><td>{$row['id']}</td><td>{$row['username']}</td><td>{$row['email']}</td><td>{$row['isAdmin']}</td><td>{$row['creation_date']}</td>"
                    . "<td><div style='margin-top:10px;margin-left:10px;'>"
                            . "<a style='margin-right:20px;' href=\"manage_users.php?id={$row['id']}&edit=true\">Edit</a><a style='margin-right:20px;' href=\"manage_users.php?id={$row['id']}&delete=true\" onclick=\"return confirm('Are you sure?');\">Delete</a>"
                            . "</div></td>"
                            . "</tr>";
                }
            }     
        }
    }   
 ?>
    
    
