<?php include 'config.php'; ?>
<?php

if(isset($_POST['change']))
{
  if($_POST["current"] == '')
  {
    echo "<div  id='helpdiv'><div class='col-lg-9'>
    <div style='background-color:red;color:white;text-align:center;font-size:17px;padding:10px;border-radius:5px;box-shadow: 0 4px 4px -4px black;'>
    <strong>Failed!</strong> Current Password Field is required !!</div></div></div><br><br>";
    echo "<script type='text/javascript'>
    window.setTimeout('closeHelpDiv();', 4000);
    function closeHelpDiv(){
      document.getElementById('helpdiv').style.display=' none';
    }
    </script>";
  }
  else if($_POST["new"] == '')
  {
    echo "<div  id='helpdiv'><div class='col-lg-9'>
    <div style='background-color:red;color:white;text-align:center;font-size:17px;padding:10px;border-radius:5px;box-shadow: 0 4px 4px -4px black;'>
    <strong>Failed!</strong> new Password Field is required !!</div></div></div><br><br>";
    echo "<script type='text/javascript'>
    window.setTimeout('closeHelpDiv();', 4000);
    function closeHelpDiv(){
    document.getElementById('helpdiv').style.display=' none';
    }
    </script>";
  }
  else if($_POST["confirm"] == '')
  {
    echo "<div  id='helpdiv'><div class='col-lg-9'>
    <div style='background-color:red;color:white;text-align:center;font-size:17px;padding:10px;border-radius:5px;box-shadow: 0 4px 4px -4px black;'>
    <strong>Failed!</strong> confirm Password Field is required !!</div></div></div><br><br>";
    echo "<script type='text/javascript'>
    window.setTimeout('closeHelpDiv();', 4000);
    function closeHelpDiv(){
    document.getElementById('helpdiv').style.display=' none';
    }
    </script>";
  }
  else if($_POST["new"] != $_POST["confirm"])
  {
    echo "<div  id='helpdiv'><div class='col-lg-9'>
    <div style='background-color:red;color:white;text-align:center;font-size:17px;padding:10px;border-radius:5px;box-shadow: 0 4px 4px -4px black;'>
    <strong>Failed!</strong> New password does not match with the confirmation password !!</div></div></div><br><br>";
    echo "<script type='text/javascript'>
    window.setTimeout('closeHelpDiv();', 4000);
    function closeHelpDiv(){
    document.getElementById('helpdiv').style.display=' none';
    }
    </script>";
  }
  else if($_POST["current"] == $_POST["new"])
  {
    echo "<div  id='helpdiv'><div class='col-lg-9'>
    <div style='background-color:red;color:white;text-align:center;font-size:17px;padding:10px;border-radius:5px;box-shadow: 0 4px 4px -4px black;'>
    <strong>Failed!</strong> New password can't be the same as the current password, try a different one !!</div></div></div><br><br>";
    echo "<script type='text/javascript'>
    window.setTimeout('closeHelpDiv();', 4000);
    function closeHelpDiv(){
    document.getElementById('helpdiv').style.display=' none';
    }
    </script>";
  }
  else
  {
    $sql=mysqli_query($conn,"SELECT PASSWORD FROM  user_registration where PASSWORD=PASSWORD('".$_POST['current']."') && USERNAME='".$_SESSION['username']."'");
    $num=mysqli_fetch_array($sql);
    if($num>0)
    {
      $con=mysqli_query($conn,"update user_registration set PASSWORD=PASSWORD('".$_POST['new']."') where USERNAME='".$_SESSION['username']."'");
      echo "<div  id='helpdiv'><div class='col-lg-9'>
      <div style='background-color:#C2E1C0;color:green;text-align:center;font-size:17px;padding:10px;border-radius:5px;box-shadow: 0 4px 4px -4px black;'>
      <strong>Success!</strong> Password changed successfully.</div></div></div><br><br>";
      echo "<script type='text/javascript'>
    window.setTimeout('closeHelpDiv();', 4000);
    function closeHelpDiv(){
    document.getElementById('helpdiv').style.display=' none';
    }
    </script>";
    }
    else
    {
      echo "<div  id='helpdiv'><div class='col-lg-9'>
      <div style='background-color:red;color:white;text-align:center;font-size:17px;padding:10px;border-radius:5px;box-shadow: 0 4px 4px -4px black;'>
      <strong>Failed!</strong> Old password does not match</div></div></div><br><br>";
      echo "<script type='text/javascript'>
      window.setTimeout('closeHelpDiv();', 4000);
      function closeHelpDiv(){
      document.getElementById('helpdiv').style.display=' none';
      }
      </script>";
    }
  }
}
  
?>

		  <div class="col-lg-9">
            <section class="panel">
              <header class="panel-heading tab-bg-info">
                <ul class="nav nav-tabs">
                  
                  <li>
                    <a data-toggle="tab" href="#profile">
                                          <i class="icon-user"></i>
                                          CHANGE PASSWORD FORM
                                      </a>
                 
                </ul>
              </header>
              <div class="panel-body">
                <div class="tab-content">
                 
                  <!-- profile -->
                  <div id="profile" class="tab-pane active" >
                    <section class="panel">
                     
					  
						<div class="panel-body bio-graph-info" style="background-color:Lavender">
						<form class="form-horizontal" action="" id="register_form" name="chngpwd" method="post" enctype="multipart/form-data" autocomplete="off" onSubmit="return valid();">
                      <!-- Title -->
 
                      <!-- Cateogry -->
                      
					<div class="form-group">
                        <label class="control-label col-lg-2" for="tags">CURRENT PASSWORD: </label>
                        <div class="col-lg-10">
                          <input type="password" class="form-control" id="tags" name="current">
                        </div>

                      </div>
					  
					  
                      <!-- Tags -->
                      <div class="form-group">
                        <label class="control-label col-lg-2" for="tags">NEW PASSWORD: </label>
                        <div class="col-lg-10">
                          <input type="password" class="form-control" id="tags" name="new" required pattern=".{6,10}" title="6 to 10 characters">
                        </div>

                      </div>
					  
					  <div class="form-group">
                        <label class="control-label col-lg-2" for="tags">CONFIRM PASSWORD: </label>
                        <div class="col-lg-10">
                          <input type="password" class="form-control" id="tags" name="confirm">
                        </div>
                      </div>
					
                      <!-- Buttons -->
                      <div class="form-group">
                        <!-- Buttons -->
                        <div class="col-lg-offset-2 col-lg-9">
                          <button type="submit" class="btn btn-primary" name="change">CHANGE</button>
                          <button type="submit" class="btn btn-danger" onclick="resetForm('register_form'); return false;">RESET</button>
                        </div>
                      </div>
                    </form>
                    </section>
                    <section>
                      
                    </section>
                  </div>

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