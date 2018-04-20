<!DOCTYPE html>
<?php
ob_start();
session_start();
 ?>
 <?php if(!isset($_SESSION['user_id'])) header("location: admin_login.php"); ?>

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

<html>
    <head>
        <meta charset="utf-8">
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
   
   th {
	   font-size: 20px;
   }
			</style>
    </head>
    <body>
	<div class ="container">
        <a href="admin.php">Admin Page <br></a>
        <h1>Manage Channels</h1>

        <form action="" method="post">
            Name <br>
            <input type="text" name="name" value="" required> <br>
            Image Name <br>
            <input type="text" name="image" value="" required> <br>
            <input type="submit" name="add" value="Add channel"> <br>
        </form>

        <?php
        if(isset($_POST['add'])) {
            require "connection.php";
            $query = "insert into channel(name,image)
            values('".$_POST['name']."','".$_POST['image']."')";
            mysql_query($query);
        }
         ?>

        <table>
            <tr>
                <th>
                    Name
                </th>
                <th>
                    Image Name
                </th>
                <th>
                    Image Icon
                </th>
            </tr>

            <?php
            require "connection.php";
            $query = "select * from channel";
            $result = mysql_query($query);
            while ($row=mysql_fetch_assoc($result)) {
                echo "<tr>";

                echo "<th>";
                echo $row['name'];
                echo "</th>";

                echo "<th>";
                echo $row['image'];
                echo "</th>";

                echo "<th>";
                echo '<img src="img/tvicon/'.$row['image'].'" alt="" />';
                echo "</th>";

                echo "</tr>";
            }
             ?>

        </table>
		</div>
    </body>
</html>
