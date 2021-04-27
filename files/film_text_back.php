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
	$title = "";
	$description = "";
	$update = false;
	
	if (isset($_POST['save'])) {
		$filmID = $_POST['film_id'];
		$title = $_POST['title'];
		$description = $_POST['description'];

		if(mysqli_num_rows (mysqli_query($db, "SELECT * FROM film_text WHERE film_id = '$filmID'"))){
			$_SESSION['message1'] = "Film" . ' #' . $filmID . ' ' . "exists! No data saved!"; 
			header('location: film_text_front.php');
		}
		else{
			$x = mysqli_query($db, "INSERT INTO film_text (film_id, title, description) VALUES ('$filmID', '$title', '$description')"); 
			if(!$x){
				$_SESSION['message1'] = "An error occured. No data saved."; 
				header('location: film_text_front.php');
			} 
			else {
				$_SESSION['message'] = "Film" . ' #' . $filmID . ' ' . "saved!"; 
				header('location: film_text_front.php');
			}
		}
	}

	if (isset($_POST['update'])) { 
		$filmID = $_POST['film_id'];
		$title = $_POST['title'];
		$description = $_POST['description'];
	
		$x = mysqli_query($db, "UPDATE film_text SET film_id = '$filmID', title='$title', description='$description' WHERE film_id= '$filmID'"); 
		if(!$x){
			$_SESSION['message1'] = "An error occured. No data updated."; 
			header('location: film_text_front.php');
		} 
		else {
			$_SESSION['message'] = "Film" . ' #' . $filmID . ' ' . "updated!";
			header('location: film_text_front.php');
		}
	}

	if (isset($_GET['del'])) {
		$filmID = $_GET['del'];
		$x = mysqli_query($db, "DELETE FROM film_text WHERE film_id=$filmID");
		if(!$x){
			$_SESSION['message1'] = "An error occured. No data deleted."; 
			header('location: film_text_front.php');
		} 
		else {
			$_SESSION['message'] = "Film" . ' #' . $filmID . ' ' . "deleted!"; 
			header('location: film_text_front.php');
		}
	}

?>