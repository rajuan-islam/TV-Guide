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
	<div class="container">
        <a href="admin.php">Admin Page <br></a>
        <h1>Add Schedule</h1>

        <?php
        $program_id = $_GET['program_id'];
        require 'connection.php';
        $query = "select program.name as program_name, type.name as type_name, channel.name as channel_name, channel.image as image from program, type, channel where program.type_name=type.name and program.channel_id=channel.id and program.id=".$program_id;
        $result = mysql_query($query);
        $row = mysql_fetch_assoc($result);
         ?>

         <b>Program Name: </b> <?php echo $row['program_name']; ?> <br>
         <b>Program Type: </b> <?php echo $row['type_name']; ?> <br>
         <b>Channel: </b> <?php echo $row['channel_name'].' <img src="img/tvicon/'.$row['image'].'" alt="" />'; ?> <br>

         <br>
         <form action="" method="post">
            Date <br>
            <input type="date"  style="
    height: 40px; width:50%" name="schedule_date" value=""> <br>
            Start Time <br>
            <input type="time" style="
    height: 40px; width:50%" name="from_time" value=""> <br>
            End Time <br>
            <input type="time"  style="
    height: 40px; width:50%; margin-bottom: 20px;" name="to_time" value=""> <br>
            <input type="submit" name="add_button" value="Add Schedule">
         </form>
         <?php
         if(isset($_POST['add_button'])) {
             $query = "insert into schedule values( ".$program_id.", '".$_POST['schedule_date']."', '".$_POST['from_time']."', '".$_POST['to_time']."' )";
             mysql_query($query);
             header('location: manage_program.php');
         }
          ?>
		  </div>
    </body>
</html>
