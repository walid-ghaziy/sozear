<?php
include './conn.php';
$sqladmin=mysqli_query($conn,"SELECT  `username` FROM `user` WHERE `typeuser`='user'  ");

if (isset(($_GET['id']))) {
       
    $id=$_GET['id'];
    $vewedit = mysqli_query($conn,"SELECT * FROM `table` WHERE  idtable ='$id'  ");
   $rowedit =  mysqli_fetch_assoc($vewedit);


   ?>
     
     
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="./css/admin.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="boxformadmin">
   
<form  method="post" class="formadmin">

<select name="editname" id="nameuser">
    <?php
    while ($al= mysqli_fetch_assoc($sqladmin)) {?>
<option value=<?=$al['username']?>><?=$al['username']?></option>
<?php
    }
?>
</select>



<select name="editjorebtle" class="select">
    <option value="">size butill</option>
    <option value="4L">4L</option>
    <option value="1L">1L</option>
    <option value="750ml">750ml</option>
    <option value="500ml">500ml</option>
</select>
<input type="number" placeholder="ربطه" name="editrapta" class="rapta">
<br>
<br>
<input type="text" name="xrama" id="xrama" placeholder="غرامه">
<button class="send" name="editbutton" type="submit">EDIT TO TABLE</button>
</form>

</div>

</body>
</html>


     <?php
    


   
}else if(isset($_GET['delet'])){
    $delet=$_GET['delet'];
    mysqli_query($conn,"DELETE FROM `table` WHERE idtable='$delet'");
    header("location:admin.php");
}


if (isset($_POST['editbutton'])) {
  global $rowedit;
          $editname=$_POST['editname'];
   $editrapta=$_POST['editrapta'];
   $editjorebtle=$_POST['editjorebtle'];
   $editxrama=$_POST['editxrama'];


   $totalbtl = '';
   $totmony = '';
   $datenow=date('Y-m-d');
   $weekf = date('W');
   if ($editjorebtle == '4L') {
      $totalbtl = $editrapta * 35;
      $totmony = $editrapta *35 /105*1000;   
   }else if ($editjorebtle == '1L') {
      $totalbtl = $editrapta * 150;
      $totmony = ($editrapta *150 )/ 175 *1000; 
   }else if  ($editjorebtle == '750ml') {
      $totalbtl = $editrapta * 175;
      $totmony = $editrapta *1000;  
   }else if  ($editjorebtle == '500ml') {
      $totalbtl = $editrapta * 175;
      $totmony = $editrapta *1000;  
   };
  
 mysqli_query($conn,"UPDATE `table` SET `name`='$editname',`jorebtle`='$editjorebtle',`adaddrapta`='$editrapta',`xrama`='$editxrama',`adaddbtl1`='$totalbtl',`mony`='$totmony',`date`='$datenow',`week`='$weekf' WHERE  idtable ='$id'  ");
 header("location:./admin.php");
  
}

?>
