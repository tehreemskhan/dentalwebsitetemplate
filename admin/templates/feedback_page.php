elo<?php include "../../database/db.php"; ?>




<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">
    <title> Az Dental Admin</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/dashboard/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/4.4/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/4.4/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/4.4/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
<link rel="icon" href="/docs/4.4/assets/img/favicons/favicon.ico">
<meta name="msapplication-config" content="/docs/4.4/assets/img/favicons/browserconfig.xml">
<meta name="theme-color" content="#563d7c">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="../../static/css/admin/admin.css" rel="stylesheet">
  </head>
  <body>
  
  <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">

<a class="navbar-brand col-sm-3 col-md-2 mr-0" href="../../index.php">Az Dental</a>

<ul class="navbar-nav px-3">

  <li class="nav-item text-nowrap">

    <a class="nav-link" href="#">Sign out</a>

  </li>

</ul>

</nav>

<div class="container-fluid">

<div class="row">

  <nav class="col-md-2 d-none d-md-block bg-light sidebar">

    <div class="sidebar-sticky">

      <ul class="nav flex-column">

        <li class="nav-item">

          <a class="nav-link active" href="../admin.php">

            <span data-feather="home"></span>

            Dashboard <span class="sr-only">(current)</span>

          </a>

        </li>

        <li class="nav-item">

          <a class="nav-link" href="requested_appointments.php">

            <span data-feather="file"></span>

             Requested Appointments

          </a>

        </li>

        <li class="nav-item">

          <a class="nav-link" href="#">

            <span data-feather="shopping-cart"></span>

            Approved Appointments

          </a>

        </li>

        <li class="nav-item">

          <a class="nav-link" href="denied_appointments.php">

            <span data-feather="users"></span>

            Unapproved Appointments

          </a>

        </li> 
        <li class="nav-item">

        <a class="nav-link" href="denied_appointments.php">

        <span data-feather="users"></span>

        Send A Feedback Form

        </a>

        </li>

      </ul>

    </div>

  </nav>




    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

        <h1 class="h2"> Send a Feedback Form </h1>

        <?php 
    if(isset($_POST["firstSubmit"])) {
        //Location of file
        $template_file = "email_template.html";
     
        $firstEmail = $_POST["google_email"];
           
        $to = $firstEmail;  
       $subject = "Test Email From AZ Dental";
       
       $headers = "From: Az Dental Spa <haseebkhan2651@gmail.com>\r\n";
       $headers .= "MIME-Version: 1.0\r\n";
       $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
     
        if(file_exists($template_file)) {
             $message = file_get_contents($template_file);
        } else {
            die("Sorry Can't Find The File You Requested");
        }
       
       
        if(mail($to, $subject, $message, $headers)) {
            echo "<div class='alert alert-success'>Mail Sent Successfully</div>";
        } else {
            echo "<div class='alert alert-danger'>Sorry There Was An Error</div>";
        }
        
        
    } else if(isset($_POST["secondSubmit"])) {
      $template_file = "reg_template.html";

      $secondEmail = $_POST["reg_email"];
      $email_to = $secondEmail;
      $subject = "Leave a review of AZ Dental Spa";

      $headers = "From: AZ Dental Spa <haseebkhan2651@gmail.com>\r\n";
      $headers .= "MIME-Version: 1.0\r\n";
      $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

      if(file_exists($template_file)) {
        $message = file_get_contents($template_file);
      } else {
        die("Sorry File Not Found");
      }

      if(mail($email_to, $subject, $message, $headers)) {
        echo "<div class='alert alert-success'>Mail Sent Successfully</div>";
    } else {
        echo "<div class='alert alert-danger'>Sorry There Was An Error</div>";
    }

    }

?>

      </div>

      <div class="container">
          <div class="row">
              <div class="col">
                  <form action="" method="POST">
                      <div class="row form-group">
                            <h4>Send a Google Feedback Form:</h4>
                            <input required type="email" class="form-control" name = "google_email" placeholder="Enter The Desired Email">
                            <br>
                            <input type="submit" class="btn btn-danger" name="firstSubmit" value="Submit">
                        </div>
                    </form>
                        <br>
                    <form action="" method="POST">
                        <div class="row form-group">
                         <h4>Send a Regular Feedback Form</h4>
                         <input type="email" required class="form-control " name="reg_email" placeholder="Enter The Desired Email">
                        <br> 
                        <input type="submit" class="btn btn-danger" name="secondSubmit" value="saf">
                         </div> 
                     </form>
                 
              </div>
          </div>
      </div>

    
        <a href="../admin.php">Go Back</a>
      </div>
    </main>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.4/assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="/docs/4.4/dist/js/bootstrap.bundle.min.js" integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
        <script src="dashboard.js"></script></body>
</html>
