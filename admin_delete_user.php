<!DOCTYPE html>
<?php
	set_error_handler("customError");
	session_start();
	if(isset($_SESSION['visitor'])&&$_SESSION['visitor']=='Admin'){
		$UserName=$_SESSION['name'];
	}else{
		echo "First visiting?!";
		die();
	}
	$con = mysql_connect('localhost','root','acs977282') or die('Could not connect:'.mysql_error());
	mysql_query("set names 'utf8'",$con);
		
	if(!mysql_select_db('GuestBook',$con)){
		die("Couldn't select DataBase:".mysql_error());
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
	td {
		padding:5px;
		padding-left:15px;
		padding-right:15px;
		text-align:left;
	}
	td li {
		float:left;
		font-size:13px;
		width:190px;
	}
	td ul {
		margin:0;
		padding:0;
		list-style-type:none;
		display:inline-block;
	}
	</style>
</head>

<?php
if($_SERVER['REQUEST_METHOD']=="POST"){
	$UserName=$_POST['UserName'];
	$command="DELETE FROM User WHERE UserName='{$UserName}'";
	if(!mysql_query($command,$con)){
		;
	}else{
		echo "<script language='JavaScript'>alert('Delete successfully!')</script>";
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
				<a href="admin_delete_user.php">Delete User</a>
			</li>
			<li>
				<a href="admin_delete_message.php">Delete Message</a>
			</li>
			<li>
				<a href="">My Message</a>
			</li>
			<li>
				<a href="">Square</a>
			</li>
			<li>
				<a href="escape.php">Sign out</a>
			</li>
		</ul>
	</div>
	
	<div style='text-align:center;height:711px;'>
		<h2 style='margin:0px;'>GuestBook</h2>
		<?php
			$command="SELECT * FROM User";
			$result=mysql_query($command,$con);
			echo "<table border='1' style='margin:0 auto;' cellspacing='0'>";
			echo "<tr><th>uid</th><th>UserName</th><th>RealName</th><th>Delete</th></tr>";
			while($row=mysql_fetch_array($result)){
				echo "<tr>";
				echo "<td>".$row['id']."</td><td>".$row['UserName']."</td><td>".$row['RealName']."</td>";
				echo "<td>";
				echo "<form action='{$_SERVER['PHP_SELF']}' method='post' >
						<input type='hidden' name='UserName' value='{$row['UserName']}'>
						<input type='submit' value='Delete'>
					   </form>";
				echo "</td>";
				echo "</tr>";
			}
			echo "</table>";
		?>
	</div>

</body>
</html>
