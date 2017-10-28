<!DOCTYPE html>
<html>
<head>
	<title>Rigister</title>
	<link rel='stylesheet' type='text/css' href='webstyle.css'>
	<style>
	form span {
		color:red;
	}
	</style>
</head>

<?php
$name_err=$sex_err=$paswd_err=$job_err="";
set_error_handler("customError");
if($_SERVER['REQUEST_METHOD']=="POST"){
	if($_POST['username']=='admin' || $_POST['username']=="")
		$name_err="Name is required";
	if(!isset($_POST['sex']) || $_POST['sex']=="")
		$sex_err="Gender is required";
	if($_POST['password']=='*****' || $_POST['password']=="")
		$paswd_err="Password is required";
	if($_POST['job']=="")
		$job_err="JOb is required";
	if($name_err=="" && $sex_err=="" && 
		$paswd_err=="" && $job_err==""){
		$con = mysql_connect("localhost","root","acs977282") or die('Could not connect:'.mysql_error());
		mysql_query("set names 'utf8'",$con);
	
		if(!mysql_select_db('my_db',$con)){
			if(!mysql_query("CREATE DATABASE my_db default character set utf8",$con))
				die('Error creating database:'.mysql_error());
			else{
				mysql_select_db('my_db',$con);
			}
		}	
		$command="CREATE TABLE Member(MemberID int NOT NULL AUTO_INCREMENT,
									  PRIMARY KEY(MemberID),
									  Username  varchar(15),
									  Sex       varchar(15),
									  Password  varchar(15),
									  Country   varchar(15),
									  Job       varchar(15),
									  Signature varchar(100)) default charset=utf8 ";
		if(!mysql_query($command,$con)){
			
		}
		$command="INSERT INTO Member(Username,Sex,Password,Country,Job,Signature)
				  VALUES('$_POST[username]','$_POST[sex]','$_POST[password]','$_POST[country]',
				  		'$_POST[job]','$_POST[signature]')";
		if (!mysql_query($command,$con)){
			//die('Error: ' . mysql_error());
		}
		echo "<script language='JavaScript'>alert('Submit Successfully!')</script>";
		mysql_close($con);
	}
}
function customError($errno, $errstr)
 { 
 	//echo 'Error:'.$errno.$errstr;
 }
?>
<body>
	<div class='header'>
		<h1>Welcome to register</h1>
	</div>
	
	<div class='nav'>
		<ul class='guide'>
			<li>
				<a href=''>Login</a>
			</li>
			<li>
				<a href='index.php'>Register</a>
			</li>
			<li>
				<a href=''>My Diary</a>
			</li>
			<li>
				<a href=''>Comments</a>
			</li>
			<li>
				<a href='showDataBase.php'>Show Members</a>
			</li>
		</ul>
	</div>
	
	<div class='section'></div>
	<div class='section'>
		<h2 style='text-align:center'>Get your own e-diary right now!</h2><br/>
		<form action="<?php echo $_SERVER['PHP_SELF'];?>" method='post'>
			<fieldset>
				<legend>Personal information</legend>
				<p style='font-size:15px;color:red;'>*required item</p>
					Username:<br/>
						<input type='text' name='username' value='admin'><span>*<?php echo $name_err;?></span>
					<br/><br/>Sex:<br/>
						<input style='margin-right:0;padding:0;' type='radio' name='sex' id='male' value='male'>
						<label for='male'>Male</label>
						<input style='margin-left:15px;margin-right:0;padding:0;' type='radio' name='sex' id='female' value='female'>
						<label for='female'>Female</label> <span>*<?php echo $sex_err;?></span>
					<br/><br/>Password:<br/>
						<input type='password' name='password' value='*****'><span>*<?php echo $paswd_err;?></span>
					<br/><br/>
					<div style='width:100px;float:left;'>
					Country:<br/>
					<input list='datalist' name='country'>
					<datalist id='datalist'>
						<option value='China'>
						<option value='USA'>
						<option value='UK'>
						<option value='Japan'>
						<option value='Taiwan'>
					</datalist>
					</div>
					<div style='width:100px;float:left;padding:10px;'></div>
					<div style='width:100px;float:left;'>
					Job:<br/>
					<select name='job'>
						<option value='driver'>Driver</option>
						<option value='writer'>Writer</option>
						<option value='singer'>Singer</option>
						<option value='student'>Student</option>
						<option value='designer'>Designer</option>
					</select><span>*<?php echo $job_err;?></span>
					</div>
					<br/><br/><br/>Personalized signature:<br/>
						<textarea name='signature' rows='4' cols='40'>I am a SB, haha.</textarea>
					<br/><br/><input type='submit' value='submit'>
			</fieldset>
		</form>
	</div>
	
	<div class='footer'>
	<h3>Thanks for your coming!</h3>
	</div>
</body>
</html>