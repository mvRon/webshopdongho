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
               echo '<a href="../pages/user_page.php?id='.$_SESSION['id'].'">'.$_SESSION['name'].'</a>';
            } else {
               echo '<a href="../login.php">đăng nhập</a>';
            }
         ?>
         <a href="trangchu.php">trang chủ</a>
         <!-- <a href="admin.php">thêm sản phẩm</a> -->
         <a href="products.php">mua sắm</a>
      </nav>
      <?php
         $user_id = $_SESSION['user_id'];
         $select_rows = mysqli_query($conn, "SELECT `total_products` FROM `order` WHERE id='$user_id'") or die('query failed');
         // $number_select_rows = mysqli_num_rows($select_rows);
         $select_rows_cart = mysqli_query($conn, "SELECT * FROM `cart` ") or die('query failed');
         $row_count = mysqli_num_rows($select_rows_cart);
      ?>
      <a href="cart.php" class="cart">giỏ hàng<span><?php echo "$row_count"; ?></span> </a>
      <div id="menu-btn" class="fas fa-bars"></div>
   </div>
</header>
