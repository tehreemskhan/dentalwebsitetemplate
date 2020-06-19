<?php include "../../database/db.php" ?>

<?php include "../../templates/header/header.php"; ?>




<?php 

  $get_num_rows = "SELECT * FROM available_time";
  $send_get_count = mysqli_query($connection, $get_num_rows);

  $get_count = mysqli_num_rows($send_get_count);


    if(isset($_POST["submit"])) {

        $name = $_POST["name"];
        
        $email = $_POST["email"];

        $address = $_POST["address"];

        $number= $_POST["number"];

        $radio = $_POST["client_question"];

        $gender= $_POST["gender"];  
        
        $date = $_POST["date"];

        $insurance = $_POST["insurance"];


        $get_query = "SELECT * FROM available_time WHERE id=$date";
        $send_get_query = mysqli_query($connection, $get_query);

        $row = mysqli_fetch_array($send_get_query);
        $real_date = $row["date_time"];


        $query = "INSERT INTO requested_appointments (name, email, address, phone_number, gender, request_date, insurance, client_status) ";

        $query .= "VALUES ('{$name}', '$email', '$address', '$number', '$gender', '$real_date', '$insurance', '$radio')";

        $send_query = mysqli_query($connection, $query);


    $query = "DELETE FROM available_time WHERE id=$date";
    $send_delete_query = mysqli_query($connection, $query);



        }
        // the message

    
?>


<!-- START OF THE NAVBAR -->

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

  <a class="navbar-brand" id="brand" href="../../index.php">Dental Name</a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    
    <span class="navbar-toggler-icon"></span>

  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">

    <ul class="navbar-nav mr-auto">

      <li class="nav-item links">

        <a class="nav-link" href="../../index.php"> Home <span class="sr-only">(current)</span></a>

      </li>

      <li class="nav-item links">

        <a class="nav-link" href="../../index.php#about">About</a>

      </li>

      <li class="nav-item dropdown links">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Form
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">File #1</a>
          <a class="dropdown-item" href="#">File #2</a>
          <a class="dropdown-item" href="#">File #3</a>
          <a class="dropdown-item" href="#">File #4</a>
          <a class="dropdown-item" href="#">File #5</a>
          <a class="dropdown-item" href="#">File #6</a>
        </div>
      </li>

      <li class="nav-item links">
     
        <a href="#" class="nav-link active links">Request An Appointment</a>
    
      </li>
  
    </ul> 
  </div>

</nav>
<!-- END OF THE NAVBAR -->



<div class="flex_container">
<div class="col flex1">

<?php 
    if($get_count > 0) {
?>

<form method="POST" action="">

<div class="col section1" >
  <div class="container">
  <h1 class="make_appointment">Make an Appointment</h1>

   <!-- name-->

  <label class="input_label" for="inputName">Name*</label>

  <input required type="text" class="form-control" name = "name" placeholder="Enter your name">

  <!-- email -->

 <label class="input_label" for="inputEmail">Email*</label>

 <input required type="email" class="form-control" name = "email" placeholder="Enter your email">

    <!-- PHONE NUMBER -->
  <label class="input_label" for="inputEmail">Number*</label>
  <small class="format"> <strong>Format: 123-456-7890</strong> </small>

 <input required type="tel" class="form-control" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" name="number">

 <!--address -->


 <label class="input_label" for="inputAddress">Address</label>

 <input type="text" class="form-control" name = "address" placeholder="Enter your address">

 <!--gender -->

  <label class="input_label" for="inputGender">Gender</label>

      <select  class="form-control" name = "gender">

         <option selected value="Not Specified">Choose...</option>

         <option value="Male">Male</option>

         <option value="Female">Female</option>

         <option value="Other">Other</option>

       </select>

<!--date -->

<label class="input_label" for="inputDate">Date</label>

      <select  class="form-control" name = "date">

         <option selected value="hi">Choose...</option>

         <?php
            $query = "SELECT * FROM available_time";
            $send_query = mysqli_query($connection, $query);

            while($row = mysqli_fetch_array($send_query)) {
              $id = $row["id"];
              $date_time = $row["date_time"];
              echo "<option value={$id}> $date_time </option>";
            }
         
         ?>

     </select>



<!--insurance -->

<label class="input_label" for="inputInsurance">Insurance</label>

<select  class="form-control" name = "insurance">


  <option selected value="">Choose...</option>

  <option value="United Healthcare">United Healthcare</option>

  <option value="Delta Dental">Delta Dental</option>

  <option value="Humana Dental">Humana Dental</option>

  <option value="Cigna Dental">Cigna Dental</option>

  <option value="Aetna">Aetna</option>

  <option value="Metlife">Metlife</option>

  <option value="Other">Other</option>

  <option value="I don't have Insurance">I don't have Insurance</option>

</select>


<label class="input_label" for="inputInsurance">Are You A New Or Existing Client Of ...</label>

<div>
  <input type="radio" id="huey" name="client_question" value="New Client"
         checked>
  <label for="huey">New</label>
</div>

<div>
  <input type="radio" id="dewey" name="client_question" value="Existing Client">
  <label for="dewey">Existing</label>
</div>


<div class="text-center">
<input class= "example_e request_button_submit" type="submit" value="Submit" name="submit">
</div>
</div>
</div>

</form>
          <?php } else {
            echo "<h2 class='text-center' style='margin-top: 200px;'> Sorry But Dr.AZ Doesn't Have Any Upcoming Open Time Slots, Please Check Again Later. </h2>";
          } ?>
         
</div>

<div class="col flex2"></div>



</div>





<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


  </body>
  </html>

