<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin tài khoản</title>
    <link rel="stylesheet" href="css/order.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="container">
        <h3 class="title">Thông tin tàì khoản</h3>

        <div class="table">
            <table>
                <thead>
                <tr>
                <th>ID</th>
                <th>Họ và tên</th>
                <th>Email</th>
                <th>Mật khẩu (Đã mã hóa 1 chiều)</th>
                <th>Hình(avatar)</th>
                <th>Vai trò</th>
                </tr>
                </thead>
            <tbody>
            <?php

                include("config.php"); 
                $sql = "SELECT * FROM user_form";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "
                        <tr>
                            <td>$row[id]</td>
                            <td>$row[name]</td>
                            <td>$row[email]</td>
                            <td>$row[password]</td>
                            <td>$row[image]</td>
                            <td>$row[role]</td>
                            <td><a class='btn danger' style='margin-right: 0;' href='delete_thongtin.php?id=$row[id]'>Xóa</a>
                            </td>
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