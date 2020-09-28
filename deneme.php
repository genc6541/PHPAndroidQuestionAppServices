<?php

function cevir_tr($text) {
$icerik = trim($text);
$aranan = array('G','g','i','S','s');
$degisen = array('G','g','i','S','s');
$yeni_metin = str_replace($aranan,$degisen,$icerik);
return $yeni_metin;
}

$giden = "asagidaki siwan";

$gelen = cevir_tr($giden);

echo $gelen; 

?>  