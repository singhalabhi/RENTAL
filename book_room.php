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
     
   
       <div class="container d-flex " style="height: 100vh; justify-content:center; align-items:center;">


            <?php 
                include './includes/config.php';
              $owner= $_GET['id'];
              
              $sql="SELECT * FROM room WHERE owner_id='$owner'";
              $res=$conn->query($sql);


              $rs=$res->fetch_assoc();
              ?>    <div class="container">
                       <div class="card my-2" style="width: 18rem">
                      <img src="rooms/th (1).jpg" class="card-img-top" alt="...">
                      <div class="card-body">
                        <h5 class="card-title"><?php echo $rs['owner_name'];?> </h5>
                        <p class="card-text">location: <?php echo $rs['owner_location'];?></p>
                        <p class="card-text">Room rent: <?php echo $rs['room_rent'];?> rupees</p>
                        <p class="card-text">Attached bathroom:<?php echo  $rs['bath'];?></p>
                       
                        <a href="./book_room.php?id=<?php echo $rs['owner_id']?>" class="btn btn-primary">Book now</a>
                      </div>
                          </div>
                          </div>
                <div class="container text-center align-items-center justify-content-center">

               <?php  
                       if(!isset($_SESSION['client_name']))
                       {
                       ?>
                          <h2>Please First Login Into Our Website For Book Rooms</h2>
					<a href="login.php"><button type="button" class="btn btn-primary">Login Here</button></a>
          </div>

                     <?php

                       }
                       else
                       {
                        ?>
                       <h2>Proceed To Book Room</h2>
                       <form method="post">
                             <button type="submit" name="sub" class="btn btn-primary">Click Here</button>
                      </form>
                      <?php

                       }
                       ?>

                      
       
   


       </div>

             <?php

                 if(isset($_POST['sub']))
                 {
                    
                       $owner=$_GET['id'];
                       $client=$_SESSION['client_id'];


                       $sql="SELECT * FROM request WHERE client_id='$client' AND owner_id='$owner'";
                   
                      $res=$conn->query($sql);

                      if($res->num_rows>0)
                      {

                        echo "<script type = \"text/javascript\">
                        alert(\"You have already booked this room. we will contact with you soon.....\");
                        window.location = (\"index.php\")
                        </script>"; 

                      }
                      else
                      {
                        $sql2="INSERT INTO request (client_id,owner_id,status) VALUES ('$client','$owner','pending')";

                             $res1=$conn->query($sql2);
                            
                             if($res1==TRUE)
                            {

                             
                        echo "<script type = \"text/javascript\">
                        alert(\"Successfully booked . we will contact with you soon\");
                        window.location = (\"index.php\")
                        </script>"; 

                            }
                            else{


                              
                        echo "<script type = \"text/javascript\">
                        alert(\"Failed. Try Again\");
                        window.location = (\"index.php\")
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