<div class="pagination">    
      <?php  
        $conn = new Connection();
        $query = "SELECT COUNT(*) FROM blogs";     
        $result = mysqli_query($conn->getConnection(), $query);     
        $row = mysqli_fetch_row($result);     
        $total_records = $row[0];     
          
    echo "</br>";     
        // Number of pages required.   
        $total_pages = ceil($total_records / $per_page_record);     
        $pagLink = "";       
      
        if($page>=2){   
            echo "<a href='index.php?page=".($page-1)."'>  Prev </a>";   
        }       
                   
        for ($i=1; $i<=$total_pages; $i++) {   
          if ($i == $page) {   
              $pagLink .= "<a class = 'active' href='index.php?page="  
                                                .$i."'>".$i." </a>";   
          }               
          else  {   
              $pagLink .= "<a href='index.php?page=".$i."'>   
                                                ".$i." </a>";     
          }   
        };     
        echo $pagLink;   
  
        if($page<$total_pages){   
            echo "<a href='index.php?page=".($page+1)."'>  Next </a>";   
        }   
  
      ?>    
      </div>  