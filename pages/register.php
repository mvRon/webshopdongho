<?php

include '../php/config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = $_POST['email'];
   $pass = $_POST['password'];
   $cpass = $_POST['cpassword'];
   $image = $_FILES['image']['name'];
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = '../uploaded_img/'.$image;

   if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      echo 'Định dạng email không đúng';
   }else{
      $email = mysqli_real_escape_string($conn, $email);

      if(strlen($pass) < 8){
         echo 'Mật khẩu tối thiểu 8 ký tự';
      }else{
         $pass = mysqli_real_escape_string($conn, md5($pass));
         $cpass = mysqli_real_escape_string($conn, md5($cpass));

         $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email' AND password = '$pass'") or die('query failed');

         if(mysqli_num_rows($select) > 0){
            $message[] = 'Người dùng đã tồn tại'; 
         }else{
            if($pass != $cpass){
               $message[] = 'Mật khẩu nhập lại không khớp!';
            }elseif($image_size > 2000000){
               $message[] = 'Kích thước ảnh quá lớn!';
            }else{
               $insert = mysqli_query($conn, "INSERT INTO `user_form`(name, email, password, image, role) VALUES('$name', '$email', '$pass', '$image', 10)") or die('query failed');
   //             $detail_query = mysqli_query($conn, "INSERT INTO `order`(name, number, email, city, total_products, total_price) 
   //  VALUES('$name',0,'$email',0,0,0)") or die('query failed');
               if($insert){
                  move_uploaded_file($image_tmp_name, $image_folder);
                  $message[] = 'Đăng ký thành công!';
                  header('location: /newone/pages/login.php');
               }else{
                  $message[] = 'Đăng ký thất bại!';
               }
            }
         }
      }
   }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/style.css">

</head>
<body>
<div class="form-container">

   <form action="" method="post" enctype="multipart/form-data">
      <h3>Đăng ký</h3>
      <?php
      if(isset($message)){
         foreach($message as $message){
            echo '<div class="message">'.$message.'</div>';
         }
      }
      ?>
      <input type="text" name="name" placeholder="Nhập tên người dùng" class="box" required>
      <input type="email" name="email" placeholder="Nhập email" class="box" required>
      <input type="password" name="password" placeholder="Nhập mật khẩu" class="box" required>
      <input type="password" name="cpassword" placeholder="Nhập lại mật khẩu" class="box" required>
      <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png">
      <input type="submit" name="submit" value="Đăng ký" class="btn">
      <p>Bạn đã có tài khoản? <a href="/newone/pages/login.php">Đăng nhập</a></p>
   </form>

</div>

</body>
</html>