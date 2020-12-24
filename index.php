

<html>
<head>
<title>Student Admission</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="styles.css">
 
<!-- recaptcha --> 

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