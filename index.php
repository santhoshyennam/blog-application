<?php
    require_once 'header.php';
    require_once 'php/blog.php';
    require_once 'php/user.php';
    echo "<link rel='stylesheet' type='text/css' href='css/login.css'>";    
    echo "<link rel='stylesheet' type='text/css' href='css/index.css'>";    
    // if user clicks on logout button
    $per_page_record = 4;  // Number of entries to show in a page.  
    // Look for a GET variable page if not found default is 1.        
    if (isset($_GET["page"])) {    
        $page  = $_GET["page"];    
    }    
    else {    
      $page=1;    
    }    
    $start_from = ($page-1) * $per_page_record;     
    if((isset($_GET["logout"]))) {
        session_unset();
        session_destroy();
        header("Location: login.php");
    }
    
    $user = new Blog();
    $result = $user->get_blogs($start_from,$per_page_record);
    if($result) {
        echo "<center><h2>Blogs</h2>";
        echo '<table border="1" style="width: 60%;margin-top:30px;margin-left:auto;margin-right:auto;">
            
            <tr>
                <th>
                  Title  
                </th>
                <th>
                    Description
                </th>
                <th>
                    Author name
                </th>
                <th>
                    Author email
                </th>
                 <th>
                    Creation Date
                </th>
            </tr>';
        while ($row = $result->fetch_assoc()) {
            $user = new User();
            $user_result = $user->get_user($row['user_id']);
            if($user_result){
                while($user_row = $user_result->fetch_assoc()){
                       $description_length = strlen($row['description']);
                       $description = $row["description"];
                       if($description_length> 21){
                           $description = substr($description, 0,21)."....";
                       }
                     echo "<tr><td><a href='read_single_blog.php?id={$row['id']}'>{$row['title']}</a></td><td>{$description}</td>"
            . "<td>{$user_row['username']}</td><td>{$user_row['email']}</td><td>{$row['creation_date']}</td>"
                    . "</tr>";
                }
            }
        }     
    } else {
        echo("<p><center style='color:blue;font-size:28px;'>No blogs are found!</center></p>");
    }
    ?>
</table>
    <?php require_once 'php/helpers/pagination.php'; ?>
   </center>   

<?php 
require_once 'footer.php';
?>
