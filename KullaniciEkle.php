<?php
	
        $host  ="androidmusicdownload.com";
        $uname = "andro_deneme";
        $pwd = "karakartal6541***";
        $db = "androidm_deneme";


	$con = mysql_connect($host,$uname,$pwd) or die("connection failed");
	mysql_select_db($db,$con) or die("db selection failed");
	 
	$kullaniciadi=$_REQUEST['kullaniciadi'];
    $sifre=$_REQUEST['sifre'];
	$eposta=$_REQUEST['eposta'];
	$durum=$_REQUEST['durum'];

	$flag['code']=0;

	if($r=mysql_query("INSERT INTO `kullanicilar`(`KullaniciAdi`,`Sifre`,`Eposta`,`Durum`) VALUES('$kullaniciadi','$sifre','$eposta','$durum')",$con))
	{
		$flag['code']=1;
		echo"hi";
	}

	print(json_encode($flag));
	mysql_close($con);
?>