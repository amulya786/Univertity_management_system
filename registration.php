 <?php

     session_start();
   ?>
 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>form</title>
     <link rel="stylesheet" href="css/resigtration.css">
 </head>


 <body style="background-image: url(img/background.png); position: relative; background-repeat: no-repeat;">
     <?php
          include 'dbcon.php';

         

        if (isset($_REQUEST['stud_name'])) {
            $stud_name = stripslashes($_REQUEST['stud_name']);
            $stud_name = mysqli_real_escape_string($con, $stud_name);
            $stud_father = stripslashes($_REQUEST['stud_father']);
            $stud_father = mysqli_real_escape_string($con, $stud_father);
            $mob = stripslashes($_REQUEST['mob']);
            $mob = mysqli_real_escape_string($con, $mob);
            $email = stripslashes($_REQUEST['email']);
            $email = mysqli_real_escape_string($con, $email);
            $branch = stripslashes($_REQUEST['branch']);
            $branch = mysqli_real_escape_string($con, $branch);
            $gender = stripslashes($_REQUEST['gender']);
            $gender = mysqli_real_escape_string($con, $gender);
            $password = stripslashes($_REQUEST['password']);
            $password = mysqli_real_escape_string($con, $password);
            $cnfpassword = stripslashes($_REQUEST['cnfpassword']);
            $cnfpassword = mysqli_real_escape_string($con, $cnfpassword);
            $create_datetime = date("Y-m-d H:i:s");
           
            $pass = password_hash($password,PASSWORD_BCRYPT);
            $cpass = password_hash($cnfpassword,PASSWORD_BCRYPT);

            $email_search = " select * from studentdetail where email='$email' "; 
            $query = mysqli_query($con,$email_search);

                        $email_count =mysqli_num_rows($query);
                        if($email_count>0){
                            ?>
                            >
                                   <script>
                                  alert("REGISTRATION FAILED!!!THIS EMAIL IS ALREADY EXIST !! USE NEW EMAIL");
                                  </script>
                            <?php
                        }else{

                      $insertquery = "INSERT into `studentdetail` (stud_name, stud_father, mob, email, branch, gender, password, cnfpassword,dt) 
                      VALUES ('$stud_name','$stud_father','$mob','$email','$branch','$gender','$pass','$cpass',current_timestamp())";

                     $iquery = mysqli_query($con, $insertquery);
                           if ($iquery) {
                                 ?>
                                   <script>
                                  alert("form submitted Successful!");
                                  </script>
                               <?php
                            } else {
                               ?>
                          <script>
                              alert("form  not submitted !!  ")
                          </script>
                          <?php
                         }
                        }
        }   
                       else {

        }
            ?>
            <nav id="navbar">
                <div id="nav">
                    <img src="img/logo.png" alt="image_not_load">
                </div>
                <ul class="list">
                    <li class="item"><a href="index.html">Home</a></li>
                    <li class="item"><a href="#">About us</a></li>
                    <li class="item"><a href="form.html">Registration</a></li>
                    <li class="item"><a href="#">Contact Us</a></li>
                    <li id="item"><a href="#">login</a></li>
                </ul>
            </nav>
         <div id="form">
             <h1 id="heading">Registration Form</h1>
             <p>please provide your details for registration</p>
             <form action="" method="POST" onsubmit="return validateForm()">
                 <label for="stud_name"></label>
                 Student Name:<input type="text" name="stud_name"><br>
                 Father's Name:<input type="text" name="stud_father"><br>
                 Mob Number: <input type="phone" name="mob"><br>
                 Email Id:   <input type="email" name="email"><br>
                 Branch:<br>
                 <input type="radio" name="branch" value="IT">I.T.
                 <input type="radio" name="branch" value="CSE">C.S.E.
                 <input type="radio" name="branch" value="EE">E.E.<br>
                 Gender:<br>
                 <input type="radio" name="gender" value="Male">Male
                 <input type="radio" name="gender" value="Female">Female<br>
                 Password:
                 <input type="password" id="pass" name="password">
                 <span id="passerror" class="error"></span>
                 <br>
                 Confirm Password:
                 <input type="password" id="cfpass" name="cnfpassword">
                 <span id="cfpasserror" class="error"></span>
                 <br>
                 <button class="btn" type="submit" value="submit">Submit</button>
                 <button class="btn" type="reset" value="reset">reset</button>

             </form>
         </div>
     <?php
      //  }
        ?>


 </body>
 <script>
     function validateForm() {

         var p = document.getElementById("pass").value;
         var c = document.getElementById("cfpass").value;
         var flag = 1;
         var fl = 1;

         if (p == "") {
             document.getElementById("passerror").innerHTML = "**Fill the password please!";
             flag = 0;

         } else if (p.length < 5) {

             document.getElementById("passerror").innerHTML = "**password require minimum 5 charcter!";
             flag = 0;

         } else if (p.length > 10) {

             document.getElementById("passerror").innerHTML = "**password doesn't greater than 10 charcter!";
             flag = 0;

         } else {
             document.getElementById("passerror").innerHTML = " ";
             flag = 1;

         }


         if (p != c) {
             document.getElementById("cfpasserror").innerHTML = "**password doesn't match";
             fl = 0;

         } else {
             document.getElementById("cfpasserror").innerHTML = " ";
             fl = 1;

         }
         if (flag == 1 && fl == 1) {
             return true;
         } else {
             return false;
         }

     }
 </script>
 <!-- INSERT INTO `studentdetail` (`sno`, `stud_name`, `stud_father`, `mob`, `email`, `branch`, `gender`, `password`, `cnfpassword`, `dt`) VALUES ('1', 'ankit', 'Narendra', '9026759960', 'ankitmishra28799@gmail.com', 'IT', 'Male', 'ankit1', 'ankit1', current_timestamp());  -->

 </html>