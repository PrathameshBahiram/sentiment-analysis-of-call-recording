<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>Database of call recording </title>
  </head>
  <body>
 
  <div class="container">
  <h2> Database of call recording</h2>
  <div class="alb">
    
  <?php 
  include "db_conn.php";
  $sql = "SELECT * FROM audio ORDER BY id DESC";
  $sqln = "SELECT from_number, to_number  FROM audio ORDER BY id DESC";

  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  $resn = mysqli_query($conn, $sqln);
  $res = mysqli_query($conn, $sql);

  if ($resn && mysqli_num_rows($resn) > 0 && $res && mysqli_num_rows($res) > 0) {
    while (($row = mysqli_fetch_assoc($resn)) && ($audio = mysqli_fetch_assoc($res))) {
      // Display data
      echo '<p> from :   ' . $row['from_number'] . '  to   ' . $row['to_number'] . ' Audio   '. $audio['audio_url'] . '</p>';
	 
      ?>
	  <div>
      <audio id=myAudio src="uploads/<?=$audio['audio_url']?>" controls></audio>
      <div class="vertical-center">
	  <button class="btn " onclick="playAudio()" >Play</button>
   
    </div>
	</div>
  <button><a class="btn ana" href="index.html" target="_blank">analyze</a></button>
      <?php
    }
  } else {
    echo "<h1>Empty</h1>";
  }

  mysqli_close($conn);
  ?>

<script>
  setTimeout( function playAudio() {
  var audio = document.getElementById("myAudio");
  if (audio) {

    audio.play();
    
  }
},3000)
  </script>
</div>
</div>
</body>
</html>