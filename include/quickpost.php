<?php 
include ('include/config.php'); 

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>HRMS</title>

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <!-- Custom styles -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />
  
  <style>


/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 0px;
 
}

/* Modal Content/Box */
.modal-content {
  background-color: white;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  border-radius:10px;
  width: 80%; /* Could be more or less, depending on screen size */
  color:black;
}

/* The Close Button (x) */
.close {

  color: black;
  margin-top:-10px;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}



/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

</style>  

</head>

<body>
  <!-- container section start -->
  						
        <div class="row">
         
          <br>
        <!-- page start-->
        
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading tab-bg-info">
                <ul class="nav nav-tabs">
                  
                  <li>
                    <a data-toggle="tab" href="#profile">
                                          <i class="icon-user"></i>
                                          QUICK POST
                                      </a>
                  </li>
				   <li class="">
                    <a data-toggle="tab" href="#cancelled">
                                          <i class="icon-envelope"></i>
                                        SAVED DRAFT
                                      </a>
                  </li>
                  <li class="">
                    <a data-toggle="tab" href="#edit-profile">
                                          <i class="icon-envelope"></i>
                                          POST PUBLISHED
                                      </a>
                  </li>
				 
                </ul>
              </header>
              <div class="panel-body">
                <div class="tab-content">
                 
                  <!-- profile -->
                  <div id="profile" class="tab-pane active" >
                    <section class="panel">
                     
					  
						<div class="panel-body bio-graph-info" style="background-color:Lavender">
			<?php include 'config.php'; ?>
<?php

    if(isset($_POST['publish']))
        {
$title = mysqli_real_escape_string($conn, $_REQUEST['title']);
$content = mysqli_real_escape_string($conn, $_REQUEST['content']);
$category= mysqli_real_escape_string($conn, $_REQUEST['category']);
$date= mysqli_real_escape_string($conn, $_REQUEST['date']);


$fileinfo=PATHINFO($_FILES["picture"]["name"]);
	$newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
	move_uploaded_file($_FILES["picture"]["tmp_name"],"upload/" . $newFilename);
	$location="upload/" . $newFilename;


// Attempt insert query execution
$sql = "INSERT INTO post (TITLE, CONTENT, CATEGORY,PICTURE,DATE)
VALUES ('$title', '$content', '$category','$location','$date')";


if(mysqli_query($conn, $sql)){
    echo "<div  id='helpdiv'><div class='col-lg-9'>
	<div style='background-color:#C2E1C0;color:green;text-align:center;font-size:17px;padding:10px;border-radius:5px;box-shadow: 0 4px 4px -4px black;'>
	<strong>Success!</strong> Post published successfully.</div></div></div><br><br>";
	
	echo "<script type='text/javascript'>
window.setTimeout('closeHelpDiv();', 3000);

function closeHelpDiv(){
document.getElementById('helpdiv').style.display=' none';
}
</script>";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
		}
if(isset($_POST['draft']))
        {
$title = mysqli_real_escape_string($conn, $_REQUEST['title']);
$content = mysqli_real_escape_string($conn, $_REQUEST['content']);
$category= mysqli_real_escape_string($conn, $_REQUEST['category']);
$date= mysqli_real_escape_string($conn, $_REQUEST['date']);


$fileinfo=PATHINFO($_FILES["picture"]["name"]);
	$newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
	move_uploaded_file($_FILES["picture"]["tmp_name"],"upload/" . $newFilename);
	$location="upload/" . $newFilename;


// Attempt insert query execution
$sql = "INSERT INTO post_draft (TITLE, CONTENT, CATEGORY,PICTURE,DATE)
VALUES ('$title', '$content', '$category','$location','$date')";


if(mysqli_query($conn, $sql)){
    echo "<div  id='helpdiv'><div class='col-lg-9'>
	<div style='background-color:#C2E1C0;color:green;text-align:center;font-size:17px;padding:10px;border-radius:5px;box-shadow: 0 4px 4px -4px black;'>
	<strong>Success!</strong> Draft saved successfully.</div></div></div><br><br>";
	
	echo "<script type='text/javascript'>
window.setTimeout('closeHelpDiv();', 3000);

function closeHelpDiv(){
document.getElementById('helpdiv').style.display=' none';
}
</script>";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
		}


    ?>

<form class="form-horizontal" action="" id="register_form" method="post" enctype="multipart/form-data">
                      <!-- Title -->
                      <div class="form-group">
                        <label class="control-label col-lg-2" for="title">TITLE</label>
                        <div class="col-lg-10">
                          <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                      </div>
                      <!-- Content -->
                      <div class="form-group">
                        <label class="control-label col-lg-2" for="content">CONTENT</label>
                        <div class="col-lg-10">
                          <textarea class="form-control" id="content" name="content" required></textarea>
                        </div>
                      </div>
                      <!-- Cateogry -->
                      <div class="form-group">
                        <label class="control-label col-lg-2">CATEGORY</label>
                        <div class="col-lg-10">
                          <select class="form-control" name="category" required>
                                                  <option disabled>- Choose Cateogry -</option>
                                                  <option>General</option>
                                                  <option>News</option>
                                                  <option>Media</option>
                                                  <option>Funny</option>
                                                </select>
                        </div>
                      </div>
					  
					  <div class="form-group">
                        <label class="control-label col-lg-2" for="tags">PICTURE</label>
                        <div class="col-lg-10">
                          <input type="file" class="form-control" id="tags" name="picture" required>
                        </div>

                      </div>
					  <div class="form-group">
                        <label class="control-label col-lg-2" for="tags">DATE</label>
                        <div class="col-lg-10">
                          <input type="date" class="form-control" id="tags" name="date" required>
                        </div>

                      </div>
                      <!-- Tags -->
                      

                      <!-- Buttons -->
                      <div class="form-group">
                        <!-- Buttons -->
                        <div class="col-lg-offset-2 col-lg-9">
                          <button type="submit" name="publish" class="btn btn-primary">PUBLISH</button>
                          <button type="submit" class="btn btn-danger" name="draft">SAVE DRAFT</button>
                          <button type="reset" class="btn btn-default" onclick="resetForm('register_form'); return false;">RESET</button>
                        </div>
                      </div>
                    </form>
                    </section>
                    <section>
                      
                    </section>
                  </div>
				  
	  <div id="cancelled" class="tab-pane " >
                    <section class="panel">
                     
					  
						<div class="panel-body bio-graph-info" style="background-color:Lavender">
						<?php
// Below is optional, remove if you have already connected to your database.
$mysqli = mysqli_connect('localhost', 'root', '', 'hrms');

// Get the total number of records from our table "students".
$total_pages = $mysqli->query("SELECT * FROM post_draft ORDER BY POST_ID ASC")->num_rows;

// Check if the page number is specified and check if it's a number, if not return the default page number which is 1.
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;

// Number of results to show on each page.
$num_results_on_page = 4;

if ($stmt = $mysqli->prepare("SELECT * FROM post_draft  ORDER BY POST_ID LIMIT ?,?")) {
	// Calculate the page to get the results we need from our table.
	$calc_page = ($page - 1) * $num_results_on_page;
	$stmt->bind_param('ii', $calc_page, $num_results_on_page);
	$stmt->execute(); 
	// Get the results...
	$result = $stmt->get_result();
	?>
	<!DOCTYPE html>
	<html>
		<head>
			<title></title>
			<meta charset="utf-8">
			<style>
			html {
				font-family: Tahoma, Geneva, sans-serif;
				padding: 20px;
				background-color: #F8F9F9;
			}
			table {
				border-collapse: collapse;
				width: 500px;
			}
			td, th {
				padding: 10px;
			}
			th {
				background-color: #54585d;
				color: #ffffff;
				font-weight: bold;
				font-size: 13px;
				border: 1px solid #54585d;
			}
			td {
				color: #636363;
				border: 1px solid #dddfe1;
			}
			tr {
				background-color: #f9fafb;
			}
			tr:nth-child(odd) {
				background-color: #ffffff;
			}
			.pagination {
				list-style-type: none;
				padding: 10px 0;
				display: inline-flex;
				justify-content: space-between;
				box-sizing: border-box;
				
			}
			.pagination li {
				box-sizing: border-box;
				padding-right: 10px;
			}
			.pagination li a {
				box-sizing: border-box;
				background-color: #e2e6e6;
				padding: 8px;
				text-decoration: none;
				font-size: 12px;
				font-weight: bold;
				color: #616872;
				border-radius: 4px;
			}
			.pagination li a:hover {
				background-color: #d4dada;
			}
			.pagination .next a, .pagination .prev a {
				text-transform: uppercase;
				font-size: 12px;
			}
			.pagination .currentpage a {
				background-color: #518acb;
				color: #fff;
			}
			.pagination .currentpage a:hover {
				background-color: #518acb;
			}
			</style>
		</head>
		<body>
		<div class="col-lg-12 col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h2><i class="fa fa-flag-o red"></i><strong>POST / SAVED DRAFT</strong></h2>
                <div class="panel-actions">
                  <a href="index.html#" class="btn-setting"><i class="fa fa-rotate-right"></i></a>
                  <a href="index.html#" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>
                  <a href="index.html#" class="btn-close"><i class="fa fa-times"></i></a>
                </div>
              </div>
			   <div class="panel-body">
			<table border="1"class="table bootstrap-datatable countries">
				<tr>
					<th  style="background-color: #152E48;color: white;">SN</th>
                      <th  style="background-color: #152E48;color: white;">TITLE</th>
                      <th  style="background-color: #152E48;color: white;">CONTENT</th>
                      <th  style="background-color: #152E48;color: white;">CATEGORY</th>
                      <th  style="background-color: #152E48;color: white;">PICTURE</th>
                      <th  style="background-color: #152E48;color: white;">DATE</th>
                      <th  style="background-color: #152E48;color: white;">ACTION</th>
				</tr>
				<?php while ($row = $result->fetch_assoc()):
				$post_id=$row["POST_ID"];  
									$title=$row["TITLE"];  
									$content=$row["CONTENT"];  
									$category=$row["CATEGORY"];  
									$picture=$row["PICTURE"];
									$date=$row["DATE"];
				?>
				<tr>
				<td><?php echo $post_id;  ?></td>
						<td><?php echo $title  ?></td>
						<td><?php echo $content  ?></td>
						<td><?php echo $category  ?></td>
						<td><img src="<?php echo $picture  ?>"></td> 
						<td><?php echo $date  ?></td> 
						<td><form action="publish.php?del=<?php echo $post_id ?>" method="post" ><button  class="btn btn-primary" name="publish">PUBLISH</button></form></td>
				</tr>
				<?php endwhile; ?>
			</table>
			 </div>
			<?php if (ceil($total_pages / $num_results_on_page) > 0): ?>
			<CENTER>
			<ul class="pagination">
				<?php if ($page > 1): ?>
				<li class="prev"><a href="post.php?page=<?php echo $page-1 ?>">Prev</a></li>
				<?php endif; ?>

				<?php if ($page > 3): ?>
				<li class="start"><a href="post.php?page=1">1</a></li>
				<li class="dots">...</li>
				<?php endif; ?>

				<?php if ($page-2 > 0): ?><li class="page"><a href="post.php?page=<?php echo $page-2 ?>"><?php echo $page-2 ?></a></li><?php endif; ?>
				<?php if ($page-1 > 0): ?><li class="page"><a href="post.php?page=<?php echo $page-1 ?>"><?php echo $page-1 ?></a></li><?php endif; ?>

				<li class="currentpage"><a href="post.php?page=<?php echo $page ?>"><?php echo $page ?></a></li>

				<?php if ($page+1 < ceil($total_pages / $num_results_on_page)+1): ?><li class="page"><a href="post.php?page=<?php echo $page+1 ?>"><?php echo $page+1 ?></a></li><?php endif; ?>
				<?php if ($page+2 < ceil($total_pages / $num_results_on_page)+1): ?><li class="page"><a href="post.php?page=<?php echo $page+2 ?>"><?php echo $page+2 ?></a></li><?php endif; ?>

				<?php if ($page < ceil($total_pages / $num_results_on_page)-2): ?>
				<li class="dots">...</li>
				<li class="end"><a href="post.php?page=<?php echo ceil($total_pages / $num_results_on_page) ?>"><?php echo ceil($total_pages / $num_results_on_page) ?></a></li>
				<?php endif; ?>

				<?php if ($page < ceil($total_pages / $num_results_on_page)): ?>
				<li class="next"><a href="post.php?page=<?php echo $page+1 ?>">Next</a></li>
				<?php endif; ?>
			</ul>
			</CENTER>
			<?php endif; ?>
		</body>
	</html>
	<?php
	$stmt->close();
}
?>				  					
						
                    </section>
                    <section>
                      
                    </section>
                  </div>			  
				  
				  
				  
                  <!-- edit-profile -->
                  <div id="edit-profile" class="tab-pane">
                    <section class="panel">
                      <div class="panel-body bio-graph-info" style="background-color:Lavender">
					  <?php
// Below is optional, remove if you have already connected to your database.
$mysqli = mysqli_connect('localhost', 'root', '', 'hrms');

// Get the total number of records from our table "students".
$total_pages = $mysqli->query("SELECT * FROM post ORDER BY POST_ID ASC")->num_rows;

// Check if the page number is specified and check if it's a number, if not return the default page number which is 1.
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;

// Number of results to show on each page.
$num_results_on_page = 4;

if ($stmt = $mysqli->prepare("SELECT * FROM post ORDER BY POST_ID LIMIT ?,?")) {
	// Calculate the page to get the results we need from our table.
	$calc_page = ($page - 1) * $num_results_on_page;
	$stmt->bind_param('ii', $calc_page, $num_results_on_page);
	$stmt->execute(); 
	// Get the results...
	$result = $stmt->get_result();
	?>
	<!DOCTYPE html>
	<html>
		<head>
			<title></title>
			<meta charset="utf-8">
			<style>
			html {
				font-family: Tahoma, Geneva, sans-serif;
				padding: 20px;
				background-color: #F8F9F9;
			}
			table {
				border-collapse: collapse;
				width: 500px;
			}
			td, th {
				padding: 10px;
			}
			th {
				background-color: #54585d;
				color: #ffffff;
				font-weight: bold;
				font-size: 13px;
				border: 1px solid #54585d;
			}
			td {
				color: #636363;
				border: 1px solid #dddfe1;
			}
			tr {
				background-color: #f9fafb;
			}
			tr:nth-child(odd) {
				background-color: #ffffff;
			}
			.pagination {
				list-style-type: none;
				padding: 10px 0;
				display: inline-flex;
				justify-content: space-between;
				box-sizing: border-box;
				
			}
			.pagination li {
				box-sizing: border-box;
				padding-right: 10px;
			}
			.pagination li a {
				box-sizing: border-box;
				background-color: #e2e6e6;
				padding: 8px;
				text-decoration: none;
				font-size: 12px;
				font-weight: bold;
				color: #616872;
				border-radius: 4px;
			}
			.pagination li a:hover {
				background-color: #d4dada;
			}
			.pagination .next a, .pagination .prev a {
				text-transform: uppercase;
				font-size: 12px;
			}
			.pagination .currentpage a {
				background-color: #518acb;
				color: #fff;
			}
			.pagination .currentpage a:hover {
				background-color: #518acb;
			}
			</style>
		</head>
		<body>
		<div class="col-lg-12 col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h2><i class="fa fa-flag-o red"></i><strong>POST / PUBLISHED</strong></h2>
                <div class="panel-actions">
                  <a href="index.html#" class="btn-setting"><i class="fa fa-rotate-right"></i></a>
                  <a href="index.html#" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>
                  <a href="index.html#" class="btn-close"><i class="fa fa-times"></i></a>
                </div>
              </div>
			   <div class="panel-body">
			<table border="1"class="table bootstrap-datatable countries">
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
				<?php while ($row = $result->fetch_assoc()):
				 $post_id=$row["POST_ID"];  
                  $title=$row["TITLE"];  
                  $content=$row["CONTENT"];  
                  $category=$row["CATEGORY"];  
                  $picture=$row["PICTURE"];
                  $date=$row["DATE"];
                  $post_date=$row["POST_DATE"];
				?>
				<tr>
				<td><?php echo $post_id;  ?></td>
            <td><?php echo $title;  ?></td>
            <td><?php echo $content;  ?></td>
            <td><?php echo $category;  ?></td>
            <td><?php echo $picture;  ?></td> 
            <td><?php echo $date;  ?></td> 
            <td><?php echo $post_date;  ?></td> 
            <td><a onclick='javascript:confirmationDelete($(this));return false;' 
			href="deletepost.php?del=<?php echo $post_id ?>"><button class="btn" style="background-color:red;color:white;"><i class="fa fa-trash-o" style="font-size:20px;"></i></button></a></td>                        
            
            <script>
            function confirmationDelete(anchor)
{
   var conf = confirm('Are you sure want to delete this record?');
   if(conf)
      window.location=anchor.attr("href");
}
            </script>
				</tr>
				<?php endwhile; ?>
			</table>
			 </div>
			<?php if (ceil($total_pages / $num_results_on_page) > 0): ?>
			<CENTER>
			<ul class="pagination">
				<?php if ($page > 1): ?>
				<li class="prev"><a href="post.php?page=<?php echo $page-1 ?>">Prev</a></li>
				<?php endif; ?>

				<?php if ($page > 3): ?>
				<li class="start"><a href="post.php?page=1">1</a></li>
				<li class="dots">...</li>
				<?php endif; ?>

				<?php if ($page-2 > 0): ?><li class="page"><a href="post.php?page=<?php echo $page-2 ?>"><?php echo $page-2 ?></a></li><?php endif; ?>
				<?php if ($page-1 > 0): ?><li class="page"><a href="post.php?page=<?php echo $page-1 ?>"><?php echo $page-1 ?></a></li><?php endif; ?>

				<li class="currentpage"><a href="post.php?page=<?php echo $page ?>"><?php echo $page ?></a></li>

				<?php if ($page+1 < ceil($total_pages / $num_results_on_page)+1): ?><li class="page"><a href="post.php?page=<?php echo $page+1 ?>"><?php echo $page+1 ?></a></li><?php endif; ?>
				<?php if ($page+2 < ceil($total_pages / $num_results_on_page)+1): ?><li class="page"><a href="post.php?page=<?php echo $page+2 ?>"><?php echo $page+2 ?></a></li><?php endif; ?>

				<?php if ($page < ceil($total_pages / $num_results_on_page)-2): ?>
				<li class="dots">...</li>
				<li class="end"><a href="post.php?page=<?php echo ceil($total_pages / $num_results_on_page) ?>"><?php echo ceil($total_pages / $num_results_on_page) ?></a></li>
				<?php endif; ?>

				<?php if ($page < ceil($total_pages / $num_results_on_page)): ?>
				<li class="next"><a href="post.php?page=<?php echo $page+1 ?>">Next</a></li>
				<?php endif; ?>
			</ul>
			</CENTER>
			<?php endif; ?>
		</body>
	</html>
	<?php
	$stmt->close();
}
?>				  
                    </section>
                  </div>
                </div>
              </div>
            </section>
          </div>
        

        <!-- page end-->
      </section>
    </section>
	
	<script type="text/javascript">
   function resetForm(register_form)
   {
       var myForm = document.getElementById(register_form);

       for (var i = 0; i < myForm.elements.length; i++)
       {
           if ('submit' != myForm.elements[i].type && 'reset' != myForm.elements[i].type)
           {
               myForm.elements[i].checked = false;
               myForm.elements[i].value = '';
               myForm.elements[i].selectedIndex = 0;
           }
       }
   }
</script>
    <!--main content end-->
   
  </section>
  <!-- container section end -->
  <!-- javascripts -->
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!-- nice scroll -->
  <script src="js/jquery.scrollTo.min.js"></script>
  <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
  <!-- jquery knob -->
  <script src="assets/jquery-knob/js/jquery.knob.js"></script>
  <!--custome script for all page-->
  <script src="js/scripts.js"></script>

  <script>
    //knob
    $(".knob").knob();
  </script>


</body>

</html>
