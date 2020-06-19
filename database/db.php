<?php
//OFFICAL DATABASE USERNAME: tetchtech_dentaldbuser
//OFFICAL DATABASE PASSWORD: dentaldbuser

//OFFICAL BAGEL DEPOT USERNAME: eatatbag_dental
//OFFICAL BAGEL DEPOT PASSWORD: dental


    $connection = mysqli_connect("localhost", "root", "", "dentaldb");

   if (!$connection) {
       echo mysqli_error($connection);
   }