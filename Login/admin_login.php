<!-- PHP Starts Here -->
<?php 
session_start();
    require_once "../connection/connection.php"; 
    $message="Email Or Password Does Not Match";
    if(isset($_POST["btnlogin"]))
    {
        $user_id=$_POST["user_id"];
        $Password=$_POST["Password"];

        $query="select user_id, Password from login where user_id='$user_id' and Password='$Password' ";
        $result=mysqli_query($con,$query);
        if (mysqli_num_rows($result)>0) {
            while ($row=mysqli_fetch_array($result)) {
                    $_SESSION['LoginAdmin']=$row["user_id"];
                    header('Location: ../admin/admin-index.php'); 
            }
        }
        else
        { 
            header("Location: login.php");
        }
    }
?>
	


