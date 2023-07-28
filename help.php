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

        <div class="wrapper" style="display: flex; align-items: center; justify-content: center; flex-direction: column;background-color: rgb(234, 241, 245);">
            <h2 style="text-decoration:underline">help desk Here</h2>
                <ul class="properties_list" >
                <form method="post"style="width: 100%; height: 100%;">
                    <table>
                        <tr>
                            <td style="color: #003300; font-weight: bold; font-size: 24px">Enter Your query Here:</td>
                        </tr>
                        
                        <tr>
                            <td>
                                <textarea name="message" placeholder="Enter query Here" name="message"class="txt" style="width: 70vw; height: 50vh;"></textarea>
                            </td>
                        </tr>
                        
                    </table>

                    <button type="submit" name="sub"class="btn btn-primary">Submit Details</button>
                </form>
                </ul>
        </div>

   <?php



      if(isset($_POST['sub']))
      {
         
            include './includes/config.php';

            $message=$_POST['message'];

           $client=$_SESSION['client_id'];
            $sql1="INSERT INTO help (help_client_id,client_message,time,status) VALUES('$client','$message',NOW(),'Unread')";

            $res=$conn->query($sql1);

            if($res==TRUE)
            {
                echo "<script type = \"text/javascript\">
                alert(\"We will get in touch with you soon. Sorry for inconvinience\");
                window.location = (\"index.php\")
                </script>";

            }
            else
            {

                echo "<script type = \"text/javascript\">
                alert(\"Failed. Try again\");
                window.location = (\"help.php\")
                </script>";
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