<?php  
session_start();  
  
if(!$_SESSION['name'])  
{  
  
    header("Location: index.php");//redirect to login page to secure the welcome page without login access.  
}  
  
?>
<?php include ('config.php');?>
<header class="header dark-bg">
      <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
      </div>

      <!--logo start-->
      <a href="index.html" class="logo">HRMS <span class="lite">MVEND</span></a>
      <!--logo end-->

      

      <div class="top-nav notification-row">
        <!-- notificatoin dropdown start-->
        <ul class="nav pull-right top-menu">

          <!-- task notificatoin start -->
          <li id="task_notificatoin_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <i class="icon-task-l"></i>
                            <span class="badge bg-important"><?php 
				$abc="SELECT count(*) as total FROM leave_application where USER_ID='".$_SESSION['user']."' and STATUS='PENDING'";
				$result=mysqli_query($conn,$abc);
				if($result)
				{
				while($row=mysqli_fetch_assoc($result))
				{
				echo $row['total'];
				}     
				}
				?></span>
                        </a>
            <ul class="dropdown-menu extended tasks-bar">
              <div class="notify-arrow notify-arrow-blue"></div>
              <li>
                <p class="blue">
				<?php 
				$abc="SELECT count(*) as total FROM leave_application where USER_ID='".$_SESSION['user']."' and STATUS='PENDING'";
				$result=mysqli_query($conn,$abc);
				if($result)
				{
				while($row=mysqli_fetch_assoc($result))
				{
				echo "You have ".$row['total']. "pending Leaves";
				}     
				}
				?>
				
				</p>
              </li>
              <li>
			  <?php
									$query=mysqli_query($conn,"select * from leave_application where USER_ID='".$_SESSION['user']."' and STATUS='PENDING' ORDER BY LEAVE_ID DESC");
									while($row=mysqli_fetch_array($query)){
										$title  =$row['LEAVE_TYPE']; 
										$description  =$row['LEAVE_DATE'];
										
										
										?>
			  
                <a href="#">
                                    <span class="label label-warning"><i class="icon_pin"></i></span>
                                    <span><strong>This leave type is still in pending</strong></span><br>
                                    &nbsp &nbsp &nbsp &nbsp <span><?php echo $title?></span><br>
                                    &nbsp &nbsp &nbsp &nbsp<span><?php echo $description?></span>
                                    <span class="small italic pull-right">50 mins</span>
                                </a>
								<?php
									}
										
										?>
              </li>
              <li class="external">
                <a href="#">See All Leaves</a>
              </li>
            </ul>
          </li>
          <!-- task notificatoin end -->
          <!-- inbox notificatoin start-->
          <li id="mail_notificatoin_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <i class="icon-envelope-l"></i>
                            <span class="badge bg-important"><?php 
				$abc="SELECT count(*) as total FROM cancelled_leave where USER_ID='".$_SESSION['user']."' and USER_TYPE='Admin'";
				$result=mysqli_query($conn,$abc);
				if($result)
				{
				while($row=mysqli_fetch_assoc($result))
				{
				echo $row['total'];
				}     
				}
				?></span>
                        </a>
            <ul class="dropdown-menu extended inbox">
              <div class="notify-arrow notify-arrow-blue"></div>
              <li>
                <p class="blue"><?php 
				$abc="SELECT count(*) as total FROM cancelled_leave where USER_ID='".$_SESSION['user']."' and USER_TYPE='Admin'";
				$result=mysqli_query($conn,$abc);
				if($result)
				{
				while($row=mysqli_fetch_assoc($result))
				{
				echo "You have ".$row['total']." messages";
				}     
				}
				?></p>
              </li>
              <li>
			  <?php
									$query=mysqli_query($conn,"select * from cancelled_leave where USER_ID='".$_SESSION['user']."' and USER_TYPE='Admin' ORDER BY C_ID DESC");
									while($row=mysqli_fetch_array($query)){
										$title  =$row['TITLE']; 
										$description  =$row['DESCRIPTION']; 
										
												$querye=mysqli_query($conn,"select * from user_registration where USER_TYPE='Admin' ORDER BY USER_ID ASC LIMIT 1");
												while($row=mysqli_fetch_array($querye)){
													$picture  =$row['PROFILE_PICTURE']; 
										
										
										?>
								<a href="#">
                                    <span class="photo">
									<?php echo "<img alt='avatar' src='".$picture."'>";?>
                                    <span class="subject">
                                    <span class="from"><?php echo $title; ?></span>
                                    <span class="time">1 min</span>
                                    </span>
                                    <span class="message">
                                        <?php echo $description; ?>
                                    </span>
                                </a>
								<?php
									}}
										
										?>
              </li>
              <li>
                <a href="#">See all messages</a>
              </li>
            </ul>
          </li>
          <!-- inbox notificatoin end -->
          <!-- alert notification start-->
          <li id="alert_notificatoin_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                            <i class="icon-bell-l"></i>
                            <span class="badge bg-important">
							<?php 
							$abc="SELECT(SELECT COUNT(*)FROM  leave_application where USER_ID='".$_SESSION['user']."' and STATUS='CANCELLED') AS Total_user,(SELECT COUNT(*)FROM   paid_users where USER_ID='".$_SESSION['user']."') AS Total_paid FROM dual";
							$result=mysqli_query($conn,$abc);
							if($result)
							{
							while($row=mysqli_fetch_assoc($result))
							{
							echo $row['Total_user']+$row['Total_paid'];
							}     
							}
							?>
							
							
							</span>
                        </a>
            <ul class="dropdown-menu extended notification">
              <div class="notify-arrow notify-arrow-blue"></div>
              <li>
                <p class="blue">
				<?php 
							$abc="SELECT(SELECT COUNT(*)FROM  leave_application where USER_ID='".$_SESSION['user']."' and STATUS='CANCELLED') AS Total_user,(SELECT COUNT(*)FROM   paid_users where USER_ID='".$_SESSION['user']."') AS Total_paid FROM dual";
							$result=mysqli_query($conn,$abc);
							if($result)
							{
							while($row=mysqli_fetch_assoc($result))
							{
								$TOTAL=$row['Total_user']+$row['Total_paid'];
							echo "You have ".$TOTAL." new notifications";
							}     
							}
							?>
				
				</p>
              </li>
              <li>
			  <?php
									$query=mysqli_query($conn,"select * from paid_users where USER_ID='".$_SESSION['user']."' ORDER BY PAID_ID DESC");
									while($row=mysqli_fetch_array($query)){
										$title  =$row['TYPE']; 
										$description  =$row['AMOUNT']; 
										
										
										?>
                <a href="#">
                                    <span class="label label-primary"><i class="icon_profile"></i></span>
                                    <span><strong>you have been paid</strong></span><br>
                                    &nbsp &nbsp &nbsp &nbsp <span><?php echo $title?></span>
                                    <span><?php echo $description?></span>
                                    <span class="small italic pull-right">5 mins</span>
                                </a>
								<?php
									}
										
										?>
              </li>
              <li>
			  <?php
									$query=mysqli_query($conn,"select * from leave_application  where USER_ID='".$_SESSION['user']."' and STATUS='CANCELLED' ORDER BY LEAVE_ID DESC");
									while($row=mysqli_fetch_array($query)){
										$title  =$row['LEAVE_TYPE']; 
										$description  =$row['LEAVE_DATE']; 
										
										
										?>
                <a href="#">
                                    <span class="label label-warning"><i class="icon_pin"></i></span>
                                    <span><strong>This leave type was cancelled</strong></span><br>
                                    &nbsp &nbsp &nbsp &nbsp <span><?php echo $title?></span><br>
                                    &nbsp &nbsp &nbsp &nbsp<span><?php echo $description?></span>
                                    <span class="small italic pull-right">50 mins</span>
                                </a>
								<?php
									}
										
										?>
              </li>
              <li>
                <a href="#">See all notifications</a>
              </li>
            </ul>
          </li>
          <!-- alert notification end-->
          <!-- user login dropdown start-->
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                <img alt="" src="img/profile.PNG" style="width:30px; height:30px;">
                            </span>
                            <span class="username"><?php  
		echo $_SESSION['name'];  
		?></span>
                            <b class="caret"></b>
                        </a>
            <ul class="dropdown-menu extended logout">
              <div class="log-arrow-up"></div>
              
              <li>
                <a href="#"><i class="icon_mail_alt"></i> My Inbox</a>
              </li>
              
              <li>
                <a href="#"><i class="icon_chat_alt"></i> Chats</a>
              </li>
			  <li>
                <a href="changepassworduser.php"><i class="fa fa-lock"></i> Change Password</a>
              </li>
              <li>
                <a href="logout.php"><i class="icon_key_alt"></i> Log Out</a>
              </li>
             
            </ul>
          </li>
          <!-- user login dropdown end -->
        </ul>
        <!-- notificatoin dropdown end-->
      </div>
    </header>
    <!--header end-->

    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
          <li class="active">
            <a class="" href="User_dashboard.php">
                          <i class="icon_house_alt"></i>
                          <span>DASHBOARD</span>
                      </a>
          </li>
		  
		   <li>
            <a class="" href="profile.php">
                          <i class="icon_profile"></i>
                          <span>MY PROFILE</span>
                      </a>
          </li>
		  
          <li class="sub-menu">
            <a href="payroll.php" class="">
                          <i class="icon_document_alt"></i>
                          <span>PAYROLL</span>
                      </a>
            
          </li>
          
		   <li class="sub-menu">
            <a href="javascript:;" class="">
                          
        <i class="fa fa-long-arrow-right"> </i>
                          <span>LEAVE</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a href="leaverequest.php" class="">
                          
                          <span>APPLICATION FORM</span>
                       
                      </a>
			  
			  </li>
			  <li><a href="leaveinfor.php" class="">
                          <span>LEAVE HISTORY</span>
                          
                      </a></li>

            </ul></li>
         
          
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->

