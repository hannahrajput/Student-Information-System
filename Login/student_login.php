<!-- PHP Starts Here -->
<?php 
session_start();
    require_once "../connection/connection.php"; 
    $message="Email Or Password Does Not Match";
    if(isset($_POST["btnlogins"]))
    {
        $PRN_number=$_POST["PRN_number"];
        $Password=$_POST["Password"];

        $query="select PRN_number,Password from student_info where PRN_number='$PRN_number' and Password='$Password' ";
        $result=mysqli_query($con,$query);
        if (mysqli_num_rows($result)>0) {
            while ($row=mysqli_fetch_array($result)) {
               
                    $_SESSION['LoginStudent']=$row['PRN_number'];
                    header('Location: ../student/student-index.php');
                }
            }
        
        else
        { 
            header("Location: index.php");
        }
    }
?>
	


