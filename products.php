<?php

@include './user/config.php';

if (isset($_POST['add_to_cart'])) {

    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = 1;

    $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name'");

    // if (mysqli_num_rows($select_cart) > 0) {
    //     $message[] = 'sản phẩm đã có trong giỏ hàng';
    // } else {
    //     $insert_product = mysqli_query($conn, "INSERT INTO `cart`(name, price, image, quantity) VALUES('$product_name', '$product_price', '$product_image', '$product_quantity')");
    //     $message[] = 'sản phẩm được thêm vào giỏ hàng';
    // }
    if (!isset($_SESSION['user_id'])) {
        // Nếu chưa đăng nhập, chuyển hướng đến trang đăng nhập
        header('Location: pages/login.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang san phẩm</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <Link rel="stylesheet" href="./user/css/style.css">
    </Link>
</head>

<body>
    
    <?php include 'header.php'; ?>
    <div class="container">
        <section class="products">
            <h1 class="heading">danh mục sản phẩm</h1>
            <div class="box-container">
                <?php

                $select_products = mysqli_query($conn, "SELECT * FROM `products`");
                if (mysqli_num_rows($select_products) > 0) {
                    while ($fetch_product = mysqli_fetch_assoc($select_products)) {
                ?>
                        <form action="" method="post">
                            <div class="box">
                                <img src="uploaded_img/<?php echo $fetch_product['image']; ?>" alt="">
                                <h3><?php echo $fetch_product['name']; ?></h3>
                                <div class="price">$<?php echo $fetch_product['price']; ?></div>
                                <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
                                <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
                                <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
                                <input type="submit" class="btn" value="add to cart" name="add_to_cart">
                            </div>
                        </form>

                <?php
                    };
                };
                ?>
            </div>
        </section>
    </div>





    <script src="js/script.js"></script>
</body>

</html>