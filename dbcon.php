<?php

        $server = "localhost";
        $username = "root";
        $password = "";
        $db = "regisrationform";

        $con = mysqli_connect($server, $username, $password, $db);
        if ($con) {
        ?>
         <script>
            // alert("connection Successful!");
         </script>
     <?php
        } else {
        ?>
         <script>
             alert("connection unsucessfull!")
         </script>
         <?php
        }
     ?>