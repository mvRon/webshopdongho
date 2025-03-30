<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đơn Hàng</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="css/order.css">
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="container">
<h3 class="title">Đơn Hàng</h3>
<div class="table">
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Họ và tên</th>
        <th>Số Điện Thoại</th>
        <th>Email</th>
        <th>Địa Chỉ</th>
        <th>Sản Phẩm</th>
        <th>Tổng Giá Tiền</th>
        <!-- <th>Hành Động</th> -->
      </tr>
    </thead>
  <tbody>
    <?php
      include("config.php");
      $sql = "SELECT * FROM `order`";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
        echo "
        <tr>
          <td>$row[id]</td>
          <td>$row[name]</td>
          <td>$row[number]</td>
          <td>$row[email]</td>
          <td>$row[city]</td>
          <td>$row[total_products]</td>
          <td>$row[total_price]</td>
          <td><a class='btn danger' style='margin-right: 0;' href='delete_order.php?id=$row[id]'>Xóa</a></td>
        </tr>
          ";
        }
      }
    ?>

  </tbody>
  </table>
  </div>
</div>

</body>

</html>
