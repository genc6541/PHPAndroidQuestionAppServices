<meta http-equiv="Content-type" content="text/html; charset=UTF-8">
<!--?php
function json_encode_tr($string)
{
	return json_encode($string, JSON_UNESCAPED_UNICODE);
}

$array= array(array('turkish' =--> 'üğışçöÜĞİŞÇÖ'), array('chinese' => '我爱你'), array('arabic' => 'أنا أحبك'));
echo 'Örnek Dizi: ';
var_dump($array);
echo '<br>';

// Örnek Dizi: array(3) { [0]=> array(1) { ["turkish"]=> string(24) "üğışçöÜĞİŞÇÖ" } [1]=> array(1) { ["chinese"]=> string(9) "我爱你" } [2]=> array(1) { ["arabic"]=> string(15) "أنا أحبك" } } 

$encoded = json_encode($array);
echo "Standart Encoded Json: ";
var_dump($encoded);;
echo '<br>';

// Standart Encoded Json: string(178) "[{"turkish":"\u00fc\u011f\u0131\u015f\u00e7\u00f6\u00dc\u011e\u0130\u015e\u00c7\u00d6"},{"chinese":"\u6211\u7231\u4f60"},{"arabic":"\u0623\u0646\u0627 \u0623\u062d\u0628\u0643"}]" 

$encodedTr = json_encode_tr($array);
echo "Türkçe Encoded Json: ";
var_dump($encodedTr);
echo '<br>';

// Türkçe Encoded Json: string(93) "[{"turkish":"üğışçöÜĞİŞÇÖ"},{"chinese":"我爱你"},{"arabic":"أنا أحبك"}]" 

$decoded = json_decode($encoded);
echo "Decoded Json: ";
var_dump($decoded);
echo '<br>';

// Decoded Json: array(3) { [0]=> object(stdClass)#1 (1) { ["turkish"]=> string(24) "üğışçöÜĞİŞÇÖ" } [1]=> object(stdClass)#2 (1) { ["chinese"]=> string(9) "我爱你" } [2]=> object(stdClass)#3 (1) { ["arabic"]=> string(15) "أنا أحبك" } } 

$decodedTr = json_decode($encodedTr);
echo "Türkçe Decoded Json: ";
var_dump($encodedTr);
echo '<br>';

// Türkçe Decoded Json: string(93) "[{"turkish":"üğışçöÜĞİŞÇÖ"},{"chinese":"我爱你"},{"arabic":"أنا أحبك"}]" 