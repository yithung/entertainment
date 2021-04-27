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
	$countryID = 0;
	$country = "";
	$update = false;

	date_default_timezone_set("Asia/Kuala_Lumpur");
	
	if (isset($_POST['save'])) {
		$countryID = $_POST['country_id'];
		$country = $_POST['country'];
		$lastUpdate = date('Y-m-d H:i:s');

		if(mysqli_num_rows (mysqli_query($db, "SELECT * FROM country WHERE country_id = '$countryID'"))){
			$_SESSION['message1'] = "Country" . ' #' . $countryID . ' ' . "exists! No data saved!"; 
			header('location: country_front.php');
		}
		else{
			$x = mysqli_query($db, "INSERT INTO country (country_id, country, last_update) VALUES ('$countryID', '$country', '$lastUpdate')"); 
			if(!$x){
				$_SESSION['message1'] = "An error occured. No data saved."; 
				header('location: country_front.php');
			} 
			else {
				$_SESSION['message'] = "Country" . ' #' . $countryID . ' ' . "saved!"; 
				header('location: country_front.php');
			}
		}
	}

	if (isset($_POST['update'])) { 
		$countryID = $_POST['country_id'];
		$country = $_POST['country'];
		$lastUpdate = date('Y-m-d H:i:s');
	
		$x = mysqli_query($db, "UPDATE country SET country_id = '$countryID', country='$country', last_update='$lastUpdate' WHERE country_id= '$countryID'"); 
		if(!$x){
			$_SESSION['message1'] = "An error occured. No data updated."; 
			header('location: country_front.php');
		} 
		else {
			$_SESSION['message'] = "Country" . ' #' . $countryID . ' ' . "updated!";
			header('location: country_front.php');
		}
	}

	if (isset($_GET['del'])) {
		$countryID = $_GET['del'];
		$x = mysqli_query($db, "DELETE FROM country WHERE country_id=$countryID");
		if(!$x){
			$_SESSION['message1'] = "An error occured. No data deleted."; 
			header('location: country_front.php');
		} 
		else {
			$_SESSION['message'] = "Country" . ' #' . $countryID . ' ' . "deleted!"; 
			header('location: country_front.php');
		}
	}

?>