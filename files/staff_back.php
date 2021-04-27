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
	$staffID = 0;
	$fname = "";
	$lname = "";
	$addressID = 0;
	$pic = NULL;
	$email = "";
	$storeID = 0;
	$active = 0;
	$username = "";
	$password = "";
	$update = false;

	date_default_timezone_set("Asia/Kuala_Lumpur");
	
	if (isset($_POST['save'])) {
		$staffID = $_POST['staff_id'];
		$fname = $_POST['first_name'];
		$lname = $_POST['last_name'];
		$addressID = $_POST['address_id'];
		$pic = $_POST['picture'];
		$email = $_POST['email'];
		$storeID = $_POST['store_id'];
		$active = $_POST['active'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$lastUpdate = date('Y-m-d H:i:s');

		if(mysqli_num_rows (mysqli_query($db, "SELECT * FROM staff WHERE staff_id = '$staffID'"))){
			$_SESSION['message1'] = "Staff" . ' #' . $staffID . ' ' . "exists! No data saved!"; 
			header('location: staff_front.php');
		}
		else{
			$x = mysqli_query($db, "INSERT INTO staff (staff_id, first_name, last_name, address_id, picture, email, store_id, active, username, password, last_update) VALUES ('$staffID', '$fname', '$lname', '$addressID', '$pic', '$email', '$storeID', '$active', '$username', 'password', '$lastUpdate')"); 

			if(!$x){
					$_SESSION['message1'] = "An error occured. No data added."; 
					header('location: staff_front.php');
			} 
			else {
				$_SESSION['message'] = "Staff" . ' #' . $staffID . ' ' . "saved!"; 
				header('location: staff_front.php');
			}
		}
	}

	if (isset($_POST['update'])) { 
		$staffID = $_POST['staff_id'];
		$fname = $_POST['first_name'];
		$lname = $_POST['last_name'];
		$addressID = $_POST['address_id'];
		$pic = $_POST['picture'];
		$email = $_POST['email'];
		$storeID = $_POST['store_id'];
		$active = $_POST['active'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$lastUpdate = date('Y-m-d H:i:s');
	
		$x = mysqli_query($db, "UPDATE staff SET staff_id = '$staffID', first_name='$fname', last_name='$lname', address_id='$addressID', picture='$pic', email='$email', store_id='$storeID', active='$active', username='$username', password='$password', last_update='$lastUpdate' WHERE staff_id= '$staffID'"); 

		if(!$x){
			$_SESSION['message1'] = "An error occured. No data updated."; 
			header('location: staff_front.php');
		} 
		else {
			$_SESSION['message'] = "Staff" . ' #' . $staffID . ' ' . "updated!";
			header('location: staff_front.php');
		}
	}

	if (isset($_GET['del'])) {
		$staffID = $_GET['del'];
		$x = mysqli_query($db, "DELETE FROM staff WHERE staff_id=$staffID");

		if(!$x){
			$_SESSION['message1'] = "An error occured. No data deleted."; 
			header('location: staff_front.php');
		} 
		else {
			$_SESSION['message'] = "Staff" . ' #' . $staffID . ' ' . "deleted!"; 
			header('location: staff_front.php');
		}
	}

?>