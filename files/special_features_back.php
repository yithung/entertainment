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
	$featureID = 0;
	$sf = "";
	$update = false;

	date_default_timezone_set("Asia/Kuala_Lumpur");
	
	if (isset($_POST['save'])) {
		$featureID = $_POST['feature_id'];
		$sf = $_POST['special_feature'];

		if(mysqli_num_rows (mysqli_query($db, "SELECT * FROM special_features WHERE feature_id = '$featureID'"))){
			$_SESSION['message1'] = "Feature" . ' #' . $featureID . ' ' . "exists! No data saved!"; 
			header('location: special_features_front.php');
		}
		else{
			$x = mysqli_query($db, "INSERT INTO special_features (feature_id, special_feature) VALUES ('$featureID', '$sf')");
			if(!$x){
				$_SESSION['message1'] = "An error occured. No data added."; 
				header('location: special_features_front.php');
			}
			else{
				$_SESSION['message'] = "Feature" . ' #' . $featureID . ' ' . "saved!"; 
				header('location: special_features_front.php');
			}
		}
	}

	if (isset($_POST['update'])) { 
		$featureID = $_POST['feature_id'];
		$sf = $_POST['special_feature'];
	
		$x = mysqli_query($db, "UPDATE special_features SET feature_id = '$featureID', special_feature='$sf' WHERE feature_id= '$featureID'"); 
		if(!$x){
			$_SESSION['message1'] = "An error occured. No data updated."; 
			header('location: special_features_front.php');
		}
		else{
			$_SESSION['message'] = "Feature" . ' #' . $featureID . ' ' . "updated!";
			header('location: special_features_front.php');
		}
	}

	if (isset($_GET['del'])) {
		$featureID = $_GET['del'];
		$x = mysqli_query($db, "DELETE FROM special_features WHERE feature_id=$featureID");
		if(!$x){
			$_SESSION['message1'] = "An error occured. No data deleted."; 
			header('location: special_features_front.php');
		}
		else{
			$_SESSION['message'] = "Feature" . ' #' . $featureID . ' ' . "deleted!"; 
			header('location: special_features_front.php');
		}
	}

?>