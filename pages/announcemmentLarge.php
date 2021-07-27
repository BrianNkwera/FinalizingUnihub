<?php include "./nav_tab.php"; ?>
<? session_start(); ?>
<style>
.items{
margin-left:25%;
margin-right:30%;
  }
</style>
<div class="col-lg-8 col-sm-12 ">
                 <p>
                <?php   
                
                $program =  $_SESSION['programme'];
                
                $mwaka = $_SESSION['year'];

                $wewant = $_GET['myid'];

                $query = "SELECT * FROM announcemments WHERE id='$wewant' ";

                $res = mysqli_query($connection, $query);
                
                while ($row = mysqli_fetch_assoc($res)) {
                     $pattern = '/<img.*?\b>/i';
                     $pattern2 = '/<img.*?\b>/i';
                     $string = $row['announcemment'];
                     $final =  preg_replace($pattern, " ", $string );
                     $final2 =  preg_match($pattern2,$string ,$matches);
                     echo  $final 
                      ."<br>";
                    if(preg_match($pattern2,$string ,$matches)){
                    print_r($matches[0]);
                   
                  }
                  }
   ?>
 </p>
</div>
<?php include "../pages/anno_tab.php";  ?>