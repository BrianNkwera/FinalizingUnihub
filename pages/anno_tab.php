
<div class="col-lg-2 announcement-section">

        <h6 class="announcement-header">ANNOUNCEMENT</h6>
        <div class="announcements">
            <a href="" class="nav-link ">
              <p>

 <?php

                    $program =  $_SESSION['programme'];
                    $mwaka = $_SESSION['year'];
                    $query = "SELECT * FROM announcemments WHERE programme ='$program' AND year ='$mwaka' ";
                    $res = mysqli_query($connection, $query);
                    
                  
                  while($row = mysqli_fetch_array($res)){

                       
                        
                        echo " <p style=\" color:black\">" . $row['announcemment'] . "</p> " ;

                    }


                    ?>
                    </p>

                    
            </a>
        </div>


    </div>


</div>


</body>

</html>