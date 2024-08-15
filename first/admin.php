<?php
include './conn.php';
session_start();
$sqladmin=mysqli_query($conn,"SELECT  `username` FROM `user` WHERE `typeuser`='user'  ");

if (isset($_POST['sendtotable'])) {
    $namea=$_POST['name'];
    $sizebtla=$_POST['sizebtl'];
    $raptaa=$_POST['raptaa'];

 $totalbtl = '';
 $totmony = '';
 $datenow=date('Y-m-d');
 $weekf = date('W');
 if ($sizebtla == '4L') {
    $totalbtl = $raptaa * 35;
    $totmony = $raptaa *35 /105*1000;   
 }else if ($sizebtla == '1L') {
    $totalbtl = $raptaa * 150;
    $totmony = ($raptaa *150 )/ 175 *1000; 
 }else if  ($sizebtla == '750ml') {
    $totalbtl = $raptaa * 175;
    $totmony = $raptaa *1000;  
 }else if  ($sizebtla == '500ml') {
    $totalbtl = $raptaa * 175;
    $totmony = $raptaa *1000;  
 };


   mysqli_query($conn,"INSERT INTO `table`(`jorebtle`, `adaddrapta`, `adaddbtl1`, `mony`,`date`, `week`,`name`)
    VALUES('$sizebtla','$raptaa','$totalbtl','$totmony','$datenow','$weekf','$namea') ");
}


if (isset($_POST['logauot'])) {
    session_unset();
    header("location:./index.php");
 }
?>
<?php

if($_SESSION['type']=='admin'){

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
        if(window.history.replaceState){
window.history.replaceState(null,null,window.location.href)
        }
    </script>
</head>
<link rel="stylesheet" href="./css/admin.css">

<div class="boxformadmin">
<form method="post">
    <button name="logauot"><i class="gg-log-in"></i></button>
</form>
   <center><b>Welcome</b></center> 
<form  method="post" class="formadmin">

<select name="name" id="nameuser">
    <?php
    while ($al= mysqli_fetch_assoc($sqladmin)) {?>
<option value=<?=$al['username']?>><?=$al['username']?></option>
<?php
    }
?>
</select>



<select name="sizebtl" class="select">
    <option value="">جورئ بطلي</option>
    <option value="4L">4L</option>
    <option value="1L">1L</option>
    <option value="750ml">750ml</option>
    <option value="500ml">500ml</option>
</select>
<input type="number" placeholder="ربطه" name="raptaa" class="rapta">
<br>
<br>

<button class="send" name="sendtotable" type="submit">SEND TO TABLE</button>
</form>



<div class="tabledivadmin">
 <h2>table Information </h2>
<table>
    <tr>
        <th>ناف</th>
        <th>جورئ بطلي</th>
        <th>عدد بطل</th>
        <th>باره</th>
        <th class="reactionth">reaction</th>
    </tr>

    <?php
    date_default_timezone_set('Asia/Baghdad');
    $datenow=date('Y-m-d');
    
    $vewtable = mysqli_query($conn,"SELECT * FROM `table` WHERE date ='$datenow' ");
    while ($rowtablef=mysqli_fetch_assoc($vewtable)) {
       ?>
    <tr>
<td class='nametd'><?=$rowtablef['name']?></td>
<td><?=$rowtablef['jorebtle']?></td>
<td><b name="jb"><?=$rowtablef['adaddrapta']?></b></td>
<td><?=$rowtablef['mony']?></td>
<td class="reaction">
    <a class="edit" name="edit" href='edit.php?id=<?=$rowtablef['idtable'] ?>'>تعديل</a>
    <a class='delet' href='edit.php?delet=<?=$rowtablef['idtable']?>'>زئبرن</a>
</td>
    </tr>


<?php
    };
    ?>

</table>

    
</div>
<?php
};?>
</div>
<?php include 'navadmin.php';?>
</body>
<script src="admin.js"></script>
</html>