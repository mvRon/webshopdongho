<?php
session_start();

$_SESSION['loggedin'] = true;
$_SESSION['id'] = 1;
$_SESSION['name'] = 'Hồ sơ';
?>

<header class="header">
   <div class="flex">
      <!-- <a href="#" class="logo">logo</a> -->
      <a href="trangchu.php" class="logo" style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; color:darkblue; font-weight:800">watch</a>
      <nav class="navbar">
         <?php
            if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
               echo '<a href="../admin/admin_page.php?id='.$_SESSION['id'].'">'.$_SESSION['name'].'</a>';
            } 
            else {
               echo '<a href="../pages/login.php">đăng nhập</a>';
            }
         ?>
         <!-- <a href="../trangchu.php">trang chủ</a> -->
         <a href="admin.php">thêm sản phẩm</a>
         <a href="order.php">đơn hàng</a>
         <a href="thongtin.php">thông tin tài khoản </a>

         <!-- <a href="products.php">mua sắm</a> -->
      </nav>
      <?php
      // $select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
      // $row_count = mysqli_num_rows($select_rows);
      ?>
      <!-- <a href="cart.php" class="cart">giỏ hàng<span><?php echo $row_count; ?></span> </a> -->
      <div id="menu-btn" class="fas fa-bars"></div>
   </div>
</header>
