<?php
  session_start();
  include "../db.php";
?>
<!DOCTYPE html>
<html>

<head>
  <title>UNIHUB - Register</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <link href="profile.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />

</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light" style="background-color:white;">
    <div class="container-fluid">
      <a class="navbar-brand" href=""> <img src="../picha/ICON.PNG" alt="" width="" height="">
        UNIHUB</a></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse " id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          
          <li class="nav-item ms-lg-4">
            <a class="nav-link " id="item" href="../logout.php">LOG OUT</a>

          </li>
          <?php
          if($_SESSION["isAdmin"]==1)
            
          
         echo  "<li class=\"nav-item ms-lg-4\">
             <a class=\"nav-link \" id=\"item\" href=\"announcements.php\">POST ANNOUNCEMENT</a> </li>
          "
          ?>
         
        </ul>
      </div>
    </div>
  </nav>
 <div class="container-fluid row col-lg-12 col-sm-12 profile-body">

 <div class="col-lg-2 list-group profile_menu">
<a href="#" class=" list-group-item list-group-item-action mb-3 mt-5">RESOURCES</a>
<a href="../comments/index.php" class="b0 list-group-item list-group-item-action mb-3">TIMETABLE</a>
<a href="#" class=" list-group-item list-group-item-action mb-3">DISCUSSION</a>
<a href="#" class=" list-group-item list-group-item-action">PROFILE</a>
</div>

