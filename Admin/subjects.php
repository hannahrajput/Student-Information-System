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
	if (isset($_POST['sub'])) {
		$Program_id=$_POST['Program_id'];
		$Program_name=$_POST['Program_name'];
		$no_of_years=$_POST['no_of_years'];

		$query="insert into programs(Program_id,Program_name,no_of_years)values('$Program_id','$Program_name','$no_of_years')";
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
		<title>Admin - Subjects</title>
	</head>
	<body>
		
		<?php include('../include/admin-sidebar.php') ?>  

		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
			<div class="sub-main">
				<div class="bar-margin text-center flex-wrap flex-md-nowrap pt-3 pb-3 mb-3 text-white admin-dashboard pl-3">
					<h4>Programs Management Section </h4>
				</div>

				
				<div class="row">
					<div class="col-md-12">
						<form action="subjects.php" method="post">
							<div class="row mt-3">
								<div class="col-md-6">
									<div class="form-group">
										<label for="exampleInputEmail1">Program Code: </label>
										<input type="text" name="Program_id" class="form-control" required placeholder="Enter Program Code" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="exampleInputPassword1">Program Name:</label>
										<input type="text" name="Program_name" class="form-control" required placeholder="Enter Program Name" required>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="exampleInputPassword1">Number of years:</label>
										<input type="text" name="no_of_years" class="form-control" required placeholder="Enter duration" required>
									</div>
								</div>
							</div>
							<div class="row w-100">
								<div class="col-md-12">
									<input type="submit" name="sub" value="Add Program" class=" btn btn-primary ml-auto">
								</div>
							</div>
						</form>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12 ml-2">
						<section class="mt-3">
							<table class="w-100 table-elements table-three-tr" cellpadding="3">
								<tr class="table-tr-head table-three text-white">
									<th>S/n</th>
									<th>Code</th>
									<th>Program Name</th>
									<th>Number of years</th>
								</tr>
								<?php
									$sr=1;
									$query="select Program_id,Program_name,no_of_years from programs";
									$run=mysqli_query($con,$query);
									while($row=mysqli_fetch_array($run)) {
									echo	"<tr>";
									echo	"<td>".$sr++."</td>";
									echo	"<td>".$row['Program_id']."</td>";
									echo	"<td>".$row['Program_name']."</td>";
									echo	"<td>".$row['no_of_years']."</td>";
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
