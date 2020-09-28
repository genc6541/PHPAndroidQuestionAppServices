
<?php

header('Content-Type: application/json; charset=utf8');
 	    $host  ="androidmusicdownload.com";
        $uname = "andro_deneme";
        $pwd = "karakartal6541***";
        $db = "androidm_deneme";
		
		
function cevir_tr($text) {
$icerik = trim($text);
$aranan = array('Ğ','ğ','ı','Ş','ş');
$degisen = array('G','g','i','S','s');
$yeni_metin = str_replace($aranan,$degisen,$icerik);
return $yeni_metin;
}  

	$con = mysql_connect($host,$uname,$pwd) or die("connection failed");
	mysql_select_db($db,$con) or die("db selection failed");

	    $soruid=$_REQUEST['soruid'];
        $kullanici=$_REQUEST['kullanici'];
        $tarih=$_REQUEST['tarih'];
        $yorum = $_REQUEST['yorum'];
		
		$yeniyorum = cevir_tr($yorum);
		
		
	$flag['code']=0;
	if($r=mysql_query("INSERT INTO `yorumlar`(`SoruID`,`Kullanici`,`YorumMetin`,`Tarih`) VALUES('$soruid','$kullanici','$yeniyorum','$tarih')",$con))
	{
		$flag['code']=1;
		echo"hi";

	}

        print(json_encode($flag));
	mysql_close($con);
?>


