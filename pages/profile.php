<?php include "nav_tab.php"; ?>




    <div class=" col-lg-8 col-sm-12">
        <form action="" class="w-50 mx-auto ">
            <img src="avatar.jpg" class="mx-auto d-flex justify-content-center" alt="">
            <div class="container d-flex mb-3 form-fields">
                <label class="w-25">NAME:</label>
                <div class="w-100 ms-3">
                    <p class="profile_fields"><?php echo $_SESSION["username"]; ?></p>
                </div>
            </div>
            <div class="container d-flex mb-3">
                <label class="w-25">COURSE:</label>
                <div class="w-100 ms-3">
                    <p class="profile_fields"> <?php echo $_SESSION["programme"]; ?></p>
                </div>
            </div>
            <div class="container d-flex mb-3">
                <label class="w-25">YEAR:</label>
                <div class="w-100 ms-3">
                    <p class="profile_fields"> <?php echo $_SESSION["year"]; ?></p>
                </div>
            </div>

        </form>
    </div>

    

  <?php include "anno_tab.php" ?>