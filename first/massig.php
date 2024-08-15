<?php
include './conn.php';
session_start();
$send='';
$namemassige =  $_SESSION['username'];
if (isset($_POST['sendmassige'])) {
    $massige=$_POST['textmassig'];
 
    global $send;
   $send='Send Massig';
  mysqli_query($conn,"INSERT INTO `nassige`(`massigeadmin`)VALUES('$massige')");  
};

$sqlmassig = mysqli_query($conn,"SELECT * FROM `massigeuser` WHERE `namemassigeuser`= '$namemassige'");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>massige</title>
    <script>
        if(window.history.replaceState){
window.history.replaceState(null,null,window.location.href)
        }
    </script>
</head>
<link rel="stylesheet" href="./css/massig.css">
<body>
    <div class="contmassig">
<div class="formdivmassig">
  <form method="post">
  <textarea required name="textmassig" id="textmassig" placeholder="Your massige"></textarea>
  <center><p>ريسالا ته دئ كه هيت بئ كو كه س بزانيت ز لايئ ته فه هاتيه فرئكرن</p></center>
  <center><p style="color:green;"><?=$send?></p></center>
  <button name="sendmassige" class="sendbmassig">Send Massige</button>
</form>
<br>
</div>
<hr>
<br>
<h2 class="my">Massige For You</h2>
<div class="seemassige">
    <?php
    while ($rowmassiguser =mysqli_fetch_assoc($sqlmassig)) {
        ?>

<button class="massigb"> <?=$rowmassiguser['massigeuser']?></button>
<p class="nm"><?=$rowmassiguser['where']?> /<?=$rowmassiguser['datemassigeuser']?> </p> 

        <?php
    }
    ?>

</div>
    </div>
    <?php include './nav.php'?>
</body>
</html>