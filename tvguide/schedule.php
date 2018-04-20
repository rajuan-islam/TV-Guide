<!--বিসমিল্লাহির রাহমানির রাহিম -->
<html>
	<head>
		<title>Tv Guide</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="schedulestyle.css" >
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

						 

					  <li role="presentation" class="hidden-lg hidden-md"><a style="color:#ffffff" href="#">অনুষ্ঠানের ধরন</a></li>

					   <li role="presentation"><a style="color:#ffffff" href="watchLive.php">লাইভ টিভি</a></li>

					 </ul>

				  </div>

				  <!-- /.navbar-collapse -->
			   </div>
			   <!-- /.container-fluid -->
			</nav>


		<!-- End.Navigation Bar -->

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

		<!--Inner Body-->
		<div class="row panel panel-danger">
		 <div style="color:#9e0f13" class="panel-heading"><span class="glyphicon glyphicon-list"></span><b> চ্যানেলের তালিকা</b></div>
          	<div class="col-lg-12 col-sm-12">

				<?php
				require "connection.php";
				$query = "select * from channel";
				$result = mysql_query($query);
				while ($row=mysql_fetch_assoc($result)) {
						echo '<a class="btn btn-sm img-hover " href="show_channel.php?channel_id='.$row['id'].'" title="'.$row['name'].'">';
						echo '<img src="img/tvicon/'.$row['image'].'" alt="'.$row['name'].'"';
						echo 'class="img-thumbnail_for_channel myimageshadow imagetransition"></a>';
				}
				 ?>

				</div>
		</div>

		<!-- Footer -->


	</body>
</html>
