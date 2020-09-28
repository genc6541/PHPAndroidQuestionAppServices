<?php


$host  ="androidmusicdownload.com";
$uname = "andro_deneme";
$pwd = "karakartal65*";
$db = "androidm_deneme";


 $file_path = "../site/images/";

$file_path = $file_path.basename( $_FILES['uploaded_file']['name']);
if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $file_path)) {
   
    $con = mysql_connect($host,$uname,$pwd) or die("connection failed");
    mysql_select_db($db,$con) or die("db selection failed"); 

    $filename=$_FILES['uploaded_file']['tmp_name'];


     $flag['code']=0;

    if($r=mysql_query("INSERT INTO `dokuman`(`FileName`,`Path`) VALUES ('$filename','$file_path')",$con))
    {
        $flag['code']=1;
        echo"hi";
    }

    print(json_encode($flag));
    mysql_close($con);

} else{
    echo "fail";
    }


 ?>