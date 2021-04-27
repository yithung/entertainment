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
	$paymentID = 0;
	$customerID = 0;
	$staffID = 0;
	$rentalID = 0;
	$amount = 0;
	$update = false;

	date_default_timezone_set("Asia/Kuala_Lumpur");
	
	if (isset($_POST['save'])) {
		$paymentID = $_POST['payment_id'];
		$customerID = $_POST['customer_id'];
		$staffID = $_POST['staff_id'];
		$rentalID = $_POST['rental_id'];
		$amount= $_POST['amount'];
		$payDate= date("Y-m-d H:i:s", strtotime($_POST["payment_date"]));
		$lastUpdate = date('Y-m-d H:i:s');

		if(mysqli_num_rows (mysqli_query($db, "SELECT * FROM payment WHERE payment_id = '$paymentID'"))){
			$_SESSION['message1'] = "Payment" . ' #' . $paymentID . ' ' . "exists! No data saved!"; 
			header('location: payment_front.php');
		}
		else{
			$x = mysqli_query($db, "INSERT INTO payment (payment_id, customer_id, staff_id, rental_id, amount, payment_date, last_update) VALUES ('$paymentID', '$customerID', '$staffID', '$rentalID', '$amount', '$payDate', '$lastUpdate')"); 
			if(!$x){
				$_SESSION['message1'] = "An error occured. No data added."; 
				header('location: payment_front.php');
			} 
			else {
				$_SESSION['message'] = "Payment" . ' #' . $paymentID . ' ' . "saved!"; 
				header('location: payment_front.php');
			}
		}
	}

	if (isset($_POST['update'])) { 
		$paymentID = $_POST['payment_id'];
		$customerID = $_POST['customer_id'];
		$staffID = $_POST['staff_id'];
		$rentalID = $_POST['rental_id'];
		$amount= $_POST['amount'];
		$payDate= date("Y-m-d H:i:s", strtotime($_POST["payment_date"]));
		$lastUpdate = date('Y-m-d H:i:s');
	
		$x = mysqli_query($db, "UPDATE payment SET payment_id = '$paymentID', customerID='$customerID', staff_id='$staffID', rental_id='$rentalID', amount='$amount', payment_date='$payDate', last_update='$lastUpdate' WHERE payment_id= '$paymentID'"); 

		if(!$x){
				$_SESSION['message1'] = "An error occured. No data updated."; 
				header('location: payment_front.php');
		} 
		else {
			$_SESSION['message'] = "Payment" . ' #' . $paymentID . ' ' . "updated!";
			header('location: payment_front.php');
		}
	}

	if (isset($_GET['del'])) {
		$paymentID = $_GET['del'];
		$x = mysqli_query($db, "DELETE FROM payment WHERE payment_id=$paymentID");

		if(!$x){
				$_SESSION['message1'] = "An error occured. No data deleted."; 
				header('location: payment_front.php');
		} 
		else {
			$_SESSION['message'] = "Payment" . ' #' . $paymentID . ' ' . "deleted!"; 
			header('location: payment_front.php');
		}
	}

?>