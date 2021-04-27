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
	$year = 0;
	$update = false;
	
	if (isset($_POST['save'])) {
		$filmID = $_POST['film_id'];
		$year = $_POST['release_year'];

		if(mysqli_num_rows (mysqli_query($db, "SELECT * FROM film_release WHERE film_id = '$filmID'"))){
			$_SESSION['message1'] = "Film" . ' #' . $filmID . ' ' . "exists! No data saved!"; 
			header('location: film_release_front.php');
		}
		else{
			$x = mysqli_query($db, "INSERT INTO film_release (film_id, release_year) VALUES ('$filmID', '$year')"); 
			if(!$x){
				$_SESSION['message1'] = "An error occured. No data saved."; 
				header('location: film_release_front.php');
			} 
			else {
				$_SESSION['message'] = "Film" . ' #' . $filmID . ' ' . "saved!"; 
				header('location: film_release_front.php');
			}
		}
	}

	if (isset($_POST['update'])) { 
		$filmID = $_POST['film_id'];
		$year = $_POST['release_year'];
	
		$x = mysqli_query($db, "UPDATE film_release SET film_id = '$filmID', release_year='$year' WHERE film_id= '$filmID'"); 

		if(!$x){
				$_SESSION['message1'] = "An error occured. No data updated."; 
				header('location: film_release_front.php');
		} 
		else {
			$_SESSION['message'] = "film" . ' #' . $filmID . ' ' . "updated!";
			header('location: film_release_front.php');
		}
	}

	if (isset($_GET['del'])) {
		$filmID = $_GET['del'];
		$x = mysqli_query($db, "DELETE FROM film_release WHERE film_id=$filmID");
		if(!$x){
				$_SESSION['message1'] = "An error occured. No data deleted."; 
				header('location: film_release_front.php');
		} 
		else {
			$_SESSION['message'] = "Film" . ' #' . $filmID . ' ' . "deleted!"; 
			header('location: film_release_front.php');
		}
	}

?>