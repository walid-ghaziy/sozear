<?php
include './conn.php';



if (isset($_POST['serchb'])) {
    $users =$_POST['userad'];
    
};
global $users;

$sqluser = "SELECT * FROM `user` WHERE username='$users'";
$sqlTable ="SELECT `name`,SUM(`jorebtle`)as'jorebtle',SUM(`adaddrapta`)as 'adaddrapta',SUM(`adaddbtl1`)as 'adaddbtl',SUM(`mony`)as 'mony',SUM(`xrama`)as 'xrama',SUM(`inzar`)as 'inzar' FROM `table` WHERE `name`='$users' ";
$sqlTable2 ="SELECT * FROM `table` WHERE `name`='$users'  ORDER BY date DESC   ";
$sqlTable4 ="SELECT `jorebtle`,SUM(`adaddrapta`) as adaddrapta FROM `table` WHERE `name`='$users' AND `jorebtle`='1L'   ";
$sqlTable3 ="SELECT `jorebtle`,SUM(`adaddrapta`) as adaddrapta FROM `table` WHERE `name`='$users' AND `jorebtle`='4l'   ";
$sqlTable5 ="SELECT `jorebtle`,SUM(`adaddrapta`) as adaddrapta FROM `table` WHERE `name`='$users' AND `jorebtle`='750ml'   ";
$sqlTable6 ="SELECT `jorebtle`,SUM(`adaddrapta`) as adaddrapta FROM `table` WHERE `name`='$users' AND `jorebtle`='500ml'   ";

$sqlconnuser = mysqli_query($conn,$sqluser);
$sqlconn = mysqli_query($conn,$sqlTable);
$sqlconn2 = mysqli_query($conn,$sqlTable2);
$sqlconn3 = mysqli_query($conn,$sqlTable3);
$sqlconn4 = mysqli_query($conn,$sqlTable4);
$sqlconn5 = mysqli_query($conn,$sqlTable5);
$sqlconn6 = mysqli_query($conn,$sqlTable6);

$rowuser =mysqli_fetch_assoc($sqlconnuser);
$row =mysqli_fetch_assoc($sqlconn);
$row3 =mysqli_fetch_assoc($sqlconn3);
$row4 =mysqli_fetch_assoc($sqlconn4);
$row5 =mysqli_fetch_assoc($sqlconn5);
$row6 =mysqli_fetch_assoc($sqlconn6);



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="./css/table.css">
<body>


    
    <div class="contenertable">
        
        <div class="serch">
            <form method="post">
          
           <select name="userad" id="list">
           <?php
           $squserad=mysqli_query($conn,"SELECT * FROM `user`");
            while ($al= mysqli_fetch_assoc($squserad)) {
                ?>
           <option selected value=<?=$al['username']?>><?=$al['username']?></option>
        <?php
            }
        ?>
           </select>
        
           <button name="serchb" id="serchb">SERCH</button>
            </form>
        </div>

    <div class="row2">

    <div class="img-name">
    <img src="./Instagram_logo_2016.svg.webp" alt="">
    <h1><?=$rowuser['username']?></h1>
    <button>From <?=$rowuser['from']?></button>
    <button><?=$rowuser['berth']?></button>
    <p> <span> روزا هاتيه وه ركرتن </span> <?=$rowuser['dateaccont']?></p>

</div>
<h1 class="allinfo">All Information</h1>
<div class="tabl">
<div class="inf">
<span class="span-price2">Mony / باره</span> <p id="mony" class="span-price">+<?=$row['mony']?></p>
</div>
<div class="inf">
<span class="span-price2">Allrapta / عدد ربطه</span> <p class="span-price"><?=$row['adaddrapta']?></p>
</div>
<div class="inf">
<span class="span-price2">ِِِAll btl / عدد بطل</span> <p class="span-price"><?=$row['adaddbtl']?></p>
</div>
<div class="inf">
<span class="span-price2">Enzar</span> <p class="span-price"><?=$row['inzar']?></p>
</div>
<div class="inf">
<span class="span-price2" >xrama</span> <p  class="span-price"><s id="xrama"><?=$row['xrama']?></s></p>
</div>

<br><br>

<div class="infoalbtl">
    <br>
<center><h3>Btl Information</h3></center>
<table>
    <tr>
      <th><?=$row3['jorebtle']?></th>
      <th><?=$row4['jorebtle']?></th>
      <th><?=$row5['jorebtle']?>  </th>
      <th><?=$row6['jorebtle']?> </th>
    </tr>

    <tr>
        <td><?=$row3['adaddrapta']?></td>
        <td><?=$row4['adaddrapta']?></td>
        <td><?=$row5['adaddrapta']?></td>
        <td><?=$row6['adaddrapta']?></td>
    </tr>
</table>
</div>





</body>
</html>