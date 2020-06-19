<?php include "../../database/db.php"; ?>
<?php   

        if(isset($_POST["submit"])) {
            $date_time = $_POST["date_time"];

            $query = "INSERT INTO available_time (date_time) ";
            $query .= "VALUES ('$date_time')";
            $send_time = mysqli_query($connection, $query);

            
        }

?>


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


    <script src="https://kit.fontawesome.com/0047a3fc2c.js" crossorigin="anonymous"></script>

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

          <a class="nav-link" href="#">

            <span data-feather="file"></span>

             Requested Appointments

          </a>

        </li>

        <li class="nav-item">

          <a class="nav-link" href="approved_appointments.php">

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

        <h1 class="h2"> Available Times </h1>

      

      </div>

      <h2>Manage Your Available Times</h2>


 <form action="" method="POST">
    <div class="container">
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                    <input type="text" name="date_time" class="form-control datetimepicker-input" data-target="#datetimepicker1"/>
                    <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                   
                </div>
               
            </div>
        </div>
        <div>
            <input id="time_button" type="submit" name="submit" value="Add" class="btn btn-danger">
        </div>
    </div>
    </div>
</form>

    
<div class="table-responsive">
      
      <table class="table table-striped table-sm">

        <thead>

          <tr>

            <th>Available Times</th> 

          </tr>

        </thead>

        <tbody>

        <?php 

      $query = "SELECT * FROM available_time";

      $send_query = mysqli_query($connection, $query) or die(mysqli_error($connection));

     

      while($row = mysqli_fetch_array($send_query) ) {
          $id = $row["id"];
          $time = $row["date_time"];
      ?>

          <tr>

            <td><?php echo $time; ?></td>
            <td> <a href="deny.php?t_id=<?php echo $id; ?>" class="btn btn-danger">Undo</a> </td>

          </tr>

          <?php } ?>
         
        </tbody>
      </table>


        
        <a href="../admin.php">Go Back</a>
      </div>
    </main>
  </div>
</div>

        <script type="text/javascript">
        $(function () {
        $('#datetimepicker1').datetimepicker();
        });
        </script>





<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css" />


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.4/assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="/docs/4.4/dist/js/bootstrap.bundle.min.js" integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
        <script src="dashboard.js"></script></body>
</html>
