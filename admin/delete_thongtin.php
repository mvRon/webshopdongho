<?php
    if(isset($_GET["id"])){
        $id = $_GET["id"];
        include "config.php";
        $sql = "DELETE FROM user_form WHERE id=$id";
        $conn->query($sql);
        header("location: infor.php");
        exit;
    }
?>