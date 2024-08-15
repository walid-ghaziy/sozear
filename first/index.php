<?php
include './conn.php';
session_start();
if (isset($_POST['login'])) {
    $user=$_POST['userlogin'];
    $pass=$_POST['passlogin'];
    $sqllogin = mysqli_query($conn,"SELECT * FROM `user` WHERE username='$user' AND pass='$pass' ");
    $rowlogin=mysqli_fetch_assoc($sqllogin);
    if ( $user &&$pass&&$rowlogin) {

        if ($rowlogin['username'] == $user && $rowlogin['pass'] == $pass) {
       $_SESSION['username']=$rowlogin['username'];
       $_SESSION['type']=$rowlogin['typeuser'];
    if ($rowlogin['typeuser']=='admin') {
        header("location:./admin.php");
    }elseif($rowlogin['typeuser']=='user'){
        header("location:./table.php");
    }else {
       
        echo 'eror';
    };
   }else{
    echo 'eror';
   }
    }
};


 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/index.css">
    
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script>
        if(window.history.replaceState){
window.history.replaceState(null,null,window.location.href)
        }
    </script>
</head>
<body class="bodyindix">


   
    <div class="contenerlogin">
        <div class="reklam">
            <center><h1>sozear copmani</h1></center>
        </div>
        <div class="boxform">
          <div class="styl1"></div>
          <div class="styl2"></div>

         <form  method="POST">
         <h1>Log In</h1>
             <label for="inputlogin"><i class="glyphicon glyphicon-user"></i></label>
            <input type="text" name="userlogin" id="inputlogin" placeholder="username">

            <label for="inputlogin"><i class="glyphicon glyphicon-lock"></i></label>
            <input type="text" name="passlogin" id="inputlogin" placeholder="password">

            <button class="submitlogin" name="login">LOG IN</button>
            <button id="singin">Sing In</button>
        </form>
        
      </div>



<!-- ....................................... -->

<?php
date_default_timezone_set('Asia/Baghdad');
 ;
 
 include './conn.php';


if (isset($_POST['create'])) {
    $name = $_POST['name'];
    $datecreat = $_POST['date'];
    $phone = $_POST['phone'];
    $from = $_POST['from'];
    $typeuser = $_POST['typeuser'];
    $password = $_POST['password'];
    $cod = $_POST['cod'];

    $i=$_FILES['img']['name'];
    $folder= 'image/'.$i;




    $erorkey='';
    $ty='user';

        $coduser = '0020';
        $codadmin = '0007';
        $datework = date("Y-m-d");
     

    if( $typeuser == 'user' && $cod == $coduser)
    { $ty='user';
    }elseif ( $typeuser == 'admin' && $cod == $codadmin) {
      $ty='admin';
    };
   
    
    $sqlcreate = mysqli_query($conn,"INSERT INTO `user`(`img`,`username`, `pass`, `typeuser`, `berth`, `number`,`from`, `dateaccont`)
     VALUES ('$i','$name','$password','$ty','$datecreat','$phone','$from','$datework') ");
move_uploaded_file($_FILES['img']['tmp_name'],$folder);



        }

    
?>
<div class="singin">
   <center ><h1>Cretae</h1></center> 
<form method="post" enctype="multipart/form-data" >
    <input type="text" placeholder="Name" required name="name">
    <input type="Date" required name="date">
    <input type="number" placeholder="Number Phone" required name="phone">
    <input type="text" placeholder="From" required name="from">
    <br>
    <input type="file" name="img" required id="img" style="display: none;">
    <label for="img"  id="limg"><i class="gg-image"></i></label>
     <select name="typeuser" id="celectsing" required>
        <option value=""></option>
        <option value="user">User</option>
        <option value="admin">Admin</option>
     </select>
    <input type="password" name="password" maxlength="10" minlength="6" placeholder="Password" class="p1" required name="password">
    <input type="password" name="cod" placeholder="Cod" class="cod" required name="cod">
    <center><p><?php global $erorkey;echo $erorkey?></p></center>
    <button type="submit" name="create" class="create">Create</button>
    <button type="submit"  class="back">Back</button>
</form>
</div>





  </div>
</body>

</html>
<script src="./indix.js"></script>
</body>
</html>
