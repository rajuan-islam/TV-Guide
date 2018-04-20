<!DOCTYPE html>
<html>
<head>
	<title>TV GUIDE</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<style type="text/css">
		.navbar-mynavbar {
		    background-color: #9e0f13;
		    border-color: #080808;
		}
		.containerBox {
			width: 1070px;
			margin: 0 auto;
			background:#f5f5f5;
			min-height: 1000px;
		    margin-top: 70px;
		    border: 1px solid white;


		}
		.panel-danger>.panel-heading {
		    margin-top: 64px;
		    color: #a94442;
		    background-color: #f2dede;
		    border-color: #ebccd1;
		}
		.containerBoxPadding{
			padding: 10px;
			display: flex;

			}
			table {
			    border-collapse: collapse;
			    width: 100%;
			}

			th, td {
			    text-align: left;
			    padding: 8px;
			}

			tr:nth-child(even){background-color: #d9edf7}

			th {
			    background-color: #4CAF50;
			    color: white;
			}
	</style>
</head>
<body>
	<!-- navbar  -->
	<nav class="navbar navbar-mynavbar navbar-fixed-top">
			   <img class="pull-left col-lg-offset-1 hidden-xs hidden-sm" style="max-width:60px;height:auto;" src="http://tvguidebangladesh.com/ignt/uploads/icon/tv.png" alt="Tv Guide Bangladesh">
			   <img class="pull-left hidden-lg hidden-md" style="max-width:40px;height:auto;" src="http://tvguidebangladesh.com/ignt/uploads/icon/tv.png" alt="Tv Guide Bangladesh">
			   <h3 class="pull-left hidden-xs hidden-sm">টিভি গাইড </h3>
			   <h4 class="pull-left hidden-lg hidden-md">টিভি গাইড </h4>

			   <div class="container">
				  <!-- Brand and toggle get grouped for better mobile display -->
				  <div class="navbar-header">
					 <button type="button" style="color:#ffffff" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					 </button>
				  </div>




				  <!-- Collect the nav links, forms, and other content for toggling -->
				  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					 <ul class="nav navbar-nav navbar-right">

						<li role="presentation" class="hidden-xs"><a style="color:#ffffff" href="index.php"><span class="glyphicon glyphicon-home"></span></a></li>
					  <li role="presentation" class="hidden-lg hidden-md hidden-sm"><a style="color:#ffffff" href="#">প্রচ্ছদ</a></li>



						 <li role="presentation"><a style="color:#ffffff" href="schedule.php">টিভি অনুষ্ঠান সূচি</a></li>

						 <li role="presentation"><a style="color:#ffffff" href="admin.php">এডমিন-প্যানেল</a></li>

					  <li role="presentation" class="hidden-lg hidden-md"><a style="color:#ffffff" href="#">অনুষ্ঠানের ধরন</a></li>

					   <li role="presentation"><a style="color:#ffffff" href="watchLive.html">লাইভ টিভি</a></li>

					 </ul>

				  </div>

				  <!-- /.navbar-collapse -->
			   </div>
			   <!-- /.container-fluid -->
			</nav>

			<!-- End of Navbar -->


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

			<?php
			require "connection.php";
			$channel_id = $_GET['channel_id'];
			$query = "select * from channel where id=".$channel_id;
			$result = mysql_query($query);
			$row = mysql_fetch_assoc($result);
			?>

			<div class="containerBox">
				<div style="color: #9e0f13;background-color: #f2dede; font-size: 20px;" class="panel-heading"><b>
				<!-- Channel Name demo</b></div> -->
				<?php
				echo $row['name']."</b></div>";
				?>
					<div class="containerBoxPadding">

						<div class="one" style="">
						<!-- <img src="img/tvicon/ntv.png" alt="No image Found"/> -->
						<?php
						echo '<img src="img/tvicon/'.$row['image'].'" alt="No image Found"/>';
						?>
						</div>

						<div class="two" style="margin-left: 710px;">
						<?php echo '<form method="POST" action="show_channel.php?channel_id='.$channel_id.'" >'; ?>
						<input type="date" name="schedule_date" required >
						<input type="submit" name="search_by_date" style=" background: #4CAF50; border-radius: 5px;color: white;">
						</form>
						</div>

					</div>


			<?php
			if(isset($_POST['search_by_date'])) {
			echo '<table>
			  <tr>
			    <th>Program Name</th>
			    <th>Program Type</th>
			    <th>From</th>
			    <th>To</th>
			  </tr>';

			  $query = "select program.name as program_name, program.type_name as type_name, from_time, to_time from program, schedule where schedule.program_id=program.id and program.channel_id=".$channel_id."
			  and date='".$_POST['schedule_date']."' order by from_time asc";
			  $result = mysql_query($query);
			  while ($row=mysql_fetch_assoc($result)) {
			  	echo '<tr>';

			  	echo '<td>'.$row['program_name'].'</td>';
			  	echo '<td>'.$row['type_name'].'</td>';
			  	echo '<td>'.$row['from_time'].'</td>';
			  	echo '<td>'.$row['to_time'].'</td>';

			  	echo '</tr>';
			  }

			 echo '</table>';
			}
			?>

			    </div>
			</div>
</div>

</body>
</html>
