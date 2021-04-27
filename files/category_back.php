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
	$categoryID = 0;
	$name = "";
	$update = false;

	date_default_timezone_set("Asia/Kuala_Lumpur");
	
	if (isset($_POST['save'])) {
		$categoryID = $_POST['category_id'];
		$name = $_POST['name'];
		$lastUpdate = date('Y-m-d H:i:s');

		if(mysqli_num_rows (mysqli_query($db, "SELECT * FROM category WHERE category_id = '$categoryID'"))){
			$_SESSION['message1'] = "Category" . ' #' . $categoryID . ' ' . "exists! No data saved!"; 
			header('location: category_front.php');
		}
		else{
			$x = mysqli_query($db, "INSERT INTO category (category_id, name, last_update) VALUES ('$categoryID', '$name', '$lastUpdate')"); 
			if(!$x){
				$_SESSION['message1'] = "An error occured. No data saved."; 
				header('location: category_front.php');
			} 
			else {
				$_SESSION['message'] = "Category" . ' #' . $categoryID . ' ' . "saved!"; 
				header('location: category_front.php');
			}
		}
	}

	if (isset($_POST['update'])) { 
		$categoryID = $_POST['category_id'];
		$name = $_POST['name'];
		$lastUpdate = date('Y-m-d H:i:s');
	
		$x = mysqli_query($db, "UPDATE category SET category_id = '$categoryID', name='$name', last_update='$lastUpdate' WHERE category_id= $categoryID"); 

		if(!$x){
				$_SESSION['message1'] = "An error occured. No data updated."; 
				header('location: category_front.php');
		} 
		else {
			$_SESSION['message'] = "Category" . ' #' . $categoryID . ' ' . "updated!";
			header('location: category_front.php');
		}
	}

	if (isset($_GET['del'])) {
		$categoryID = $_GET['del'];
		$x = mysqli_query($db, "DELETE FROM category WHERE category_id=$categoryID");
		if(!$x){
				$_SESSION['message1'] = "An error occured. No data deleted."; 
				header('location: category_front.php');
		} 
		else {
			$_SESSION['message'] = "Category" . ' #' . $categoryID . ' ' . "deleted!"; 
			header('location: category_front.php');
		}
	}

?>