<?php

/*
 * Following code will list all the products
 */

// array for JSON response
$response = array();


// include db connect class
require_once("../site/db_connect.php");

// connecting to db
$db = new DB_CONNECT();

// get all products from products table
$result = mysql_query("SELECT *FROM sorular") or die(mysql_error());

// check for empty result
if (mysql_num_rows($result) > 0) {
    // looping through all results
    // products node
    $response["sorular"] = array();
    
    while ($row = mysql_fetch_array($result)) {
        // temp user array
        $product = array();
        $product["ID"] = $row["ID"];
        $product["aciklama"] = $row["Aciklama"];
        $product["sorumetni"] = $row["SoruMetin"];
        $product["dersadi"] = $row["DersAdi"];
        $product["filename"] = $row["FileName"];



        // push single product into final response array
        array_push($response["sorular"], $product);
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
