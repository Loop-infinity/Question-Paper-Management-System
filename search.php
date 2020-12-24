<?php
include('server.php') ;
$s_id="";
$d_id="";
$sem_id="";
$sub_id="";
$sub_name="";
$flag=0;

$search_result="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
		


$d_id = mysqli_real_escape_string($conn, $_POST['d_id']);;
$sem_id=mysqli_real_escape_string($conn, $_POST['sem_id']);;
$sub_id=mysqli_real_escape_string($conn, $_POST['sub_id']);;


	$count=0;
	$result="";
	if (isset($_POST['submit'])) {
		//$s_id = mysqli_real_escape_string($conn, $_POST['s_id']);
		

	/*	if (empty($s_id)) {
			$s_id_Err = "Roll No is required";
			$count++;
		}
		*/
		

	$query = "SELECT * FROM subject 
			WHERE de_id = $d_id AND sem_id=$sem_id";
	$results = mysqli_query($conn, $query);

		if ($count == 0) {
			//$password = md5($password);
			$query = "SELECT * FROM qp WHERE d_id='$d_id' AND sem_id='$sem_id' AND sub_id='$sub_id'  ";
			$results = mysqli_query($conn, $query);
			
//qp found		
			if (mysqli_num_rows($results) >= 1)
			{
				$row = mysqli_fetch_assoc($results);
				$qp_id= $row['qp_id'];
				
				$query = "SELECT sub_name FROM subject WHERE sub_id='$sub_id' ";
				$results = mysqli_query($conn, $query);
				
				$row = mysqli_fetch_assoc($results);
				$sub_name= $row['sub_name'];
				
				$search_result="";
				
				$flag=1;
				
				$query = "SELECT d_name FROM department WHERE d_id='$d_id' ";
				$results = mysqli_query($conn, $query);
				
				$row = mysqli_fetch_assoc($results);
				$d_name= $row['d_name'];
			
			}
			else
			{
				$flag=0;
				$search_result="Question Paper Not Found";
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
	
	
	

<br><br>
<?php 
if($flag==1)
{	?>
<table>
<tr>
    <th>SUBJECT</th>
	<th>SEMESTER</th>
	<th>DEPARTMENT</th>
	<th>PREVIEW</th>
  </tr>

  <tr>
    <th><?php echo $sub_name; ?></th>
	<th><?php echo $sem_id; ?></th>
	<th><?php echo $d_name; ?></th>
    <td>
		<a href="Download_qp/<?php echo $qp_id?>.pdf">View</a>
		
	</td>
  </tr>
  
 
</table>
<?php 
}
else
{
	echo "Question Paper Not Found";
}

?>	
<script>

</script>


</body>

</html>