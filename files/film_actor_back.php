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
	$filmActorID = 0;
	$actorID = 0;
	$filmID = 0;
	$update = false;

	date_default_timezone_set("Asia/Kuala_Lumpur");
	
	if (isset($_POST['save'])) {
		$actorID = $_POST['actor_id'];
		$filmID = $_POST['film_id'];
		$lastUpdate = date('Y-m-d H:i:s');

		if(mysqli_num_rows (mysqli_query($db, "SELECT * FROM film_actor WHERE actor_id = '$actorID' AND film_id='$filmID'"))){
		// if(mysqli_num_rows (mysqli_query($db, "SELECT * FROM film_actor WHERE film_actor_id = '$filmActorID'"))){
			$_SESSION['message1'] = "Data already exists! No data added!"; 
			header('location: film_actor_front.php');
		}
		else{
			$x = mysqli_query($db, "INSERT INTO film_actor (actor_id, film_id, last_update) VALUES ('$actorID', '$filmID', '$lastUpdate')"); 
			if(!$x){
				$_SESSION['message1'] = "An error occured. No data saved."; 
				header('location: film_actor_front.php');
			} 
			else {
				$_SESSION['message'] = "Data saved!"; 
				header('location: film_actor_front.php');
			}
		}
	}

	if (isset($_POST['update'])) { 
		$actorID = $_POST['actor_id'];
		$filmID = $_POST['film_id'];
		$lastUpdate = date('Y-m-d H:i:s');
		$filmActorID = $_POST['film_actor_id'];
	
		// $x = mysqli_query($db, "UPDATE film_actor SET actor_id = '$actorID', film_id='$filmID', last_update='$lastUpdate' WHERE actor_id= '$actorID' AND film_id='$filmID'"); 
		$x = mysqli_query($db, "UPDATE film_actor SET actor_id = '$actorID', film_id='$filmID', last_update='$lastUpdate' WHERE film_actor_id =$filmActorID"); 


		if(!$x){
				$_SESSION['message1'] = "An error occured. No data updated."; 
				header('location: film_actor_front.php');
		} 
		else {
			$_SESSION['message'] = "Data updated!";
			header('location: film_actor_front.php');
		}
	}

	if (isset($_GET['del'])) {
		$filmActorID = $_GET['del'];
		// $x = mysqli_query($db, "DELETE FROM film_actor WHERE actor_id=$actorID AND film_id=$filmID LIMIT 1");
		$x = mysqli_query($db, "DELETE FROM film_actor WHERE film_actor_id = $filmActorID");

		if(!$x){
				$_SESSION['message1'] = "An error occured. No data deleted."; 
				header('location: film_actor_front.php');
		} 
		else {
			$_SESSION['message'] = "Data deleted!"; 
			header('location: film_actor_front.php');
		}
	}

?>