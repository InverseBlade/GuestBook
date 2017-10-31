<!DOCTYPE html>
<html>
<head>
	<title>Sign up</title>
	<link rel='stylesheet' type='text/css' href='webstyle1.css'>
	<style>
	input {
		float:left;
		font-size:19px;
	}
	form span {
		color:red;
	}
	</style>
</head>

<?php
$UserName=$Password=$RealName=$Email=$QQ=$Hometown=$Signature="";
set_error_handler("customError");
if($_SERVER['REQUEST_METHOD']=="POST"){
	if($_POST['UserName']!="")
		$UserName=$_POST['UserName'];
	if($_POST['Password']!="")
		$Password=$_POST['Password'];
	if($_POST['Name']!="")
		$RealName=$_POST['Name'];
	if($_POST['Email']!="")
		$Email=$_POST['Email'];
	if($_POST['QQ']!="")
		$QQ=$_POST['QQ'];
	if($_POST['Hometown']!="")
		$Hometown=$_POST['Hometown'];
	if($_POST['Signature']!="")
		$Signature=$_POST['Signature'];
	if($UserName!=""&&$Password!=""&&$Signature!=""){
		$con = mysql_connect('localhost','root','acs977282') or die('Could not connect:'.mysql_error());
		mysql_query("set names 'utf8'",$con);
		
		if(!mysql_select_db('GuestBook',$con)){
			if(!mysql_query("CREATE DATABASE GuestBook default character set utf8",$con))
				die('Error creating database:'.mysql_error());
			else
				mysql_select_db('GuestBook',$con);
		}
		$command="CREATE TABLE User(id int NOT NULL AUTO_INCREMENT,
								       PRIMARY                               KEY(id),
								       UserName                       varchar(15),
								       Password                         varchar(15),
								       RealName                       varchar(25),
								       Email                               varchar(25),
								       QQ                                  varchar(15),
								       Hometown                     varchar(20),
								       Signature                        varchar(50)) default charset=utf8 ";
 		if(!mysql_query($command,$con)){
			;
		}
		$result=mysql_query("SELECT * FROM User WHERE UserName='$UserName' ",$con);
		$row=mysql_fetch_row($result);
		if(!$row){
			$command="INSERT INTO User(UserName,Password,RealName,Email,QQ,Hometown,Signature)
		                                                    VALUES('$UserName','$Password','$RealName','$Email','$QQ','$Hometown','$Signature' )";
			if(!mysql_query($command,$con)){
				die("Failed to sign up!");
			}else{
				echo "<script language='JavaScript'>alert('Sign up successfully!')</script>";
			}
		}else{
			echo "<script language='JavaScript'>alert('User exits already!')</script>";
		}
	}else{
		echo "<script language='JavaScript'>alert('Item with * is required!')</script>";
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

	<div style='text-align:center;height:762px;padding:10px;font-size:17px;'>
		<h2>Sign up to GuestBook</h2><br/>
		<form accept-charset="UTF-8" action="<?php echo $_SERVER['PHP_SELF'];?>" method='post'>
				<table style='margin:0 auto;border-width:0px;' border='1' cellspacing='0' cellpadding='5px;'>
					<tr>
						<td><span>*</span>Username:</td><td colspan='3'><input type='text' name='UserName' value='<?php echo $UserName; ?>'></td>
					</tr>
					<tr><td><span>*</span>Password:</td><td colspan='3'><input type='password' name='Password'></td></tr>
					<tr>
						<td><span>*</span>Name:</td><td><input type='text' name='Name' value='<?php echo $RealName;?>'></td><td>QQ:</td><td><input type='text' name='QQ' value='<?php echo $QQ;?>'></td>
					</tr>
					<tr>
						<td>Email:</td><td><input type='text' name='Email' value='<?php echo $Email;?>'></td><td>From:</td><td><input type='text' name='Hometown' value='<?php echo $Hometown;?>'></td>
					</tr>
					<tr>
						<td><span>*</span>Signature:</td><td><textarea style='font-size:17px;' name='Signature' rows='6' cols='25'><?php echo $Signature; ?></textarea></td><td>Head img:</td><td><input type='radio' name='Himg' checked><input type='radio' name='Himg'></td>
					</tr>
					<tr>
						<td style='font-size:0px;padding:2' colspan='4'>&nbsp;</td>
					</tr>
					<tr>
						<td colspan='4'><input style='float:none;' type='submit' value='Sign up'></td>
					</tr>
				</table>
		</form>
		<h3><a style='text-decoration:none;color:#0366d6;' href='index.php'>Click me to sign in</a></h3>
	</div>
	
	<div class='footer'>
	<h3>Powered By Zewei Zhang</h3>
	</div>
</body>
</html>