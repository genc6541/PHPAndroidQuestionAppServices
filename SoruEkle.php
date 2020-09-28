<?php
	
        $host  ="androidmusicdownload.com";
        $uname = "andro_deneme";
        $pwd = "karakartal6541***";
        $db = "androidm_deneme";


	$con = mysql_connect($host,$uname,$pwd) or die("connection failed");
	mysql_select_db($db,$con) or die("db selection failed");
	 

  $file_path= "../site/images/";

        $filename =$_REQUEST['filename'];
		$filenamepdf =$_REQUEST['filenamepdf'];
	    $ders=$_REQUEST['ders'];
        $soru=$_REQUEST['soru']; 
        $aciklama=$_REQUEST['aciklama'];
		$ekleyen=$_REQUEST['ekleyen'];
		$tarih=$_REQUEST['tarih'];

  $file_path= "../site/images/".$filename;
  $file_path_pdf = "../site/images/".$filenamepdf;
  
	$flag['code']=0;

	if($r=mysql_query("INSERT INTO `sorular`(`SoruMetin`,`Aciklama`,`DersAdi`,`FileName`,`FileNamePDF`,`Ekleyen`,`Tarih`) VALUES('$soru','$aciklama','$ders','$file_path','$file_path_pdf','$ekleyen','$tarih')",$con))
	{
		$flag['code']=1;
		echo"hi";
	}

	print(json_encode($flag));
	mysql_close($con);
?>