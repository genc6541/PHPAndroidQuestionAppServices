<?php

/*
 * Following code will list all the products
 */

$durum="0";

// array for JSON response
$response = array();


// include db connect class
require_once("../site/db_connect.php");

// connecting to db
$db = new DB_CONNECT();

// get all products from products table
$result = mysql_query("SELECT *FROM kullanicilar WHERE Durum='$durum'") or die(mysql_error());

// check for empty result
if (mysql_num_rows($result) > 0) {
    // looping through all results
    // products node
    $response["kullanicilar"] = array();
    
    while ($row = mysql_fetch_array($result)) {
        // temp user array
        $product = array();
        $product["kullaniciadi"] = $row["KullaniciAdi"];
        $product["sifre"] = $row["Sifre"];
	$product["durum"] = $row["Durum"];
        $product["eposta"] = $row["Eposta"];



        // push single product into final response array
        array_push($response["kullanicilar"], $product);
    }
    // success
    $response["success"] = 1;

    // echoing JSON response
    echo json_encode($response);
} else {
    // no products found
    $response["success"] = 0;
    $response["message"] = "No products found";

    // echo no users JSON
    echo json_encode($response);
}
?>
