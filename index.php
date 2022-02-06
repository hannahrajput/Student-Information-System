

<html>
<head>
  <title>Home-Department of Computer Applications</title>
  <link rel="shortcut icon" href="./Images/msu.png" type="image/x-icon">
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/footer.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="icon" href="Images/msu.png" type="image/x-icon">
  <script type="text/javascript" src="bootstrap/js/jquery.min.js"></script>
  <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
  <!-- css style go to end here -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style>

#parent{ 
  display: flex; 
  height: 90%;
 
} 
.col{ 
  color: white; 
  padding: 10px; 
  flex: 50%; 
} 
.col:nth-child(2){ 
  background-color: #6E0BEC 
} 
</style>

<body>
  <!-- first division-->
<div id="parent"> 
  <div class="col">
    <img src="Images/msu.png" style="margin-left: 190px; margin-top: 100px;">
    <h5 style="color: red; text-align: center; margin-top: 50px; ">Department of Computer Applications</h5>
    <h6 style="color: black; text-align: center; ">Maharaja Sayajirao University of Baroda</h6>
    <p  style="color: black; text-align: center;">Student Information System</p>
  </div> 



<!-- Second division-->

  <div class="col">
     <div class="login-padding" style="text-align: center; margin-top: 150px;">
                <h2 class="text-center text-white"> Student Login</h2>
                <form class="p-1" action="Login/student_login.php" method="POST">
                    <div class="form-group">
                        <label><h6>Enter Your PRN:</h6></label>
                        <input type="text" name="PRN_number" placeholder="Enter PRN Number" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label><h6>Enter Password:</h6></label>
                        <input type="Password" name="Password" placeholder="Enter Password" class="form-control border-bottom" required>
                        <!-- <?php echo $message; ?> -->
                    </div>
                    <div class="form-group text-center mb-3 mt-4">
                        <input type="submit" name="btnlogins" value="LOGIN">
                    </div>
                </form>

                <a style="color: white;" href="adminindex.php">Switch to admin</a>
            </div>
  </div> 
</div> 
</body>
<footer><?php include('include/footer.php') ?></footer>
</html>
