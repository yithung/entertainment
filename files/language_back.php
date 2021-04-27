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
	$languageID = 0;
	$name = "";
	$update = false;

	date_default_timezone_set("Asia/Kuala_Lumpur");
	
	if (isset($_POST['save'])) {
		$languageID = $_POST['language_id'];
		$name = $_POST['name'];
		$lastUpdate = date('Y-m-d H:i:s');

		if(mysqli_num_rows (mysqli_query($db, "SELECT * FROM language WHERE language_id = '$languageID'"))){
			$_SESSION['message1'] = "Language" . ' #' . $languageID . ' ' . "exists! No data saved!"; 
			header('location: language_front.php');
		}
		else{
			$x = mysqli_query($db, "INSERT INTO language (language_id, name, last_update) VALUES ('$languageID', '$name', '$lastUpdate')"); 
			if(!$x){
				$_SESSION['message1'] = "An error occured. No data saved."; 
				header('location: language_front.php');
			} 
			else {
				$_SESSION['message'] = "Language" . ' #' . $languageID . ' ' . "saved!"; 
				header('location: language_front.php');
			}
		}
	}

	if (isset($_POST['update'])) { 
		$languageID = $_POST['language_id'];
		$name = $_POST['name'];
		$lastUpdate = date('Y-m-d H:i:s');
	
		$x = mysqli_query($db, "UPDATE language SET language_id = '$languageID', name='$name', last_update='$lastUpdate' WHERE language_id= '$languageID'"); 

		if(!$x){
				$_SESSION['message1'] = "An error occured. No data updated."; 
				header('location: language_front.php');
		} 
		else {
			$_SESSION['message'] = "Language" . ' #' . $languageID . ' ' . "updated!";
			header('location: language_front.php');
		}
	}

	if (isset($_GET['del'])) {
		$languageID = $_GET['del'];
		$x = mysqli_query($db, "DELETE FROM language WHERE language_id=$languageID");
		if(!$x){
				$_SESSION['message1'] = "An error occured. No data deleted."; 
				header('location: language_front.php');
		} 
		else {
			$_SESSION['message'] = "Language" . ' #' . $languageID . ' ' . "deleted!"; 
			header('location: language_front.php');
		}
	}

?>