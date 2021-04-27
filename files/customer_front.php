<?php  include('customer_back.php'); ?>
<?php
// $username = "hcymt2mercury";
// $password = "3;Vw^Q_S~eNV";
// $database = "hcymt2me_entertainment";
// $conn = new mysqli("hcymt2.mercury.nottingham.edu.my", $username, $password, $database);
$username = "hcyyg1mercury";
$password = "tigci0-vUjnys-cuvtig";
$database = "hcyyg1me_entertainment";
$conn = new mysqli("hcyyg1.mercury.nottingham.edu.my", $username, $password, $database);
if (!$conn) {
die("Connection failed: " .$conn->connect_error);
echo "NOT CONNECTED";
}
?>

<?php 
	if (isset($_GET['edit'])) {
		$customerID = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM customer WHERE customer_id=$customerID");
		
		if (count($record) == 1){
			$n = mysqli_fetch_array($record);
			$customerID = $n['customer_id'];
			$storeID = $n['store_id'];
			$fname = $n['first_name'];
			$lname = $n['last_name'];
			$email= $n['email'];
			$addressID= $n['address_id'];
			$active= $n['active'];
			$cdate = $n['create_date'];
		}
	}
?>

<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<title>customer</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">	
	<link rel="preconnect" href="https://fonts.gstatic.com"> 
	<link href="https://fonts.googleapis.com/css2?family=Paytone+One&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Baloo+2&display=swap" rel="stylesheet">
	<style>
		body{
			font-family: 'Paytone One', sans-serif;
			background-color: #ebffde;
			color: black;
		}
		h1{
			color: #2bd653;
			text-align: center;
			font-size:70px;
		}
		h3{
			font-size: 30px;
			margin-bottom: 10px;
			color: #75ff7e;
			text-align: center;
		}
		table{
		    background-color: white;
		}
		th{
			font-family: 'Paytone One', sans-serif;
			background-color: #75ff7e;
		}
		td{
			color: black;
			font-family: 'Baloo 2', cursive;
		}

		tr:hover {
		    background: #b8b8b8;
		}

	</style>
</head>
<body>

<?php if (isset($_SESSION['message'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
<?php endif ?>

<?php if (isset($_SESSION['message1'])): ?>
	<div class="wrn">
		<?php 
			echo $_SESSION['message1']; 
			unset($_SESSION['message1']);
		?>
	</div>
<?php endif ?>

<?php $results = mysqli_query($db, "SELECT * FROM customer"); ?>

	<button class="back_btn" onclick="document.location='http://hcyyg1.mercury.nottingham.edu.my/cw2/main.php'"> &lt;&lt;  Back to Main </button>

	<h1>customer</h1>
	<div class="container mb-3 mt-3 table-responsive">
		<table class="table table-striped table-bordered center" id="mydatatable">
			<thead>
				<tr>
	                <th>Customer ID</th>
	                <th>Store ID</th>
	                <th>First Name</th>
	                <th>Last Name</th>
	                <th>Email</th>
	                <th>Address ID</th>
	                <th>Active</th>
	                <th>Create Date</th>
	                <th>Last Update</th>
	                <th>Edit</th>
	                <th>Delete</th>
            	</tr>
			</thead>
			<tbody>
				 
				<?php while ($row = mysqli_fetch_array($results)) { ?>
					<tr>
						<td><?php echo $row['customer_id']; ?></td>
						<td><?php echo $row['store_id']; ?></td>
						<td><?php echo $row['first_name']; ?></td>
						<td><?php echo $row['last_name']; ?></td>
						<td><?php echo $row['email']; ?></td>
						<td><?php echo $row['address_id']; ?></td>
						<td><?php echo $row['active']; ?></td>
						<td><?php echo $row['create_date']; ?></td>
						<td><?php echo $row['last_update']; ?></td>
						<td>
							<a href="customer_front.php?edit=<?php echo $row['customer_id']; ?>" class="edit_btn" >Edit</a>
						</td>
						<td>
							<a href="customer_back.php?del=<?php echo $row['customer_id']; ?>" class="dlt_btn">Delete</a>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
	<div>

		<form method="post" action="customer_back.php" style="background: #f2fff4;">
			<div>
				<?php if ($update == true): ?>
					<h3>Update Data</h3>
				<?php else: ?>
					<h3>Insert Data</h3>
				<?php endif ?>
			</div>

			<div class="input-group">
				<label>Customer ID</label>
				<input type="number" name="customer_id" value="<?php echo $customerID; ?>">
			</div>

			<div class="input-group">
				<label>Store ID</label>
				<input type="number" name="store_id" value="<?php echo $storeID; ?>" required>
			</div>

			<div class="input-group">
				<label>First Name</label>
				<input type="text" name="first_name" value="<?php echo $fname; ?>" required>
			</div>

			<div class="input-group">
				<label>Last Name</label>
				<input type="text" name="last_name" value="<?php echo $lname; ?>" required>
			</div>

			<div class="input-group">
				<label>Email</label>
				<input type="email" name="email" value="<?php echo $email; ?>" required>
			</div>

			<div class="input-group">
				<label>Address ID</label>
				<input type="number" name="address_id" value="<?php echo $addressID; ?>" required>
			</div>

			<div class="input-group">
				<label>Active</label>
				<input type="number" name="active" value="<?php echo $active; ?>" required>
			</div>

			<div class="input-group">
				<label>Create Date</label>
				<input type="datetime-local" name="create_date" value="<?php echo $cdate; ?>">
			</div>

			<div class="input-group">
				<?php if ($update == true): ?>
					<button class="save_btn" type="submit" name="update" style="background: #cf4a4a;" >Update</button>
				<?php else: ?>
					<button class="save_btn" type="submit" name="save">Save</button>
				<?php endif ?>
			</div>

		</form>

	</div>


	<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script type="text/javascript" charset="utf8" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

	<script>
		$(document).ready( function (){
			$('#mydatatable').DataTable();
		});
	</script>

</body>
</html>