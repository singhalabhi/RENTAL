<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>rental</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">


    <link rel="stylesheet" href="style1.css">

<link rel="stylesheet" href="mq1.css">

</head>

<body>
<?php 
         
    include './includes/navbar.php';
      
  ?>

  <main>

    <div class="wrapper">
<div class="container my-4"style="background-color: rgb(234, 241, 245);">
      

        <h3 class="text-center my-3" style="color: rgb(9, 3, 10) ;">SIGN UP HERE!</h3>
            
            <form method="post" class="cant" >
            <div class="container">
                <table style="display:flex; align-items: center; justify-content: center; height: 60vh ">
                    <tr style="height: 8vh">
                        <td>Full Name:</td>
                        <td><input type="text" name="fname" required></td>
                    </tr>
                    <tr style="height: 8vh">
                        <td>Phone Number:</td>
                        <td><input type="text" name="phone" required></td>
                    </tr>
                   <tr style="height: 8vh">
                        <td>email</td>
                        <td><input type="email" name="email" required></td>
                    </tr>
                    <tr style="height: 8vh">
                        <td>Password</td>
                        <td><input type="text" name="pass" required></td>
                    </tr>
                    <tr style="height: 8vh">
                        <td>Gender:</td>
                        <td>
                            <select name="gender">
                                <option> Select Gender </option>
                                <option> Male </option>
                                <option> Female </option>
                            </select>
                        </td>
                    </tr>
                    <tr style="height: 8vh">
                        <td>Location:</td>
                        <td><input type="text" name="location" required></td>
                    </tr>
                    <!-- <tr style="height: 8vh">
                        <td colspan="2" style="text-align:center"><input type="submit" name="save" value="Submit Details"></td>
                    </tr> -->
                   
                </table>
                <div class="container text-center">
                    
                <button type="submit" name="sub"class="btn btn-primary">Submit Details</button>

                </div>
                </div>
            </form>
      
    </div>
</div>



       <?php
              include './includes/config.php';
                         if(isset($_POST['sub']))
                         {

                              $name=$_POST['fname'];
                              $email=$_POST['email'];
                              $pass=$_POST['pass'];
                              $gender=$_POST['gender'];
                              $phone=$_POST['phone'];
                              $location=$_POST['location'];


                              $sql1="SELECT * FROM client WHERE email='$email'";
                             
                                
                              $res1=$conn->query($sql1);

                              if($res1->num_rows>0)
                              {
                                    
                                echo "<script type = \"text/javascript\">
                                alert(\"Email already exists\");
                                window.location = (\"signup.php\")
                                </script>";

                                  

                              }
                              else
                              {
                                $qry = "INSERT INTO client (client_name,client_pass,gender,email,client_phone,location)
							VALUES('$name','$pass','$gender','$email','$phone','$location')";
                             
                                
                                $res2=$conn->query($qry);

                                if($res2==TRUE)
                                {

                                  echo "<script type = \"text/javascript\">
                                  alert(\"Succesfully signup. Please login into your account...\");
                                  window.location = (\"login.php\")
                                  </script>";

                                }
                                else
                                {

                                  echo "<script type = \"text/javascript\">
                                  alert(\"Failed. Try again....\");
                                  window.location = (\"signup.php\")
                                  </script>";


                                }
                                   

                              }


                         }



          ?>






  </main>

  <?php  
     include './includes/footer.php';
  ?>
    



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N"
    crossorigin="anonymous"></script>
</body>

</html>