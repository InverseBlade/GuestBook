<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
<?php
$name_err=$paswd_err="";
$name=$paswd="";
set_error_handler("customError");
if($_SERVER['REQUEST_METHOD']=="POST"){
	if($_POST['UserName']==""){
		$name_err='*'.'Name is required';
	}else{
		$name=$_POST['UserName'];
	}
	if($_POST['Password']==""){
		$paswd_err='*'.'Password is required';
	}else{
		$paswd=$_POST['Password'];
	}	
	if($name_err=="" && $paswd_err==""){
		$con = mysql_connect("localhost","root","acs977282") or die('Could not connect:'.mysql_error());
		
		if(!mysql_select_db("GuestBook",$con)){
			die('Error selecting DataBase:'.mysql_error());
		}
		$command="SELECT * FROM User WHERE UserName='".$_POST['UserName']."' ";
		if(!($result=mysql_query($command,$con))){
			echo "<script language='JavaScript'>alert('Username or Password is wrong!')</script>";
		}else{
			$row=mysql_fetch_array($result);
			if($row['Password']!=$_POST['Password']){
				echo "<script language='JavaScript'>alert('Username or Password is wrong!')</script>";
			}else{
				//echo "<script language='JavaScript'>alert('Sign in successfully!')</script>";
				$_SESSION['name']=$name;	
				if($name=='admin'){
					$_SESSION['visitor']="Admin";
					echo "<meta http-equiv='refresh' content='0;url=admin_delete_message.php'>
				           </head><body></body></html>" ;
				}else{
					$_SESSION['visitor']="User";
					echo "<meta http-equiv='refresh' content='0;url=user_write.php'>
				           </head><body></body></html>" ;
				}
				die();
			}
		}	
	}
}
function customError($errno, $errstr)
 { 
 	//echo 'Error:'.$errno.$errstr;
 }
?>
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

<body style='margin:0 auto;'>
	<div class='header'>
		<h1>Welcome to GuestBook</h1>
	</div>

	<div style='text-align:center;height:762px;padding:10px;font-size:17px;'>
		<h2>Sign in to GuestBook</h2><br/>
		<form accept-charset="UTF-8" action="<?php echo $_SERVER['PHP_SELF'];?>" method='post'>
			<fieldset style='width:250px;border-width:5px;padding:20px;margin:0px auto;'>
				<!--<legend>Input your sign in information</legend>-->
				<div style='width:250px;text-align:left;margin:0px auto;'>
					<label for='UserName'>Username:</label>
						<input type='text' name='UserName' style='margin-bottom:15px;' value="<?php echo $name; ?>"><span style='font-size:15px;'><?php echo $name_err;?></span>
					<label for='Password'>
						Password:
						<a style='color:blue;font-size:10px;margin-left:67px;text-decoration:none;' href='./changePassword.php'>Change password</a>
					</label>
						<input type='password' name='Password'><span style='font-size:15px;' value=""><?php echo $paswd_err;?></span>
				</div>
				<br/>
					<div style='text-align:center;'>
						<input type='submit' value='Sign in'>
					</div>
			</fieldset>
			<h3><a style='text-decoration:none;color:#0366d6;' href='createDataBase.php'>Click me to sign up</a></h3>
		</form>
	</div>
	
	<div class='footer'>
	<h3>Powered By Zewei Zhang</h3>
	</div>
</body>
</html>