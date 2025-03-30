<header class="header">

   <div class="flex">

      <a href="#" class="logo" style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; color:darkblue; font-weight:800">watch</a>

      <nav class="navbar">
         <a href="pages/login.php">đăng nhập</a>
         <a href="index.php">trang chủ</a>
         <!-- <a href="admin.php">thêm sản phẩm</a> -->
         <a href="products.php">mua sắm</a>
      </nav>
      <?php

      $select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
      $row_count = mysqli_num_rows($select_rows);

      ?>
      <!-- <a href="cart.php" class="cart">giỏ hàng<span></span> </a> -->

      <div id="menu-btn" class="fas fa-bars"></div>






   </div>

</header>