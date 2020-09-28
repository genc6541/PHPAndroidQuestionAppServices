<?php
	
        $host  ="androidmusicdownload.com";
        $uname = "andro_deneme";
        $pwd = "karakartal6541***";
        $db = "androidm_deneme";


	$con = mysql_connect($host,$uname,$pwd) or die("connection failed");
	mysql_select_db($db,$con) or die("db selection failed");
	 
	$ders=$_REQUEST['ders'];

	$flag['code']=0;

	if($r=mysql_query("INSERT INTO `dersler`(`DersAdi`) VALUES('$ders')",$con))
	{
		$flag['code']=1;
		echo"hi";
	}

	print(json_encode($flag));
	mysql_close($con);
?>