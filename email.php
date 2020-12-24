<?php
include('server.php') ;

$d_id = $_REQUEST["d_id"];
$sem_id = $_REQUEST["sem_id"];

	$query = "SELECT * FROM subject 
			WHERE de_id = $d_id AND sem_id=$sem_id";
	$results = mysqli_query($conn, $query);
	
	$row = mysqli_fetch_assoc($results);
	$sub1=$row['sub_name'];
	$sub1_id=$row['sub_id'];
	
	$row = mysqli_fetch_assoc($results);
	$sub2=$row['sub_name'];
	$sub2_id=$row['sub_id'];
	
	$row = mysqli_fetch_assoc($results);
	$sub3=$row['sub_name'];
	$sub3_id=$row['sub_id'];
	
	$row = mysqli_fetch_assoc($results);
	$sub4=$row['sub_name'];
	$sub4_id=$row['sub_id'];
	
	$row = mysqli_fetch_assoc($results);
	$sub5=$row['sub_name'];
	$sub5_id=$row['sub_id'];
	
	$row = mysqli_fetch_assoc($results);
	$sub6=$row['sub_name'];
	$sub6_id=$row['sub_id'];
	
	$sub= $sub1.",".$sub2.",".$sub3.",".$sub4.",".$sub5.",".$sub6."!";
	$sub_id= $sub1_id.",".$sub2_id.",".$sub3_id.",".$sub4_id.",".$sub5_id.",".$sub6_id;
	
	$concat=$sub.$sub_id;
/*	
	
	$num =mysqli_num_rows($result);
*/	
	echo $concat;
	
/*	if($num!=0)
	{
		echo 1;
	}
	else
	{
		echo "0";
	} 
*/	
?>