<?php
    if(isset($_GET["id"])){
        $id = $_GET["id"];
        include "config.php";
        $sql = "DELETE FROM `order` WHERE id=$id";
        $conn->query($sql);
        header("location: order.php");
        exit;
    }
?>