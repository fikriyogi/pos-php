<?php
$ip = @$_REQUEST['REMOTE_ADDR']; // the IP address to query
$query = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip));
if($query && $query['status'] == 'success') {
  echo 'Hello visitor from '.$query['query'].' '.$query['status'].' '.$query['country'].' '.$query['countryCode'].' '.$query['region'].' '.$query['regionName'].' '.$query['city'].' '.$query['lat'].' '.$query['lon'].' '.$query['timezone'].' '.$query['isp'].' '.$query['org'].' '.$query['as'].' !';
} else {
  echo 'Unable to get location';
}
?>
