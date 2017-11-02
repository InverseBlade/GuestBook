<!DOCTYPE html>
<?php
	session_start();
	if(isset($_SESSION['visitor'])){
		$UserName=$_SESSION['name'];
	}else{
		echo "First visiting?!";
	}
?>
<html>
<head>
	<title>GuestBook</title>
	<link rel='stylesheet' type='text/css' href='WebStyle.css'>
	<style>
	form span {
		color:red;
	}
	</style>
</head>

<?php
set_error_handler("customError");
$text_err="";
$text="";
if($_SERVER['REQUEST_METHOD']=="POST"){
	if($_POST['message']==""){
		$text_err="*";
	}else{
		$text=$_POST['message'];
	}
	if($text_err==""){
		$con = mysql_connect('localhost','root','acs977282') or die('Could not connect:'.mysql_error());
		mysql_query("set names 'utf8'",$con);
		
		if(!mysql_select_db('GuestBook',$con)){
			die("Couldn't select DataBase:".mysql_error());
		}
		$command="CREATE TABLE Message(id int NOT NULL AUTO_INCREMENT,
								       	     PRIMARY                               KEY(id),
								             UserName                       varchar(15),
								             Message                      varchar(1080),
									     Time                  DATETIME NOT NULL DEFAULT NOW()) default charset=utf8 ";
 		if(!mysql_query($command,$con)){
			;
		}
		$command="INSERT INTO Message(UserName,Message) VALUES('$UserName','$text')";
		if(!mysql_query($command,$con)){
			;
		}else{
			echo "<script language='JavaScript'>alert('Submit successfully!')</script>";
		}
	}
}
function customError($errno, $errstr)
 { 
 	//echo 'Error:'.$errno.$errstr;
 }
?>

<body style='margin:0 auto;'>
	<div class='header'>
		<h1>Welcome to GuestBook</h1>
	</div>
	
	<div class='guide'>
		<ul>
			<li>
				<a href="<?php echo $_SERVER['PHP_SELF'];?>">Write message</a>
			</li>
			<li>
				<a href="user_show.php">My Message</a>
			</li>
			<li>
				<a href="user_square">Square</a>
			</li>
			<li>
				<a href="escape.php">Sign out</a>
			</li>
		</ul>
	</div>
	
	<div style='text-align:center;height:711px;'>
		<h2 style='margin:0px;'>GuestBook</h2>
		<form accept-charset="UTF-8" action="<?php echo $_SERVER['PHP_SELF'];?>" method='post'>
			<fieldset style='width:550px;height:400px;padding:20px;text-align:center;margin:0 auto;border-width:5px;'>
				<legend>Dear <?php echo $UserName; ?>, please write your message.</legend>
				<div style='width:450px;margin:0 auto;text-align:left;'>
					<label for='message'><span><?php echo $text_err; ?></span>Your message(below 1000 words):</label>
					<textarea style='display:block;font-size:18px;' name='message' rows='15' cols='50'><?php echo $text; ?></textarea>
				</div></br>
				<input style='font-size:20px;' type='submit' value='submit'>
			</fieldset>
		</form>
	</div>

	<div class='footer'>
		<h3>Powered By Zewei Zhang</h3>
	</div>
</body>
</html>











