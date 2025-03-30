<?php

include '../php/config.php';
session_start();

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

   $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $row = mysqli_fetch_assoc($select);
      $_SESSION['user_id'] = $row['id'];

      if ($row['role'] == 0) {
         // Nếu role bằng 0, chuyển hướng đến trang admin
         header('Location: ../admin/admin.php');
         exit();
      } else {
         header('Location: /newone/user/trangchu.php');
         // Ngược lại, chuyển hướng đến trang người dùng
         // if (file_exists('/user/product.php')) {
         //    header('Location: /user/products.php');
         //    exit();
         // } 
         // else {
         //    echo 'Error: File ../user/products.php does not exist.';
         // }
      }
   }else{
      echo 'Error: Email hoặc mật khẩu không đúng!';
   }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/style.css">

</head>
<body>
<div class="form-container">

   <form action="" method="post" enctype="multipart/form-data">
      <h3>Đăng nhập</h3>
      <?php
      if(isset($message)){
         foreach($message as $message){
            echo '<div class="message">'.$message.'</div>';
         }
      }
      ?>
      <input type="email" name="email" placeholder="Nhập email" class="box" required>
      <input type="password" name="password" placeholder="Nhập mật khẩu" class="box" required>
      <input type="submit" name="submit" value="Đăng nhập" class="btn">
      <p>Bạn không có tài khoản? <a href="./register.php">Đăng ký</a></p>
   </form>

</div>

</body>
</html>