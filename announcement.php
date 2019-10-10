
<!DOCTYPE html>
<html lang="en">

<head>
<?php
include"include/stylings.php";
?>
</head>

<body>
  <!-- container section start -->
  <section id="container" class="">

      <!-- include header and menubar start -->
        <?php
            include 'include/bannermenu.php';
        ?>
        <!-- include header and menubar end -->

    <!--sidebar end-->

    <!--main content start-->
	
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-bullhorn" style="font-size:48px"></i> ANNOUNCEMNETS</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="User_dashboard.php">Home</a></li>
              <li><i class="fa fa-bullhorn"></i>Announcements</li>
              
            </ol>
          </div>
        </div>
		

	<div class="row">

          <div class="col-lg-12 col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h2><i class="fa fa-flag-o red"></i><strong>ALL ANNOUNCEMNETS</strong></h2>
                <div class="panel-actions">
                  <a href="index.html#" class="btn-setting"><i class="fa fa-rotate-right"></i></a>
                  <a href="index.html#" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>
                  <a href="index.html#" class="btn-close"><i class="fa fa-times"></i></a>
                </div>
              </div>
              <?php
		include('include/config.php');
		$query=mysqli_query($conn,"select * from post ORDER BY POST_ID DESC");
		while($row=mysqli_fetch_array($query)){
			$picture  =$row['PICTURE']; 
			$title=$row['TITLE'];
			$content=$row['CONTENT'];
			$category=$row['CATEGORY'];
			$date=$row['DATE'];
			$post=$row['POST_DATE'];
			echo "<div class='panel-body'><div class='col-lg-6'><img src='".$picture."' style='width:100%;height:400px'></div>
			<div class='col-lg-6'><h2 style='text-transform:uppercase;font-family:bahnschrift'><strong>".$title."</strong></h2><br>
			<p style='font-size:16px'>".$content."</p><br><br>
			<p>CATEGORY:".$category."</p>
			<p>EVENT DATE:".$date."</p>
			<br><br>
			<p>PUBLISHED ON: ".$post."</p></div></div><br><br>";
			}
			?>

            </div>

          </div>
          <!--/col-->
          
         

          <!--/col-->

          <!--/col-->

        </div>
        
        
                 
              
      </section>
    </section>
    </section>
    <!--main content end-->
    <div class="text-right">
      <div class="credits">
          <!--
            All the links in the footer should remain intact.
            You can delete the links only if you purchased the pro version.
            Licensing information: https://bootstrapmade.com/license/
            Purchase the pro version form: https://bootstrapmade.com/buy/?theme=NiceAdmin
          -->
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </div>
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
