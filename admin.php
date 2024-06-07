<?php
include ('dbconnect.php');
session_start();
if(isset($_POST['username']) && isset($_POST['password'])){
		//check if the username/password is correct
		$conn = mysqli_connect("localhost", "root", "", "sugbufe");
		$sql = "SELECT * FROM users
				WHERE username='{$_POST['username']}'
				AND password='{$_POST['password']}'";
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result) == 0){
			$error = "<script>alert('Error! Invalid Credentials!'); window.location.href='admin.php'</script>";
		}else{
			$_SESSION['user'] = "";
			$data = mysqli_fetch_assoc($result);
			$_SESSION['fullname'] = $data ['username'];
			$_SESSION['user_id'] = $data ['user_id'];
			$_SESSION['login'] = "123";
			header("location:view.php");
		}
}
?>

<html>
<head>
		<title>Login</title>
	 <link href="css/bootstrap.min.css" rel="stylesheet">	
	 <link rel="shortcut icon" href="favicon.ico">
	<style>
		.glyphicon {
			font-size: 20px;
		}
	</style>
</head>
<body background="img/bg.jpg">
	<font face="Century Gothic" color="#ffffff">
		<br><br><br><center><img src="img/logo1.jpg" style="border-radius:50px; margin-bottom:50px;">
		
		<link href="css/dbform.css" rel="stylesheet">
		<center><table>
		
<form method = "POST" action="admin.php">

<?php
if (isset($error)){
	echo "<script>alert('Error! Invalid Credentials!'); window.location.href='admin.php'</script>";
}
?>
<tr> 
					<td><input style="color:white; border:2px dotted #ffffff;background: rgba(255, 255, 255, .3); height: 35px; width: 275px;-webkit-border-radius:7px;border-radius:7px;" type= "text" name ="username" placeholder="Username"> <br><div class="fontname" style="color: white;"><center><b>USERNAME</div></td>
				</tr>
				<tr>
					<td><br><input style="color:white; border:2px dotted #ffffff;background: rgba(255, 255, 255, .3); height: 35px; width: 275px;-webkit-border-radius:7px;border-radius:7px;" type= "password" name ="password" placeholder="Password"><br><div class="fontname" style="color: white;"><center><b>PASSWORD</div></td>
				<tr/>
				

				
				
				</div>
					<br>
				
				<tr> 
				
					<td><div class="button"><br><br><center><input type= "submit" value ="LOG IN" name="btn-login"></div></td>

				<tr/>
				
				
				</form>
			</table>
</form>
</div>
</body>
</html>