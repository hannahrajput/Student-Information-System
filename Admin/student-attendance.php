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

<?php  
	if (isset($_POST['add_attendance'])) {
		$PRN_number=$_POST['PRN_number'];
		$course=$_POST['course'];
		$status=$_POST['status'];
		$Date_taken=$_POST['Date_taken'];

		$query="insert into attendance(PRN_number,course,status,Date_taken)values('$PRN_number','$course','$status','$Date_taken')";
		$run=mysqli_query($con,$query);
		if ($run) {
			echo "successfully";
		}
		else{
			echo "Unsuccessful";
		}
	}
?>

<!doctype html>
<html lang="en">
	<head>
		<title>Admin - Student Attendance</title>
		 <link rel="shortcut icon" href="../Images/msu.png" type="image/x-icon">
	</head>
	<body>
		<?php include('../include/admin-sidebar.php') ?>  

		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
			<div class="sub-main">
				<div class="bar-margin text-center flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
					<h4>Attendance Management Section </h4>
				</div>
				<div class="row">
					<div class="col-md-12">
						<form action="student-attendance.php" method="post">
							<div class="row mt-3">
								<div class="col-md-6">
									<div class="form-group">
										<label for="exampleInputEmail1">PRN Number*</label>
										<input type="number" name="PRN_number" class="form-control" required placeholder="Enter PRN of student" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="exampleInputPassword1">Course*</label>
										<select class="browser-default custom-select" name="course">
											<option selected>Select Instructor</option>
											<option value="Web Technologies">Web Technologies</option>
											<option value="Software Engineering ">Software Engineering</option>
											<option value="Data Communications and Networking ">Data Communications and Networking</option>
											<option value="Finance and Accounting ">Finance and Accounting</option>
											<option value="Java Programming ">Java Programming</option>
											<option value="Information System and Technologies ">Information System and Technologies</option>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="exampleInputPassword1">Status*</label>
										<input type="text" name="status" class="form-control" required placeholder="Enter Status of Student" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="exampleInputPassword1">Date Taken*</label>
										<input type="Date" name="Date_taken" class="form-control" required placeholder="DD-MM-YYYY" required>
									</div>
								</div>
							</div>

							<div class="row w-100">
								<div class="col-md-12">
									<input type="submit" name="add_attendance" value="Add Attendance" class=" btn btn-primary ml-auto">
								</div>
							</div>
						</form>
					</div>
				</div>


				<div class="row">
					<div class="col-md-12">
						<section class="border mt-3">
							<table class="w-100 table-elements mb-5 table-three-tr text-center" cellpadding="10">
								<tr class="table-tr-head table-three text-white">
									<th>PRN_number</th>
									<th>Subject</th>
									<th>Status</th>
									<th>Date_taken</th>
								</tr>
								<?php 
								$PRN_number=$_SESSION['LoginStudent'];
								$query="select PRN_number,course,status,Date_taken from attendance";
								$run=mysqli_query($con,$query);
								while($row=mysqli_fetch_array($run)) {
									echo	"<tr>";
									echo	"<td>".$row['PRN_number']."</td>";
									echo	"<td>".$row['course']."</td>";
									echo	"<td>".$row['status']."</td>";
									echo	"<td>".$row['Date_taken']."</td>";
									echo	"</tr>";
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

 