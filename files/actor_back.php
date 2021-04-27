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
	$actorID = 0;
	$fname = "";
	$lname = "";
	$update = false;

	date_default_timezone_set("Asia/Kuala_Lumpur");
	
	if (isset($_POST['save'])) {
		$actorID = $_POST['actor_id'];
		$fname = $_POST['first_name'];
		$lname = $_POST['last_name'];
		$lastUpdate = date('Y-m-d H:i:s');

		if(mysqli_num_rows (mysqli_query($db, "SELECT * FROM actor WHERE actor_id = '$actorID'"))){
			$_SESSION['message1'] = "Actor" . ' #' . $actorID . ' ' . "exists! No data saved!"; 
			header('location: actor_front.php');
		}
		else{
			$x = mysqli_query($db, "INSERT INTO actor (actor_id, first_name, last_name, last_update) VALUES ('$actorID', '$fname', '$lname', '$lastUpdate')"); 

			if(!$x){
					$_SESSION['message1'] = "An error occured. No data added."; 
					header('location: actor_front.php');
			} 
			else {
				$_SESSION['message'] = "Actor" . ' #' . $actorID . ' ' . "saved!"; 
				header('location: actor_front.php');
			}
		}
	}

	if (isset($_POST['update'])) { 
		$actorID = $_POST['actor_id'];
		$fname = $_POST['first_name'];
		$lname = $_POST['last_name'];
		$lastUpdate = date('Y-m-d H:i:s');
	
		$x = mysqli_query($db, "UPDATE actor SET actor_id = '$actorID', first_name='$fname', last_name='$lname', last_update='$lastUpdate' WHERE actor_id= '$actorID'"); 

		if(!$x){
			$_SESSION['message1'] = "An error occured. No data updated."; 
			header('location: actor_front.php');
		} 
		else {
			$_SESSION['message'] = "Actor" . ' #' . $actorID . ' ' . "updated!";
			header('location: actor_front.php');
		}
	}

	if (isset($_GET['del'])) {
		$actorID = $_GET['del'];
		$x = mysqli_query($db, "DELETE FROM actor WHERE actor_id=$actorID");

		if(!$x){
			$_SESSION['message1'] = "An error occured. No data deleted."; 
			header('location: actor_front.php');
		} 
		else {
			$_SESSION['message'] = "Actor" . ' #' . $actorID . ' ' . "deleted!"; 
			header('location: actor_front.php');
		}
	}

?>