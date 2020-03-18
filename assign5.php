<!DOCTYPE html>
<html>
	<head>
	    <title>Assignment 5</title>
	    <style type="text/css">
.content{
  align-items: center;
  position: absolute;
  right: 35%;
  width:30%;
  bottom: 0;
  background: rgba(0, 0, 0,0.6);
  color: white;
  padding: 10px;
  margin: 0px 0px 20px 850px;
}
body {
	background-image: url(fdform.jpg);
	background-repeat: no-repeat;
	background-attachment: fixed;
	background-position: center;
	background-size:cover;
}
.myVideo{
	 position: fixed;
 	 right: 0;
 	 bottom: 0;
 	 min-width: 100%; 
 	 min-height: 100%;
}
label{
	text-align: center;
	font-family: verdana ,monospace;
	text-align: center;
	padding: 0px 0px 0px 10px;
	font-size: 18px;
	letter-spacing: 2px;
	color: white;
}
input[type=text],input[type=Password] ,select{
  width: 100%;
  padding: 5px 00px;
  box-sizing: border-box;
  border: none;
 
  background: rgba(00, 00, 00, 0.3);
  color: white;
  font-family: georgia ,monospace;
  font-color: white;
  font-size: 22px;
}
option{
	background: rgba(00, 00, 00,3);
}
.headings{
	font-family: georgia ,monospace;
	margin-left: 20px;
	color:  #99e6ff;
}

.btn, button {
padding: 1em;
widows: 20%;
border-radius: 0.5em;
background:lightgrey ;
border: none;
font-weight: bold;
margin-left: 40%;
margin-top: 1.8em;
border-radius: 30px;
}
.col{
	border: 5px solid white;
	color: black;
	font-family: verdana;
}

.form{
	position: absolute;
	left: 38%;
	top: 1%;
}
</style>
</head>
<body>
    <div class="content">
    <fieldset class="col">
	<legend><h1><font color="white">R E G I S T R A T I O N</font></h1></legend>
	<div class="formdiv">
		<form  method="post">
			<table cellpadding="15px">
				<tr>
					<td>
						<label>FirstName: </label>
					</td>
					<td>
						<input type="text" id="fname" name="FirstName" data-placeholder="NAME" required ><br>
					</td>
				</tr>
				<tr>
					<td>
						<label>LastName: </label>
					</td>
					<td>
						<input type="text" id="lname" name="LastName" required ><br>
					</td>
				</tr>
				<tr>
					<td>	
						<label>Email: </label>
					</td>
					<td>
						<input type="text" id="maill" name="Email" required><br>
					</td>
				</tr>
                <tr>
					<td>
						<label>Password: </label>
					</td>
					<td>
						<input type="Password" id="pwd" name="pwd" data-placeholder="PASSWORD" required><br>
					</td>
				</tr>
				<tr>
					<td>
						<label>Country: </label>
					</td>
					<td>
					   <select id="country" name="Country" required>
					  
					   <option value="India">India</option>
					   <option value="United Kingdom">United Kingdom</option>
					   <option value="United Arab Erimates">United Arab Emirates</option>
					   <option value="United States of America">United States of America</option>
					</select>
					</td>
				</tr>

				<tr>
					<td>	
						<label>I am a : </label>
					</td>
					<td>
  						<input type="radio" id="Student" name="type" value="Student">
						<label for="Student">Student</label><br>
						<input type="radio" id="Faculty" name="type" value="Faculty">
						<label for="Faculty">Faculty</label><br>
						<input type="radio" id="Professional" name="type" value="Professional">
						<label for="Professional">Professional</label><br>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<input class="btn" type="submit" name="submit" value="Register">
					</td>		
				</tr>
			</table>
		</form>	
	</fieldset>
	</div>
</div>

</body>
</html>
<?php
$conn=mysqli_connect('localhost','root');
mysqli_select_db($conn,'student');

if(!$conn)
{
echo "Error in connection";
}
else
{
	if ($_SERVER["REQUEST_METHOD"]=="POST"){
		if (isset($_POST["FirstName"]) && isset($_POST["LastName"]) && isset($_POST["Email"]) && isset($_POST["Country"]) && isset($_POST["type"]) && isset($_POST["pwd"])){
			
			$fname=$_POST["FirstName"];
			$lname=$_POST["LastName"];
			$email=$_POST["Email"];
			$pwd=$_POST["pwd"];
			$country=$_POST["Country"];
			$work=$_POST["type"];

  			
			if($fname!=' ' && $lname!=' ' && $email!=' ' && $country!=' ' && $work!=' ' && $pwd!=' '){
			    $sql="INSERT INTO student(FirstName,LastName,Email,Country,type,pwd) values ('$fname','$lname','$email','$country','$work','$pwd')";
				$result=mysqli_query($conn,$sql);
				die;
				if(!$result){
					echo "<script>alert('Record inserted');document.location='assign5.php'</script>";
				}
			}
		}
		else
			echo"value not set";
	}
}
?>
