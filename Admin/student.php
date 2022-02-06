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
 	if (isset($_POST['btn_saver'])) {

		$PRN_number= $_POST["PRN_number"];

 		$Student_name=$_POST["Student_name"];

 		$Phone_number=$_POST["Phone_number"];

 		$email_address=$_POST["email_address"];
 		
 		$Gender=$_POST["Gender"];
 		
 		$Department=$_POST["Department"];
 		
 		$Semester=$_POST["Semester"];
 		
 		$Enrolment=$_POST["Enrolment"];

 		$Address=$_POST['Address'];

 		$Password=$_POST['Password'];

 		$query="Insert into student_info (PRN_number,Student_name,Phone_number,email_address,Gender,Department,Semester,Enrolment,Address,Password) values('$PRN_number','$Student_name','$Phone_number','$email_address','$Gender','$Department','$Semester','$Enrolment','$Address','$Password')";
 		
 		$run=mysqli_query($con, $query);
 		if ($run) {
 			echo "Your Data has been submitted";
 		}
 		else {
 			echo "Your Data has not been submitted";
 		}	
 	}
?>
 
<!doctype html>
<html lang="en">
	<head>
		<title>Admin - Register Student</title>
		 <link rel="shortcut icon" href="../Images/msu.png" type="image/x-icon">
	</head>
	<body>
		
		<?php include('../include/admin-sidebar.php') ?>
		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 w-100">
			<div class="sub-main">
				<div class="bar-margin text-center  flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3" >
					<h4>Student Management Section  </h4>
				</div>
				<div class="row">
					<div class=" col-md-12">
							        <form action="student.php" method="POST">
										<div class="row">
											<div class="col-md-4">
											    <div class="form-group">
											        <label for="exampleInputEmail1">PRN Number*</label>
											        <input type="text" name="PRN_number" class="form-control" required>
											    </div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">Student Name*</label>
												    <input type="text" name="Student_name" class="form-control">
											    </div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1" required>Phone Number*</label>
												    <input type="number" name="Phone_number" class="form-control">
											    </div>
											</div>
								  		</div>
								  		<div class="row mt-3">
											<div class="col-md-4">
											    <div class="form-group">
											        <label for="exampleInputEmail1">Email address*</label>
											        <input type="text" name="email_address" class="form-control" required>
											    </div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">Gender*</label>
												    <select class="browser-default custom-select" name="Gender">
												    <option >Select Gender</option>
												    <option >Male</option>
												    <option >Female</option>
												</select>
											    </div>
											</div>

											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">Program*</label>
												    <select class="browser-default custom-select" name="Department">
												    <option >Select Program</option>
												    <option >BCA</option>
												    <option >MSC IT</option>
												</select>
											    </div>
											</div>
										</div>
											<div class="row mt-3">
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">Semester*</label>
												    <select class="browser-default custom-select" name="Semester">
												    <option >Select Semester</option>
												    <option >One</option>
												    <option >Two</option>
												    <option >Three</option>
												    <option >Four</option>
												    <option >Five</option>
												    <option >Six</option>
												</select>
											    </div>
											</div>
											<div class="col-md-4">
											    <div class="form-group">
											        <label for="exampleInputEmail1">Enter Enrolment year*</label>
											        <input type="text" name="Enrolment" class="form-control" required>
											    </div>
											</div>

											<div class="col-md-4">
											    <div class="form-group">
											        <label for="exampleInputEmail1">Enter Address*</label>
											        <input type="text" name="Address" class="form-control" required>
											    </div>
											</div>
										</div>
											<div class="row mt-3">
											<div class="col-md-4">
													<div class="formp">
														<label for="exampleInputPassword1">Password*</label>
														<input type="Password" name="Password" class="form-control"placeholder="Enter  Valid Password">
													</div>
												</div>
											</div>	
											<div class="row mt-3">
												<div class="col-md-12">
												<input type="submit" class="btn btn-primary" name="btn_saver" value="Add Student">
											</div>
										</div>
										</form>
						</div>
					</div>
<br>
				<div class="row">

					<div class="col-md-6">
									<form action="search_student.php" method="post">
										<div class="form-group">
											<label for="exampleInputPassword1"><h5>Search Student:</h5></label>
											<div class="d-flex">
												<input type="text" name="search" id="search" class="form form-control" placeholder="Enter I'd">
												<input class="btn btn-primary px-4 ml-4" type="submit" name="btnSearch" value="Search">
											</div>
										</div>
									</form>
								</div>
					<div class="col-md-12 ml-2">
						<section class="mt-3">
							<table class="w-100 table-elements mb-5 table-three-tr text-center" cellpadding="10">
								<tr class="table-tr-head table-three text-white">
									<th>PRN Number</th>
									<th>Student name</th>
									<th>Phone number</th>
									<th>Email address</th>
									<th>Gender</th>
									<th>Department</th>
									<th>Semester</th>
									<th>Enrolment</th>
									<th>Address</th>
								</tr>
								<?php 
								$query="select PRN_number,Student_name,Phone_number,email_address,Gender,Department,Semester,Enrolment,Address from student_info";
								$run=mysqli_query($con,$query);
								while($row=mysqli_fetch_array($run)) {?>
									<tr>
										<td><?php echo $row["PRN_number"] ?></td>
										<td><?php echo $row["Student_name"] ?></td>
										<td><?php echo $row["Phone_number"] ?></td>
										<td><?php echo $row["email_address"] ?></td>
										<td><?php echo $row["Gender"] ?></td>
										<td><?php echo $row["Department"] ?></td>
										<td><?php echo $row["Semester"] ?></td>
										<td><?php echo $row["Enrolment"] ?></td>
										<td><?php echo $row["Address"] ?></td>
									</tr>
								<?php }
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