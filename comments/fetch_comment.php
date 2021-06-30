<?php 
session_start();
include "../db.php";

?>
<!-- 
<?php
 //    $usernameOfPerson = ;
    $takingUserName = " SELECT username FROM users ";
    $userNameGetSelected = mysqli_query($connection,$takingUserName);
    $usernameOfPerson = mysqli_fetch_array($userNameGetSelected) ;
       if($usernameOfPerson){
        echo "WELCOME," ; print_r( $usernameOfPerson ['username']);
 
             echo " $usernameOfPerson ['username'] ";
    
         }
 
 ?> -->


<?php
//fetch_comment.php

$connect = new PDO('mysql:host=localhost;dbname=comments', 'root', '');
// $username = $_SESSION['username'];
$query = "
SELECT * FROM tbl_comment 
WHERE parent_comment_id = '0' 
ORDER BY comment_id DESC
";

$statement = $connect->prepare($query);
$statement->execute();

$result = $statement->fetchAll();
$output = '';
foreach($result as $row)
{
 $output .= '
 <div class="panel panel-default">
  <div class="panel-heading">By <b>'.$row['comment_sender_name'].'</b> on <i>'.$row["date"].'</i></div>
  <div class="panel-body">'.$row["comment"].'</div>
  <div class="panel-footer" align="right"><button type="button" onclick=(return()) class="btn btn-default reply" id="'.$row["comment_id"].'">Reply</button></div>
 </div>
 ';
 $output .= get_reply_comment($connect, $row["comment_id"]);
}

echo $output;

function get_reply_comment($connect, $parent_id = 0, $marginleft = 0)
{
 $query = "
 SELECT * FROM tbl_comment WHERE parent_comment_id = '".$parent_id."'
 ";
 $output = '';
 $statement = $connect->prepare($query);
 $statement->execute();
 ini_set('memory_limit', '-1');
 $result = $statement->fetchAll();
 $count = $statement->rowCount();
 if($parent_id == 0)
 {
  $marginleft = 0;
 }
 else
 {
  $marginleft = $marginleft + 50;
 }
 if($count > 0)
 {
  foreach($result as $row)
  {

   $output .= '
   <div class="panel panel-default" style="margin-left:'.$marginleft.'px">
    <div class="panel-heading">By <b>'.$row['comment_replier_name'].'</b> on <i>'.$row["date"].'</i></div>
    <div class="panel-body">'.$row["comment"].'</div>
    <div class="panel-footer" align="right"><button type="button" class="btn btn-default reply" name="replyButton"  id="'.$row["comment_id"].'">Reply</button></div>';
   ini_set('memory_limit', '-1');
   $output .= get_reply_comment($connect, $row["comment_id"], $marginleft);
  }
 }
 return $output;
}


?>

<div>
<form id="form1">
  <textarea name="comment">
    Enter your comment here
  </textarea>
  <br><br>
  <button type="button" id="submit">Submit</button>
</form>
</body>
<script>
$(document).ready(function() {
 document.replyButton.click(
      function() {
    $("#form1").toggle();
  });
});
</script>
</div>
