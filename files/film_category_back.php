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
	$categoryID = "";
	$update = false;

	date_default_timezone_set("Asia/Kuala_Lumpur");
	
	if (isset($_POST['save'])) {
		$filmID = $_POST['film_id'];
		$categoryID = $_POST['category_id'];
		$lastUpdate = date('Y-m-d H:i:s');

		if(mysqli_num_rows (mysqli_query($db, "SELECT * FROM film_category WHERE film_id = '$filmID'"))){
			$_SESSION['message1'] = "Film Category" . ' #' . $filmID . ' ' . "exists! No data saved!"; 
			header('location: film_category_front.php');
		}
		else{
			$x = mysqli_query($db, "INSERT INTO film_category (film_id, category_id, last_update) VALUES ('$filmID', '$categoryID', '$lastUpdate')"); 
			if(!$x){
				$_SESSION['message1'] = "An error occured. No data saved."; 
				header('location: film_category_front.php');
			} 
			else {
				$_SESSION['message'] = "Film Category" . ' #' . $filmID . ' ' . "saved!"; 
				header('location: film_category_front.php');
			}
		}
	}

	if (isset($_POST['update'])) { 
		$filmID = $_POST['film_id'];
		$categoryID = $_POST['category_id'];
		$lastUpdate = date('Y-m-d H:i:s');
	
		$x = mysqli_query($db, "UPDATE film_category SET film_id = '$filmID', category_id='$categoryID', last_update='$lastUpdate' WHERE film_id= '$filmID'"); 

		if(!$x){
				$_SESSION['message1'] = "An error occured. No data updated."; 
				header('location: film_category_front.php');
		} 
		else {
			$_SESSION['message'] = "Film Category" . ' #' . $filmID . ' ' . "updated!";
			header('location: film_category_front.php');
		}
	}

	if (isset($_GET['del'])) {
		$filmID = $_GET['del'];
		$x = mysqli_query($db, "DELETE FROM film_category WHERE film_id=$filmID");
		if(!$x){
				$_SESSION['message1'] = "An error occured. No data deleted."; 
				header('location: film_category_front.php');
		} 
		else {
			$_SESSION['message'] = "Film Category" . ' #' . $filmID . ' ' . "deleted!"; 
			header('location: film_category_front.php');
		}
	}

?>