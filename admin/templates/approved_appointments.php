<?php include "../../database/db.php"; ?>


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

      </ul>

    </div>

  </nav>




    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

        <h1 class="h2"> Approved Appointments </h1>

       

      </div>

    <?php 
        $query =  "SELECT * FROM approved_appointments";
        $send_query =mysqli_query($connection, $query);

        $count = mysqli_num_rows($send_query);

        if ($count > 0) {
    ?>

      <h2>Manage Your Appointments</h2>

      <div class="table-responsive">
      
        <table class="table table-striped table-sm">

          <thead>

            <tr>

              <th>Patient Id</th>

              <th>Patient Name</th>

              <th>Patient Email</th>

              <th>Patient Number</th>

              <th>Approved Date</th>

              <th>Cancel</th>

            </tr>

          </thead>

          <tbody>

          <?php 

        $query = "SELECT * FROM approved_appointments";

        $send_query = mysqli_query($connection, $query);

       

        while($row = mysqli_fetch_array($send_query) ) {
            $id  = $row['id'];

            $name = $row["name"];

            $email = $row["email"];

            $number = $row["phone_number"];

            $date = $row["request_date"];

        ?>

            <tr>

              <td><?php echo $id; ?></td>

              <td><?php echo $name;?></td>

              <td><?php echo $email; ?></td>

              <td><?php echo $number ?></td>

              <td><?php echo $date ?></td>

             <td><a href="deny.php?cancel=<?php echo $id; ?>" class="btn btn-danger"> Cancel </a></td>

            </tr>

            <?php } ?>
           
          </tbody>
        </table>
        
        <?php } else {
            echo "<h2>No Upcoming Appointments</h2>";
        } ?>
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
