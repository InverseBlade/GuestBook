<!DOCTYPE html>
<html>
<head>
	<title>Sign in</title>
	<link rel='stylesheet' type='text/css' href='webstyle1.css'>
	<style>
	form span {
		color:red;
	}
	label {
		font-size:15px;
	}
	input {
		margin-top:8px;
		font-size:19px;
	}
	</style>
</head>

<?php
$name_err=$paswd_err="";
set_error_handler("customError");
if($_SERVER['REQUEST_METHOD']=="POST"){
	if($_POST['UserName']=="")
		$name_err='*'.'Name is required';
	if($_POST['Password']=="")
		$paswd_err='*'.'Password is required';
	if($name_err=="" && $paswd_err==""){
		$con = mysql_connect("localhost","root","acs977282") or die('Could not connect:'.mysql_error());
		
		if(!mysql_select_db("GuestBook",$con)){
			die('Error selecting DataBase:'.mysql_error());
		}
		$command="SELECT * FROM User WHERE UserName='".$_POST['UserName']."' ";
		if(!($result=mysql_query($command,$con))){
			echo $row['UserName']."     ".$row['Password'];
			echo "<script language='JavaScript'>alert('Username or Password is wrong!')</script>";
		}else{
			$row=mysql_fetch_array($result);
			if($row['Password']!=$_POST['Password']){
				echo $row['UserName']."     ".$row['Password'];
				echo "<script language='JavaScript'>alert('Username or Password is wrong!')</script>";
			}else{
				echo "<script language='JavaScript'>alert('Sign in successfully!')</script>";
			}
		}	
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
		<h2>Sign in to GuestBook</h2><br/>
		<form accept-charset="UTF-8" action="<?php echo $_SERVER['PHP_SELF'];?>" method='post'>
			<fieldset style='width:250px;border-width:5px;padding:20px;margin:0px auto;'>
				<!--<legend>Input your sign in information</legend>-->
				<div style='width:250px;text-align:left;margin:0px auto;'>
					<label for='UserName'>Username:</label>
						<input type='text' name='UserName' style='margin-bottom:15px;'><span style='font-size:15px;'><?php echo $name_err;?></span>
					<label for='Password'>
						Password:
						<a class='guide' style='color:blue;font-size:10px;margin-left:67px;text-decoration:none;' href='./changePassword.php'>Change password</a>
					</label>
						<input type='password' name='Password'><span style='font-size:15px;'><?php echo $paswd_err;?></span>
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