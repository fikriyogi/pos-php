delete-data.php
<?php
include('core/db_connect.php');
// $id = $_POST['id_dps'];
//echo $music_number;
if(isset($_GET['id_dps']))
{
$qry = "DELETE FROM dps WHERE id_dps =".$_GET['id_dps'];
$result=mysqli_query($connect, $qry);
if(isset($result)) {
   echo "YES";
} else {
   echo "NO";
}
?>
