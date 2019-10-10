
<?php
include 'include/config.php';
$sql ="SELECT * FROM post";
$result = mysqli_query($conn,$sql);
$rowcount=mysqli_num_rows($result);

?>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    
    <?php
      for($i=1; $i<=$rowcount; $i++){
  $row=mysqli_fetch_array($result);
  if($i==1)
  {
    ?>

    <div class="carousel-item active">
       <p class="d-block w-100" width="80%" height="80%" style="color:white;"> <?php echo $row["TITLE"].":   ".$row["DATE"] ?></p>
      <img class="d-block w-100" src="<?php echo $row["PICTURE"] ?>" alt="First slide" width="80%" height="350px">
    </div>
    <?php
    }
    else
    {
    ?>
    <div class="carousel-item">
      <p class="d-block w-100" width="80%" height="80%" style="color:white;"> <?php echo $row["TITLE"].":   ".$row["DATE"] ?></p>
      <img class="d-block w-100" src="<?php echo $row["PICTURE"] ?>" alt="First slide" width="80%" height="350px">
    </div>
    <?php
  }
}
    ?>

  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev" width="100%" height="80%">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next" width="100%" height="80%">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>