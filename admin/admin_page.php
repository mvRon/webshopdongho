<?php

include '../php/config.php';
session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:../login.php');
};

if(isset($_GET['logout'])){
   unset($user_id);
   header('location:../login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="../css/style.css">

</head>
<body>
   
<div class="container">

   <div class="profile">
      <?php
         $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
         if(mysqli_num_rows($select) > 0){
            $fetch = mysqli_fetch_assoc($select);
         }
         if($fetch['image'] == ''){
            echo '<img src="../images/default-avatar.png">';
         }else{
            echo '<img src="../uploaded_img/'.$fetch['image'].'">';
         }
      ?>
      <h3><?php echo $fetch['name']; ?></h3>
      <a href="../admin/update_admin.php?id= <?php echo "$user_id";?>" class="btn">Cập nhật thông tin</a>
      <a href="/newone/admin/admin.php" class="delete-btn">Trang chủ</a>
      <a href="../index.php" class="delete-btn">Đăng xuất</a>

      <!-- <p>new <a href="../login.php">Đăng nhập</  a> or <a href="register.php">Đăng ký</a></p> -->
      <!-- <button onclick="goBack()">Quay lại</button> -->

      <script>
      function goBack() {
      window.history.back();
      }
   </script>
   </div>
</div>

</body>
</html>