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
	$inventoryID = 0;
	$filmID = 0;
	$storeID = 0;
	$update = false;

	date_default_timezone_set("Asia/Kuala_Lumpur");
	
	if (isset($_POST['save'])) {
		$inventoryID = $_POST['inventory_id'];
		$filmID = $_POST['film_id'];
		$storeID = $_POST['store_id'];
		$lastUpdate = date('Y-m-d H:i:s');

		if(mysqli_num_rows (mysqli_query($db, "SELECT * FROM inventory WHERE inventory_id = '$inventoryID'"))){
			$_SESSION['message1'] = "Inventory #" . $inventoryID . ' ' . "exists! No data saved!"; 
			header('location: inventory_front.php');
		}
		else{
			$x = mysqli_query($db, "INSERT INTO inventory (inventory_id, film_id, store_id, last_update) VALUES ('$inventoryID', '$filmID', '$storeID', '$lastUpdate')"); 

			if(!$x){
					$_SESSION['message1'] = "An error occured. No data added."; 
					header('location: inventory_front.php');
			} 
			else {
				$_SESSION['message'] = "Inventory #" . $inventoryID . ' ' . "saved!"; 
				header('location: inventory_front.php');
			}
		}
	}

	if (isset($_POST['update'])) { 
		$inventoryID = $_POST['inventory_id'];
		$filmID = $_POST['film_id'];
		$storeID = $_POST['store_id'];
		$lastUpdate = date('Y-m-d H:i:s');
	
		$x = mysqli_query($db, "UPDATE inventory SET inventory_id = '$inventoryID', film_id='$filmID', store_id='$storeID', last_update='$lastUpdate' WHERE inventory_id= '$inventoryID'"); 

		if(!$x){
			$_SESSION['message1'] = "An error occured. No data updated."; 
			header('location: inventory_front.php');
		} 
		else {
			$_SESSION['message'] = "Inventory #" . $inventoryID . ' ' . "updated!";
			header('location: inventory_front.php');
		}
	}

	if (isset($_GET['del'])) {
		$inventoryID = $_GET['del'];
		$x = mysqli_query($db, "DELETE FROM inventory WHERE inventory_id=$inventoryID");

		if(!$x){
			$_SESSION['message1'] = "An error occured. No data deleted."; 
			header('location: inventory_front.php');
		} 
		else {
			$_SESSION['message'] = "Inventory #" . $inventoryID . ' ' . "deleted!"; 
			header('location: inventory_front.php');
		}
	}

?>