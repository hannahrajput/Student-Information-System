<!---------------- Session starts form here ----------------------->
<?php  
	session_start();
	if (!$_SESSION["LoginAdmin"])
	{
		header('location:../login/login.php');
	}
		require_once "../connection/connection.php";
	?>
<!---------------- Session Ends form here ------------------------>

<!-- --------------------------------add courses------------------------------------- -->
<?php  
	if (isset($_POST['sub'])) {
		$Course_code=$_POST['Course_code'];
		$Course_name=$_POST['Course_name'];
		$course_credit=$_POST['course_credit'];
		$instructor=$_POST['instructor'];

		$query="insert into courses_info(Course_code,Course_name,course_credit,instructor)values('$Course_code','$Course_name','$course_credit','$instructor')";
		$run=mysqli_query($con,$query);
		if ($run) {
			echo "successfully";
		}
		else{
			echo "Unsuccessful";
		}
	}

	
?>

<!-- --------------------------------End Php------------------------------------- -->


<!doctype html>
<html lang="en">
	<head>
		<title>Admin - Courses</title>
		 <link rel="shortcut icon" href="../Images/msu.png" type="image/x-icon">
	</head>
	<body>
		
		<?php include('../include/admin-sidebar.php') ?>  

		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
			<div class="sub-main">
				<div class="bar-margin text-center flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
					<h4>Course Units Management Section </h4>
				</div>
				<div class="row">
					<div class="col-md-12">
						<form action="courses.php" method="post">
							<div class="row mt-3">
								<div class="col-md-6">
									<div class="form-group">
										<label for="exampleInputEmail1">Course Code: </label>
										<input type="text" name="Course_code" class="form-control" required placeholder="Enter Course Code">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="exampleInputPassword1">Course Name:</label>
										<input type="text" name="Course_name" class="form-control" required placeholder="Enter Course Name">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="exampleInputEmail1">Credit Units:</label>
										<input type="text" name="course_credit" class="form-control" required placeholder="Enter the number of credit Units">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="exampleInputPassword1">Instructor:</label>
										<input type="text" name="instructor" class="form-control" required  placeholder="Enter the instructor">
									</div>
								</div>
							</div>
							<div class="row w-100">
								<div class="col-md-12">
									<input type="submit" name="sub" value="Add Course" class=" btn btn-primary ml-auto">
								</div>
							</div>
						</form>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-12 ml-2">
						<section class="mt-3">
							<table class="w-100 table-elements mb-5 table-three-tr" cellpadding="3">
								<tr class="table-tr-head table-three text-white">
									<th>Sr.No</th>
									<th>Course Code</th>
									<th>Cource Name</th>
									<th>Credit Units</th>
									<th>Instructor</th>
								</tr>
								<?php
									$sr=1;
									$query="select Course_code,Course_name,course_credit,instructor from courses_info";
									$run=mysqli_query($con,$query);
									while($row=mysqli_fetch_array($run)) {
									echo	"<tr>";
									echo	"<td>".$sr++."</td>";
									echo	"<td>".$row['Course_code']."</td>";
									echo	"<td>".$row['Course_name']."</td>";
									echo	"<td>".$row['course_credit']."</td>";
									echo	"<td>".$row['instructor']."</td>";
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
