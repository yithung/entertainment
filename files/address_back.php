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
	$addressID = 0;
	$address = "";
	$address2 = "";
	$district = "";
	$cityID= 0;
	$postcode= "";
	$phone = "";
	$update = false;

	date_default_timezone_set("Asia/Kuala_Lumpur");
	
	if (isset($_POST['save'])) {
		$addressID = $_POST['address_id'];
		$address = $_POST['address'];
		$address2 = $_POST['address2'];
		$district = $_POST['district'];
		$cityID= $_POST['city_id'];
		$postcode= $_POST['postal_code'];
		$phone = $_POST['phone'];
		$lastUpdate = date('Y-m-d H:i:s');

		if(mysqli_num_rows (mysqli_query($db, "SELECT * FROM address WHERE address_id = '$addressID'"))){
			$_SESSION['message1'] = "Address" . ' #' . $addressID . ' ' . "exists! No data saved!"; 
			header('location: address_front.php');
		}
		else{
			$x = mysqli_query($db, "INSERT INTO address (address_id, address, address2, district, city_id, postal_code, phone, last_update) VALUES ('$addressID', '$address', '$address2', '$district', '$cityID', '$postcode', '$phone', '$lastUpdate')"); 
			if(!$x){
				$_SESSION['message1'] = "An error occured. No data added."; 
				header('location: address_front.php');
			} 
			else {
				$_SESSION['message'] = "address" . ' #' . $addressID . ' ' . "saved!"; 
				header('location: address_front.php');
			}
		}
	}

	if (isset($_POST['update'])) { 
		$addressID = $_POST['address_id'];
		$address = $_POST['address'];
		$address2 = $_POST['address2'];
		$district = $_POST['district'];
		$cityID= $_POST['city_id'];
		$postcode= $_POST['postal_code'];
		$phone = $_POST['phone'];
		$lastUpdate = date('Y-m-d H:i:s');
	
		$x = mysqli_query($db, "UPDATE address SET address_id = '$addressID', address='$address', address2='$address2', district='$district', cityID='$cityID', postal_code='$postcode', phone='$phone', last_update='$lastUpdate' WHERE address_id= '$addressID'"); 

		if(!$x){
				$_SESSION['message1'] = "An error occured. No data updated."; 
				header('location: address_front.php');
		} 
		else {
			$_SESSION['message'] = "Address" . ' #' . $addressID . ' ' . "updated!";
			header('location: address_front.php');
		}
	}

	if (isset($_GET['del'])) {
		$addressID = $_GET['del'];
		$x = mysqli_query($db, "DELETE FROM address WHERE address_id=$addressID");

		if(!$x){
				$_SESSION['message1'] = "An error occured. No data deleted."; 
				header('location: address_front.php');
		} 
		else {
			$_SESSION['message'] = "Address" . ' #' . $addressID . ' ' . "deleted!"; 
			header('location: address_front.php');
		}
	}

?>