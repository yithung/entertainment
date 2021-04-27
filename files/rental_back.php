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
	$rentalID = 0;
	$inventoryID = 0;
	$customerID = 0;
	$staffID = 0;
	$update = false;

	date_default_timezone_set("Asia/Kuala_Lumpur");
	
	if (isset($_POST['save'])) {
		$rentalID = $_POST['rental_id'];
		$rentDate = date("Y-m-d H:i:s", strtotime($_POST["rental_date"]));
		$inventoryID = $_POST['inventory_id'];
		$customerID = $_POST['customer_id'];
		$return_date= date("Y-m-d H:i:s", strtotime($_POST["return_date"]));
		$staffID= $_POST['staff_id'];
		$lastUpdate = date('Y-m-d H:i:s');

		if(mysqli_num_rows (mysqli_query($db, "SELECT * FROM rental WHERE rental_id = '$rentalID'"))){
			$_SESSION['message1'] = "Rental" . ' #' . $rentalID . ' ' . "exists! No data saved!"; 
			header('location: rental_front.php');
		}
		else{
			$x = mysqli_query($db, "INSERT INTO rental (rental_id, rental_date, inventory_id, customer_id, return_date, staff_id, last_update) VALUES ('$rentalID', '$rentDate', '$inventoryID', '$customerID', '$return_date', '$staffID', '$lastUpdate')"); 
			if(!$x){
				$_SESSION['message1'] = "An error occured. No data added."; 
				header('location: rental_front.php');
			} 
			else {
				$_SESSION['message'] = "Rental" . ' #' . $rentalID . ' ' . "saved!"; 
				header('location: rental_front.php');
			}
		}
	}

	if (isset($_POST['update'])) { 
		$rentalID = $_POST['rental_id'];
		$rentDate = date("Y-m-d H:i:s", strtotime($_POST["rental_date"]));
		$inventoryID = $_POST['inventory_id'];
		$customerID = $_POST['customer_id'];
		$return_date= date("Y-m-d H:i:s", strtotime($_POST["return_date"]));
		$staffID= $_POST['staff_id'];
		$lastUpdate = date('Y-m-d H:i:s');
	
		$x = mysqli_query($db, "UPDATE rental SET rental_id = '$rentalID', rental_date='$rentDate', inventory_id='$inventoryID', customer_id='$customerID', return_date='$return_date', staff_id='$staffID', last_update='$lastUpdate' WHERE rental_id= '$rentalID'"); 

		if(!$x){
				$_SESSION['message1'] = "An error occured. No data updated."; 
				header('location: rental_front.php');
		} 
		else {
			$_SESSION['message'] = "Rental" . ' #' . $rentalID . ' ' . "updated!";
			header('location: rental_front.php');
		}
	}

	if (isset($_GET['del'])) {
		$rentalID = $_GET['del'];
		$x = mysqli_query($db, "DELETE FROM rental WHERE rental_id=$rentalID");

		if(!$x){
				$_SESSION['message1'] = "An error occured. No data deleted."; 
				header('location: rental_front.php');
		} 
		else {
			$_SESSION['message'] = "Rental" . ' #' . $rentalID . ' ' . "deleted!"; 
			header('location: rental_front.php');
		}
	}

?>