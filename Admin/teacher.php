<!---------------- Session starts form here ----------------------->
<?php  
	session_start();
	if (!$_SESSION["LoginAdmin"])
	{
		header('location:../login/admin_login.php');
	}
		require_once "../connection/connection.php";
		
	?>
<!---------------- Session Ends form here ------------------------>

<!--*********************** PHP code starts from here for data insertion into database ******************************* -->
<?php  
 	if (isset($_POST['save_tr'])) {

 		$Id_number=$_POST["Id_number"];

 		$Name=$_POST["Name"];

 		$Designation=$_POST["Designation"];
 		
 		$Gender=$_POST["Gender"];
 		
 		$Email=$_POST["Email"];
 		
 		$Phone_number=$_POST["Phone_number"];
 		
 		$Address=$_POST["Address"];
 		
 	$query="insert into teacher_info(Id_number,Name,Designation,Gender,Email,Phone_number,Address)values('$Id_number','$Name','$Designation','$Gender','$Email','$Phone_number','$Address')";
 		$run=mysqli_query($con, $query);
 		if ($run) {
 			echo "Your Data has been submitted";
 		}
 		else {
 			echo "Your Data has not been submitted";
 		}
 	}
?>

<?php include 'header.php';

if(isset($_POST['deletebtn'])){

include "config.php";
$stu_id = $_POST['sid'];

$sql = "DELETE FROM student WHERE sid = {$stu_id}";
$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

header("Location: http://localhost/crud/index.php");

mysqli_close($conn);

}
?>

<!--*********************** PHP code end from here for data insertion into database ******************************* -->
 

<!doctype html>
<html lang="en">
	<head>
		<title>Admin - Register Teacher</title>
		 <link rel="shortcut icon" href="../Images/msu.png" type="image/x-icon">
	</head>
	<body>
		
		<?php include('../include/admin-sidebar.php') ?>
		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
			<div class="sub-main">
				<div class="bar-margin text-center  flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3" >
					<h4>Teacher Management Section  </h4>
				</div>


				<div class="row">
					<div class=" col-md-12">
				<form action="teacher.php" method="post">
											<div class="row">
												<div class="col-md-4">
													<div class="form-group">
														<label for="exampleInputEmail1">User ID: </label>
														<input type="text" name="Id_number" class="form-control" required="" placeholder="Enter User ID">
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label for="exampleInputEmail1"> Full Names: </label>
														<input type="text" name="Name" class="form-control" required="" placeholder="Enter Full names">
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label for="exampleInputEmail1">Designation: </label>
														<select class="browser-default custom-select" name="Designation">
															<option selected>Select Status</option>
															<option value="Professor">Professor</option>
															<option value="Assistant 
															Professor">Assistant Professor</option>
															<option value="Lecturer">Lecturer</option>
															<option value="Assistant Lecturer">Lecturer</option>
														</select>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-4">
													<div class="formp">
														<label for="exampleInputPassword1">Gender:</label>
														<select class="browser-default custom-select" name="Gender">
															<option selected>Select Gender</option>
															<option value="Male">Male</option>
															<option value="Female">Female</option>
														</select>
													</div>
												</div>
												<div class="col-md-4">
													<div class="formp">
														<label for="exampleInputPassword1">Email: </label>
														<input type="text" name="Email" class="form-control"placeholder="Enter  email address">
													</div>
												</div>
												<div class="col-md-4">
													<div class="formp">
														<label for="exampleInputPassword1">Phone number: </label>
														<input type="number" name="Phone_number" class="form-control"placeholder="Enter valid phone number">
													</div>
												</div>
											</div>
												<div class="row mt-3">
												<div class="col-md-4">
													<div class="formp">
														<label for="exampleInputPassword1">Address: </label>
														<input type="text" name="Address" class="form-control"placeholder="Enter  Address">
													</div>
												</div>
											
						
											</div>
											</div>
											</div>
											
											<div class="row mt-3">
												<div class="col-md-12">
												<input type="submit" class="btn btn-primary" name="save_tr" value="Add Teacher">
											</div>
										</div>
										</form>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 ml-2">
						<section class="mt-3">
							<table class="w-100 table-elements mb-5 table-three-tr" cellpadding="10">
								<tr class="table-tr-head table-three text-white">
									<th>ID_Number</th>
									<th>Name</th>
									<th>Designation</th>
									<th>Gender</th>
									<th>Email</th>
									<th>Phone Number</th>
									<th>Address</th>
								</tr>
								<?php 
								$query="select ID_Number,Name,Designation,Gender,Email,Phone_Number,Address from teacher_info";
								$run=mysqli_query($con,$query);
								while($row=mysqli_fetch_array($run)) {
									echo "<tr>";
									echo "<td>".$row["ID_Number"]."</td>";
									echo "<td>".$row["Name"]." </td>";
									echo "<td>".$row["Designation"]."</td>";
									echo "<td>".$row["Gender"]."</td>";
									echo "<td>".$row["Email"]."</td>";
									echo "<td>".$row["Phone_Number"]."</td>";
									echo "<td>".$row["Address"]."</td>";
									echo "</tr>";
								}
								?>
							</table>				
						</section>
					</div>
				</div>	 	
			</div>
		</main>
		<script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
		<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>


