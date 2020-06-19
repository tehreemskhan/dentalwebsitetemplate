<?php include "../../database/db.php"; ?>
<?php 



    if(isset($_GET["dp_id"])) {
        $id = $_GET["dp_id"];

     $query = "SELECT * FROM requested_appointments WHERE id={$id}";
     $result = mysqli_query($connection, $query);


     while($row = mysqli_fetch_array($result)) {
         $name = $row["name"];
         $email = $row["email"];
         $number = $row["phone_number"];
         $date = $row["request_date"];
         $gender = $row["gender"];
        $insurance = $row["insurance"];
        $address = $row["address"];
        $status = $row["client_status"];
     }


       $insert_query = "INSERT INTO denyed_appointment (name, email, phone_number, approved_date,gender, address, insurance, client_status) ";
       $insert_query .= "VALUES('$name', '$email', '$number', '$date', '$gender', '$address', '$insurance', '$status')";

        $get_values_insert = mysqli_query($connection, $insert_query);

       if($get_values_insert) {
        $template = "deny_appointment.html";
    
        $swap_var = array(
          "{PATIENT_NAME}" => $name,
          "{PATIENT_DATE}" => $date
        );


       
      $to = $email;
      $subject = "Appointment Request Status Update";
      $headers = "From: AZ Dental Spa <haseebkhan2651@gmail.com>\r\n";
      $headers .= "MIME-Version: 1.0\r\n";
      $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
      $message = "";
      if(file_exists($template)) {
        $message = file_get_contents($template);
      } else{
        die("Sorry File Not Found");
      }

      foreach(array_keys($swap_var) as $key) {
          $message = str_replace($key, $swap_var[$key], $message);
      }



      if(mail($to, $subject, $message, $headers)) {
        echo "<div class='alert alert-success'>Appointment Denied</div>";
    } else {
        echo "<div class='alert alert-danger'>Sorry There Was An Error</div>";
    }
       }
    
        
    $query = "DELETE FROM requested_appointments WHERE id={$id}";

    $delete_query = mysqli_query($connection, $query);

    echo "<script>location='requested_appointments.php'</script>";
    }


    if(isset($_GET["cancel"])) {
        $id = $_GET["cancel"];


    $query = "DELETE FROM approved_appointments WHERE id={$id}";

    $send_query = mysqli_query($connection, $query);

    header("Location: approved_appointments.php");
    
    }

    if(isset($_GET["t_id"])) {
        $id = $_GET["t_id"];

    $query = "DELETE FROM available_time WHERE id={$id}";

    $send_query = mysqli_query($connection, $query);

    header("Location: available_times.php");
    }


?>