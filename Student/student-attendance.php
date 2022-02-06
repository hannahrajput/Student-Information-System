<!---------------- Session starts form here ----------------------->
<?php  
	session_start();
	if (!$_SESSION["LoginStudent"])
	{
		$PRN_number=$_GET['PRN_number'] ?? $_SESSION['LoginStudent'];
		header('location:../login/student_login.php');
	}
		require_once "../connection/connection.php";
	?>
<!---------------- Session Ends form here ------------------------>

<!doctype html>
<html lang="en">
	<head>
		<title>Admin - Student Attendance</title>
	</head>
	<body>
		<?php include('../include/student-sidebar.php') ?>  

		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
			<div class="sub-main">
				<div class="bar-margin text-center flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
					<h4>My Attendance Report </h4>
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
								$query="select PRN_number,course,status,Date_taken from attendance where PRN_number='$PRN_number'";
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

 