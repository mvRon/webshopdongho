<?php

@include 'config.php';
if (isset($_POST['order_btn'])) {

    $name = $_POST['name'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $city = $_POST['city'];

    $cart_query = mysqli_query($conn, "SELECT * FROM `cart`");
    $price_total = 0;
    if (mysqli_num_rows($cart_query) > 0) {
        while ($product_item = mysqli_fetch_assoc($cart_query)) {
            $product_name[] = $product_item['name'] . ' (' . $product_item['quantity'] . ') ';
            $product_price = number_format($product_item['price'] * $product_item['quantity']);
            $price_total += $product_price;
        };
    };
    $total_product = implode(', ', $product_name);
    $detail_query = mysqli_query($conn, "INSERT INTO `order`(name, number, email, city, total_products, total_price) 
    VALUES('$name','$number','$email','$city','$total_product','$price_total')") or die('query failed');

    if ($cart_query && $detail_query) {
        echo "
        <div class='order-message-container'>
      <div class='message-container'>
         <h3>cảm ơn bạn đã mua hàng!</h3>
         <div class='order-detail'>
            <span>" . $total_product . "</span>
            <span class='total'> tổng tiền : $" . $price_total . "  </span>
         </div>
         <div class='customer-details'>
            <p> họ tên : <span>" . $name . "</span> </p>
            <p> số điện thoại : <span>" . $number . "</span> </p>
            <p>  email : <span>" . $email . "</span> </p>
            <p> địa chỉ nhận hàng : <span>" . $city . "</span> </p>
            <p>(*thanh toán khi nhận hàng*)</p>
         </div>
            <a href='cart.php?delete_all' class='btn'>tiếp tục mua sắm</a>
         </div>
      </div>
    ";
    
        
    }
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang thanh toán</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="container">
        <section class="checkout-form">
            <h1 class="heading">thông tin thanh toán</h1>




            <form action="" method="post">
                <div class="display-order">
                    <?php
                    $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
                    $total = 0;
                    $grand_total = 0;
                    if (mysqli_num_rows($select_cart) > 0) {
                        while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {
                            $total_price = number_format($fetch_cart['price'] * $fetch_cart['quantity']);
                            $grand_total = $total += $total_price;
                    ?>
                            <span><?= $fetch_cart['name']; ?>(<?= $fetch_cart['quantity']; ?>)</span>
                    <?php
                        }
                    } else {
                        echo "<div class='display-order'><span>your cart is empty!</span></div>";
                    }
                    ?>

                    <?php 
                        $user_id = $_SESSION['user_id'];
                        $selecta = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
                        $fetch = mysqli_fetch_assoc($selecta)
                    ?> 

                    <span class="grand-total"> tổng tiền : $<?= $grand_total; ?> </span>
                </div>
                <div class="flex">
                    <div class="inputBox">
                        <span>họ tên</span>
                        <input type="text" placeholder="nhập họ tên" name="name" required>
                    </div>
                    <div class="inputBox">
                        <span>số điện thoại</span>
                        <input type="number" placeholder="nhập số điện thoại" name="number" required>
                    </div>
                    <div class="inputBox">
                        <span> email</span>
                        <input type="email" value="<?php echo $fetch['email']; ?>" name="email" readonly>
                    </div>
                    
                    <div class="inputBox">
                        <span>địa chỉ nhận hàng</span>
                        <input type="text" placeholder="nhập địa chỉ" name="city" required>
                    </div>
                    
                </div>
                <input type="submit" value="thanh toán ngay" name="order_btn" class="btn">
                
            </form>

        </section>
    </div>


    <script src="js/script.js"></script>
</body>

</html>