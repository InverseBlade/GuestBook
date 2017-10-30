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
$delete="";
if($_SERVER['REQUEST_METHOD']=="POST"){
	$id=$_POST['id'];
	$delete=$_POST['delete'];
	$con = mysql_connect('localhost','root','acs977282') or die('Could not connect:'.mysql_error());
	mysql_query("set names 'utf8'",$con);
		
	if(!mysql_select_db('GuestBook',$con)){
		die("Couldn't select DataBase:".mysql_error());
	}
	if($delete=="yes"){
		$command="DELETE FROM Message WHERE id='".$id."' ";
		if(!mysql_query($command,$con)){
			;
		}else{
			echo "<script language='JavaScript'>alert('Delete successfully!')</script>";
		}
	}else{
		$command="UPDATE Message SET Message='".$_POST['message']."' WHERE id='".$id."' ";
		if(!mysql_query($command,$con)){
			echo "<script language='JavaScript'>alert('Failed to rewrite!')</script>";
		}else{
			echo "<script language='JavaScript'>alert('Rewrite successfully!')</script>";
		}
	}
	mysql_close($con);
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
				<a href="user_write.php">Write message</a>
			</li>
			<li>
				<a href="<?php echo $_SERVER['PHP_SELF'];?>">My Message</a>
			</li>
			<li>
				<a href="escape.php">Sign out</a>
			</li>
		</ul>
	</div>
	
	<div style='text-align:center;'>
		<h2 style='margin:5px;'>GuestBook</h2>
		<?php
			$con = mysql_connect('localhost','root','acs977282') or die('Could not connect:'.mysql_error());
			mysql_query("set names 'utf8'",$con);
		
			if(!mysql_select_db('GuestBook',$con)){
				die("Couldn't select DataBase:".mysql_error());
			}
			$command="SELECT * FROM Message WHERE UserName='$UserName'";
			$result=mysql_query($command,$con);
			$row=mysql_fetch_array($result);
			if(!$row){
				echo "<p>You don't have left an message at all.</p>";
			}else{
				$i=0;
				do{
					echo "<form accept-charset='UTF-8' action=\"".$_SERVER['PHP_SELF']."\" method='post'>
						  	<fieldset style='width:550px;height:360px;padding:10px;text-align:center;margin:0 auto;margin-bottom:15px;border-width:5px;'>
								<legend>Dear ".$UserName.", you can rewrite your message here.</legend>
								<div style='width:550px;margin:0 auto;text-align:left;'>
									<label for='message'>Your message(below 1000 words):</label><span style='font-size:13px;margin-left:90px;color:black;'>Write at :".$row['time']."</span>
									<textarea style='display:block;font-size:20px;' name='message' rows='10' cols='50'>".$row['Message']."</textarea>
								</div></br>
								<input type='hidden' name='id' value='".$row['id']."'> 
								<input type='radio' id='$i' name='delete' value='yes'><label for='$i'>Delete this message</label>&nbsp;&nbsp;";
					$i++;
					echo			"<input style='margin-left:50px;' type='radio' id='$i' name='delete' value='no' checked><label for='$i'>Don't delete</label>
								<br/>
								<input style='margin-top:15px;font-size:20px;' type='submit' value='Rewrite'>
							</fieldset>
						</form>";
					$i++;
				}while($row=mysql_fetch_array($result));
			}
		?>
	</div>
	
	<div class='footer'>
		<h3>Powered By Zewei Zhang</h3>
	</div>
</body>
</html>











