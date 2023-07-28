<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>rental</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">


    <link rel="stylesheet" href="style1.css">

<link rel="stylesheet" href="mq1.css">

</head>
<body>
<?php 
         
         include './includes/navbar.php';
      
      ?>

        <main>
            <form class="sgdt" method="post">
                <div id="loginpage "class=" d-flex justify-content-center align-items-center" style="background-color: rgb(234, 241, 245); height: 70vh; flex-direction:column;">
                <div><h3 style="text-align:center; color: #000099; font-weight:bold; text-decoration:none; margin-bottom: 20px;">Client Login Area</h3></div>
                   
                <div >
                <table class="tblog " style="height: 25vh">
                        <tbody  >
                        <tr class="my-2">
                            <td>Email Address:</td>
                            <td><input type="email" name="email" placeholder="Enter Email Address" required></td>
                        </tr>
                        <tr class="my-2">
                            <td>Password:</td>
                            <td><input type="password" name="pass" placeholder="Enter ID Number" required></td>
                        </tr>
                        <!-- <tr  class="my-3">
                            <td><input type="submit" name="log" value="Login Here"></td>

                            <td ><a class="sgup" href="signup.php">Sigup Here</a></td>
                        </tr> -->

                        
                    </tbody> 
                    
                    </table>

                    <form method="post">
                        <button  name="log" type="submit" class="btn btn-primary">Login </button>
                       <a href="./signup.php"> <button  type="button" class="btn btn-primary" style="margin-left: 145px">Sign Up</button></a>
                        </form>
                    
                    </div>
                </div>
                </form>
        </main>
           

            <?php  
             
             include './includes/config.php';
            
                if(isset($_POST['log']))
                {
                       
                    $email=$_POST['email'];
                    $pass=$_POST['pass'];


                    $sql="SELECT * FROM client WHERE client_pass='$pass' AND email='$email'";


                    $res=$conn->query($sql);

                    if($res->num_rows>0)
                    {
                          

                        $rs=$res->fetch_assoc();


                        session_start();

                       
                        $_SESSION['client_name']=$rs['client_name'];
                        
                        $_SESSION['client_id']=$rs['client_id'];
                      
                        echo "<script type = \"text/javascript\">
                        alert(\"Log Successfull..........\");
                        window.location = (\"index.php\")
                        </script>";  


                       
                    }
                    else
                    {

                        echo "<script type = \"text/javascript\">
                        alert(\"Incorrect Credentials Please Try Again....\");
                        window.location = (\"login.php\")
                        </script>";  


                    }





                }
            
            
            
            
            
            ?>







        <?php  
     include './includes/footer.php';
  ?>
    
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>

    
</body>
</html>