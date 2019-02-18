<?php include 'head.php'; ?>

<!-- <div id="tampildisini"></div> -->

<main class="content" id="main">
	<div class="container-fluid p-0">

		<div class="row">
				<div class="col-6">
					<div class="carsd">
					<div class="card-header">
						<h5 class="card-title">Kujungan Terkini</h5>
						<h6 class="card-subtitle text-muted">Add <code>.table-sm</code> to make tables more compact by cutting cell padding in half.</h6>
					</div>
					<table class="table table-striped table-hover table-sm">
						<thead>
							<tr>
								<th>No</th>
								<th>Operation System</th>
								<th class="text-center">Users</th>
								<th class="text-left">Persentasi</th>
							</tr>
						</thead>
						<tbody>
						<?php  
							$sql="SELECT visit_date, COUNT(visit_date) AS total, ROUND((COUNT(visit_date)/(SELECT COUNT(*) FROM analytic))*100,0) AS persentasi FROM analytic GROUP BY visit_date ORDER BY total  DESC LIMIT 6";
							$result = mysqli_query($connect, $sql);
							@$no1++;
							while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
							echo "<tr>" ;
							echo "<td>" . $no1++ . "</td>";
							echo	"<td>" . $row['visit_date'] . "</td>";
							echo	"<td class='text-center'>" . $row['total'] . "</td>";
							echo	"<td class='text-left'> <div class='progress-bar bg-bar' role='progressbar' style='width: " . $row['persentasi'] . "%' aria-valuenow='" . $row['persentasi'] . "' aria-valuemin='0' aria-valuemax='100'>" . $row['persentasi'] . "%</div></td>";
							echo	"</tr>";
							}
						?>
						</tbody>
					</table>
					
				</div>
				</div>


				<div class="col-6">
					<div class="carsd">
						<?= UI()?>
					<div class="card-header">
						<h5 class="card-title">Kujungan Harian</h5>
						<h6 class="card-subtitle text-muted">Add <code>.table-sm</code> to make tables more compact by cutting cell padding in half.</h6>
					</div>
					<table class="table table-striped table-hover table-sm">
						<thead>
							<tr>
								<th>No</th>
								<th>Tanggal Akses</th>
								<th class="text-center">Pengguna</th>
								<th class="text-left">Persentasi</th>
							</tr>
						</thead>
						<tbody>
						<?php  
							$sql="SELECT COUNT(*) AS `total`, DATE_FORMAT(visit_date, '%d-%M-%Y') AS `the_date`, ROUND((COUNT(visit_date)/(SELECT COUNT(*) FROM analytic))*100,0) AS persentasi FROM `analytic` GROUP BY `the_date` ORDER BY total DESC";
							$result = mysqli_query($connect, $sql);
							@$no3++;
							while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
							echo "<tr>" ;
							echo "<td>" . $no3++ . "</td>";
							echo	"<td>" . $row['the_date'] . "</td>";
							echo	"<td class='text-center'>" . $row['total'] . "</td>";
							echo	"<td class='text-left'> <div class='progress-bar bg-bar' role='progressbar' style='width: " . $row['persentasi'] . "%' aria-valuenow='" . $row['persentasi'] . "' aria-valuemin='0' aria-valuemax='100'>" . $row['persentasi'] . "%</div></td>";
							echo	"</tr>";
							}
						?>
						</tbody>
					</table>
					
				</div>
				</div>

			</div>

		<div class="row">
			<div class="col-12">
				<div class="row">
<div class="col-md-4 col-xl-4">

	<p><?= mac_address()?></p>
 <div class="carsd">
     <div class="card-header">
         <h5 class="card-title mb-0">Profile Settings</h5>
     </div>

     <div class="list-group list-group-flush" role="tablist">
         <a class="list-group-item list-group-item-action active" data-toggle="list" href="#account" role="tab">Operation System</a>
         <a class="list-group-item list-group-item-action" data-toggle="list" href="#browser" role="tab">Browser</a>
         <a class="list-group-item list-group-item-action" data-toggle="list" href="#device" role="tab">Device</a>
     </div>
 </div>
</div>

<div class="col-md-8 col-xl-8">
 <div class="tab-content">
     <div class="tab-pane fade show active" id="account" role="tabpanel">

         <div class="carsd">
					<div class="card-header">
						<h5 class="card-title">Condensed Table</h5>
						<h6 class="card-subtitle text-muted">Add <code>.table-sm</code> to make tables more compact by cutting cell padding in half.</h6>
					</div>
					<table class="table table-striped table-hover table-sm">
						<thead>
							<tr>
								<th>No</th>
								<th>Operation System</th>
								<th class="text-center">Users</th>
								<th class="text-left">Persentasi</th>
							</tr>
						</thead>
						<tbody>
						<?php  
							$sql="SELECT os, COUNT(os) AS total, ROUND((COUNT(os)/(SELECT COUNT(*) FROM analytic))*100,0) AS persentasi FROM analytic GROUP BY os ORDER BY total  DESC";
							$result = mysqli_query($connect, $sql);
							@$no1++;
							while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
							echo "<tr>" ;
							echo "<td>" . $no1++ . "</td>";
							echo	"<td>" . $row['os'] . "</td>";
							echo	"<td class='text-center'>" . $row['total'] . "</td>";
							echo	"<td class='text-left'> <div class='progress-bar bg-bar' role='progressbar' style='width: " . $row['persentasi'] . "%' aria-valuenow='" . $row['persentasi'] . "' aria-valuemin='0' aria-valuemax='100'>" . $row['persentasi'] . "%</div></td>";
							echo	"</tr>";
							}
						?>
						</tbody>
					</table>
					
				</div>

     </div>
     <div class="tab-pane fade" id="browser" role="tabpanel">
         <div class="carsd">
					<div class="card-header">
						<h5 class="card-title">Condensed Table</h5>
						<h6 class="card-subtitle text-muted">Add <code>.table-sm</code>
							<?php
								$mac = system('arp -s');
								echo $mac;
							?>
						 to make tables more compact by cutting cell padding in half.</h6>
					</div>
					<table class="table table-striped table-hover table-sm">
						<thead>
							<tr>
								<th>No</th>
								<th>Operation System</th>
								<th class="text-right">Users</th>
								<th class="text-right">Persentasi</th>
							</tr>
						</thead>
						<tbody>
						<?php  
							$sql="SELECT browser, COUNT(browser) AS pengguna, ROUND((COUNT(browser)/(SELECT COUNT(*) FROM analytic))*100,0) AS persentasi FROM analytic GROUP BY browser ORDER BY pengguna  DESC";
							$result = mysqli_query($connect, $sql);
							@$no++;
							while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
							echo "<tr>" ;
							echo "<td>" . $no++ . "</td>";
							echo	"<td>" . $row['browser'] . "</td>";
							echo	"<td class='text-right'>" . $row['pengguna'] . "</td>";
							echo	"<td class='text-left'> <div class='progress-bar bg-bar' role='progressbar' style='width: " . $row['persentasi'] . "%' aria-valuenow='" . $row['persentasi'] . "' aria-valuemin='0' aria-valuemax='100'>" . $row['persentasi'] . "%</div></td>";
							echo	"</tr>";
							}
						?>
						</tbody>
					</table>
					
				</div>
     </div>
     <div class="tab-pane fade" id="device" role="tabpanel">

         <div class="carsd">
					<div class="card-header">
						<h5 class="card-title">Device</h5>
						<h6 class="card-subtitle text-muted">Add <code>.table-sm</code> to make tables more compact by cutting cell padding in half.</h6>
					</div>
					<table class="table table-striped table-hover table-sm">
						<thead>
							<tr>
								<th>No</th>
								<th>Device</th>
								<th class="text-right">Users</th>
								<th class="text-right">Persentasi</th>
							</tr>
						</thead>
						<tbody>
						<?php  
							$sql="SELECT device, COUNT(device) AS total, ROUND((COUNT(device)/(SELECT COUNT(*) FROM analytic))*100,0) AS persentasi FROM analytic GROUP BY device ORDER BY total  DESC";
							$result = mysqli_query($connect, $sql);
							@$no2++;
							while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
							echo "<tr>" ;
							echo "<td>" . $no2++ . "</td>";
							echo	"<td>" . $row['device'] . "</td>";
							echo	"<td class='text-right'>" . $row['total'] . "</td>";
							echo	"<td class='text-left'> <div class='progress-bar bg-bar' role='progressbar' style='width: " . $row['persentasi'] . "%' aria-valuenow='" . $row['persentasi'] . "' aria-valuemin='0' aria-valuemax='100'>" . $row['persentasi'] . "%</div></td>";
							echo	"</tr>";
							}
						?>
						</tbody>
					</table>
					
				</div>

     </div>


 </div>
</div>
</div>
			</div>
		</div>

		<div class="row">
			<div class="col-4">
				
			</div>
			<div class="col-8">
				
			</div>
		</div>

		<div class="row">
			<div class="col-4">
				<!-- BEGIN card -->
		<div class="card m-b-15">
			<!-- BEGIN card-header -->
			<div class="card-header">
				<h4 class="card-header-title">
					OVERVIEW
				</h4>
				<!-- <div class="card-header-btn">
					<div class="dropdown dropdown-icon">
						<a href="#" class="btn" data-toggle="dropdown"><i class="fa fa-ellipsis-h fa-lg"></i></a>
						<div class="dropdown-menu dropdown-menu-right">
							<a href="#" class="dropdown-item">Today</a>
							<a href="#" class="dropdown-item">Yesterday</a>
							<a href="#" class="dropdown-item active">Last 7 days</a>
							<a href="#" class="dropdown-item">Last 28 days</a>
						</div>
					</div>
				</div> -->
			</div>
			<!-- END card-header -->
			<!-- BEGIN panel-body -->
			<div class="card-body">
				<div class="text-center p-t-15 p-b-30">
					<div class="f-w-600">Right now</div>
					<div class="f-s-80 line-height-1 m-xs">
						<span data-id="active-user"><?= InfoBrowserChrome()?></span>
					</div>
					<div>active users on site</div>
				</div>
				<hr />
				<ul class="list-inline m-b-10 text-center">
					<li class="list-inline-item">
						<span class="circle circle-sm bg-gradient-blue-purple-to-right m-r-5"></span> Desktop
					</li>
					<li class="list-inline-item">
						<span class="circle circle-sm bg-black-transparent-8 m-r-5"></span> Mobile
					</li>
					<li class="list-inline-item">
						<span class="circle circle-sm bg-muted m-r-5"></span> Tablet
					</li>
				</ul>
				<div class="progress without-rounded-corner m-b-5">
					<div class="progress-bar bg-gradient-blue-purple-to-right" data-id="desktop-user" style="width: 60%;">60%</div>
					<div class="progress-bar bg-black-transparent-8" data-id="mobile-user" style="width: 25%;">25%</div>
					<div class="progress-bar bg-muted" data-id="tablet-user" style="width: 15%;">15%</div>
				</div>
				<p class="f-s-12 text-muted m-b-0">
					* Data updates continuously and each pageview is reported seconds after it occurs.
				</p>
			</div>
			<!-- END panel-body -->
		</div>
		<!-- END card -->
			</div>
			<div class="col-8">
				<!-- BEGIN widget-reminder -->
				<!-- <div class="card flex-fill">
					<div class="card-body py-4"> -->
			<div class="card widget-reminder">
				<div class="widget-reminder-header">TODAY, NOV 4</div>
				<div class="widget-reminder-item">
					<div class="widget-reminder-time">09:00<br>12:00</div>
					<div class="widget-reminder-divider bg-success"></div>
					<div class="widget-reminder-content">
						<h4 class="widget-title">Meeting with HR</h4>
						<div class="widget-desc"><i class="ti-pin"></i> Conference Room</div>
					</div>
				</div>
				<div class="widget-reminder-item">
					<div class="widget-reminder-time">20:00<br>23:00</div>
					<div class="widget-reminder-divider bg-primary"></div>
					<div class="widget-reminder-content">
						<h4 class="widget-title">Dinner with Richard</h4>
						<div class="widget-desc"><i class="ti-pin"></i> Tom's Too Restaurant</div>
						<div class="m-t-10 p-t-3">
							<a href="#" class="pull-right">Contact</a>
							<img src="assets/img/user-3.jpg" width="16" class="img-circle pull-left m-r-5" alt="" /> Richard Leong 
						</div>
					</div>
				</div>
				<div class="widget-reminder-header">TOMORROW, NOV 5</div>
				<div class="widget-reminder-item">
					<div class="widget-reminder-time">All day</div>
					<div class="widget-reminder-divider bg-success"></div>
					<div class="widget-reminder-content">
						<h4 class="widget-title"><i class="ti-gift text-success"></i> Terry Birthday</h4>
					</div>
				</div>
				<div class="widget-reminder-item">
					<div class="widget-reminder-time">08:00</div>
					<div class="widget-reminder-divider bg-warning"></div>
					<div class="widget-reminder-content">
						<h4 class="widget-title"><i class="ti-gift text-warning"></i> Meeting</h4>
					</div>
				</div>
				<div class="widget-reminder-item">
					<div class="widget-reminder-time">00:00<br>00:30</div>
					<div class="widget-reminder-divider bg-danger"></div>
					<div class="widget-reminder-content">
						<h4 class="widget-title">Server Maintenance</h4>
						<div class="widget-desc"><i class="ti-pin"></i> Data Centre</div>
					</div>
				</div>
			</div>
			<!-- END widget-reminder -->
		<!-- </div>
	</div> -->
			</div>
		</div>
		<div class="row">
			<div class="col-12 col-md-6 col-xl d-flex">
				<div class="card flex-fill">
					<div class="card-body py-4">
						<div class="row">
							<div class="col-8">
								<h3 class="mb-2"><?= getRealIpAddr()?></h3>
								<div class="mb-0">
									<?= get_client_ip()?>
									<?= UserInfo::get_ip();?>
									<?= UserInfo::get_device();?>
									<?= UserInfo::get_os();?>
									<?= UserInfo::get_browser();?>
									<?= gethostname()?>
									<?= SR()?>
									<?= UI()?>
									<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>
								</div>
							</div>
							<div class="col-4 ml-auto text-right">
								<div class="d-inline-block mt-2">
									<i class="feather-lg text-primary" data-feather="truck"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-12 col-md-6 col-xl d-flex">
				<div class="card flex-fill">
					<div class="card-body py-4">
						<div class="row">
							<div class="col-8">
								<h3 class="mb-2">27.424</h3>
								<div class="mb-0">New Today</div>
							</div>
							<div class="col-4 ml-auto text-right">
								<div class="d-inline-block mt-2">
									<i class="feather-lg text-warning" data-feather="activity"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-12 col-md-6 col-xl d-flex">
				<div class="card flex-fill">
					<div class="card-body py-4">
						<div class="row">
							<div class="col-8">
								<h3 class="mb-2">$ 29.200</h3>
								<div class="mb-0">Active</div>
							</div>
							<div class="col-4 ml-auto text-right">
								<div class="d-inline-block mt-2">
									<i class="feather-lg text-danger" data-feather="dollar-sign"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-12 col-md-6 col-xl d-flex">
				<div class="card flex-fill">
					<div class="card-body py-4">
						<div class="row">
							<div class="col-8">
								<h3 class="mb-2">67</h3>
								<div class="mb-0">Online</div>
							</div>
							<div class="col-4 ml-auto text-right">
								<div class="d-inline-block mt-2">
									<i class="feather-lg text-success" data-feather="shopping-cart"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-12 col-md-6 col-xl d-none d-xxl-flex">
				<div class="card flex-fill">
					<div class="card-body py-4">
						<div class="row">
							<div class="col-8">
								<h3 class="mb-2">$ 49.400</h3>
								<div class="mb-0">Total Revenue</div>
							</div>
							<div class="col-4 ml-auto text-right">
								<div class="d-inline-block mt-2">
									<i class="feather-lg text-info" data-feather="dollar-sign"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-12 col-lg-8 d-flex">
				<div class="card flex-fill w-100">
					<div class="card-header">
						<div class="card-actions float-right">
							<div class="dropdown show">
								<a href="#" data-toggle="dropdown" data-display="static">
<i class="align-middle" data-feather="more-horizontal"></i>
</a>

								<div class="dropdown-menu dropdown-menu-right">
									<a class="dropdown-item" href="#">Action</a>
									<a class="dropdown-item" href="#">Another action</a>
									<a class="dropdown-item" href="#">Something else here</a>
								</div>
							</div>
						</div>
						<h5 class="card-title mb-0">Real-Time</h5>
					</div>
					<div class="card-body p-2">
						<div id="world_map" style="height:350px;"></div>
					</div>
				</div>

				<script>
					document.addEventListener("DOMContentLoaded", function(event) {
						$('#world_map').vectorMap({
							map: "world_mill",
							normalizeFunction: "polynomial",
							hoverOpacity: .7,
							hoverColor: false,
							regionStyle: {
								initial: {
									fill: "#e3eaef"
								}
							},
							markerStyle: {
								initial: {
									"r": 9,
									"fill": "#2979ff",
									"fill-opacity": .95,
									"stroke": "#fff",
									"stroke-width": 7,
									"stroke-opacity": .4
								},
								hover: {
									"stroke": "#fff",
									"fill-opacity": 1,
									"stroke-width": 1.5
								}
							},
							backgroundColor: "transparent",
							zoomOnScroll: false,
							markers: [
							// <?php
							// $a="SELECT * FROM  mhsasia";
							// $b=mysqli_query($connect,$a);
							// while($row=mysqli_fetch_array($b)){
							// 	?>

								{
									latLng: [<?= LAT() ?>, <?= LANG() ?>],
									name: "<?= COUNTRY()?>"
								},
							
							
							]
						});
					});
				</script>
			</div>
			<div class="col-12 col-lg-4 d-flex">
				<div class="card flex-fill w-100">
					<div class="card-header">
						<div class="card-actions float-right">
							<div class="dropdown show">
								<a href="#" data-toggle="dropdown" data-display="static">
<i class="align-middle" data-feather="more-horizontal"></i>
</a>

								<div class="dropdown-menu dropdown-menu-right">
									<a class="dropdown-item" href="#">Action</a>
									<a class="dropdown-item" href="#">Another action</a>
									<a class="dropdown-item" href="#">Something else here</a>
								</div>
							</div>
						</div>
						<h5 class="card-title mb-0">Recent Register Members</h5>
					</div>
					<div class="card-body d-flex w-100">
						<div class="align-self-center chart chart-lg">
							<canvas id="chartjs-dashboard-bar"></canvas>
						</div>
					</div>
				</div>

				<script>
					document.addEventListener("DOMContentLoaded", function(event) {
						// Bar chart
						new Chart(document.getElementById("chartjs-dashboard-bar"), {
							type: 'bar',
							data: {
								labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
								datasets: [{
									label: "Last year",
									backgroundColor: "#2979ff",
									borderColor: "#2979ff",
									hoverBackgroundColor: "#2979ff",
									hoverBorderColor: "#2979ff",
									data: [54, 67, 41, 55, 62, 45, 55, 73, 60, 76, 48, 79]
								}, {
									label: "This year",
									backgroundColor: "#E8EAED",
									borderColor: "#E8EAED",
									hoverBackgroundColor: "#E8EAED",
									hoverBorderColor: "#E8EAED",
									data: [69, 66, 24, 48, 52, 51, 44, 53, 62, 79, 51, 68]
								}]
							},
							options: {
								maintainAspectRatio: false,
								legend: {
									display: false
								},
								scales: {
									yAxes: [{
										gridLines: {
											display: false
										},
										stacked: false,
										ticks: {
											stepSize: 20
										}
									}],
									xAxes: [{
										barPercentage: .75,
										categoryPercentage: .5,
										stacked: false,
										gridLines: {
											color: "transparent"
										}
									}]
								}
							}
						});
					});
				</script>
			</div>
		</div>

		<div class="row">
			<div class="col-12 col-lg-6 col-xl-4 d-flex">
				<div class="card flex-fill">
					<div class="card-header">
						<div class="card-actions float-right">
							<div class="dropdown show">
								<a href="#" data-toggle="dropdown" data-display="static">
<i class="align-middle" data-feather="more-horizontal"></i>
</a>

								<div class="dropdown-menu dropdown-menu-right">
									<a class="dropdown-item" href="#">Action</a>
									<a class="dropdown-item" href="#">Another action</a>
									<a class="dropdown-item" href="#">Something else here</a>
								</div>
							</div>
						</div>
						<h5 class="card-title mb-0">Calendar</h5>
					</div>
					<div class="card-body d-flex">
						<div class="align-self-center w-100">
							<div class="chart">
								<div id="datetimepicker-dashboard"></div>
							</div>
						</div>
					</div>
				</div>

				<script>
					document.addEventListener("DOMContentLoaded", function(event) {
						$('#datetimepicker-dashboard').datetimepicker({
							inline: true,
							sideBySide: false,
							format: 'L'
						});
					});
				</script>
			</div>
			<div class="col-12 col-xl-4 d-none d-xl-flex">
				<div class="card flex-fill w-100">
					<div class="card-header">
						<div class="card-actions float-right">
							<div class="dropdown show">
								<a href="#" data-toggle="dropdown" data-display="static">
<i class="align-middle" data-feather="more-horizontal"></i>
</a>

								<div class="dropdown-menu dropdown-menu-right">
									<a class="dropdown-item" href="#">Action</a>
									<a class="dropdown-item" href="#">Another action</a>
									<a class="dropdown-item" href="#">Something else here</a>
								</div>
							</div>
						</div>
						<h5 class="card-title mb-0">Source / Medium</h5>
					</div>
					<div class="card-body d-flex">
						<div class="align-self-center w-100">
							<div class="py-3">
								<div class="chart chart-xs">
									<canvas id="chartjs-dashboard-pie"></canvas>
								</div>
							</div>

							<table class="table mb-0">
								<thead>
									<tr>
										<th>Source</th>
										<th class="text-right">Revenue</th>
										<th class="text-right">Value</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><i class="fas fa-square-full text-primary"></i> Direct</td>
										<td class="text-right">$ 2.206</td>
										<td class="text-right text-success">+34%</td>
									</tr>
									<tr>
										<td><i class="fas fa-square-full text-warning"></i> Affiliate</td>
										<td class="text-right">$ 853</td>
										<td class="text-right text-success">+15%</td>
									</tr>
									<tr>
										<td><i class="fas fa-square-full text-danger"></i> E-mail</td>
										<td class="text-right">$ 521</td>
										<td class="text-right text-success">+22%</td>
									</tr>
									<tr>
										<td><i class="fas fa-square-full text-dark"></i> Other</td>
										<td class="text-right">$ 1.725</td>
										<td class="text-right text-success">+18%</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>

				<script>
					document.addEventListener("DOMContentLoaded", function(event) {
						// Pie chart
						new Chart(document.getElementById("chartjs-dashboard-pie"), {
							type: 'pie',
							data: {
								labels: ["Direct", "Affiliate", "E-mail", "Other"],
								datasets: [{
									data: [2206, 853, 521, 1725],
									backgroundColor: ["#2979ff", "#ff9100", "#ff1744", "#E8EAED"],
									borderColor: "transparent"
								}]
							},
							options: {
								responsive: !window.MSInputMethodContext,
								maintainAspectRatio: false,
								legend: {
									display: false
								}
							}
						});
					});
				</script>
			</div>
			<div class="col-12 col-lg-6 col-xl-4 d-flex">
				<div class="card flex-fill w-100">
					<div class="card-header">
						<div class="card-actions float-right">
							<div class="dropdown show">
								<a href="#" data-toggle="dropdown" data-display="static">
<i class="align-middle" data-feather="more-horizontal"></i>
</a>

								<div class="dropdown-menu dropdown-menu-right">
									<a class="dropdown-item" href="#">Action</a>
									<a class="dropdown-item" href="#">Another action</a>
									<a class="dropdown-item" href="#">Something else here</a>
								</div>
							</div>
						</div>
						<h5 class="card-title mb-0">Schedule</h5>
					</div>
					<div class="p-4 border-bottom">
						<h2>You have 2 appointments today!</h2>
						<p class="mb-0 text-sm">Your next meeting is in 3 hours. Check your <a href="#">schedule</a> to see the details.</p>
					</div>
					<div class="card-body">
						<ul class="timeline">

							<?php
								$a="SELECT * FROM  log ORDER BY tgl_log DESC LIMIT 5";
								$b=mysqli_query($connect,$a);
								while($row=mysqli_fetch_array($b)){
								@$nomor++;
							?>
							<li class="timeline-item">
								<strong><?= $row['email']?></strong>
								<span class="float-right text-muted text-sm"><?= time_elapsed_string($row['tgl_log']);?></span>
								<p>Nam pretium turpis et arcu. Duis arcu tortor, suscipit eget, imperdiet nec, imperdiet iaculis, ipsum...</p>
							</li>
						<?php } ?>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-12 col-lg-6 col-xl-8 d-flex">
				<div class="card flex-fill">
					<div class="card-header">
						<div class="card-actions float-right">
							<div class="dropdown show">
								<a href="#" data-toggle="dropdown" data-display="static">
<i class="align-middle" data-feather="more-horizontal"></i>
</a>

								<div class="dropdown-menu dropdown-menu-right">
									<a class="dropdown-item" href="#">Action</a>
									<a class="dropdown-item" href="#">Another action</a>
									<a class="dropdown-item" href="#">Something else here</a>
								</div>
							</div>
						</div>
						<h5 class="card-title mb-0">Top Selling Products</h5>
					</div>
					<table id="datatables-dashboard-products" class="table table-striped my-0">
						<thead>
							<tr>
								<th>Name</th>
								<th class="d-none d-xl-table-cell">Tech</th>
								<th class="d-none d-xl-table-cell">License</th>
								<th class="d-none d-xl-table-cell">Tickets</th>
								<th>Sales</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>AppStack Theme</td>
								<td><span class="badge badge-success">HTML</span></td>
								<td class="d-none d-xl-table-cell">Single license</td>
								<td class="d-none d-xl-table-cell">50</td>
								<td class="d-none d-xl-table-cell">720</td>
							</tr>
							<tr>
								<td>Spark Theme</td>
								<td><span class="badge badge-danger">Angular</span></td>
								<td class="d-none d-xl-table-cell">Single license</td>
								<td class="d-none d-xl-table-cell">20</td>
								<td class="d-none d-xl-table-cell">540</td>
							</tr>
							<tr>
								<td>Milo Theme</td>
								<td><span class="badge badge-warning">React</span></td>
								<td class="d-none d-xl-table-cell">Single license</td>
								<td class="d-none d-xl-table-cell">40</td>
								<td class="d-none d-xl-table-cell">280</td>
							</tr>
							<tr>
								<td>Ada Theme</td>
								<td><span class="badge badge-info">Vue</span></td>
								<td class="d-none d-xl-table-cell">Single license</td>
								<td class="d-none d-xl-table-cell">60</td>
								<td class="d-none d-xl-table-cell">610</td>
							</tr>
							<tr>
								<td>Abel Theme</td>
								<td><span class="badge badge-danger">Angular</span></td>
								<td class="d-none d-xl-table-cell">Single license</td>
								<td class="d-none d-xl-table-cell">80</td>
								<td class="d-none d-xl-table-cell">150</td>
							</tr>
							<tr>
								<td>Spark Theme</td>
								<td><span class="badge badge-success">HTML</span></td>
								<td class="d-none d-xl-table-cell">Single license</td>
								<td class="d-none d-xl-table-cell">20</td>
								<td class="d-none d-xl-table-cell">480</td>
							</tr>
							<tr>
								<td>Libre Theme</td>
								<td><span class="badge badge-warning">React</span></td>
								<td class="d-none d-xl-table-cell">Single license</td>
								<td class="d-none d-xl-table-cell">30</td>
								<td class="d-none d-xl-table-cell">280</td>
							</tr>
							<tr>
								<td>Von Theme</td>
								<td><span class="badge badge-danger">Angular</span></td>
								<td class="d-none d-xl-table-cell">Single license</td>
								<td class="d-none d-xl-table-cell">50</td>
								<td class="d-none d-xl-table-cell">350</td>
							</tr>
							<tr>
								<td>Material Blog Theme</td>
								<td><span class="badge badge-info">Vue</span></td>
								<td class="d-none d-xl-table-cell">Single license</td>
								<td class="d-none d-xl-table-cell">10</td>
								<td class="d-none d-xl-table-cell">480</td>
							</tr>
						</tbody>
					</table>
				</div>

				<script>
					document.addEventListener("DOMContentLoaded", function(event) {
						$('#datatables-dashboard-products').DataTable({
							pageLength: 6,
							lengthChange: false,
							bFilter: false,
							autoWidth: false
						});
					});
				</script>
			</div>
			<div class="col-12 col-lg-6 col-xl-4 d-flex" id="chat">
				<div class="card flex-fill w-100">
					<div class="card-header">
						<div class="card-actions float-right">
							<div class="dropdown show">
								<a href="#" data-toggle="dropdown" data-display="static">
<i class="align-middle" data-feather="more-horizontal"></i>
</a>

								<div class="dropdown-menu dropdown-menu-right">
									<a class="dropdown-item" href="#">Action</a>
									<a class="dropdown-item" href="#">Another action</a>
									<a class="dropdown-item" href="#" onclick="closeForm()">Close</a>
								</div>
							</div>
						</div>
						<h5 class="card-title mb-0">New Members</h5>
					</div>
					<div class="card-body">
						<div class="media">
							<img src="img/avatars/avatar-5.jpg" width="36" height="36" class="rounded-circle mr-2" alt="Kathy Davis">
							<div class="media-body">
								<small class="float-right text-navy">15m ago</small>
								<strong>Kathy Davis</strong> started following <strong>Marie Salter</strong><br />
								<small class="text-muted">Today 6:41 pm</small><br />

							</div>
						</div>

						<hr />
						<div class="media">
							<img src="img/avatars/avatar-5.jpg" width="36" height="36" class="rounded-circle mr-2" alt="Andrew Jones">
							<div class="media-body">
								<small class="float-right text-navy">1h ago</small>
								<strong>Andrew Jones</strong> posted something on <strong>Marie Salter</strong>'s timeline<br />
								<small class="text-muted">Today 5:41 pm</small>

								<div class="border text-sm text-muted p-2 mt-1">
									Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem...
								</div>
							</div>
						</div>


						<hr />
						<a href="#" class="btn btn-primary btn-block">Load more</a>
					</div>
				</div>



				<div class="chat-popup" id="myForm">
				<form action="/action_page.php" class="form-container">
				<div class="card flex-fill w-100">
					<div class="card-header">
						<div class="card-actions float-right">
							<div class="dropdown show">
								<a href="#" data-toggle="dropdown" data-display="static">
									<i class="align-middle" data-feather="more-horizontal"></i>
								</a>

								<div class="dropdown-menu dropdown-menu-right">
									<a class="dropdown-item" href="#">Action</a>
									<a class="dropdown-item" href="#">Another action</a>
									<a class="dropdown-item" href="#" onclick="closeForm()">Close</a>
								</div>
							</div>
						</div>
						<h5 class="card-title mb-0">New Members</h5>
					</div>
					<div class="card-body">
						<div class="media">
							<img src="img/avatars/avatar-5.jpg" width="36" height="36" class="rounded-circle mr-2" alt="Kathy Davis">
							<div class="media-body">
								<small class="float-right text-navy">15m ago</small>
								<strong>Kathy Davis</strong> started following <strong>Marie Salter</strong><br />
								<small class="text-muted">Today 6:41 pm</small><br />

							</div>
						</div>

						<hr />
						<div class="media">
							<img src="img/avatars/avatar-5.jpg" width="36" height="36" class="rounded-circle mr-2" alt="Andrew Jones">
							<div class="media-body">
								<small class="float-right text-navy">1h ago</small>
								<strong>Andrew Jones</strong> posted something on <strong>Marie Salter</strong>'s timeline<br />
								<small class="text-muted">Today 5:41 pm</small>

								<div class="border text-sm text-muted p-2 mt-1">
									Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem...
								</div>
							</div>
						</div>
						<button type="submit" class="btn">Send</button>
						<button type="button" class="btn cancel" onclick="closeForm()">Close</button>

					</div>
				</div>

</form>
</div>


			</div>
		</div>

		<button class="open-button" onclick="openForm()"><i class="align-middle" data-feather="message-square"></i></button>

	</div>
</main>

<footer class="footer">
	<div class="container-fluid">
		<div class="row text-muted">
			<div class="col-6 text-left">
				<p class="mb-0">
					&copy; <a href="index.html" class="text-muted">Vuze</a>
				</p>
			</div>
			<div class="col-6 text-right">
				<ul class="list-inline">
					<li class="list-inline-item">
						<a class="text-muted" href="#">About us</a>
					</li>
					<li class="list-inline-item">
						<a class="text-muted" href="#">Help</a>
					</li>
					<li class="list-inline-item">
						<a class="text-muted" href="#">Contact</a>
					</li>
					<li class="list-inline-item">
						<a class="text-muted" href="#">Terms & Conditions</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</footer>
</div>
</div>

<div class="modal fade" id="centeredModalPrimary" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Centered modal</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body m-3">
				<p class="mb-0">Use Bootstrap’s JavaScript modal plugin to add dialogs to your site for lightboxes, user notifications, or completely custom content.</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>

<script>
	function openForm() {
	document.getElementById("myForm").style.display = "block";
	}

	function closeForm() {
	document.getElementById("myForm").style.display = "none";
	}
</script>
<script src="js/app.js"></script>

</body>

</html>
