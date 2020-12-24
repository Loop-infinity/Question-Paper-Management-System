<?php

 include('server.php') ;

$s_id_Err="";

	
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
$s_id="";

	$count=0;

	if (isset($_POST['submit'])) {
		$s_id = mysqli_real_escape_string($conn, $_POST['s_id']);
		

		if (empty($s_id)) {
			$s_id_Err = "Roll No is required";
			$count++;
		}
		

		if ($count == 0) {
			//$password = md5($password);
			$query = "SELECT * FROM student WHERE s_id='$s_id'";
			$results = mysqli_query($conn, $query);

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['s_id'] = $s_id;
				$_SESSION['success'] = "You are now logged in";
				header('location: student.php');
				
				
			}else {
				echo "Roll no doesnt exist";
			}
		}
	}
	
	

  
   
}//post

?>

<html>
<head>
<title>Student Admission</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="styles.css">
 
</head>

<body>

<!--	<h1>STUDENT ADMISSION FORM </h1> -->
	
	<div id="navBar">
		<ul>
			<div id="gg">
			<li><a href="index.php" >Home</a></li>
			<li><a href="student_login.php">Student</a></li>
			<li><a href="student.php">Teacher</a></li>
			<li><a href="student.php">Rls</a></li>
			<li><a href="rlsa_login.php" >Rlsa</a></li>
			</div>
		</ul>
	</div>
	
	<form class="formEnter" action="student_login.php?" method="POST">
		
		<h2>Student Login</h2>
		
		<label for="">Roll No: </label>	<br>
		<input type="text" id="s_id" name="s_id">  <!-- value="<?php echo  $st_id?>"  -->
		<span class="error">* <?php echo $s_id_Err;?></span> <br>
		
		<div style="text-align: center;">	
		<input id="submit" type="submit" name="submit" value="Submit">
	</div>	
	</form>
	
	
<script>


</script>


</body>

</html>