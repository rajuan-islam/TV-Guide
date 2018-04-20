<!DOCTYPE html>
<?php
ob_start();
session_start();
 ?>
 <?php if(!isset($_SESSION['user_id'])) header("location: admin_login.php"); ?>
<html>
<head>
	<title></title>
	<style>
	body{
		background: url("tile.jpg");
	}
	.container {
		width: 600px;
                margin: 0 auto;
                background: white;
                border-radius: 20px;
                padding: 10px;
                min-height: 100%;
                min-height: 400px;
                border: 2px solid green;
					
		}
		a {
			font-size: 20px;
			text-decoration: none;
			margin-top: 25px;
			color: green;
		}
		input {
    width: 20%;
		}
		
		input[type=submit] {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 5px;
    text-decoration: none;
    margin: 4px 2px;
    cursor: pointer;
	
   }
	</style>
</head>
<body>
	<div class ="container">
			<h3>Admin: <?php echo $_SESSION['user_id']; ?> </h3>
			<form action="" method="post">
				<input type="submit" name="log_out" value="Log Out"> <br>
			</form>
			<?php
			if(isset($_POST['log_out'])) {
				unset($_SESSION['user_id']);
				header("location: admin_login.php");
			}
			 ?>
			<a href="manage_type.php">Manage Types <br></a>
			<a href="manage_channel.php">Manage channel <br></a>
			<a href="manage_program.php">Manage program <br></a>
		</div>	
</body>
</html>
