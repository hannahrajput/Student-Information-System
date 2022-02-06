<!---------------- Session starts form here ----------------------->
 <?php  
	session_start();
	if (!$_SESSION["LoginStudent"])
	{
		header('location:../login/student_login.php');
	}
	
		require_once "../connection/connection.php";
		
	?>
<!---------------- Session Ends form here ------------------------>


<!doctype html>
<html lang="en">
	<head>
		 <link rel="shortcut icon" href="../Images/msu.png" type="image/x-icon">
		<title>Student - Dashboard</title>
	</head>
	<body>
		
		<?php include('../include/student-sidebar.php') ?>  

		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
			<div class="sub-main">
			

				<?php include('../Student/display-student.php') ?> 
			</div>
		</main>
		<script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
		<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>



