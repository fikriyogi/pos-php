<?php
@session_start();

class UserInfo {
        private static function get_user_agent() {
                return $_SERVER['HTTP_USER_AGENT'];
        }
        public static function get_ip() {
                $mainIp = '';
                if (getenv('HTTP_CLIENT_IP')) $mainIp = getenv('HTTP_CLIENT_IP');
                else if (getenv('HTTP_X_FORWARDED_FOR')) $mainIp = getenv('HTTP_X_FORWARDED_FOR');
                else if (getenv('HTTP_X_FORWARDED')) $mainIp = getenv('HTTP_X_FORWARDED');
                else if (getenv('HTTP_FORWARDED_FOR')) $mainIp = getenv('HTTP_FORWARDED_FOR');
                else if (getenv('HTTP_FORWARDED')) $mainIp = getenv('HTTP_FORWARDED');
                else if (getenv('REMOTE_ADDR')) $mainIp = getenv('REMOTE_ADDR');
                else $mainIp = 'UNKNOWN';
                return $mainIp;
        }
        public static function get_os() {
                $user_agent = self::get_user_agent();
                $os_platform = "Unknown OS Platform";
                $os_array = array(
                        '/windows nt 10/i' => 'Windows 10',
                        '/windows nt 6.3/i' => 'Windows 8.1',
                        '/windows nt 6.2/i' => 'Windows 8',
                        '/windows nt 6.1/i' => 'Windows 7',
                        '/windows nt 6.0/i' => 'Windows Vista',
                        '/windows nt 5.2/i' => 'Windows Server 2003/XP x64',
                        '/windows nt 5.1/i' => 'Windows XP',
                        '/windows xp/i' => 'Windows XP',
                        '/windows nt 5.0/i' => 'Windows 2000',
                        '/windows me/i' => 'Windows ME',
                        '/win98/i' => 'Windows 98',
                        '/win95/i' => 'Windows 95',
                        '/win16/i' => 'Windows 3.11',
                        '/macintosh|mac os x/i' => 'Mac OS X',
                        '/mac_powerpc/i' => 'Mac OS 9',
                        '/linux/i' => 'Linux',
                        '/ubuntu/i' => 'Ubuntu',
                        '/iphone/i' => 'iPhone',
                        '/ipod/i' => 'iPod',
                        '/ipad/i' => 'iPad',
                        '/android/i' => 'Android',
                        '/blackberry/i' => 'BlackBerry',
                        '/webos/i' => 'Mobile'
                );
                foreach ($os_array as $regex => $value) {
                        if (preg_match($regex, $user_agent)) {
                                $os_platform = $value;
                        }
                }
                return $os_platform;
        }
        public static function get_browser() {
                $user_agent = self::get_user_agent();
                $browser = "Unknown Browser";
                $browser_array = array(
                        '/msie/i' => 'Internet Explorer',
                        '/Trident/i' => 'Internet Explorer',
                        '/firefox/i' => 'Firefox',
                        '/safari/i' => 'Safari',
                        '/chrome/i' => 'Chrome',
                        '/edge/i' => 'Edge',
                        '/opera/i' => 'Opera',
                        '/netscape/i' => 'Netscape',
                        '/maxthon/i' => 'Maxthon',
                        '/konqueror/i' => 'Konqueror',
                        '/ubrowser/i' => 'UC Browser',
                        '/mobile/i' => 'Handheld Browser'
                );
                foreach ($browser_array as $regex => $value) {
                        if (preg_match($regex, $user_agent)) {
                                $browser = $value;
                        }
                }
                return $browser;
        }
        public static function get_device() {
                $tablet_browser = 0;
                $mobile_browser = 0;
                if (preg_match('/(tablet|ipad|playbook)|(android(?!.*(mobi|opera mini)))/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
                        $tablet_browser++;
                }
                if (preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|android|iemobile)/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
                        $mobile_browser++;
                }
                if ((strpos(strtolower($_SERVER['HTTP_ACCEPT']) , 'application/vnd.wap.xhtml+xml') > 0) or ((isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE'])))) {
                        $mobile_browser++;
                }
                $mobile_ua = strtolower(substr(self::get_user_agent() , 0, 4));
                $mobile_agents = array(
                        'w3c ',
                        'acs-',
                        'alav',
                        'alca',
                        'amoi',
                        'audi',
                        'avan',
                        'benq',
                        'bird',
                        'blac',
                        'blaz',
                        'brew',
                        'cell',
                        'cldc',
                        'cmd-',
                        'dang',
                        'doco',
                        'eric',
                        'hipt',
                        'inno',
                        'ipaq',
                        'java',
                        'jigs',
                        'kddi',
                        'keji',
                        'leno',
                        'lg-c',
                        'lg-d',
                        'lg-g',
                        'lge-',
                        'maui',
                        'maxo',
                        'midp',
                        'mits',
                        'mmef',
                        'mobi',
                        'mot-',
                        'moto',
                        'mwbp',
                        'nec-',
                        'newt',
                        'noki',
                        'palm',
                        'pana',
                        'pant',
                        'phil',
                        'play',
                        'port',
                        'prox',
                        'qwap',
                        'sage',
                        'sams',
                        'sany',
                        'sch-',
                        'sec-',
                        'send',
                        'seri',
                        'sgh-',
                        'shar',
                        'sie-',
                        'siem',
                        'smal',
                        'smar',
                        'sony',
                        'sph-',
                        'symb',
                        't-mo',
                        'teli',
                        'tim-',
                        'tosh',
                        'tsm-',
                        'upg1',
                        'upsi',
                        'vk-v',
                        'voda',
                        'wap-',
                        'wapa',
                        'wapi',
                        'wapp',
                        'wapr',
                        'webc',
                        'winw',
                        'winw',
                        'xda ',
                        'xda-'
                );
                if (in_array($mobile_ua, $mobile_agents)) {
                        $mobile_browser++;
                }
                if (strpos(strtolower(self::get_user_agent()) , 'opera mini') > 0) {
                        $mobile_browser++;
                        //Check for tablets on opera mini alternative headers
                        $stock_ua = strtolower(isset($_SERVER['HTTP_X_OPERAMINI_PHONE_UA']) ? $_SERVER['HTTP_X_OPERAMINI_PHONE_UA'] : (isset($_SERVER['HTTP_DEVICE_STOCK_UA']) ? $_SERVER['HTTP_DEVICE_STOCK_UA'] : ''));
                        if (preg_match('/(tablet|ipad|playbook)|(android(?!.*mobile))/i', $stock_ua)) {
                                $tablet_browser++;
                        }
                }
                if ($tablet_browser > 0) {
                        // do something for tablet devices
                        return 'Tablet';
                }
                else if ($mobile_browser > 0) {
                        // do something for mobile devices
                        return 'Mobile';
                }
                else {
                        // do something for everything else
                        return 'Computer';
                }
        }
}

// user log
function userLog() {
        // Connects to your Database
        $connect = mysqli_connect('localhost', 'root', '', 'user-management');
        //Adds one to the counter
        $ip = getUserIP();
        $browser = UserInfo::get_browser();
        $os = UserInfo::get_os();
        $hostname = gethostname();
        $devices = UserInfo::get_device();
        $url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $user = $_SESSION['user'];
        $resolution = SR();
        $mac = lat();
        mysqli_query($connect, "INSERT INTO 
  `analytic` (`id`, `ip`, `browser`, `os`, `hostname`, `device`, `url`, `user`, `resolution`, `mac`, `visit_date`) 
  VALUES (NULL, '$ip', '$browser', '$os', '$hostname', '$devices', '$url', '$user', '$resolution', '$mac', CURRENT_TIMESTAMP)");
        // mysqli_query($connect, "INSERT INTO analytic ");
        //Retrieves the current count
        @$count = mysqli_fetch_row(mysqli_query($connect, "SELECT counter FROM counter"));
        //Displays the count on your site
        print "$count[0]";
}

function lat() {
        $ip = @$_REQUEST['REMOTE_ADDR']; // the IP address to query
        $query = @unserialize(file_get_contents('http://ip-api.com/php/' . $ip));
        if ($query && $query['status'] == 'success') {
                echo $query['lat'];
        }
        else {
                echo 'Unable to get location';
        }
}
function SR() {
        if (isset($_SESSION['screen_width']) and isset($_SESSION['screen_height'])) {
                echo $_SESSION['screen_width'] . 'x' . $_SESSION['screen_height'];
        }
        else if (isset($_REQUEST['width']) and isset($_REQUEST['height'])) {
                $_SESSION['screen_width'] = $_REQUEST['width'];
                $_SESSION['screen_height'] = $_REQUEST['height'];
                header('Location: ' . $_SERVER['PHP_SELF']);
        }
        else {
                echo '<script type="text/javascript">window.location = "' . $_SERVER['PHP_SELF'] . '?width="+screen.width+"&height="+screen.height;</script>';
        }
}

date_default_timezone_set('Asia/Jakarta');
// echo facebook_time_ago('2016-03-11 04:58:00');
function facebook_time_ago($timestamp) {
        $time_ago = strtotime($timestamp);
        $current_time = time();
        $time_difference = $current_time - $time_ago;
        $seconds = $time_difference;
        $minutes = round($seconds / 60); // value 60 is seconds
        $hours = round($seconds / 3600); //value 3600 is 60 minutes * 60 sec
        $days = round($seconds / 86400); //86400 = 24 * 60 * 60;
        $weeks = round($seconds / 604800); // 7*24*60*60;
        $months = round($seconds / 2629440); //((365+365+365+365+366)/5/12)*24*60*60
        $years = round($seconds / 31553280); //(365+365+365+365+366)/5 * 24 * 60 * 60
        if ($seconds <= 60) {
                return "Just Now";
        }
        else if ($minutes <= 60) {
                if ($minutes == 1) {
                        return "one minute ago";
                }
                else {
                        return "$minutes minutes ago";
                }
        }
        else if ($hours <= 24) {
                if ($hours == 1) {
                        return "an hour ago";
                }
                else {
                        return "$hours hrs ago";
                }
        }
        else if ($days <= 7) {
                if ($days == 1) {
                        return "yesterday";
                }
                else {
                        return "$days days ago";
                }
        }
        else if ($weeks <= 4.3) //4.3 == 52/12
        {
                if ($weeks == 1) {
                        return "a week ago";
                }
                else {
                        return "$weeks weeks ago";
                }
        }
        else if ($months <= 12) {
                if ($months == 1) {
                        return "a month ago";
                }
                else {
                        return "$months months ago";
                }
        }
        else {
                if ($years == 1) {
                        return "one year ago";
                }
                else {
                        return "$years years ago";
                }
        }
}

function time_elapsed_string($datetime, $full = false) {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = array(
                'y' => 'year',
                'm' => 'month',
                'w' => 'week',
                'd' => 'day',
                'h' => 'hour',
                'i' => 'minute',
                's' => 'second',
        );
        foreach ($string as $k => & $v) {
                if ($diff->$k) {
                        $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
                }
                else {
                        unset($string[$k]);
                }
        }

        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
}

function get_image_location($image = '') {
        $exif = exif_read_data($image, 0, true);
        if ($exif && isset($exif['GPS'])) {
                $GPSLatitudeRef = $exif['GPS']['GPSLatitudeRef'];
                $GPSLatitude = $exif['GPS']['GPSLatitude'];
                $GPSLongitudeRef = $exif['GPS']['GPSLongitudeRef'];
                $GPSLongitude = $exif['GPS']['GPSLongitude'];

                $lat_degrees = count($GPSLatitude) > 0 ? gps2Num($GPSLatitude[0]) : 0;
                $lat_minutes = count($GPSLatitude) > 1 ? gps2Num($GPSLatitude[1]) : 0;
                $lat_seconds = count($GPSLatitude) > 2 ? gps2Num($GPSLatitude[2]) : 0;

                $lon_degrees = count($GPSLongitude) > 0 ? gps2Num($GPSLongitude[0]) : 0;
                $lon_minutes = count($GPSLongitude) > 1 ? gps2Num($GPSLongitude[1]) : 0;
                $lon_seconds = count($GPSLongitude) > 2 ? gps2Num($GPSLongitude[2]) : 0;

                $lat_direction = ($GPSLatitudeRef == 'W' or $GPSLatitudeRef == 'S') ? -1 : 1;
                $lon_direction = ($GPSLongitudeRef == 'W' or $GPSLongitudeRef == 'S') ? -1 : 1;

                $latitude = $lat_direction * ($lat_degrees + ($lat_minutes / 60) + ($lat_seconds / (60 * 60)));
                $longitude = $lon_direction * ($lon_degrees + ($lon_minutes / 60) + ($lon_seconds / (60 * 60)));

                return array(
                        'latitude' => $latitude,
                        'longitude' => $longitude
                );
        }
        else {
                return false;
        }
}

function gps2Num($coordPart) {
        $parts = explode('/', $coordPart);
        if (count($parts) <= 0) return 0;
        if (count($parts) == 1) return $parts[0];
        return floatval($parts[0]) / floatval($parts[1]);
}

function getRealIpAddr() {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) //check ip from share internet
        {
                $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) //to check ip is pass from proxy
        {
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        else {
                $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
}
function getUserIP() {
        if (array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER) && !empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                if (strpos($_SERVER['HTTP_X_FORWARDED_FOR'], ',') > 0) {
                        $addr = explode(",", $_SERVER['HTTP_X_FORWARDED_FOR']);
                        return trim($addr[0]);
                }
                else {
                        return $_SERVER['HTTP_X_FORWARDED_FOR'];
                }
        }
        else {
                return $_SERVER['REMOTE_ADDR'];
        }
}

// $user_ip = getUserIP();
function get_client_ip() {
        $ipaddress = '182.1.53.50';
        if (isset($_SERVER['HTTP_CLIENT_IP'])) $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if (isset($_SERVER['HTTP_X_FORWARDED'])) $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if (isset($_SERVER['HTTP_FORWARDED_FOR'])) $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if (isset($_SERVER['HTTP_FORWARDED'])) $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if (isset($_SERVER['REMOTE_ADDR'])) $ipaddress = $_SERVER['REMOTE_ADDR'];
        else $ipaddress = 'UNKNOWN';
        return $ipaddress;
}
$PublicIP = get_client_ip();
@$json = file_get_contents("http://ipinfo.io/$PublicIP/geo");
$json = json_decode($json, true);
@$country = $json['country'];
@$region = $json['region'];
@$city = $json['city'];

function getOS($user_agent = null) {
        if (!isset($user_agent) && isset($_SERVER['HTTP_USER_AGENT'])) {
                $user_agent = $_SERVER['HTTP_USER_AGENT'];
        }

        // https://stackoverflow.com/questions/18070154/get-operating-system-info-with-php
        $os_array = ['windows nt 10' => 'Windows 10', 'windows nt 6.3' => 'Windows 8.1', 'windows nt 6.2' => 'Windows 8', 'windows nt 6.1|windows nt 7.0' => 'Windows 7', 'windows nt 6.0' => 'Windows Vista', 'windows nt 5.2' => 'Windows Server 2003/XP x64', 'windows nt 5.1' => 'Windows XP', 'windows xp' => 'Windows XP', 'windows nt 5.0|windows nt5.1|windows 2000' => 'Windows 2000', 'windows me' => 'Windows ME', 'windows nt 4.0|winnt4.0' => 'Windows NT', 'windows ce' => 'Windows CE', 'windows 98|win98' => 'Windows 98', 'windows 95|win95' => 'Windows 95', 'win16' => 'Windows 3.11', 'mac os x 10.1[^0-9]' => 'Mac OS X Puma', 'macintosh|mac os x' => 'Mac OS X', 'mac_powerpc' => 'Mac OS 9', 'linux' => 'Linux', 'ubuntu' => 'Linux - Ubuntu', 'iphone' => 'iPhone', 'ipod' => 'iPod', 'ipad' => 'iPad', 'android' => 'Android', 'blackberry' => 'BlackBerry', 'webos' => 'Mobile',

        '(media center pc).([0-9]{1,2}\.[0-9]{1,2})' => 'Windows Media Center', '(win)([0-9]{1,2}\.[0-9x]{1,2})' => 'Windows', '(win)([0-9]{2})' => 'Windows', '(windows)([0-9x]{2})' => 'Windows',

        // Doesn't seem like these are necessary...not totally sure though..
        //'(winnt)([0-9]{1,2}\.[0-9]{1,2}){0,1}'=>'Windows NT',
        //'(windows nt)(([0-9]{1,2}\.[0-9]{1,2}){0,1})'=>'Windows NT', // fix by bg
        'Win 9x 4.90' => 'Windows ME', '(windows)([0-9]{1,2}\.[0-9]{1,2})' => 'Windows', 'win32' => 'Windows', '(java)([0-9]{1,2}\.[0-9]{1,2}\.[0-9]{1,2})' => 'Java', '(Solaris)([0-9]{1,2}\.[0-9x]{1,2}){0,1}' => 'Solaris', 'dos x86' => 'DOS', 'Mac OS X' => 'Mac OS X', 'Mac_PowerPC' => 'Macintosh PowerPC', '(mac|Macintosh)' => 'Mac OS', '(sunos)([0-9]{1,2}\.[0-9]{1,2}){0,1}' => 'SunOS', '(beos)([0-9]{1,2}\.[0-9]{1,2}){0,1}' => 'BeOS', '(risc os)([0-9]{1,2}\.[0-9]{1,2})' => 'RISC OS', 'unix' => 'Unix', 'os/2' => 'OS/2', 'freebsd' => 'FreeBSD', 'openbsd' => 'OpenBSD', 'netbsd' => 'NetBSD', 'irix' => 'IRIX', 'plan9' => 'Plan9', 'osf' => 'OSF', 'aix' => 'AIX', 'GNU Hurd' => 'GNU Hurd', '(fedora)' => 'Linux - Fedora', '(kubuntu)' => 'Linux - Kubuntu', '(ubuntu)' => 'Linux - Ubuntu', '(debian)' => 'Linux - Debian', '(CentOS)' => 'Linux - CentOS', '(Mandriva).([0-9]{1,3}(\.[0-9]{1,3})?(\.[0-9]{1,3})?)' => 'Linux - Mandriva', '(SUSE).([0-9]{1,3}(\.[0-9]{1,3})?(\.[0-9]{1,3})?)' => 'Linux - SUSE', '(Dropline)' => 'Linux - Slackware (Dropline GNOME)', '(ASPLinux)' => 'Linux - ASPLinux', '(Red Hat)' => 'Linux - Red Hat',
        // Loads of Linux machines will be detected as unix.
        // Actually, all of the linux machines I've checked have the 'X11' in the User Agent.
        //'X11'=>'Unix',
        '(linux)' => 'Linux', '(amigaos)([0-9]{1,2}\.[0-9]{1,2})' => 'AmigaOS', 'amiga-aweb' => 'AmigaOS', 'amiga' => 'Amiga', 'AvantGo' => 'PalmOS',
        //'(Linux)([0-9]{1,2}\.[0-9]{1,2}\.[0-9]{1,3}(rel\.[0-9]{1,2}){0,1}-([0-9]{1,2}) i([0-9]{1})86){1}'=>'Linux',
        //'(Linux)([0-9]{1,2}\.[0-9]{1,2}\.[0-9]{1,3}(rel\.[0-9]{1,2}){0,1} i([0-9]{1}86)){1}'=>'Linux',
        //'(Linux)([0-9]{1,2}\.[0-9]{1,2}\.[0-9]{1,3}(rel\.[0-9]{1,2}){0,1})'=>'Linux',
        '[0-9]{1,2}\.[0-9]{1,2}\.[0-9]{1,3})' => 'Linux', '(webtv)/([0-9]{1,2}\.[0-9]{1,2})' => 'WebTV', 'Dreamcast' => 'Dreamcast OS', 'GetRight' => 'Windows', 'go!zilla' => 'Windows', 'gozilla' => 'Windows', 'gulliver' => 'Windows', 'ia archiver' => 'Windows', 'NetPositive' => 'Windows', 'mass downloader' => 'Windows', 'microsoft' => 'Windows', 'offline explorer' => 'Windows', 'teleport' => 'Windows', 'web downloader' => 'Windows', 'webcapture' => 'Windows', 'webcollage' => 'Windows', 'webcopier' => 'Windows', 'webstripper' => 'Windows', 'webzip' => 'Windows', 'wget' => 'Windows', 'Java' => 'Unknown', 'flashget' => 'Windows',

        // delete next line if the script show not the right OS
        //'(PHP)/([0-9]{1,2}.[0-9]{1,2})'=>'PHP',
        'MS FrontPage' => 'Windows', '(msproxy)/([0-9]{1,2}.[0-9]{1,2})' => 'Windows', '(msie)([0-9]{1,2}.[0-9]{1,2})' => 'Windows', 'libwww-perl' => 'Unix', 'UP.Browser' => 'Windows CE', 'NetAnts' => 'Windows', ];

        // https://github.com/ahmad-sa3d/php-useragent/blob/master/core/user_agent.php
        $arch_regex = '/\b(x86_64|x86-64|Win64|WOW64|x64|ia64|amd64|ppc64|sparc64|IRIX64)\b/ix';
        $arch = preg_match($arch_regex, $user_agent) ? '64' : '32';

        foreach ($os_array as $regex => $value) {
                if (preg_match('{\b(' . $regex . ')\b}i', $user_agent)) {
                        return $value . ' x' . $arch;
                }
        }

        return 'Unknown';
}

// total analitik
function TotalAnalytic() {
        $connect = mysqli_connect('localhost', 'root', '', 'user-management');
        $sql = "SELECT count(*) as total from analytic";
        $query = mysqli_query($connect, $sql);
        $data = mysqli_fetch_assoc($query);
        echo $data['total'];
}

function InfoBrowserChrome() {
        $connect = mysqli_connect('localhost', 'root', '', 'user-management');
        $chrome = "Chrome";
        $sql = "SELECT count(*) as total from analytic where browser = '$chrome'";
        $query = mysqli_query($connect, $sql);
        $data = mysqli_fetch_assoc($query);
        echo $data['total'];
}
function InfoBrowser() {
        $connect = mysqli_connect('localhost', 'root', '', 'user-management');
        $chrome = "Chrome";
        $sql = "SELECT count(*) as total from analytic where browser = '$chrome'";
        $query = mysqli_query($connect, $sql);
        $data = mysqli_fetch_assoc($query);
        echo $data['total'];
}

// persen analitik
function PersenChrome() {
        $A = 54;
        $B = 44;
        $persentasi = round($B / $A * 100, 2);
        echo $persentasi;
}

