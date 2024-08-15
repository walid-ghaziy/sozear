<?php
include './conn.php';
if ($conn) {
    $sqlinfobtl = mysqli_query($conn,"SELECT * FROM `infobtl`");
    
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/infobtl.css">
</head>
<body>
    <div class="contenerinfobtl">
<?php
while ($rowinfobtl = mysqli_fetch_assoc($sqlinfobtl)) {
    ?>
 <div class="row-infobtl">
    <div class="img-infbtl">
        <img src='./image/<?=$rowinfobtl['img']?>' >
        
    </div>
<div class="info-infobtl">
     <h4><?=$rowinfobtl['sizebtl']?></h4>
<ul class="left-ul">
    <li>rapta na chekre chand btl</li>
    <li>btlchand btl b hzarake na</li>
    <li>har rapte chana bke</li>
    <li>har rapte chand karton je chedbn</li>
    <li>chand rapten na chekre d bna rapta chekre</li>
</ul>
<ul class="rigth-ul">
    <li><?=$rowinfobtl['beforrapta']?></li>
    <li><?=$rowinfobtl['btl_foronehzar']?></li>
    <li><?=$rowinfobtl['afterrapta']?></li>
    <li><?=$rowinfobtl['one_karton']?></li>
    <li><?=$rowinfobtl['total_nachekre']?></li>
</ul>
</div>
</div>
  <?php 
}
?>


</div>

<?php 

 session_start();
 if ($_SESSION['type']=='user') {
     include './nav.php';
 }elseif ($_SESSION['type']=='admin') {
     include './navadmin.php';
 }
 ?>



</body>
</html>