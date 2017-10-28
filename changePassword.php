<!DOCTYPE html>
<html>
<head>
	<title>Rigister</title>
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
	set_error_handler("customError");
	$name_err=$oldpaswd_err=$paswd_err1=$paswd_err2="";
	if($_SERVER['REQUEST_METHOD']=='POST'){
		if($_POST['UserName']=="")
			$name_err='*';
		if($_POST['Password1']=="")
			$paswd_err1='*';
		if($_POST['Password2']=="")
			$paswd_err2='*';
		if($_POST['OldPassword']=="")
			$oldpaswd_err='*';
		if($name_err=="" && $paswd_err1==""&&$paswd_err2==""&&$oldpaswd_err==""){
			$con = mysql_connect("localhost","root","acs977282") or die('Could not connect:'.mysql_error());
		
			if(!mysql_select_db("GuestBook",$con)){
				die('Error selecting DataBase:'.mysql_error());
			}
			$command="SELECT * FROM User WHERE UserName='".$_POST['UserName']."' ";
			$result=mysql_query($command,$con);
			$row=mysql_fetch_array($result);
			if(!$row){
				echo "<script language='JavaScript'>alert('You haven\'t signed up yet!')</script>";
			}else{
				if($_POST['Password1']!=$_POST['Password2']){
					echo "<script language='Javascript'>alert('Two passwords are not same!')</script>";
				}else{
					if($row['Password']!=$_POST['OldPassword']){
						echo "<script language='Javascript'>alert('Your old password isn\'t correct!')</script>";
					}else{
						$command="UPDATE User SET Password='".$_POST['Password1']."' WHERE UserName='".$_POST['UserName']."'";
						if(!mysql_query($command,$con))
							echo "<script language='JavaScript'>alert('Failed to change password!')</script>";
						else
							echo "<script language='JavaScript'>alert('Change password successfully!')</script>";
					}
					}
				}
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
		<form accept-charset="UTF-8" action="<?php echo $_SERVER['PHP_SELF'];?>" method='post'>
			<h2>Change Password</h2>
			<fieldset style='width:260px;border-width:5px;padding:20px;margin:0px auto;'>
				<!--<legend>Input your sign in information</legend>-->
				<div style='width:260px;text-align:left;margin:0px auto;'>
					<label for='UserName'>Username:</label>
						<input type='text' name='UserName' style='margin-bottom:15px;'><span style='font-size:15px;'><?php echo $name_err;?></span>
					<label for='OldPassword'>
						Old password:
					</label>
						<input type='password' name='OldPassword' style='margin-bottom:15px;'><span style='font-size:15px;'><?php echo $oldpaswd_err;?></span>
					<label for='Password1'>
						New password:
					</label>
						<input type='password' name='Password1' style='margin-bottom:15px;'><span style='font-size:15px;'><?php echo $paswd_err1;?></span>
					<label for='Password2'>
						New password again:
					</label>
						<input type='password' name='Password2'><span style='font-size:15px;'><?php echo $paswd_err2;?></span>
				</div>
				<br/>
					<div style='text-align:center;'>
						<input type='submit' value='Submit'>
					</div>
			</fieldset>
			<h3><a style='text-decoration:none;color:#0366d6;' href='index1.php'>Sign in now</a></h3>
		</form>
	</div>
	
	<div class='footer'>
	<h3>Powered By Zewei Zhang</h3>
	</div>
</body>
</html>