<?php
include 'conn.php';
$change ='adaddbtl1';
session_start();
$typtop = $_SESSION['type'];
if (isset($_POST['changetop'])) {
    global $change;
    $change = $_POST['edittop'];
};
$sqlTable2 ="SELECT  `name`,`date` ,`adaddbtl1`,`jorebtle` FROM `table` ORDER BY $change DESC LIMIT 5";
$sqlconn2 = mysqli_query($conn,$sqlTable2);



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>top</title>
</head>
<link rel="stylesheet" href="./css/top.css">
<body>


     <br>
    <h1>All User</h1><br>
    <div class="alluser">
        <?php
        $users=mysqli_query($conn,"SELECT *  FROM `user`");
        if ($users) {
            while ($rowusers = mysqli_fetch_assoc($users)) {
       
                
             ?>
<div class="boxuser" style="background:<?php 
if($rowusers['typeuser']=='admin'){
   echo "rgb(73, 2, 2)";
}
?> ;">
   <img src="./image/<?=$rowusers['img']?>" alt="">
   <h2><?=$rowusers['username']?></h2>
   <p >Tyep : <?=$rowusers['typeuser']?></p>
   <p>number worked : <?=$rowusers['iduser']?></p>
<?php
if ($typtop == 'admin') {
 ?>
 <div class="admor">
     <form method="post">
        <a href="./inzar.php?deletn=<?=$rowusers['username']?>" id="delet">delet</a>
        <a href="./inzar.php?inzarn=<?=$rowusers['username']?>" name="inzar">inzar</a>
     </form>
 </div>
 <?php  
}elseif ($typtop == 'user') {
  ?>
<button name="like" class="like">LIKE</button>

  <?php
}
?>
</div>
            <?php
            };
        
        };
        ?>
       
        </div>
   
    <div class="conttop" >

        <div class="edit">
            <h2>Top User</h2><br>
            <form method="post">
                <select name="edittop" id="edittop">
                <option value="adaddbtl1"> butll</option>
                <option value="mony">mony</option>
                </select>
                <button name="changetop" class="changetop">Change</button>
            </form>
<br>
            <table class="tabletop" >
   

<?php
while ($row2 =mysqli_fetch_assoc($sqlconn2)) {
  ?>
 <tr>
     
        <td><?=$row2['name']?></td>
        <td><?=$row2['adaddbtl1']?> Butll</td>
        <td><?=$row2['jorebtle']?></td>
        <td><?=$row2['date']?></td>
        
    </tr>
    <?php
}
?>

   
</table>

        </div>
    </div>
    <?php 
 
    if ($_SESSION['type']=='user') {
        include './nav.php';
    }elseif ($_SESSION['type']=='admin') {
        include './navadmin.php';
    }
    ?>
</body>
</html>