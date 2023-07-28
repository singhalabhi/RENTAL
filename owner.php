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

     
			       <div class="container my-4 d-flex align-item-center justify-content-center" style="background-color: rgb(234, 241, 245); height: 100vh;flex-direction: column;  ">
            <h3 class="text-center my-3" style="color: rgb(9, 3, 10) ;">PROVIDE DETAILS HERE!</h3>
            
            <form method="post" class="cant" enctype="multipart/form-data" >
            <div class="container">
                <table style="display:flex; align-items: center; justify-content: center; height: 60vh ">
                    <tr style="height: 8vh">
                        <td>Full Name:</td>
                        <td><input type="text" name="fname" required></td>
                    </tr>
                    <tr style="height: 8vh">
                        <td>Phone Number:</td>
                        <td><input type="text" name="owner_phone" required></td>
                    </tr>
                    <tr style="height: 8vh">
                        <td>image:</td>
                        
                                <td><input type="file" class="field size1" name="image" required /></td>
                    </tr>
                    <tr style="height: 8vh">
                        <td>email</td>
                        <td><input type="email" name="owner_email" required></td>
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

            <?php
                if(isset($_POST['sub']))
                {
                   
                    include 'includes/config.php';

                    $target_path = "./rooms/";
                        $target_path = $target_path . basename ($_FILES['image']['name']);
                        if(move_uploaded_file($_FILES['image']['tmp_name'], $target_path)){
                        
                            $image = basename($_FILES['image']['name']);
                    $fname = $_POST['fname'];
                
                    $gender = $_POST['gender'];
                    $email = $_POST['owner_email'];
                    $phone = $_POST['owner_phone'];
                    $location = $_POST['location'];
                    
                    $qry = "INSERT INTO owner ( owner_name, owner_email, owner_phone, room_img, gender, location) VALUES ('$fname','$email','$phone','$image','$gender','$location')";
                    $result = $conn->query($qry);
                    if($result == TRUE){
                        echo "<script type = \"text/javascript\">
                                    alert(\"we will cantact you soon.we will be very happy to see you on our paltform\");
                                    window.location = (\"index.php\")
                                    </script>";
                    } else{
                        echo "<script type = \"text/javascript\">
                                    alert(\"Failed. Try Again\");
                                    window.location = (\"cantactowner.php\")
                                    </script>";
                    }



                }
            }



            ?>
             





    
    </main>
    <?php  
     include './includes/footer.php';
  ?>
    
    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
  </body>
</html>