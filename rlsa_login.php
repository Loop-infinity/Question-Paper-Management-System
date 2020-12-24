<?php
 include('server.php') ;

    $rlsa_id_Err="";
	$password_Err="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	$rlsa_id="";
	$password="";
	
	$count=0;

	if (isset($_POST['submit'])) {
		$rlsa_id = mysqli_real_escape_string($conn, $_POST['rlsa_id']);
		$password = mysqli_real_escape_string($conn, $_POST['password']);

		if (empty($rlsa_id)) {
			$rlsa_id_Err = "id is required";
			$count++;
		}
		if (empty($password)) {
			$password_Err = "password is required";
			$count++;
		}

		if ($count == 0) {
			//$password = md5($password);
			$query = "SELECT * FROM rlsa WHERE rlsa_id='$rlsa_id' AND password='$password'";
			$results = mysqli_query($conn, $query);

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['rlsa_id'] = $rlsa_id;
				$_SESSION['success'] = "You are now logged in";
				header('location: rlsa.php');
				
				
			}else {
				echo "Wrong username/password combination";
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
 
<!-- recaptcha --> 
<script src='https://www.google.com/recaptcha/api.js'></script> 
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
			<li><a href="Rlsa_login.php" >Rlsa</a></li>
			</div>
		</ul>
	</div>
	
	<form class="formEnter" action="rlsa_login.php" method="POST">
	
		<h2>Admin Login</h2>
		
		<label for="rlsa_id">Rlsa Id</label>	<br>
		<input type="text" id="rlsa_id" name="rlsa_id">  <!-- value="<?php echo  $rlsa_id?>"  -->
		<span class="error">* <?php echo $rlsa_id_Err;?></span> <br> 
		
		<label for="password">Password</label>	<br>
		<input type="text" id="password" name="password">  <!-- value="<?php echo  $rlsa_password?>"  -->
		<span class="error">* <?php echo $password_Err;?></span> <br> 
		
	<div style="text-align: center;">	
		<input id="submit" type="submit" name="submit" value="Submit">
	</div>	
	</form>
	
	
<script>
function emailExists()
{
	var x = document.getElementById("email");
	var y = document.getElementById("er");
	
	btn = document.getElementById("submit");
	
	var email = x.value;
	
	xhttp = new XMLHttpRequest();
	
	xhttp.onreadystatechange = function() 
	{
		if (this.readyState == 4 && this.status == 200)
		{
			if(this.response==1)
			{
				y.innerHTML = "Email already exists";
				btn.disabled = true;
			}
			else
			{
				y.innerHTML = "";
				btn.disabled = false;
			}
			
				
			
		}
	};
	
	 xhttp.open("GET", "email.php?email="+email, true);
	 xhttp.send();
}
function ssc() {
    var x = document.getElementById("sscmarks");
	var y = document.getElementById("sper");
	
	var sm= x.value;
	var sp = (sm/600)*100;
  //  var hsscper = (hsscmarks/600)*100;	
	
	sp = sp.toFixed(2);	
    y.value = sp;

}
function hssc() {
    var x = document.getElementById("hsscmarks");
	var y = document.getElementById("hper");
	
	var hm= x.value;
	var hp = (hm/600)*100;
  //  var hsscper = (hsscmarks/600)*100;	
	
	hp = hp.toFixed(2);
    y.value = hp;
	
}
function createNewContact()
{
	var inp = document.createElement('input');
	inp.type = 'text';
	inp.setAttribute("name","contactno[]");
	
	var c = document.getElementById('addContact');
	
	c.appendChild(inp);
	
	xhttp = new XMLHttpRequest();
	
	xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    //  document.getElementById("txtHint").innerHTML = this.responseText;
    }
  };
  var t = document.getElementsByName("contactno[]");
  var len = t.length;
  
  alert(len);
  xhttp.open("GET", "newcontact.php?len="+(len-1), true);
  xhttp.send();  
}

</script>


</body>

</html>