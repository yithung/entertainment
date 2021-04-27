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
	$filmFeaturesID = 0;
	$filmID = 0;
	$featureID = 0;
	$update = false;
	
	if (isset($_POST['save'])) {
		$filmID = $_POST['film_id'];
		$featureID = $_POST['feature_id'];

		if(mysqli_num_rows (mysqli_query($db, "SELECT * FROM film_features WHERE film_id = '$filmID' AND feature_id='$featureID'"))){
			$_SESSION['message1'] = "Data already exists! No data added!"; 
			header('location: film_features_front.php');
		}
		else{
			$x = mysqli_query($db, "INSERT INTO film_features (film_id, feature_id) VALUES ('$filmID', '$featureID')"); 
			if(!$x){
				$_SESSION['message1'] = "An error occured. No data saved."; 
				header('location: film_features_front.php');
			} 
			else {
				$_SESSION['message'] = "Data saved!"; 
				header('location: film_features_front.php');
			}
		}
	}

	if (isset($_POST['update'])) { 
		$filmID = $_POST['film_id'];
		$featureID = $_POST['feature_id'];
		$lastUpdate = date('Y-m-d H:i:s');
		$filmFeaturesID = $_POST['film_features_id'];
	
		// $x = mysqli_query($db, "UPDATE film_features SET film_id = '$filmID', feature_id='$featureID', last_update='$lastUpdate' WHERE film_id= '$filmID' AND feature_id='$featureID'"); 
		$x = mysqli_query($db, "UPDATE film_features SET film_id = '$filmID', feature_id='$featureID' WHERE film_features_id =$filmFeaturesID"); 


		if(!$x){
				$_SESSION['message1'] = "An error occured. No data updated."; 
				header('location: film_features_front.php');
		} 
		else {
			$_SESSION['message'] = "Data updated!";
			header('location: film_features_front.php');
		}
	}

	if (isset($_GET['del'])) {
		$filmFeaturesID = $_GET['del'];
		// $x = mysqli_query($db, "DELETE FROM film_features WHERE film_id=$filmID AND feature_id=$featureID LIMIT 1");
		$x = mysqli_query($db, "DELETE FROM film_features WHERE film_features_id = $filmFeaturesID");

		if(!$x){
				$_SESSION['message1'] = "An error occured. No data deleted."; 
				header('location: film_features_front.php');
		} 
		else {
			$_SESSION['message'] = "Data deleted!"; 
			header('location: film_features_front.php');
		}
	}

?>