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
		<title>Student - Results</title>
	</head>
	<body>
		<?php include('../include/student-sidebar.php') ?>  

		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
			<div class="sub-main">
				<div class="text-center flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
					<h4 class="">Student Result Summary</h4>
				</div>
				<div class="row">
					<div class="col-md-12">
						<section class="mt-3">
							<table class="w-100 table-elements mb-5 table-three-tr" cellpadding="10" >
								<tr class="text-center text-white table-three table-tr-head">
									<th>PRN number</th>
									<th>Course Code</th>
									<th>Subject</th>
									<th>Instructor</th>
									<th>Marks</th>
									<th>Grade</th>
									<th>Comment</th>
								</tr>
								<?php 
									$PRN_number=$_SESSION['LoginStudent'];
									$query="select PRN_number ,Course_code, Course_name ,instructor ,Marks, Grade, Comment from results where PRN_number='$PRN_number'";
									$run=mysqli_query($con,$query);
									while ($row=mysqli_fetch_array($run)) { 
										echo	"<tr>";
											echo	"<td>".$row['PRN_number']."</td>";
											echo	"<td>".$row['Course_code']."</td>";
											echo	"<td>".$row['Course_name']."</td>";
											echo	"<td>".$row['instructor']."</td>";
											echo	"<td>".$row['Marks']."</td>";
											echo	"<td>".$row['Grade']."</td>";
											echo	"<td>".$row['Comment']."</td>";
											echo	"</tr>";
											}
										?>
							</table>	
						</section>
					</div>
				</div>
			</div>
		
	</body>
</html>