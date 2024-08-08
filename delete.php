<?php
    include "./dbConnection.php";
    $id = $_GET['del_id'];
    $sql = "DELETE FROM `crud`  WHERE `sno`=$id";
    $result = mysqli_query($conn,$sql);
    if ($result) {
        header("location:./index.php");
    }else{
        echo"Error " . mysqli_error($conn);
    }
?>