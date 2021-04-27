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
	$cityID = 0;
	$city = "";
	$countryID = 0;
	$update = false;

	date_default_timezone_set("Asia/Kuala_Lumpur");
	
	if (isset($_POST['save'])) {
		$cityID = $_POST['city_id'];
		$city = $_POST['city'];
		$countryID = $_POST['country_id'];
		$lastUpdate = date('Y-m-d H:i:s');

		if(mysqli_num_rows (mysqli_query($db, "SELECT * FROM city WHERE city_id = '$cityID'"))){
			$_SESSION['message1'] = "City" . ' #' . $cityID . ' ' . "exists! No data saved!"; 
			header('location: city_front.php');
		}
		else{
			$x = mysqli_query($db, "INSERT INTO city (city_id, city, country_id, last_update) VALUES ('$cityID', '$city', '$countryID', '$lastUpdate')"); 
			if(!$x){
				$_SESSION['message1'] = "An error occured. No data saved."; 
				header('location: city_front.php');
			} 
			else {
				$_SESSION['message'] = "city" . ' #' . $cityID . ' ' . "saved!"; 
				header('location: city_front.php');
			}
		}
	}

	if (isset($_POST['update'])) { 
		$cityID = $_POST['city_id'];
		$city = $_POST['city'];
		$countryID = $_POST['country_id'];
		$lastUpdate = date('Y-m-d H:i:s');
	
		$x = mysqli_query($db, "UPDATE city SET city_id = '$cityID', city='$city', country_id='$countryID', last_update='$lastUpdate' WHERE city_id= '$cityID'"); 
		if(!$x){
			$_SESSION['message1'] = "An error occured. No data updated."; 
			header('location: city_front.php');
		} 
		else {
			$_SESSION['message'] = "City" . ' #' . $cityID . ' ' . "updated!";
			header('location: city_front.php');
		}
	}

	if (isset($_GET['del'])) {
		$cityID = $_GET['del'];
		$x = mysqli_query($db, "DELETE FROM city WHERE city_id=$cityID");
		if(!$x){
			$_SESSION['message1'] = "An error occured. No data deleted."; 
			header('location: city_front.php');
		} 
		else {
			$_SESSION['message'] = "City" . ' #' . $cityID . ' ' . "deleted!"; 
			header('location: city_front.php');
		}
	}

?>