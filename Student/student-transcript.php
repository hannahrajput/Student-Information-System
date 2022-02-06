<!---------------- Session starts form here ----------------------->
<?php  
	session_start();
	if (!$_SESSION["LoginStudent"])
	{$PRN_number=$_GET['PRN_number'] ?? $_SESSION['LoginStudent'];
        header('location:../login/student_login.php');
    }
    require_once "../connection/connection.php";
    ?>
<!---------------- Session Ends form here ------------------------>
<!doctype html>
<html lang="en">
    <head>

<meta charset="utf-8">
    <link rel="shortcut icon" href="../Images/msu.png" type="image/x-icon">
    
    <!-- css style goes here -->

      <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
      
      <link rel="stylesheet" type="text/css" href="../css/style.css">
      

    <!-- css style go to end here -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Student - Transcript</title>


</head>

<?php include "../common/common-header.php"?>
    <div class="container mt-4">
        <div>
            <center>
            <img  src="../Images/pic.jpg" alt="" width="200" height="200" style="float: right;" >
            <img src="../Images/msu.png" alt="" width="200" height="200" style="float: left;">
            <h4 class="text-dark mt-3">The Maharaja Sayajirao University of Baroda- MSU</h4>
            <h4 class="text-dark">Department of Computer Applications</h4>
            </center>
        </div>
    </div>
    <div class="container-fluid mb-4 text-dark">
        <div class="program-info">
            <?php  
                $PRN_number = $_SESSION['LoginStudent'];
                $query = "select * from student_info where PRN_number = '$PRN_number'";
                $run = mysqli_query($con, $query);
                while($row = mysqli_fetch_array($run)){ ?>
                    
                    <center>
                    <h5>Student Transcript - <?php echo $row['Department']; ?> Program</h5>
                    </center>
        </div>
        <div>
            <div>
                <center>
                 <h5>PRN Number: <?php echo $row['PRN_number']; ?></h5>
                <h5>Student Name : <?php echo $row['Student_name'] ?></h5>
                <h5>Phone Number: <?php echo $row['Phone_number']; ?></h5>
                <h5>Gender: <?php echo $row['Gender']; ?></h5>
                <h5>Email Address: <?php echo $row['email_address']; ?></h5>
                <h5>Semester: <?php echo $row['Semester']; ?></h5>
                <h5>Enrolment: <?php echo $row['Enrolment']; ?></h5>
                <h5>Address: <?php echo $row['Address']; ?></h5>
                </center>
            </div>
        </div>
        <hr>
        <center>
        <strong><u><h3 style="color: red;">Results details</h3></u></strong></center>
        <?php }
        ?>
    </div>
    <div class="container-fluid table-font-for-transcript">
        <div class="row">
            <center>
            <div class="col-md-12 ml-4">
                <div>
                    <section class="mt-3">
                        <div class="mt-2">
                            <table style="margin-right: auto; margin-right: auto;">
                                <tr class="pt-5 table-six text-white" style="height: 32px;">
                                    <th>Course_code</th>
                                    <th>Course_name</th>
                                    <th>Credit_units</th>
                                    <th>Instructor</th>
                                    <th>Marks</th>
                                    <th>Grade</th>
                                    <th>Comment</th>
                                </tr>
                                <?php
                                    $Course_code;
                                    $Course_name;
                                    $Credit_units;
                                    $instructor;
                                    $Grade;
                                    $Marks;
                                    $Comment;
                                    $que="select Course_code,Course_name,Credit_units,instructor, Marks,Grade,Comment from results where PRN_number='$PRN_number'";
                                    $run=mysqli_query($con,$que);
                                    while ($row=mysqli_fetch_array($run)) {
                                        echo    "<tr>";
                                        echo    "<td>".$row['Course_code']."</td>";
                                        echo    "<td>".$row['Course_name']."</td>";
                                        echo    "<td>".$row['Credit_units']."</td>";
                                        echo    "<td>".$row['instructor']."</td>";
                                        echo    "<td>".$row['Marks']."</td>";
                                         echo    "<td>".$row['Grade']."</td>";
                                        echo    "<td>".$row['Comment']."</td>";
                                        echo    "</tr>";
                                        }
                                ?>
                            </table>
                    </section>
                    </div>
                </div>
                </center>
            </div>
        </div>
        <br>
        <hr>
    <div class="container-fluid">
         <div class="row text-center">
        <img class="col-xl-4" src="../Images/ar.png" alt="" width="100" height="100">
            <img class="col-xl-4" src="../Images/dean.jpg" alt="" width="100" height="100">
           <img class="col-xl-4" src="../Images/vc.png" alt="" width="100" height="100">
        </div>
        <div class="row text-center font-weight-bold mb-5">
            <div class="col-xl-4">Academic Registrar</div>
            <div class="col-xl-4">HOD DCA Department</div>
            <div class="col-xl-4">Hon. Vice Chancellor</div>
        </div>
    </div>
</section>
</body>
</html>