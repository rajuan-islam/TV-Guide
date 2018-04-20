<!DOCTYPE html>
<?php
ob_start();
session_start();
 ?>
 <?php if(isset($_SESSION['user_id'])) header("location: admin.php"); ?>

<html>
    <head>
        <meta charset="utf-8">
        <title></title>
		<style>
				body{
					background: url("tile.jpg");
				}
					a {
			font-size: 20px;
			text-decoration: none;
			color: green;
			
			}
					input {
    width: 50%;
	height: 30px;
	margin-bottom: 5px;
		}
		input[type=submit] {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 26px 32px;
    text-decoration: none;
    margin: 4px 2px;
    cursor: pointer;
	
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


			</style>
    </head>
    <body>
		
		<div class ="container">
		<a href="index.php">Home</a>
        <form action="" method="post">
			User Name:<br>
            <input type="text" name="user_id" value="" placeholder="user name" required><br>
         Password: <br>  
			<input type="password" name="user_pass" value="" placeholder="password" required>
            <input type="submit" name="login" value="Log In">
        </form>
        <?php
        if (isset($_POST['login'])) {
            require 'connection.php';
            $query = "select * from admin where user_id='".$_POST['user_id']."' and user_pass='".$_POST['user_pass']."'";
            $result = mysql_query($query);
            if($row=mysql_fetch_assoc($result)) {
                $_SESSION['user_id'] = $_POST['user_id'];
                header("location: admin.php");
            }
        }
         ?>
		</div>
    </body>
</html>
