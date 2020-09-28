
<?php

/*
 * Following code will list all the products
 */

$soruID =$_GET['id'];

// array for JSON response
$response = array();


// include db connect class
require_once("../site/db_connect.php");

// connecting to db
$db = new DB_CONNECT();
mysql_query("SET NAMES UTF8");
// get all products from products table
$result = mysql_query("SELECT *FROM yorumlar WHERE SoruID='$soruID'") or die(mysql_error());

// check for empty result
if (mysql_num_rows($result) > 0) {
    // looping through all results
    // products node
    $response["yorumlar"] = array();
    
    while ($row = mysql_fetch_array($result)) {
        // temp user array
        $product = array();
        $product["id"] = $row["ID"];
        $product["soruid"] = $row["SoruID"];
        $product["user"] = $row["Kullanici"];
        $product["yorummetni"] = $row["YorumMetin"];
        $product["tarih"] = $row["Tarih"];


        // push single product into final response array
        array_push($response["yorumlar"], $product);
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
