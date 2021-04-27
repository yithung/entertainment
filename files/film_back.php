<?php 
	session_start();
	// $username = "hcymt2mercury";
	// $password = "3;Vw^Q_S~eNV";
	// $database = "hcymt2me_entertainment";
	// $db = mysqli_connect("hcymt2.mercury.nottingham.edu.my", $username, $password, $database);
	$username = "hcyyg1mercury";
	$password = "tigci0-vUjnys-cuvtig";
	$database = "hcyyg1me_entertainment";
	$db = mysqli_connect("hcyyg1.mercury.nottingham.edu.my", $username, $password, $database);

	// initialize variables
	$filmID = 0;
	$languageID = 0;
	$oriID = 0;
	$rentDuration = 0;
	$rentRate = 0;
	$length= 0;
	$replaceCost= 0;
	$rating= "";
	$update = false;

	date_default_timezone_set("Asia/Kuala_Lumpur");
	
	if (isset($_POST['save'])) {
		$filmID = $_POST['film_id'];
		$languageID = $_POST['language_id'];
		$oriID = $_POST['original_language_id'];
		$rentDuration = $_POST['rental_duration'];
		$rentRate= $_POST['rental_rate'];
		$length= $_POST['length'];
		$replaceCost= $_POST['replacement_cost'];
		$rating= $_POST['rating'];
		$lastUpdate = date('Y-m-d H:i:s');

		if(mysqli_num_rows (mysqli_query($db, "SELECT * FROM film WHERE film_id = '$filmID'"))){
			$_SESSION['message1'] = "Film" . ' #' . $filmID . ' ' . "exists! No data saved!"; 
			header('location: film_front.php');
		}
		else{
			$x = mysqli_query($db, "INSERT INTO film (film_id, language_id, original_language_id, rental_duration, rental_rate, length, replacement_cost, rating, last_update) VALUES ('$filmID', '$languageID', '$oriID', '$rentDuration', '$rentRate', '$length', '$replaceCost', '$rating', '$lastUpdate')"); 
			if(!$x){
				$_SESSION['message1'] = "An error occured. No data added."; 
				header('location: film_front.php');
			} 
			else {
				$_SESSION['message'] = "Film" . ' #' . $filmID . ' ' . "saved!"; 
				header('location: film_front.php');
			}
		}
	}

	if (isset($_POST['update'])) { 
		$filmID = $_POST['film_id'];
		$languageID = $_POST['language_id'];
		$oriID = $_POST['original_language_id'];
		$rentDuration = $_POST['rental_duration'];
		$rentRate= $_POST['rental_rate'];
		$length= $_POST['length'];
		$replaceCost= $_POST['replacement_cost'];
		$rating= $_POST['rating'];
		$lastUpdate = date('Y-m-d H:i:s');
	
		$x = mysqli_query($db, "UPDATE film SET film_id = '$filmID', language_id='$languageID', original_language_id='$oriID', rental_duration='$rentDuration', rental_rate='$rentRate', length='$length', replacement_cost='$replaceCost', rating='$rating', last_update='$lastUpdate' WHERE film_id= '$filmID'"); 

		if(!$x){
				$_SESSION['message1'] = "An error occured. No data updated."; 
				header('location: film_front.php');
		} 
		else {
			$_SESSION['message'] = "Film" . ' #' . $filmID . ' ' . "updated!";
			header('location: film_front.php');
		}
	}

	if (isset($_GET['del'])) {
		$filmID = $_GET['del'];
		$x = mysqli_query($db, "DELETE FROM film WHERE film_id=$filmID");

		if(!$x){
				$_SESSION['message1'] = "An error occured. No data deleted."; 
				header('location: film_front.php');
		} 
		else {
			$_SESSION['message'] = "Film" . ' #' . $filmID . ' ' . "deleted!"; 
			header('location: film_front.php');
		}
	}

?>