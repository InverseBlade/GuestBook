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
	if($_POST['userName']=="")
		$name_err='*'.'Name is required';
	if($_POST['password']=="")
		$paswd_err='*'.'Password is required';
	if($name_err=="" && $paswd_err==""){
		echo "<script language='JavaScript'>alert('Sign in successfully!')</script>";
		echo "<body>
	<div class='header'>
		<h1>Welcome to GuestBook</h1>
	</div>

	<div style='text-align:center;height:755px;padding:10px;font-size:17px;'>
		<h2 style='text-align:center'>Sign in to GuestBook</h2><br/>
		
	</div>
	
	<div class='footer'>
	<h3>Powered By Zewei Zhang</h3>
	</div>
</body>";
                die();
	}
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

	<div style='text-align:center;height:755px;padding:10px;font-size:17px;'>
		<h2 style='text-align:center'>Sign in to GuestBook</h2><br/>
		<form style='text-align:center;' action="<?php echo $_SERVER['PHP_SELF'];?>" method='post'>
			<fieldset style='width:500px;margin:0px auto;'>
				<!--<legend>Input your sign in information</legend>-->
				<div style='width:175px;text-align:left;margin:0px auto;'>
					<p style='margin-bottom:7px;'>Username:</p>
						<input type='text' name='userName'><span style='font-size:15px;'><?php echo $name_err;?></span>
					<p style='margin-bottom:7px;'>Password:</p>
						<input type='password' name='password'><span style='font-size:15px;'><?php echo $paswd_err;?></span>
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