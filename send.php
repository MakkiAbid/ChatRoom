<?php 

	include "config.php";
	include "functions.php";
	include "includes/Badwords/Badwords.php";

	$message = Badwords::strip(emojiParser($_POST['message']));
	
	$user =  $_POST['user'];

	$query = mysqli_query($conn, "INSERT INTO messages (full_name, message) VALUES ('$user', '$message')");


?>