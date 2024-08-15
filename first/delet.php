<?php
include './conn.php';
if ($_GET['deletn']) {
    
    mysqli_query($conn,"DELETE FROM `user` WHERE `username`='$deletn'");
    // header("location:./top.php");
}
?>