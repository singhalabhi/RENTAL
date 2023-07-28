
<?php

session_start();

echo'
<header>
    <nav class="navbar navbar-expand-lg ">
        <div class="container-fluid  bg-dark">
          <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon "></span>
          </button>
          <a class="navbar-brand text-white " href="#">GET YOUR ROOM</a>
          <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item ">
                <a class="nav-link active text-white" aria-current="page" href="./index.php">Home</a>
              </li>';

              if(!isset($_SESSION['client_name']))
              {
                echo '
              <li class="nav-item">
                <a class="nav-link text-white" href="./login.php">Client login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="./owner.php">owner</a>
              </li>
              <li class="nav-item">
                <a class="nav-link  text-white" href="#ftr1">About</a>
             
              </ul>'
           ;
              }
              else{
                  echo '
                <li class="nav-item">
                <a class="nav-link text-white" href="./booking_status.php">booking status</a>
                </li>
                <li class="nav-item">
                <a class="nav-link text-white" href="./help.php">help</a>
                </li>
                <li class="nav-item">
                <a class="nav-link text-white" href="./logout.php">logout</a>
                </li>
                </ul>
            ';




              }
             

               echo'<form method="post" class="d-flex" role="search">
              <input class="form-control me-2"  name="location_search" type="search" placeholder="location" aria-label="Search">
              <button class="btn btn-outline-success" name="shl" type="submit">Search</button>
            </form>
           
          </div>
        </div>
      </nav>
    </header>';


    ?>