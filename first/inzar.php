<?php
include './conn.php';
if ($_GET['inzarn']) {
    $inzarn=$_GET['inzarn'];
   $in= mysqli_query($conn,"SELECT `inzar`FROM `user` WHERE `username`='$inzarn'");
    
  $allin = mysqli_fetch_assoc($in);
$inzar = $allin['inzar']+1;
mysqli_query($conn,"UPDATE `user` SET `inzar`='$inzar'   WHERE `username`='$inzarn'");
header("location:./top.php");
}

if ($_GET['deletn']) {
    $deletn =$_GET['deletn'];
    mysqli_query($conn,"DELETE FROM `user` WHERE `username`='$deletn'");
    mysqli_query($conn,"DELETE FROM `table` WHERE `name`='$deletn'");
    header("location:./top.php");
}
?>