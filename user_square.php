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
	td {
		padding:5px;
		padding-left:15px;
		padding-right:15px;
		text-align:left;
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
		mysql_close();
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
				<a href="user_write.php">Write message</a>
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
		<?php
			$con = mysql_connect('localhost','root','acs977282') or die('Could not connect:'.mysql_error());
			mysql_query("set names 'utf8'",$con);
		
			if(!mysql_select_db('GuestBook',$con)){
				die("Couldn't select DataBase:".mysql_error());
			}
			$command=" SELECT * FROM Message ORDER BY Time DESC ";
 			$result=mysql_query($command,$con);
			echo "<table border='1' style='margin:0 auto;' cellspacing='0'>";
			while($row=mysql_fetch_array($result)){
				$user=mysql_fetch_array(mysql_query("SELECT * FROM User WHERE UserName='{$row['UserName']}' "));
				echo "<tr>";
				echo "<td style='line-height:25px;width:187px;height:178px;' rowspan='3'>"."Name: ".$user['RealName']."<br/>From: $user[Hometown]"."</td>"."<td style='width:800px;'>"."Write at ".$row['Time']."</td>";
				echo "</tr>";
				
				echo "<tr>";
				echo "<td valign='top' style='height:117px;'>".$row['Message']."</td>";
				echo "</tr>";
				
				echo "<tr>";
				echo "<td>"."Email: ".$user['Email']."             "."QQ: ".$user['QQ']."</td>";
				echo "</tr>";
			}
			echo "</table>";
		?>
	</div>

</body>
</html>
