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
	$id=$_POST['id'];
	$command="DELETE FROM Comments WHERE Message='{$id}'";
	mysql_query($command,$con);
	$command="DELETE FROM Message WHERE id='{$id}' ";
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
			$command=" SELECT * FROM Message ORDER BY Time DESC ";
 			$result=mysql_query($command,$con);
			$command="CREATE TABLE Comments(id int NOT NULL AUTO_INCREMENT,
								       	         PRIMARY                               KEY(id),
								                 Message                                       int,
										 RealName                       varchar(25),
								                 Comments                    varchar(100),
									         Time                  DATETIME NOT NULL DEFAULT NOW()) default charset=utf8 ";
 			if(!mysql_query($command,$con)){
				;
			}
			//Core code: Create Square Table
			echo "<table border='1' style='margin:0 auto;' cellspacing='0'>";
			while($row=mysql_fetch_array($result)){
				$user=mysql_fetch_array(mysql_query("SELECT * FROM User WHERE UserName='{$row['UserName']}' "));
				echo "<tr>";
				echo "<td style='line-height:25px;width:187px;height:178px;' rowspan='4'>"."Name: ".$user['RealName']."<br/>From: $user[Hometown]"."</td>"."<td style='width:645px;'>"."Write at ".$row['Time']."</td>";
				echo "</tr>";
				
				echo "<tr>";
				echo "<td valign='top' style='height:117px;'>".$row['Message']."</td>";
				echo "</tr>";
				
				echo "<tr>";
				echo "<td><ul><li style='float:left;'>Email: {$user['Email']} </li> <li style='float:left;'>QQ: {$user['QQ']} </li></ul></td>";
				echo "</tr>";
				
				echo "<tr>";
				echo "<td style='text-align:left;'>";
				echo "Comments:<br/>";
				$command="SELECT * FROM Comments WHERE Message='{$row['id']}' ";
				//$com:  comments     $com_row
				$com=mysql_query($command,$con);
				while($com_row=mysql_fetch_array($com)){
					echo $com_row['RealName'].": ".$com_row['Comments']."<br/>";
				}
				echo "<form accept-charset='UTF-8' action=\"{$_SERVER['PHP_SELF']}\" method='post' >
						<input type='hidden' name='id' value='{$row['id']}'>
						<input style='margin-left:10px;' type='submit' value='Delete'>
					  </form>";
				echo "</td></tr>";
			}
			echo "</table>";
		?>
	</div>

</body>
</html>