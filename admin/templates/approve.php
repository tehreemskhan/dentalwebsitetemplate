<?php include "../../database/db.php"; ?>
<?php 


    if(isset($_GET["p_id"])) {
        $id = $_GET["p_id"];

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
         $client_status = $row["client_status"];
     }


        $insert_query = "INSERT INTO approved_appointments (name, email, phone_number, request_date, gender, address, insurance, client_status) ";
        $insert_query .= "VALUES('$name', '$email', '$number', '$date', '$gender', '$address', '$insurance', '$client_status' )";

        $send_query = mysqli_query($connection, $insert_query);

        if($send_query) {
            $template = "accept_appointment.html";
    
            $swap_var = array(
              "{PATIENT_NAME}" => $name,
              "{PATIENT_DATE}" => $date
            );
    
    
           
          $to = $email;
          $subject = "Appointment Accepted";
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
            echo "<div class='alert alert-success'>Appointment Approved</div>";
        } else {
            echo "<div class='alert alert-danger'>Sorry There Was An Error</div>";
        }

        }


        $insert_client = "INSERT INTO clients (name, email, number, insurance, client_status) ";
        $insert_client .= "VALUES('$name', '$email', $number, '$insurance', '$client_status') ";
        
        $save_client = mysqli_query($connection, $insert_client);
    

    $query = "DELETE FROM requested_appointments WHERE id={$id}";

    $send_query = mysqli_query($connection, $query);





    echo "<script>location='requested_appointments.php'</script>";
    
    }
        
   


?>