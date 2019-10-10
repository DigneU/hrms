 <?php
		include('include/config.php');
	?>          
 <div class="col-lg-12 col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h2><i class="fa fa-flag-o red"></i><strong>Registered Users</strong></h2>
                <div class="panel-actions">
                  <a href="index.html#" class="btn-setting"><i class="fa fa-rotate-right"></i></a>
                  <a href="index.html#" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>
                  <a href="index.html#" class="btn-close"><i class="fa fa-times"></i></a>
                </div>
              </div>
              <div class="panel-body">
                <table class="table bootstrap-datatable countries">
                  <thead>
                    <tr>
                      <th  style="background-color: #152E48;color: white;">SN</th>
                      <th  style="background-color: #152E48;color: white;">TITLE</th>
                      <th  style="background-color: #152E48;color: white;">CONTENT</th>
                      <th  style="background-color: #152E48;color: white;">CATEGORY</th>
                      <th  style="background-color: #152E48;color: white;">PICTURE</th>
                      <th  style="background-color: #152E48;color: white;">DATE</th>
                      <th  style="background-color: #152E48;color: white;">ACTION</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <?php
						$sql = "SELECT * FROM post_draft ORDER BY POST_ID ASC";
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
									
						?>			
						 
						  

						<!--here showing results in the table -->  
						<td><?php echo $post_id;  ?></td>
						<td><?php echo $title  ?></td>
						<td><?php echo $content  ?></td>
						<td><?php echo $category  ?></td>
						<td><img src="<?php echo $picture  ?>"></td> 
						<td><?php echo $date  ?></td> 
						<td><form action="publish.php?del=<?php echo $post_id ?>" method="post" ><button  class="btn btn-primary" name="publish">PUBLISH</button></form></td>
						
						
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
