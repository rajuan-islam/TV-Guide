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
						a {
			font-size: 20px;
			text-decoration: none;
			color: green;
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
			</style>
</head>
<body>
<div class ="container">
		<a href="admin.php">Admin Page <br></a>
		<h1> Manage Type<br> </h1>

		<?php
		// to catch 'Notice' errors as exceptions
		set_error_handler('exceptions_error_handler');
		function exceptions_error_handler($severity, $message, $filename, $lineno) {
  			if (error_reporting() == 0) {
    			return;
  			}
  			if (error_reporting() & $severity) {
	   			throw new ErrorException($message, 0, $severity, $filename, $lineno);
  			}
		}
		?>

		<form action="manage_type.php" method="POST">
			<input type="text" name="name" value="" required> <br>
			<input type="submit" name="add_button" value="Add Catagory">
		</form>

		<?php
		if(isset($_POST['add_button'])) {
			require "connection.php";

			$query = "insert into type(name)
			values('".$_POST['name']."')";
			mysql_query($query);
		}
		 ?>

		<table style="
    font-size: 20px;
">
			<tr>
				<th>Type Name</th>
			</tr>

			<?php
			require "connection.php";

			$qry = "select * from type";
			$result = mysql_query($qry);

			while ($row=mysql_fetch_assoc($result)) {
				echo "<tr>
						<td>".$row['name']."</td>
					  </tr>";
			}

			?>

		</table>
		</div>
</body>
</html>
