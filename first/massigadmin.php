<?php
include './conn.php';
session_start();
$send='';
$namemassige =  $_SESSION['username'];
if (isset($_POST['sendmassige'])) {
    $massige=$_POST['textmassig']  ;
   
    global $send;
    $namemss = $_POST['nameuserms'];
   $send='Send Massig';
   
  mysqli_query($conn,"INSERT INTO `massigeuser`(`namemassigeuser`, `massigeuser`,`where`) VALUES ('$namemss','$massige ','$namemassige')");  
};

$sqlmassig = mysqli_query($conn,"SELECT * FROM `nassige`");

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

    <select name="nameuserms" id="nameuserms">
        <?php
        $msname = mysqli_query($conn,"SELECT * FROM `user` WHERE `typeuser`='user'");
       while ($rowms =mysqli_fetch_assoc($msname)) {
        ?>
<option value=<?=$rowms['username']?>><?=$rowms['username']?></option>
        <?php
       }
       ?>
    </select>
  <textarea required name="textmassig" id="textmassig" placeholder="Your massige"></textarea>
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

<button class="massigb"> <?=$rowmassiguser['massigeadmin']?></button>
<p class="nm"><?=$rowmassiguser['datemassige']?> </p>
<br>
        <?php
    }
    ?>

</div>
<?php
include './navadmin.php';
?>
    </div>
</body>
</html>