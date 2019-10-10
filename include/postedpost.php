<?php include 'config.php'; ?>


<div class="col-lg-12 col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h2><i class="fa fa-flag-o red"></i><strong>POSTS</strong></h2>
                <div class="panel-actions">
                  <a href="index.html#" class="btn-setting"><i class="fa fa-rotate-right"></i></a>
                  <a href="index.html#" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>
                  <a href="index.html#" class="btn-close"><i class="fa fa-times"></i></a>
                </div>
              </div>
              <div class="panel-body">
                <table border="1"class="table bootstrap-datatable countries">
                  <thead>
                    <tr>
                      <th  style="background-color: #152E48;color: white;">POST ID</th>
                      <th  style="background-color: #152E48;color: white;">TITLE</th>
                      <th  style="background-color: #152E48;color: white;">CONTENT</th>
                      <th  style="background-color: #152E48;color: white;">CATEGORY</th>
                      <th  style="background-color: #152E48;color: white;">PICTURE</th>
                      <th  style="background-color: #152E48;color: white;">DATE</th>
                      <th  style="background-color: #152E48;color: white;">POST DATE</th>
                      <th  style="background-color: #152E48;color: white;">ACTION</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <?php
            $sql = "SELECT * FROM post ORDER BY POST_ID ASC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
                //echo "<br> id: ". $row["id"]. " - Name: ". $row["firstname"]. " " . $row["lastname"] . "<br>";
                  $post_id=$row["POST_ID"];  
                  $title=$row["TITLE"];  
                  $content=$row["CONTENT"];  
                  $category=$row["CATEGORY"];  
                  $picture=$row["PICTURE"];
                  $date=$row["DATE"];
                  $post_date=$row["POST_DATE"];
            ?>      

            <td><?php echo $post_id;  ?></td>
            <td><?php echo $title;  ?></td>
            <td><?php echo $content;  ?></td>
            <td><?php echo $category;  ?></td>
            <td><?php echo $picture;  ?></td> 
            <td><?php echo $date;  ?></td> 
            <td><?php echo $post_date;  ?></td> 
            <td><a onclick='javascript:confirmationDelete($(this));return false;' href="deletepost.php?del=<?php echo $post_id ?>"><button class="btn" style="background-color:red;color:white;"><i class="fa fa-trash-o" style="font-size:20px;"></i></button></a></td>                        
            
            <script>
            function confirmationDelete(anchor)
{
   var conf = confirm('Are you sure want to delete this record?');
   if(conf)
      window.location=anchor.attr("href");
}
            </script>
                    </tr>
          
          <?php }} else {
    echo "0 results";
}

$conn->close(); ?>
                  </tbody>
                </table>
        
              
</div>
</div>
</div>

