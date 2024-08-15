<?php
include './conn.php';
session_start();
$lmt=4;
$Asc = 'ASC';
$List = 'Date';

if (isset($_POST['Listb'])) {
    $List = $_POST['list'];
    global $List;
}
if ($List == 'Date') {
  $Asc ='DESC';
}



$users = $_SESSION['username'];

$sqluser = "SELECT * FROM `user` WHERE username='$users'";
$sqlTable2 ="SELECT * FROM `table` WHERE `name`='$users'  ORDER BY $List DESC     ";

$sqlTable ="SELECT `name`,SUM(`jorebtle`)as'jorebtle',SUM(`adaddrapta`)as 'adaddrapta',SUM(`adaddbtl1`)as 'adaddbtl',SUM(`mony`)as 'mony',SUM(`xrama`)as 'xrama' FROM `table` WHERE `name`='$users' ";
$sqlTable4 ="SELECT `jorebtle`,SUM(`adaddrapta`) as adaddrapta FROM `table` WHERE `name`='$users' AND `jorebtle`='1L'   ";
$sqlTable3 ="SELECT `jorebtle`,SUM(`adaddrapta`) as adaddrapta FROM `table` WHERE `name`='$users' AND `jorebtle`='4L'   ";
$sqlTable5 ="SELECT `jorebtle`,SUM(`adaddrapta`) as adaddrapta FROM `table` WHERE `name`='$users' AND `jorebtle`='750ml'   ";
$sqlTable6 ="SELECT `jorebtle`,SUM(`adaddrapta`) as adaddrapta FROM `table` WHERE `name`='$users' AND `jorebtle`='500ml'   ";

if (isset($_POST['serchdate'])) {
   $dateserch = $_POST['serchdateinp'];
   $sqlTable2 ="SELECT * FROM `table` WHERE `name`='$users'  AND date ='$dateserch'  ";
}elseif (isset($_POST['recind'])) {
    $sqlTable2 ="SELECT * FROM `table` WHERE `name`='$users'  ORDER BY $List DESC     ";
   
}



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


if (isset($_POST['logauot'])) {
    session_unset();
    header("location:./index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/table.css">
   
</head>

<body>
 
    <div class="contenertable">
    <div class="row">
<form method="post">
    <button name="logauot" class="logaut"><i class="gg-log-in"></i></button>
</form>
    <div class="img-name">
    <img src="./image/<?=$rowuser['img']?>" alt="">
    <h1><?=$rowuser['username']?></h1>
    <button>From <?=$rowuser['from']?></button>
    <button>Berth <?=$rowuser['berth']?></button>
    <p> <span> روزا هاتيه وه ركرتن </span> <?=$rowuser['dateaccont']?></p>
     <h2 class="imgname-mony"><?=$row['mony']?></h2>
</div>
<br>

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
<span class="span-price2">Enzar</span> <p class="span-price"><?=$rowuser['inzar']?></p>
</div>
<div class="inf">
<span class="span-price2" >xrama</span> <p  class="span-price"><s id="xrama"><?=$row['xrama']?></s></p>
</div>
<hr><br>

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



<div class="divtable">


<div class="formserch">
   
<form method="POST">
<select name="list" id="select" >
    <option value="Date"> Date</option>
    <option value="mony"> mony</option>
    <option value="adaddrapta">Rapta</option>
</select>
<button id="List" name="Listb">Change List</button>

<input type="Date" class="serchdateinp" name="serchdateinp" >
<button name="serchdate" class="serchdate">SERCH</button>
<button name="resend" class="resend">RESEND</button>
</form>
</div>

<br><br>
<table>
    <tr>
        <th>jorebtle</th>
        <th>jmara rapta</th>
        <th>jmarabtla</th>
        <th>para</th>
        <th>date</th>
    </tr>

<?php
while ($row2 =mysqli_fetch_assoc($sqlconn2)) {
  ?>
 <tr>
        <td><?=$row2['jorebtle']?></td>
        <td><?=$row2['adaddrapta']?></td>
        <td><?=$row2['adaddbtl1']?></td>
        <td><?=$row2['mony']?></td>
        <td><?=$row2['date']?></td>
    </tr>
    <?php
}
?>
   
   
</table>





</div>
</div>
</div> 

</div>

<?php include './nav.php'?>

</body>
</html>