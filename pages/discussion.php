<?php 
session_start();
$course_id = 3;
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Blog Post - Start Bootstrap Template</title>

  <!-- Bootstrap Core CSS -->
  <link href="../css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="../css/blog-post.css" rel="stylesheet">
  <link href="../css/disc.css" rel="stylesheet">


  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head>

<body>



  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <!-- Blog Post Content Column -->
      <div class="col-lg-8">

        <!-- Comments Form -->
        <div class="well">
          <form action="" method="post">

            <input type="hidden" name="course_id" value="<?php echo $course_id; ?>" required>

          
            <div class="form-group">
              <textarea name="comment" class="form-control" rows="3" placeholder="What's your question?" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary" name="post_comment">Submit</button>
          </form>


        </div>

        <hr>

        <!-- Save comment in database -->
        <?php

        // index.php

        $conn = mysqli_connect("localhost", "root", "", "unihub");


        if (isset($_POST["post_comment"])) {
          $name = $_SESSION["username"];
          $comment = mysqli_real_escape_string($conn, $_POST["comment"]);
          $course_id = mysqli_real_escape_string($conn, $_POST["course_id"]);
          $reply_of = 0;

          mysqli_query($conn, "INSERT INTO comments(name, comment, course_id, created_at, reply_of) VALUES ('" . $name . "', '" . $comment . "', '" . $course_id . "', NOW(), '" . $reply_of . "')");
            //This refreshes the page for the changes to be observed
            // header("Location :  discussion.php");
            echo("<script>location.href = 'discussion.php?msg=$msg';</script>");
        }

        ?>



        <?php

        // connect with database
        $conn = mysqli_connect("localhost", "root", "", "unihub");

        // get all comments of post
        $result = mysqli_query($conn, "SELECT * FROM comments WHERE course_id = 3");

        // save all records from database in an array
        $comments = array();
        while ($row = mysqli_fetch_object($result)) {
          array_push($comments, $row);
        }

        // loop through each comment
        foreach ($comments as $comment_key => $comment) {
          // initialize replies array for each comment
          $replies = array();

          // check if it is a comment to post, not a reply to comment
          if ($comment->reply_of == 0) {
            // loop through all comments again
            foreach ($comments as $reply_key => $reply) {
              // check if comment is a reply
              if ($reply->reply_of == $comment->id) {
                // add in replies array
                array_push($replies, $reply);

                // remove from comments array
                unset($comments[$reply_key]);
              }
            }
          }

          // assign replies to comments object
          $comment->replies = $replies;
        }



        ?>



        <!-- Time to display all these comments -->

        <ul class="comments" style="list-style-type:none;">
          <?php foreach ($comments as $comment) : ?>
            <li>


              <!-- Comment -->
              <div class="media">
                <a class="pull-left" href="#">
                  <img class="media-object" src="http://placehold.it/64x64" alt="">
                </a>
                <div class="media-body">
                  <h4 class="media-heading"><?php echo $comment->name; ?>
                    <small><?php echo date("F d, Y h:i a", strtotime($comment->created_at)); ?></small>
                  </h4>
                  <?php echo $comment->comment; ?>
                  <div class="pad-ver reply-btn">
                    <a data-id="<?php echo $comment->id; ?>" class="btn btn-sm btn-default btn-hover-primary" onclick="showReplyForm(this);" style="color:crimson;">Reply</a>
                  </div>
                  <hr>
                </div>
              </div>





              <form action="" method="post" id="form-<?php echo $comment->id; ?>" style="display: none;">

                <input type="hidden" name="reply_of" value="<?php echo $comment->id; ?>" required>
                <input type="hidden" name="course_id" value="3" required>


                <div class="form-group">
                  <textarea name="comment" class="form-control" rows="2" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary" name="do_reply" style="margin-bottom: 10px;">Add reply</button>

              </form>

              <ul class="comments reply" style="list-style-type:none;">
                <?php foreach ($comment->replies as $reply) : ?>
                  <li>


                    <!-- Comment -->
                    <div class="media">
                      <div class="media-body">
                        <div class="media">
                          <a class="pull-left" href="#">
                            <img class="media-object" src="http://placehold.it/64x64" alt="">
                          </a>
                          <div class="media-body">
                            <h4 class="media-heading"><?php echo $reply->name; ?>
                              <small> <?php echo date("F d, Y h:i a", strtotime($reply->created_at)); ?></small>
                            </h4>
                            <?php echo $reply->comment; ?>
                            <div class="pad-ver">
                              <a data-id="<?php echo $comment->id; ?>" data-name="<?php echo $reply->name; ?>" class="btn btn-sm btn-default btn-hover-primary" onclick="showReplyForReplyForm(this);"><i class="fas fa-reply"></i> Reply</a>
                            </div>
                            <hr>
                          </div>
                        </div>
                        <!-- End Nested Comment -->
                      </div>
                    </div>

                  </li>
                <?php endforeach; ?>
              </ul>


            </li>
          <?php endforeach; ?>
        </ul>


        <script>
          function showReplyForm(self) {
            var commentId = self.getAttribute("data-id");
            if (document.getElementById("form-" + commentId).style.display == "") {
              document.getElementById("form-" + commentId).style.display = "none";
            } else {
              document.getElementById("form-" + commentId).style.display = "";
            }
          }
        </script>

        <script>
          function showReplyForReplyForm(self) {
            var commentId = self.getAttribute("data-id");
            var name = self.getAttribute("data-name");

            if (document.getElementById("form-" + commentId).style.display == "") {
              document.getElementById("form-" + commentId).style.display = "none";
            } else {
              document.getElementById("form-" + commentId).style.display = "";
            }

            document.querySelector("#form-" + commentId + " textarea[name=comment]").value = "@" + name;
            document.getElementById("form-" + commentId).scrollIntoView();
          }
        </script>


        <!-- Add Reply to a comment -->

        <?php

        if (isset($_POST["do_reply"])) {
          $name = $_SESSION["username"];
          $comment = mysqli_real_escape_string($conn, $_POST["comment"]);
          $course_id = mysqli_real_escape_string($conn, $_POST["course_id"]);
          $reply_of = mysqli_real_escape_string($conn, $_POST["reply_of"]);

          $result = mysqli_query($conn, "SELECT * FROM comments WHERE id = " . $reply_of);
          if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_object($result);
          }

          mysqli_query($conn, "INSERT INTO comments(name, comment, course_id, created_at, reply_of) VALUES ('" . $name . "', '" . $comment . "', '" . $course_id . "', NOW(), '" . $reply_of . "')");
           //This refreshes the page for the changes to be observed
            // header("Location :  discussion.php");
            echo("<script>location.href = 'discussion.php?msg=$msg';</script>");
        }

        ?>




      </div>


    </div>
    <!-- /.row -->

    <hr>

  </div>
  <!-- /.container -->

  <!-- jQuery -->
  <script src="js/jquery.js"></script>

  <!-- Bootstrap Core JavaScript -->
  <script src="js/bootstrap.min.js"></script>

</body>

</html>