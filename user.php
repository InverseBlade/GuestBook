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
$name_err=$paswd_err="";
set_error_handler("customError");
if($_SERVER['REQUEST_METHOD']=="POST"){
	
}
function customError($errno, $errstr)
 { 
 	//echo 'Error:'.$errno.$errstr;
 }
?>

<body>
	<div class='header'>
		<h1>Welcome to GuestBook</h1>
	</div>
	
	<div class='nav'>
		<ul class='guide'>
			<li>
				<a href="<?php echo $_SERVER['PHP_SELF'];?>">Sign in</a>
			</li>
			<li>
				<a href="">Register</a>
			</li>
		</ul>
	</div>
	
	<div class='section'></div>
	<div class='section'>
		<h2 style='text-align:center'>Sign in to GuestBook</h2><br/>
		<form style='text-align:center;' action="<?php echo $_SERVER['PHP_SELF'];?>" method='post'>
			<fieldset>
				<!--<legend>Input your sign in information</legend>-->
				<div style='width:200px;text-align:left;margin-left:145px;'>
					<p style='margin-bottom:7px;'>Username:</p>
						<input type='text' name='userName'><span><?php echo $name_err;?></span>
					<p style='margin-bottom:7px;'>Password:</p>
						<input type='password' name='password'><span><?php echo $paswd_err;?></span>
				</div>
				<br/>
					<div style='text-align:center;'>
						<input type='submit' value='Sign in'>
					</div>
			</fieldset>
		</form>
	</div>
	
	<div class='footer'>
	<h3>Powered By Zewei Zhang</h3>
	</div>
</body>
</html>