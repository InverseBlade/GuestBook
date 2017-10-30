<?php 
session_start();
if(isset($_SESSION['visitor'])){
	session_destroy();
}
?>
<html>
<head>
<title>Sign out</title>
<meta http-equiv=refresh content='0;url=index.php'/>
</head>
<body>
<script language='JavaScript'>alert('Sign out sccessfully!')</script>
</body>
</html>