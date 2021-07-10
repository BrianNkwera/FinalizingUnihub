<?php include "nav_tab.php"; ?>
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
                $query = "SELECT * FROM announcemments WHERE programme ='$program' AND year ='$mwaka' ";
                $res = mysqli_query($connection, $query);
         
                while ($row = mysqli_fetch_array($res)) {
          
                    $pattern = '/<img.*?\b>/i';

                    $pattern2 = '/<img.*?\b>/i';


                   $string = $row['announcemment'];

                   $final =  preg_replace($pattern, " ", $string );

                   $final2 =  preg_match($pattern2,$string ,$matches);
                   
                   echo  $final ."<br>";
                   print_r($matches[0]);

            
                }





                

            ?>
 </p>
</div>
<?php include "./anno_tab.php";  ?>