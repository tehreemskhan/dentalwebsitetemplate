<?php
  include "../../database/db.php";
?>
<?php include "../../templates/header/header.php" ?>
<style>
  body {
    background-color: black;
  }
</style>


<?php

  if(isset($_POST["feed_submit"])) {
    $name = $_POST["feed_name"];
    $email = $_POST["feed_email"];
    $message = $_POST["message"];

    $query = "INSERT INTO feedback (name, email, message) ";
    $query .= "VALUES('$name', '$email', '$message') ";

    $send_feedback = mysqli_query($connection, $query);

  }

?>


<nav id="navbar" class="navbar navbar-expand-lg navbar-dark bg-dark">

  <a id="brand" class="navbar-brand" href="#">AZ Dental Spa</a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
   
    <span class="navbar-toggler-icon"></span>
 
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
   
    <ul class="navbar-nav mr-auto>

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

    </ul>

  </div>

</nav>


<?php 
  if($send_feedback) {
    echo "<div style='margin-top: 20px; color: white;' class=\"text-center\">
    <h3>Your Feedback Has Been Submitted, Thank You!</h3>
    <a style='text-decoration: none;' href=\"../../index.php\">Go Back</a>
</div>
";
  } else {
?>


<form method="POST" action="">

<div class="col section1" >
  <div class="container">
  <h1 style="color:white" class="make_appointment">Leave Feedback</h1>

   <!-- name-->

   <label style="color: white" class="input_label" for="inputEmail">Name*</label>

 <input required type="text" class="form-control" name = "feed_name" placeholder="Enter your Name">

  <!-- email -->

 <label style="color: white"  class="input_label" for="inputEmail">Email*</label>

 <input required type="email" class="form-control" name = "feed_email" placeholder="Enter your email">


 <label style="color: white"  class="input_label" for="inputEmail">Message*</label>

 <textarea name="message" placeholder="Please Enter Your Message" class="form-control" id="" cols="30" rows="10"></textarea>




<div class="text-center">
  <br>
<input class= "btn btn-danger" type="submit" value="Submit" name="feed_submit">
</div>
</div>
</div>

</form>

  <?php } ?>

</body>
</html>