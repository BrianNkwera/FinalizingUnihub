<?php

$db["db_host"] = "localhost";
$db["db_user"] = "root";
$db["db_pass"] =  "" ;
$db["db_name"] =  "unihub";

$connection = mysqli_connect($db["db_host"],$db["db_user"],$db["db_pass"],$db["db_name"]);

if(!$connection){
    echo "Connection failed";
}


?>