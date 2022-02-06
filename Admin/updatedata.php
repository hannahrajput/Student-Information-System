<?php  
session_start();
if (!$_SESSION["LoginAdmin"])
{
	header('location:../login/admin_login.php');
}
	require_once "../connection/connection.php";
?>
<?php
if (isset($_GET['PRN_number'])) {
$PRN_number = $_GET['PRN_number'];
$Student_name = $_POST['sname'];
$Phone_number = $_POST['Phone_number'];
$email_address = $_POST['email_address'];
$Gender = $_POST['Gender'];
$Department = $_POST['Department'];
$Semester = $_POST['Semester'];
$Enrolment = $_POST['Enrolment'];
$Address = $_POST['Address'];
$Password = $_POST['Password'];

$sql = "UPDATE student_info SET Student_name = '{$Student_name}', Phone_number = '{$Phone_number}',email_address = '{$email_address}', Gender = '{$Gender}' , Department = '{$Department}', Semester = '{$Semester}', Enrolment = '{$Enrolment}', Address = '{$Address}', Password = '{$Password}' WHERE PRN_number = {$PRN_number}";
$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

header('Location: student.php');

mysqli_close($conn);
}
?>
