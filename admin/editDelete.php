<?php
require_once "dbconnect.php";
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_GET["eid"])) {
    // echo "edit button is clicked.";
    $productId = $_GET["eid"];
    // try{
    //     $sql = "select";
    // }catch(){

    // }
} else if (isset($_GET["did"])) {
    try {
        $productId = $_GET["did"];
        $sql = "delete from product where productId=?";
        $stmt = $conn->prepare($sql); // prevent sql injection attacks using prepare
        $status = $stmt->execute([$productId]);
        if($status)
        {
            $_SESSION["deleteSuccess"] = "product ID $productId has been deleted.";
            header("location:viewProduct.php");
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
