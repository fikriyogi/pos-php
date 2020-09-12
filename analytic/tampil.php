tampil.php
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


<?= get_client_ip()?>
<?= UserInfo::get_ip();?>
<?= UserInfo::get_device();?>
<?= UserInfo::get_os();?>
<?= UserInfo::get_browser();?>
<?= gethostname()?>
<?= SR()?>
<?= lat()?>
<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>
