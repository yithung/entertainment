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
	$storeID = 0;
	$manager_staff_id = 0;
	$address_id = 0;
	$update = false;

	date_default_timezone_set("Asia/Kuala_Lumpur");
	
	if (isset($_POST['save'])) {
		$storeID = $_POST['store_id'];
		$manager_staff_id = $_POST['manager_staff_id'];
		$address_id = $_POST['address_id'];
		$lastUpdate = date('Y-m-d H:i:s');

		// $x = mysqli_query($db, "INSERT INTO store (store_id, manager_staff_id, address_id, last_update) VALUES ('$storeID', '$manager_staff_id', '$address_id', '$lastUpdate')"); 
		

		if(mysqli_num_rows (mysqli_query($db, "SELECT * FROM store WHERE store_id = '$storeID'"))){
			$_SESSION['message1'] = "Store" . ' #' . $storeID . ' ' . "exists! No data saved!"; 
			header('location: store_front.php');
		}

		else{
			$x = mysqli_query($db, "INSERT INTO store (store_id, manager_staff_id, address_id, last_update) VALUES ('$storeID', '$manager_staff_id', '$address_id', '$lastUpdate')"); 
			if(!$x){
				$_SESSION['message1'] = "An error occured. No data added."; 
				header('location: store_front.php');
			}
			else{
				$_SESSION['message'] = "store" . ' #' . $storeID . ' ' . "saved!"; 
				header('location: store_front.php');
			}
		}
	}

	if (isset($_POST['update'])) { 
		$storeID = $_POST['store_id'];
		$manager_staff_id = $_POST['manager_staff_id'];
		$address_id = $_POST['address_id'];
		$lastUpdate = date('Y-m-d H:i:s');
	
		$x = mysqli_query($db, "UPDATE store SET store_id = '$storeID', manager_staff_id='$manager_staff_id', address_id='$address_id', last_update='$lastUpdate' WHERE store_id= '$storeID'"); 
		if(!$x){
			$_SESSION['message1'] = "An error occured. No data updated."; 
			header('location: store_front.php');
		}
		else{
		$_SESSION['message'] = "store" . ' #' . $storeID . ' ' . "updated!";
		header('location: store_front.php');
		}
	}

	if (isset($_GET['del'])) {
		$storeID = $_GET['del'];

		$x = mysqli_query($db, "DELETE FROM store WHERE store_id=$storeID");
		if(!$x){
			$_SESSION['message1'] = "An error occured. No data deleted."; 
			header('location: store_front.php');
		}
		else{
		$_SESSION['message'] = "store" . ' #' . $storeID . ' ' . "deleted!"; 
		header('location: store_front.php');
		}
	}

?>