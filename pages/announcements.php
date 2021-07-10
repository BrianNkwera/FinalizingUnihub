<?php include "../db.php"; ?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $announcement = $_POST["textArea"];
  $programme = $_POST["programme"];
  $year  = $_POST["year"];
  $name = md5(rand(100, 200));
  $ext = explode('.', $_FILES['file']['name']);
  $filename = $name . '.' . $ext[1];
  $destination = 'images/' . $filename; //change this directory
  $location = $_FILES["file"]["tmp_name"];
  move_uploaded_file($location, $destination);
  //echo 'images/' . $filename;
  $query = "INSERT INTO announcemments ( announcemment, programme, year)  VALUES ('$announcement' , '$programme' ,  '$year')";
  $insertingData = mysqli_query($connection, $query);

  if (!$insertingData) {
    echo "Inserting data to the Db failed" . mysqli_error($connection);
  }
  
  else {
  
    echo "inserted fully";
  
    }
}
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>without bootstrap</title>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
</head>
<body>
  <form method="post" id="" action="">
    <textarea name="textArea" id="summernote" cols="30" rows="10"></textarea>
    <label for="programme">Programme </label> <br> <br>
    <select name="programme" class="input-fields">
      <option value="CS">Bsc in Computer science</option>
      <option value="BIT">Bsc in Business Information Technology</option>
      <option value="TE">Bsc in Telecommunications Engineering</option>
      <option value="EE">Bsc in Electronics Engineering</option>
      <option value="CE">Bsc in Computer Engineering</option>
    </select><br><br>
    <label for="year">YEAR </label> <br> <br>
    <select name="year" class="input-fields">
      <option value="1">First year</option>
      <option value="2">Second year</option>
      <option value="3">Third year</option>
      <option value="4">Fourth year</option>
   </select><br><br>
    <input type="submit" value="POST">
    </form>

  <a href="profile.php">RUDI UKAZIONE</a>
  <script>
    $('#summernote').summernote({
      placeholder: 'enter stuffs here',
      tabsize: 2,
      height: 120,
      width: 500,
      toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'underline', 'clear']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['table', ['table']],
        ['insert', ['link', 'picture', 'video']],
        ['view', ['fullscreen', 'codeview', 'help']]
      ]
    });
  </script>

  <script>
    $('#summernote').summernote({
      callbacks: {
        onImageUpload: function(files) {
          // for (let i = 0; i < files.length; i++) {
          //   $.upload(files[i]);
          // }
        }
      },
      height: 500,
    });

    $.upload = function(file) {
      let out = new FormData();
      out.append('file', file, file.name);

      $.ajax({
        method: 'POST',
        url: 'announcements.php',
        contentType: false,
        cache: false,
        processData: false,
        data: data,
        success: function(img) {
          $('#summernote').summernote('insertImage', img);
        },
        error: function(jqXHR, textStatus, errorThrown) {
          console.error(textStatus + " " + errorThrown);
        }
      });
    };
  </script>


</body>