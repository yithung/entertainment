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
	$customerID = 0;
	$storeID = 0;
	$fname = "";
	$lname = "";
	$email = "";
	$addressID= 0;
	$active= 0;
	$update = false;

	date_default_timezone_set("Asia/Kuala_Lumpur");
	
	if (isset($_POST['save'])) {
		$customerID = $_POST['customer_id'];
		$storeID = $_POST['store_id'];
		$fname = $_POST['first_name'];
		$lname = $_POST['last_name'];
		$email= $_POST['email'];
		$addressID= $_POST['address_id'];
		$active= $_POST['active'];
		$cdate= date("Y-m-d H:i:s", strtotime($_POST["create_date"]));
		$lastUpdate = date('Y-m-d H:i:s');

		if(mysqli_num_rows (mysqli_query($db, "SELECT * FROM customer WHERE customer_id = '$customerID'"))){
			$_SESSION['message1'] = "Customer" . ' #' . $customerID . ' ' . "exists! No data saved!"; 
			header('location: customer_front.php');
		}
		else{
			$x = mysqli_query($db, "INSERT INTO customer (customer_id, store_id, first_name, last_name, email, address_id, active, create_date, last_update) VALUES ('$customerID', '$storeID', '$fname', '$lname', '$email', '$addressID', '$active', '$cdate', '$lastUpdate')"); 
			if(!$x){
				$_SESSION['message1'] = "An error occured. No data added."; 
				header('location: customer_front.php');
			} 
			else {
				$_SESSION['message'] = "customer" . ' #' . $customerID . ' ' . "saved!"; 
				header('location: customer_front.php');
			}
		}
	}

	if (isset($_POST['update'])) { 
		$customerID = $_POST['customer_id'];
		$storeID = $_POST['store_id'];
		$fname = $_POST['first_name'];
		$lname = $_POST['last_name'];
		$email= $_POST['email'];
		$addressID= $_POST['address_id'];
		$active= $_POST['active'];
		$cdate= date("Y-m-d H:i:s", strtotime($_POST["create_date"]));
		$lastUpdate = date('Y-m-d H:i:s');
	
		$x = mysqli_query($db, "UPDATE customer SET customer_id = '$customerID', store_id='$storeID', first_name='$fname', last_name='$lname', email='$email', address_id='$addressID', active='$active', create_date='$cdate', last_update='$lastUpdate' WHERE customer_id= '$customerID'"); 

		if(!$x){
				$_SESSION['message1'] = "An error occured. No data updated."; 
				header('location: customer_front.php');
		} 
		else {
			$_SESSION['message'] = "Customer" . ' #' . $customerID . ' ' . "updated!";
			header('location: customer_front.php');
		}
	}

	if (isset($_GET['del'])) {
		$customerID = $_GET['del'];
		$x = mysqli_query($db, "DELETE FROM customer WHERE customer_id=$customerID");

		if(!$x){
				$_SESSION['message1'] = "An error occured. No data deleted."; 
				header('location: customer_front.php');
		} 
		else {
			$_SESSION['message'] = "customer" . ' #' . $customerID . ' ' . "deleted!"; 
			header('location: customer_front.php');
		}
	}

?>