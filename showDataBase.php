<!DOCTYPE html>
<html>
<head>
	<title>Rigister</title>
	<link rel='stylesheet' type='text/css' href='webstyle.css'>
	<style>
	form span {
		color:red;
	}
	table td {
		
	}
	</style>
</head>

<body>
	<div class='header'>
		<h1>Welcome to register</h1>
	</div>
	
	<div class='nav'>
		<ul class='guide'>
			<li>
				<a href=''>Login</a>
			</li>
			<li>
				<a href='index.php'>Register</a>
			</li>
			<li>
				<a href=''>My Diary</a>
			</li>
			<li>
				<a href=''>Comments</a>
			</li>
			<li>
				<a href='showDataBase.php'>Show Members</a>
			</li>
		</ul>
	</div>
	
	<div class='section'></div>
	<div class='section'>
	<br/>
		<h2 style='text-align:center;'>Welcome to the big family!</h2>
		<?php
			set_error_handler("myError");
			$con=mysql_connect("localhost","root","acs977282");
			mysql_query("set names 'utf8'",$con);
			if(!$con){
				die("Could not connect:".mysql_error());
			}					
			if(!mysql_select_db("my_db",$con)){
				echo "Emmmm, it seems no one here so far......";			
			}else{
				$data = mysql_query("SELECT * FROM Member");
			}
			showTable($data);
			mysql_close($con);
			
			/******************Function Area***********************/
			function showTable($data){
				$row=mysql_fetch_assoc($data);
				echo "<table border='1'>";
				echo "<tr>";
				foreach($row as $column=>$values){
					if($column!="Password"){
						if($column!="Signature"){
							echo "<th>".$column."</th>";
						}else{
							echo "<th style='width:100px;'>".$column."</th>";
						}
					}
				}
				echo "</tr>";
				do
				{
					echo "<tr>";
					foreach($row as $column=>$values){
						if($column!="Password"){
							if($column!="Signature"){
								echo "<td>".$values."</td>";
							}else{
								echo "<td style='width:100px;'>".$values."</td>";
							}
						}	
					}
					echo "</tr>";
				}while($row=mysql_fetch_assoc($data));
				echo "</table>";
			}
			function myError($errno, $errstr){
				//ignoring it..
			}
			/*******************************************************/
		?>
	</div>
	
	<div class='footer'>
	<h3>Thanks for your coming!</h3>
	</div>
</body>
</html>