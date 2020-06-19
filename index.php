<!-- ADD SECURITY MEASURE THAT ALLOWS A SENDING OF AN EMAIL TO CHA CHU ALARMING HIM THAT SOMEONE HAS ENTERED THE ADMIN -->
<!-- MAKE SURE TO USE THE IP ADDRESS CAPTURING FEATURE -->


<?php include "templates/header/header.php"; ?>


<nav id="navbar" class="navbar navbar-expand-lg navbar-dark bg-dark">

  <a id="brand" class="navbar-brand" href="#">Dental Name</a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
   
    <span class="navbar-toggler-icon"></span>
 
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
   
    <ul class="navbar-nav mr-auto navbar_main">

      <li class="nav-item active">

        <a class="nav-link links" href="#"> Home <span class="sr-only">(current)</span></a>

      </li>

      <li class="nav-item">

        <a class="nav-link links" href="">About</a>

      </li>

      <li class="nav-item dropdown">

        <a class="nav-link links dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        
          Forms

        </a>

        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

          <a class="dropdown-item" href="/images/myw3schoolsimage.jpg" download="w3logo">File #1</a>

          <a class="dropdown-item" href="/images/myw3schoolsimage.jpg" download="w3logo">File #2</a>

          <a class="dropdown-item" href="/images/myw3schoolsimage.jpg" download="w3logo">File #3</a>

          <a class="dropdown-item" href="/images/myw3schoolsimage.jpg" download="w3logo">File #4</a>

          <a class="dropdown-item" href="/images/myw3schoolsimage.jpg" download="w3logo">File #5</a>

          <a class="dropdown-item" href="/images/myw3schoolsimage.jpg" download="w3logo">File #6</a>

        </div>

      </li>

      <li class="nav-item">

        <a href="appointments/request/request.php" class="nav-link links">Make An Appointment</a>

      </li>

      <li class="nav-item">

        <a href="admin/templates/patient_feedback.php" class="nav-link links">Feedback</a>

</li>



    </ul>

  </div>

  

</nav>

<!-- END OF INDEX NAVBAR -->

<?php include "templates/header/video_section.php"; ?>

<?php include "templates/header/about_section.php"; ?>

<?php include "templates/services/services.php" ?>

<?php include "templates/services/test.php" ?>

<?php include "templates/directions/map.php" ?>

<div class= "click-call text-center">

<h2 style="margin-top: 50px;"> <a href= "tel: 347-644-3702"> Click here to call </a> or <a href= "appointments/request/request.php"> fill out this form </a> to make an appointment today! </h2>

</div>
<!-- INCLUDE LATER --><?php include "templates/footer/footer.php" ?>
