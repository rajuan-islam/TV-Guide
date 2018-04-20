<html>
<head>

		<title>Tv Guide</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="indexstyle.css">

</head>
<body>


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

		   <li role="presentation"><a style="color:#ffffff" href="watchLive.php">লাইভ টিভি</a></li>

         </ul>

      </div>

      <!-- /.navbar-collapse -->
   </div>
   <!-- /.container-fluid -->
</nav>

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

<!-- Container -->
<div class ="box">

	<!--catagory-->
	<div class="catagory">
		<div style="color:#9e0f13" class="panel-heading"><span class="glyphicon glyphicon-list"></span><b> আজকের অনুষ্ঠানের ধরণ</b>
		</div>
	<div class="panel-body">
        <div>
          <ul class="list-group">

						<?php
						require "connection.php";
						$query = "select type.name as type_name, count(schedule.program_id) as ttl_count from type, program, schedule where schedule.program_id=program.id and program.type_name=type.name and schedule.date=curdate() group by type.name";
						$result = mysql_query($query);
						while ($row=mysql_fetch_assoc($result)) {
							echo '<li class="list-group-item col-lg-3"><span class="badge">'.$row['ttl_count'].'</span>'.$row['type_name'].'</li>';
						}
						 ?>

			   </ul>
         </div>
   </div>
	<!-- End Of Panel Body -->
	</div>
	<!-- End Of catagory -->

	<!-- এখন চলছে-->
	<div class="nowPlaying">
		<div style="color:#9e0f13" class="panel-heading"><span class="glyphicon glyphicon-play"></span><b> এখন চলছে</b></div>
		<div class ="nowPlayingTable">
		<table class="table table-striped table-hover">
                  <thead>
                      <tr>
                          <th>চ্যানেল</th>
                          <th>অনুষ্ঠানের নাম</th>
                          <th>সময়সূচি</th>
                      </tr>

					  <?php
					  require 'connection.php';
					  $query = "select image, program.name as name, from_time, to_time from schedule, program, channel where schedule.program_id=program.id and program.channel_id=channel.id and date=curdate() and from_time<=curtime() and curtime()<=to_time order by from_time asc, to_time asc";
					  $result = mysql_query($query);
					  while ($row=mysql_fetch_assoc($result)) {
					  	echo "<tr>";

						echo '<td><img src="img/tvicon/'.$row['image'].'" alt="" /></td>';
						echo '<td>'.$row['name'].'</td>';
						echo '<td>'.$row['from_time'].' --to-- '.$row['to_time'].'</td>';

						echo "</tr>";
					  }
					   ?>
                  </thead>
		</table>
		</div>
	</div>

</div>




</body>

</html>
