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
	if (isset($_POST['add_result'])) {
		$PRN_number=$_POST['PRN_number'];
		$Student_name=$_POST['Student_name'];
		$Course_code=$_POST['Course_code'];
		$Course_name=$_POST['Course_name'];
		$Credit_units=$_POST['Credit_units'];
		$instructor=$_POST['instructor'];
		$Marks=$_POST['Marks'];
		$Grade=$_POST['Grade'];
		$Comment=$_POST['Comment'];

		$query="insert into results(PRN_number,Student_name,Course_code,Course_name,Credit_units,instructor,Marks,Grade,Comment)values('$PRN_number','$Student_name','$Course_code','$Course_name','$Credit_units','$instructor','$Marks','$Grade','$Comment')";
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
		<title>Student - Results</title>
		 <link rel="shortcut icon" href="../Images/msu.png" type="image/x-icon">
	</head>
	<body>
		<?php include('../include/admin-sidebar.php') ?>  

		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
			<div class="sub-main">
				<div class="text-center flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
				<h4 class="">Student Result Management</h4>
				</div>
					<div class="row">
					<div class="col-md-12">
						<form action="student_result.php" method="post">
							<div class="row mt-3">
								<div class="col-md-6">
									<div class="form-group">
										<label for="exampleInputEmail1">PRN Number*</label>
										<input type="number" name="PRN_number" class="form-control" required placeholder="Enter PRN of student" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="exampleInputPassword1">Student Name*</label>
										<input type="text" name="Student_name" class="form-control" required placeholder="Enter Student Name" required>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="exampleInputPassword1">Course Code*</label>
										<input type="text" name="Course_code" class="form-control" required placeholder="Enter Course Code" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="exampleInputPassword1">Course Name*</label>
										<select class="browser-default custom-select" name="Course_name">
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
										<label for="exampleInputPassword1">Credit Units*</label>
										<input type="number" name="Credit_units" class="form-control" required placeholder="Enter Credit Unit of course" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="exampleInputPassword1">Instructor*</label>
											<select class="browser-default custom-select" name="instructor">
											<option selected>Select Instructor</option>
											<option value="Krishna Rastogi">Krishna Rastogi</option>
											<option value="Mitali Hora">Mitali Hora</option>
											<option value="Kshitij Tripathi">Kshitij Tripathi</option>
											<option value="Jignesh Shah ">Jignesh Shah</option>
											<option value="Pritabala Patel ">Pritabala Patel</option>
											<option value="Krina Shah ">Krina Shah</option>
										</select>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="exampleInputPassword1">Marks*</label>
										<input type="number" name="Marks" class="form-control" required placeholder="Enter Student Mark" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="exampleInputPassword1">Grade*</label>
										<input type="text" name="Grade" class="form-control" required placeholder="Enter Grade" required>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="exampleInputPassword1">Comment*</label>
										<input type="text" name="Comment" class="form-control" required placeholder="Enter Comment for result" required>
									</div>
								</div>
							</div>
							<div class="row w-100">
								<div class="col-md-12">
									<input type="submit" name="add_result" value="Add Result" class=" btn btn-primary ml-auto">
								</div>
							</div>
						</form>
					</div>
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
									$query="select PRN_number ,Course_code, Course_name ,instructor ,Marks, Grade, Comment from results";
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