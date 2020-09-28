<?php

/*
 * Following code will update a product information
 * A product is identified by product id (pid)
 */

        $host  ="androidmusicdownload.com";
        $uname = "andro_deneme";
        $pwd = "karakartal6541***";
        $db = "androidm_deneme";


	$con = mysql_connect($host,$uname,$pwd) or die("connection failed");
	mysql_select_db($db,$con) or die("db selection failed");
	
	$kullaniciadi = $_REQUEST['kullaniciadi'];
    $sifre = $_REQUEST['sifre'];
    $eposta = $_REQUEST['eposta'];
    $durum = $_REQUEST['durum'];

    // mysql update row with matched KullaniciAdi

 	$flag['code']=0;

	if($r=mysql_query("UPDATE kullanicilar SET Durum='$durum' WHERE KullaniciAdi='$kullaniciadi'",$con))
	{
		$flag['code']=1;
		echo"hi";
	}

	print(json_encode($flag));
	mysql_close($con);

?>
