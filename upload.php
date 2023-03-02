<?php 
include "db_conn.php";
if (isset($_POST['submit']) && isset($_FILES['my_audio'])&& isset($_POST['from-number'])&& isset($_POST['to-number'])) {
	
    $audio_name = $_FILES['my_audio']['name'];
    $tmp_name = $_FILES['my_audio']['tmp_name'];
    $error = $_FILES['my_audio']['error'];
	$frnum=  $_POST['from-number'];
	$tonum=  $_POST['to-number'];

    if ($error === 0) {
    	$audio_ex = pathinfo($audio_name, PATHINFO_EXTENSION);

    	$audio_ex_lc = strtolower($audio_ex);

    	$allowed_exs = array("mp3", '3gp', 'm4a', 'wav','m3u','ogg');

    	if (in_array($audio_ex_lc, $allowed_exs)) {
    		
    		$new_audio_name = uniqid("audio-", true). '.'.$audio_ex_lc;
    		$audio_upload_path = 'uploads/'.$new_audio_name;
    		move_uploaded_file($tmp_name, $audio_upload_path);

    		// Now let's Insert the video path into database
            $sql = "INSERT INTO audio(audio_url ,from_number,to_number) 
                   VALUES('$new_audio_name','$frnum','$tonum')";
            mysqli_query($conn, $sql);
            header("Location: view.php");
    	}else {
    		$em = "You can't upload files of this type";
    		header("Location: index.php?error=$em");
    	}
    }


}else{
	header("Location: index.php");
}