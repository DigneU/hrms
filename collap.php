<?php include 'include/config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php
		include('include/stylings.php');
	?>
	
	<style> 
    .accordion__button{
  display:block;
  width:100%;
  padding:15px;
  border:none;
  outline: none;
  cursor: pointer;
  background: #3333333;
  color: #ffffffff;
  text-align: left;
  transition: background 0.2s;
}
.accordion__button::after {
  content: '\25be';
  float: right;
  transform: scale(1.5);
}
.accordion__button--active{background: #555555;}
.accordion__button--active::after{
  content: '\25b4'
}
.accordion__content{
  overflow: hidden;
  max-height: 0; 
  transition: max-height 0.2s;
  padding: 0 15px;
  font-family: sans-serif;
  background: #eeeeee;
}
#example {
 
  position: relative;
  -webkit-animation-name: example; /* Safari 4.0 - 8.0 */
  -webkit-animation-duration: 4s; /* Safari 4.0 - 8.0 */
  -webkit-animation-iteration-count: 100; /* Safari 4.0 - 8.0 */
  animation-name: example;
  animation-duration: 3s;
  animation-iteration-count: 1000;
}

/* Safari 4.0 - 8.0 */
@-webkit-keyframes example {
  0%   { left:0px; top:0px;}
  25%  { left:2px; top:0px;}
  50%  { left:2px; top:2px;}
  75%  {left:0px; top:2px;}
  100% { left:0px; top:0px;}
}

/* Standard syntax */
@keyframes example {
  0%   { left:0px; top:0px;}
  25%  { left:20px; top:0px;}
  50%  { left:20px; top:20px;}
  75%  { left:0px; top:20px;}
  100% { left:0px; top:0px;}
}
</style>
</head>
<body>
  <!-- container section start -->
  <section id="container" class="">
	<?php
		include 'include/header.php';
		?>
    <!--header end-->

    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
		<?php
		include 'include/menue.php';
		?>
        
      </div>
    </aside>
    <!--sidebar end-->

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <!--overview start-->
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-laptop"></i>DASHBOARD</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
              <li><i class="fa fa-laptop"></i>DASHBOARD</li>
            </ol>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <a href="pendingleave.php" style="text-decoration:none;color:white"><div id="/example" class="info-box blue-bg">
              <i class="fa fa-clock-o" aria-hidden="true"></i>
              <div class="count">
			  <?php 
				$abc="SELECT count(*) as total FROM leave_application where STATUS='PENDING'";
				$result=mysqli_query($conn,$abc);
				if($result)
				{
				while($row=mysqli_fetch_assoc($result))
				{
				echo $row['total'];
				}     
				}
				?>
			  </div>
              <div class="title">Pending leave permission</div>
            </div></a>
            <!--/.info-box-->
          </div>
          <!--/.col-->

          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <a href="pendingleave.php" style="text-decoration:none;color:white"><div  class="info-box brown-bg">
              <i class="fa fa-check-circle" style="font-size:48px;color:white"></i>
              <div class="count">
			  <?php 
				$abc="SELECT count(*) as total FROM leave_application where STATUS='CONFIRMED'";
				$result=mysqli_query($conn,$abc);
				if($result)
				{
				while($row=mysqli_fetch_assoc($result))
				{
				echo $row['total'];
				}     
				}
				?>
			  
			  
			  
			  </div>
              <div class="title">Confirmed leave</div>
            </div></a>
            <!--/.info-box-->
          </div>
          <!--/.col-->

          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <a href="pendingusers.php" style="text-decoration:none;color:white"> <div id="/example" class="info-box dark-bg">
             <i class="fa fa-sign-in" style="font-size:48px"></i>
              <div class="count">
				<?php 
				$abc="SELECT count(*) as total FROM create_account";
				$result=mysqli_query($conn,$abc);
				if($result)
				{
				while($row=mysqli_fetch_assoc($result))
				{
				echo $row['total'];
				}     
				}
				?>

				</div>
             <div class="title">ACCOUNTS REQUESTED</div>
            </div></a>
            <!--/.info-box-->
          </div>
          <!--/.col-->

		            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box green-bg">
              <i class="fa fa-money" aria-hidden="true"></i>
              <div class="count">1.426</div>
              <div class="title">Payroll</div>
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->

        </div>
        <!--/.row-->



        <!-- Today status end -->



        <div class="row">

          <div class="col-lg-12 col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h2><i class="fa fa-flag-o red"></i><strong>REGISTERED USERS</strong></h2>
                <div class="panel-actions">
                  <a href="index.html#" class="btn-setting"><i class="fa fa-rotate-right"></i></a>
                  <a href="index.html#" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>
                  <a href="index.html#" class="btn-close"><i class="fa fa-times"></i></a>
                </div>
              </div>
              <div class="panel-body">
                <table class="table bootstrap-datatable countries" class="col-lg-8 col-md-12">
                   <thead>
                    <tr>
                      <th  class="info-box dark-bg">SN</th>
                      <th  class="info-box dark-bg">NAMES</th>
                      <th  class="info-box dark-bg">GENDER</th>
                      <th  class="info-box dark-bg">NATIONAL_ID</th>
                      <th  class="info-box dark-bg">PHONE_NUMBER</th>
                      <th  class="info-box dark-bg">POSITION</th>
                      <th  class="info-box dark-bg">DEPARTMENT</th>
                      <th  class="info-box dark-bg">USER_TYPE</th>
                      <th  class="info-box dark-bg">USERNAME</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <?php
						$sql = "SELECT * FROM user_registration ORDER BY USER_ID ASC";
						$result = $conn->query($sql);

						if ($result->num_rows > 0) {
							// output data of each row
							while($row = $result->fetch_assoc()) {
								//echo "<br> id: ". $row["id"]. " - Name: ". $row["firstname"]. " " . $row["lastname"] . "<br>";
									$user_id=$row["USER_ID"];  
									$user_Fname=$row["FIRST_NAME"];  
									$user_Lname=$row["LAST_NAME"];  
									$user_gender=$row["GENDER"];  
									$user_national=$row["NATIONAL_ID"];
									$user_phone=$row["PHONE_NUMBER"];
									$user_position=$row["POSITION"];
									$user_department=$row["DEPARTMENT"];
									$user_type=$row["USER_TYPE"];
									$user_name=$row["USERNAME"];
						?>			
						 
						  

						<!--here showing results in the table -->  
						<td><?php echo $user_id;  ?></td>
						<td><?php echo $user_Fname." ".$user_Lname  ?></td>
						<td><?php echo $user_gender  ?></td>
						<td><?php echo $user_national  ?></td>
						<td><?php echo $user_phone  ?></td> 
						<td><?php echo $user_position  ?></td> 
						<td><?php echo $user_department  ?></td> 
						<td><?php echo $user_type  ?></td> 
						<td><?php echo $user_name  ?></td> 
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
          <!--/col-->
          
         

          <!--/col-->

          <!--/col-->

        </div>



        <!-- statics end -->




        <!-- project team & activity start -->
        <div class="row">
          <div class="col-md-4 portlets">
            <!-- Widget -->
            <div class="panel panel-default">
              <div class="panel-heading">
                <div class="pull-left">Message</div>
                <div class="widget-icons pull-right">
                  <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>
                  <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                </div>
                <div class="clearfix"></div>
              </div>

              <div class="panel-body">
                <!-- Widget content -->
                <div class="padd sscroll">

                  <ul class="chats">

                    <!-- Chat by us. Use the class "by-me". -->
                    <li class="by-me">
                      <!-- Use the class "pull-left" in avatar -->
                      <div class="avatar pull-left">
                        <img src="img/user.jpg" alt="" />
                      </div>

                      <div class="chat-content">
                        <!-- In meta area, first include "name" and then "time" -->
                        <div class="chat-meta">John Smith <span class="pull-right">3 hours ago</span></div>
                        Vivamus diam elit diam, consectetur dapibus adipiscing elit.
                        <div class="clearfix"></div>
                      </div>
                    </li>

                    <!-- Chat by other. Use the class "by-other". -->
                    <li class="by-other">
                      <!-- Use the class "pull-right" in avatar -->
                      <div class="avatar pull-right">
                        <img src="img/user22.png" alt="" />
                      </div>

                      <div class="chat-content">
                        <!-- In the chat meta, first include "time" then "name" -->
                        <div class="chat-meta">3 hours ago <span class="pull-right">Jenifer Smith</span></div>
                        Vivamus diam elit diam, consectetur fconsectetur dapibus adipiscing elit.
                        <div class="clearfix"></div>
                      </div>
                    </li>

                    <li class="by-me">
                      <div class="avatar pull-left">
                        <img src="img/user.jpg" alt="" />
                      </div>

                      <div class="chat-content">
                        <div class="chat-meta">John Smith <span class="pull-right">4 hours ago</span></div>
                        Vivamus diam elit diam, consectetur fermentum sed dapibus eget, Vivamus consectetur dapibus adipiscing elit.
                        <div class="clearfix"></div>
                      </div>
                    </li>

                    <li class="by-other">
                      <!-- Use the class "pull-right" in avatar -->
                      <div class="avatar pull-right">
                        <img src="img/user22.png" alt="" />
                      </div>

                      <div class="chat-content">
                        <!-- In the chat meta, first include "time" then "name" -->
                        <div class="chat-meta">3 hours ago <span class="pull-right">Jenifer Smith</span></div>
                        Vivamus diam elit diam, consectetur fermentum sed dapibus eget, Vivamus consectetur dapibus adipiscing elit.
                        <div class="clearfix"></div>
                      </div>
                    </li>

                  </ul>

                </div>
                <!-- Widget footer -->
                <div class="widget-foot">

                  <form class="form-inline">
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Type your message here...">
                    </div>
                    <button type="submit" class="btn btn-info">Send</button>
                  </form>


                </div>
              </div>


            </div>
          </div>

          <div class="col-lg-8">
            <!--Project Activity start-->
            <section class="panel">
              <div class="panel-body progress-panel">
                <div class="row">
                  <div class="col-lg-8 task-progress pull-left">
                    <h1>To Do Everyday</h1>
                  </div>
                  <div class="col-lg-4">
                    <span class="profile-ava pull-right">
                                        <img alt="" class="simple" src="img/avatar1_small.jpg">
                                        Jenifer smith
                                </span>
                  </div>
                </div>
              </div>
              <table class="table table-hover personal-task">
                <tbody>
                  <tr>
                    <td>Today</td>
                    <td>
                      web design
                    </td>
                    <td>
                      <span class="badge bg-important">Upload</span>
                    </td>
                    <td>
                      <span class="profile-ava">
                                        <img alt="" class="simple" src="img/avatar1_small.jpg">
                                    </span>
                    </td>
                  </tr>
                  <tr>
                    <td>Yesterday</td>
                    <td>
                      Project Design Task
                    </td>
                    <td>
                      <span class="badge bg-success">Task</span>
                    </td>
                    <td>
                      <div id="work-progress2"></div>
                    </td>
                  </tr>
                  <tr>
                    <td>21-10-14</td>
                    <td>
                      Generate Invoice
                    </td>
                    <td>
                      <span class="badge bg-success">Task</span>
                    </td>
                    <td>
                      <div id="work-progress3"></div>
                    </td>
                  </tr>
                  <tr>
                    <td>22-10-14</td>
                    <td>
                      Project Testing
                    </td>
                    <td>
                      <span class="badge bg-primary">To-Do</span>
                    </td>
                    <td>
                      <span class="profile-ava">
                                        <img alt="" class="simple" src="img/avatar1_small.jpg">
                                      </span>
                    </td>
                  </tr>
                  <tr>
                    <td>24-10-14</td>
                    <td>
                      Project Release Date
                    </td>
                    <td>
                      <span class="badge bg-info">Milestone</span>
                    </td>
                    <td>
                      <div id="work-progress4"></div>
                    </td>
                  </tr>
                  <tr>
                    <td>28-10-14</td>
                    <td>
                      Project Release Date
                    </td>
                    <td>
                      <span class="badge bg-primary">To-Do</span>
                    </td>
                    <td>
                      <div id="work-progress5"></div>
                    </td>
                  </tr>
                  <tr>
                    <td>Last week</td>
                    <td>
                      Project Release Date
                    </td>
                    <td>
                      <span class="badge bg-primary">To-Do</span>
                    </td>
                    <td>
                      <div id="work-progress1"></div>
                    </td>
                  </tr>
                  <tr>
                    <td>last month</td>
                    <td>
                      Project Release Date
                    </td>
                    <td>
                      <span class="badge bg-success">To-Do</span>
                    </td>
                    <td>
                      <span class="profile-ava">
                                        <img alt="" class="simple" src="img/avatar1_small.jpg">
                                      </span>
                    </td>
                  </tr>
                </tbody>
              </table>
            </section>
            <!--Project Activity end-->
          </div>
        </div><br><br>

		<div class="row">
        <div class="accordion">
          <div class="col-md-9 portlets">
         
              
              <div class="panel-heading accordion__content">

                <h2><strong>Calendar</strong></h2>
                <div class="accordion__content">
                <div class="panel-actions">
                  <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>
                  <button class="accordion__button">Open Collapsible</button>
                  <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                </div>

              </div><br><br><br>
              <div class="panel-body accordion__content">
                <!-- Widget content -->

                <!-- Below line produces calendar. I am using FullCalendar plugin. -->
                <div id="calendar" ></div>

              </div>
            </div></div>
          </div>
        </div>
<!-- project team & activity end -->
          </div>
			
        <!-- project team & activity end -->

      </section>
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
    <!--main content end-->
  </section>
 <?php
 include("include/scripting.php")
 ?>
</body>

</html>
