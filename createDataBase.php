<!DOCTYPE html>
<html>
<head>
	<title>Sign up</title>
	<link rel='stylesheet' type='text/css' href='webstyle.css'>
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
								       RealName                       varchar(15),
								       Email                               varchar(15),
								       QQ                                  varchar(15),
								       Hometown                     varchar(20),
								       Signature                        varchar(50)) default charset=utf8 ";
 		if(!mysql_query($command,$con)){
			;
		}
		$command="INSERT INTO User(UserName,Password,RealName,Email,QQ,Hometown,Signature)
		                                       VALUES('$_POST[UserName]','$_POST[Password]','$Name','$Email','$QQ','$Hometown','$Signature' )";
		if(!mysql_query($command,$con)){
			echo "gg deisga!";
		}
		echo "<script language='JavaScript'>alert('Sign up successfully!')</script>";
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
		<form action="<?php echo $_SERVER['PHP_SELF'];?>" method='post'>
				<table style='margin:0 auto;border-width:0px;' border='1' cellspacing='0' cellpadding='5px;'>
					<tr>
						<td><span>*</span>Username:</td><td colspan='3'><input type='text' name='UserName'></td>
					</tr>
					<tr>
						<td><span>*</span>Name:</td><td><input type='text' name='Name'></td><td>QQ:</td><td><input type='text' name='QQ'></td>
					</tr>
					<tr>
						<td>Email:</td><td><input type='text' name='Email'></td><td>From:</td><td><input type='text' name='Hometown'></td>
					</tr>
					<tr>
						<td><span>*</span>Signature:</td><td><textarea style='font-size:17px;' name='Signature' rows='6' cols='25'></textarea></td><td>Head img:</td><td><input type='radio' name='Himg' checked><input type='radio' name='Himg'></td>
					</tr>
					<tr>
						<td style='font-size:0px;padding:2' colspan='4'>&nbsp;</td>
					</tr>
					<tr>
						<td colspan='4'><input style='float:none;' type='submit' value='Sign up'></td>
					</tr>
				</table>
		</form>
	</div>
	
	<div class='footer'>
	<h3>Powered By Zewei Zhang</h3>
	</div>
</body>
</html>