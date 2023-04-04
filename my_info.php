<?php
    require_once 'header.php';
    require_once 'php/connection.php';
    require_once 'php/blog.php';
    echo "<link rel='stylesheet' type='text/css' href='css/login.css'>";   
    echo '<h3>My Blogs</h3>';
      // if user not is logged in,redirect to index page
     if(!isset($_SESSION['isLoggedIn'])){
        header("Location: index.php");
    }
    $user = new Blog();
    $result = $user->get_blogs(null,null,$_SESSION["user_id"]);
    if($result->num_rows>0) {
        echo '<table border="1" style="width: 100%">
        <tr>
            <th>
              Title  
            </th>
            <th>
                Description
            </th>
             <th>
                Creation Date
            </th>
        </tr>';
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td><a href='read_single_blog.php?id={$row['id']}'>{$row['title']}</a></td><td>{$row['description']}</td>"
            . "<td>{$row['creation_date']}</td></tr>";
        }     
    } else {
        echo("<p><center style='color:blue;font-size:28px;'>You haven't uploaded any blog!</center></p>");
        echo("<center><a href='write_blog.php'>Click here</a> to upload a blog</center>");
    }
    ?>
</table>
<?php         
require_once 'footer.php';
?>
