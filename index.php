<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>rental</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

 <!-- <link rel="stylesheet" href="style.css">
 <link rel="stylesheet" href="mq.css"> -->

<link rel="stylesheet" href="style1.css">

<link rel="stylesheet" href="mq1.css">
</head>
  <body>
      <?php 
         
         include './includes/navbar.php';
   
      
      ?>

    <main>
      <div class="container">
           <div><h3 class="text-center">FIND YOUR ROOM</h3></div>
          <div><h3 class="text-center">NOW IT'S EASY TO GET ROOM ON RENT</h3></div>
     
        <div class="row">

           <?php
                  include './includes/config.php';
                  if(isset($_POST['shl']))
                  {
                     $location=$_POST['location_search'];
                    
                    $data= "SELECT * FROM room WHERE owner_location='$location'";
                     
                      $res=$conn->query($data);
                    
                    if($res->num_rows==0)
                    {
                     
                      ?>
                      
                      <div class="container" style="height: 70vh"> ROOOMS ARE NOT AVAILABLE ON <?php echo strtoupper($location) ?> LOCATION </div>
                <?php
                    }
                    else
                    {
                     
                     
                     while($rs=$res->fetch_assoc())
                     {



                      
                      ?> 

                        <div class="col-md-4" >
                  <div class="card my-2 ">
                      <img src="./rooms/<?php echo $rs['room_img']?>" class="card-img-top" width="200" height="200" alt="...">
                      <div class="card-body">
                        <h5 class="card-title"><?php echo $rs['owner_name'];?> </h5>
                        <p class="card-text">location: <?php echo $rs['owner_location'];?></p>
                        <p class="card-text">Room rent: <?php echo $rs['room_rent'];?> rupees</p>
                        <p class="card-text">Attached bathroom:<?php echo  $rs['bath'];?></p>
                       
                        <a href="./book_room.php?id=<?php echo $rs['owner_id']?>" class="btn btn-primary">Book now</a>
                      </div>
                          </div>
                               </div>


                  <?php
                     }



                    }
          


                  }
                  else
                  {
                    $data= "SELECT * FROM room WHERE status='available'";
                      
                         $res=$conn->query($data);

                      while($rs=$res->fetch_assoc())
                      {
                        ?>

                    <div class="col-md-4" >
                  
        <div class="card my-2 " >
            <img src="./rooms/<?php echo $rs['room_img']?>" class="card-img-top" width="300" height="200" alt="...">
            <div class="card-body">
              <h5 class="card-title"><?php echo $rs['owner_name'];?> </h5>
              <p class="card-text">location: <?php echo $rs['owner_location'];?></p>
              <p class="card-text">Room rent: <?php echo $rs['room_rent'];?> rupees</p>
              <p class="card-text">Attached bathroom:<?php echo  $rs['bath'];?></p>
             
              <a href="./book_room.php?id=<?php echo $rs['owner_id']?>" class="btn btn-primary">Book now</a>
            </div>
                    
                     </div>
                     </div>

                     <?php

                      

                      }

                  }

                  ?>


       



        
            </div>
          </div>

      
    </main>

  <?php  
     include './includes/footer.php';
  ?>
    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
  </body>
</html>