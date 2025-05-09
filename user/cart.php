<?php
@include 'config.php';
if (isset($_POST['update_update_btn'])) {
    $update_value = $_POST['update_quantity'];
    $update_id = $_POST['update_quantity_id'];
    $update_quantity_query = mysqli_query($conn, "UPDATE `cart` SET quantity = '$update_value' WHERE id = '$update_id'");
    if ($update_quantity_query) {
        header('location:cart.php');
    };
};
if (isset($_GET['remove'])) {
    $remove_id = $_GET['remove'];
    mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$remove_id'");
    header('location:cart.php');
};
if (isset($_GET['delete_all'])) {
    mysqli_query($conn, "DELETE FROM `cart`");
    header('location:cart.php');
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang giỏ hàng</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <Link rel="stylesheet" href="css/style.css">

</head>

<body>
    <?php include 'header.php'; ?>


    <div class="container">
        <section class="shopping-cart">
            <h1 class="heading">giỏ hàng</h1>
            <table>
                <thead>
                    <th>hình ảnh</th>
                    <th>tên sản phẩm</th>
                    <th>giá tiền</th>
                    <th>số lượng</th>
                    <th>Tổng tiền</th>
                    <th>tùy chỉnh</th>
                </thead>
                <tbody>
                    <?php
                    $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
                    $grand_total = 0;
                    if (mysqli_num_rows($select_cart) > 0) {
                        while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {

                    ?>

                            <tr>
                                <td><img src="uploaded_img/<?php echo $fetch_cart['image']; ?>" height="100" alt=""></td>
                                <td><?php echo $fetch_cart['name']; ?></td>
                                <td>$<?php echo number_format($fetch_cart['price']); ?>/SP</td>
                                <td>
                                    <form action="" method="post">
                                        <input type="hidden" name="update_quantity_id" value="<?php echo $fetch_cart['id']; ?>">
                                        <input type="number" name="update_quantity" min="1" value="<?php echo $fetch_cart['quantity']; ?>">
                                        <input type="submit" value="cập nhật" name="update_update_btn">
                                    </form>
                                </td>
                                <td>$<?php echo $sub_total = number_format($fetch_cart['price'] * $fetch_cart['quantity']); ?></td>
                                <td><a href="cart.php?remove=<?php echo $fetch_cart['id']; ?>" onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này?')" class="delete-btn"> <i class="fas fa-trash"></i> xóa</a></td>
                            </tr>
                    <?php
                            $grand_total += $sub_total;
                        };
                    };
                    ?>
                    <tr class="table-bottom">
                        <td><a href="products.php" class="option-btn" style="margin-top: 0;">tiếp tục mua sắm</a></td>
                        <td colspan="3">tổng cộng</td>
                        <td>$<?php echo $grand_total; ?></td>
                        <td><a href="cart.php?delete_all" onclick="return confirm('Bạn có chắc muốn xóa toàn bộ giỏ hàng?')" class="delete-btn"> <i class="fas fa-trash"></i> xóa tất cả </a></td>
                    </tr>
                </tbody>
            </table>

            <div class="checkout-btn">
                <a href="checkout.php" class="btn <?= ($grand_total > 1) ? '' : 'disabled'; ?>">thanh toán ngay</a>
            </div>
        </section>
    </div>

    <script src="js/script.js"></script>
</body>

</html>