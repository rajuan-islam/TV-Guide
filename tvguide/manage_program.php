<!DOCTYPE html>
<?php
ob_start();
session_start();
 ?>
 <?php if(!isset($_SESSION['user_id'])) header("location: admin_login.php"); ?>

<html>
    <head>
        <meta charset="utf-8">
        <title></title>
			<style>
				body{
					background: url("tile.jpg");
				}
				
				   .container {
                width: 1000px;
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
   table {
    width: 100%;
	border: 1px solid black;
		}

		th {
			height: 50px;
			border: 1px solid lightgreen;
		}
		td {
			height: 50px;
			border-right: 1px solid lightgreen;
			border-bottom: 1px solid lightgreen;
			
		}
   
			</style>	
    </head>
    <body>
	<div class ="container">
        <a href="admin.php">Admin Page <br></a>
        <h1>Manage Programs</h1>

        <form action="" method="post">
            Name <br>
            <input type="text" name="program_name" value="" placeholder="program name" required> <br>
            Type <br>
            <select name="program_type" style="
    width: 50%;
    height: 40px; margin-bottom: 5px;">
                <?php
                require 'connection.php';
                $query = "select * from type";
                $result = mysql_query($query);
                while ($row=mysql_fetch_assoc($result)) {
                    echo '<option value="'.$row["name"].'">'.$row["name"].'</option>';
                }
                 ?>
            </select> <br>
            Channel <br>
            <select name="program_channel"style="
    width: 50%;
    height: 40px; margin-bottom: 5px;">
                <?php
                require 'connection.php';
                $query = "select * from channel";
                $result = mysql_query($query);
                while ($row=mysql_fetch_assoc($result)) {
                    echo '<option value="'.$row["id"].'">'.$row["name"].'</option>';
                }
                 ?>
            </select> <br>
            <input type="submit" name="add_program" value="Add Program"> <br>
        </form>
        <?php
        if(isset($_POST['add_program'])) {
            $query = "insert into program(name,type_name,channel_id) values( '".$_POST['program_name']."', '".$_POST['program_type']."', ".$_POST['program_channel']." )";
            mysql_query($query);
        }
         ?>

        <table>
            <tr>
                <th>
                    Name
                </th>
                <th>
                    Type
                </th>
                <th>
                    Channel
                </th>
                <th>
                    Channel Icon
                </th>
                <th>
                    Schedule
                </th>
            </tr>

            <?php
            require "connection.php";
            $query = "select program.id as program_id, program.name as program_name, type.name as type_name, channel.name as channel_name, channel.image as image from program, type, channel where program.type_name=type.name and program.channel_id=channel.id";
            $result = mysql_query($query);
            while ($row=mysql_fetch_assoc($result)) {
                echo "<tr>";

                echo "<td>";
                echo $row['program_name'];
                echo "</td>";

                echo "<td>";
                echo $row['type_name'];
                echo "</td>";

                echo "<td>";
                echo $row['channel_name'];
                echo "</td>";

                echo "<td>";
                echo '<img src="img/tvicon/'.$row['image'].'" alt="" />';
                echo "</td>";

                echo "<td>";
                echo '<a href="manage_schedule.php?program_id='.$row['program_id'].'">Add Schedule</a>';
                echo "</td>";

                echo "</tr>";
            }
             ?>
        </table>
		</div>
    </body>
</html>
