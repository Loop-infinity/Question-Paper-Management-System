<?php
include('server.php') ;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
$s_id="";

	$count=0;
	$result="";
	if (isset($_POST['submit'])) {
		//$s_id = mysqli_real_escape_string($conn, $_POST['s_id']);
		$paper_code=mysqli_real_escape_string($conn, $_POST['paper_code']);
	//	$qp_date=mysqli_real_escape_string($conn, $_POST['qp_date']);
		$d_id=mysqli_real_escape_string($conn, $_POST['d_id']);
		$sem_id=mysqli_real_escape_string($conn, $_POST['sem_id']);
		$sub_id=mysqli_real_escape_string($conn, $_POST['sub_id']);
		$c_id=mysqli_real_escape_string($conn, $_POST['c_id']);

	

		if ($count == 0) {
			//$password = md5($password);
			
			
			$qp = $_FILES['qp']['name'];
							//insert data in db conn
							
					//		$contactno = $_POST['contactno'];
						$query = "INSERT INTO qp (rlsa_id, paper_code, qp_date, d_id, sem_id, sub_id, c_id)
						VALUES (1,$paper_code,'2018-11-04',$d_id,$sem_id,$sub_id,$c_id)";
			
							if (mysqli_query($conn, $query)) 
							{
								echo "New record created successfully";	
							} 
							else 
							{
								echo "Error: " . $query . "<br>" . mysqli_error($conn);
							}
							
						//uploading paper
						
						$query = "SELECT qp_id FROM qp ORDER BY qp_id DESC";
						$results = mysqli_query($conn, $query);
						$row = mysqli_fetch_assoc($results);
						
						$qp_id= $row['qp_id'];
						
							$target = "Download_qp/".basename($qp_id.".pdf");	

						if (move_uploaded_file($_FILES['qp']['tmp_name'], $target))
						{
							echo "Image uploaded successfully";
						}
						else
						{
							echo "Failed to upload image";
						} 
		//	$query = "";
		//	$results = mysqli_query($conn, $query);


		//	$row = mysqli_fetch_assoc($results);

		//	echo $row['paper_code'];
			
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
	
	<form class="formEnter" action="rlsa_upload.php" method="POST" enctype="multipart/form-data">
		
		<h2>Upload QP</h2>
		
		<label>Course  :  </label>
		<select id="course" name="c_id">
		  <option value=""></option>
		  <option value="1">2007-08</option>
		  <option value="2">2016-17</option>
		</select>
		<br><br>

		<label>Department  :  </label>
		<select id="department" name="d_id" onchange="update()" >
		  <option value=""></option>
		  <option value="1">Computer Science</option>
		  <option value="2">Mechanical Engineering</option>
		  <option value="3">Civil Engineering</option>
		  <option value="4">Mining</option>
		  <option value="5">IT</option>
		  <option value="6">Mechanical</option>
		</select>
		<br><br>
		
		<label>Sem  :  </label>
		<select id="semester" name="sem_id" onchange="update()">
		  <option value="1"></option>
		  <option value="1">I</option>
		  <option value="2">II</option>
		  <option value="3">III</option>
		  <option value="4">IV</option>
		  <option value="5">V</option>
		  <option value="6">VI</option>
		  <option value="7">VII</option>
		  <option value="8">VIII</option>
		</select>
		<br><br>
		
		<label>Subject  :  </label>
		<select id ="subject" name="sub_id" >
		  <option value=""></option>
		  <option id="sub1" value="1">1</option><?php// echo "$sub1"; ?>
		  <option id="sub2" value="2">2</option>
		  <option id="sub3" value="3">3</option>
		  <option id="sub4" value="4">4</option>
		  <option id="sub5" value="5">5</option>
		  <option id="sub6" value="6">6</option>
		</select>
		
		<br><br>
		
		<label> Year :  </label>
		<select name="year" >
		  <option value=""></option>
		  <option value="1">2016</option>
		  <option value="2">2017</option>
		  <option value="3">2018</option>
		</select>
		<br><br>
		
		<label> Paper Code :  </label>
		<input type="text" name="paper_code">
		
		<input type="file" name="qp">
		
		<div style="text-align: center;">	
		<input id="submit" type="submit" name="submit" value="Submit">
	</div>	
		
	</form>

	<?php 



	?>
	
	
<script>

var sub1 =document.getElementById("sub1"); sub1.style.display="none";
var sub2 =document.getElementById("sub2"); sub2.style.display="none";
var sub3 =document.getElementById("sub3"); sub3.style.display="none";
var sub4 =document.getElementById("sub4"); sub4.style.display="none";
var sub5 =document.getElementById("sub5"); sub5.style.display="none";
var sub6 =document.getElementById("sub6"); sub6.style.display="none";

function update()
{
	
	var x =document.getElementById("department"); 
	var y =document.getElementById("subject");
	var z =document.getElementById("semester");
	
	var sub1 =document.getElementById("sub1"); sub1.style.display="block";
	var sub2 =document.getElementById("sub2"); sub2.style.display="block";
	var sub3 =document.getElementById("sub3"); sub3.style.display="block";
	var sub4 =document.getElementById("sub4"); sub4.style.display="block";
	var sub5 =document.getElementById("sub5"); sub5.style.display="block";
	var sub6 =document.getElementById("sub6"); sub6.style.display="block";
	
	var d_id= x.value;
	var sem_id= z.value;
	
    
	
	

	xhttp = new XMLHttpRequest();
	
	xhttp.onreadystatechange = function() 
	{
		if (this.readyState == 4 && this.status == 200)
		{
			
				var res=this.response;
				var s=res.split("!");
				var s1 = s[0];
				var s2 = s[1];
				 
				s3=s1.split(",");
				s4=s2.split(",");
				
				//storing subject names in textbox content
					sub1.innerHTML=s3[0];
					sub2.innerHTML=s3[1];
					sub3.innerHTML=s3[2];
					sub4.innerHTML=s3[3];
					sub5.innerHTML=s3[4];
					sub6.innerHTML=s3[5];
				//storing subject ids in textbox values	
					sub1.value=s4[0];
					sub2.value=s4[1];
					sub3.value=s4[2];
					sub4.value=s4[3];
					sub5.value=s4[4];
					sub6.value=s4[5];
				/*  var option = document.createElement("option");
					option.text = s[i];
					x.add(option, x[0]); */
				
				
			
		}
	};
	
	 xhttp.open("GET", "email.php?d_id="+d_id+"&sem_id="+sem_id, true);
	 xhttp.send();
/*
*/
}

</script>


</body>

</html>