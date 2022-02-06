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



<!---------------- Search Student form here ------------------------>

<?php
	if(isset($_POST["btnSearch"]))
    {
		$PRN_number = $_POST['search'];
        $query="select * from student_info where PRN_number='$PRN_number' ";
        $result=mysqli_query($con,$query);
        if (mysqli_num_rows($result)>0) {
            while ($row=mysqli_fetch_array($result)) {
				echo $_SESSION['LoginStudent']=$row['PRN_number'];
				header('Location: ../admin/display-student.php');
            }
        }
        else
        { 
            header("Location: student.php");
        }
	}
	
?>

<!---------------- Search Student form here ------------------------>