
<!doctype html>
<html lang="en">
	<head>
		<title>Admin - Subjects</title>
		 <link rel="shortcut icon" href="../Images/msu.png" type="image/x-icon">
	</head>
	</html>

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
<title>Admin Department of Computer Aplications</title>
	
	<?php include('../include/admin-sidebar.php') ?>  
	

		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100 page-content-index">

			<!-- Student -->
								<br>
								<br>
							<div class="row">
								<h4> Students</h4>
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

				<!-- End Student -->
				<!-- Teacher -->
				<div class="row">
					<h4> Teachers</h4>
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

				<!-- End Teacher -->
				<!-- subjects -->
				<div class="row">
					<h4> Subjects</h4>
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

				<!-- End subjects -->
				<!-- Programs -->
					<div class="row">
						<h4> Programs</h4>
					<div class="col-md-12 ml-2">
						<section class="mt-3">
							<table class="w-100 table-elements table-three-tr" cellpadding="3">
								<tr class="table-tr-head table-three text-white">
									<th>S/n</th>
									<th>Code</th>
									<th>Program Name</th>
									<th>Number of years</th>
									<th>Action</th>
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
				<!-- End Programs -->



		</main>

		<script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
		<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>

	</body>

</html>