<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css" />
	<title>Audio upload php and mysql</title>
	<style>
		body {
			display: flex;
			justify-content: center;
			align-items: center;
			flex-direction: column;
			min-height: 100vh;
		}
		input {
			font-size: 2rem;
		}
		a {
			text-decoration: none;
			color: #006CFF;
			font-size: 1.5rem;
		}
	</style>
</head>
<body>
	<a href="view.php">Audio</a>
	<?php if (isset($_GET['error'])) {  ?>
		<p><?=$_GET['error']?></p>
	<?php } ?>
	 <form action="upload.php"
	       method="post"
	       enctype="multipart/form-data">
		   <label>From:</label>
			<input type="number"  name="from-number" >
			
			<br><br>
			
			<label >To:</label>
			<input type="number"  name="to-number">

			
			<br> <br>
					
		
		   <input class="btn analyze" type="file"
	 	       name="my_audio"  >
		
	 	<input class="btn analyze"
		 type="submit"
	 	       name="submit" 
	 	       value="Upload">
	 </form>
</body>
</html>