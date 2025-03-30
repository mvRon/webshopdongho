<?php
@include '../php/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <Link rel="stylesheet" href="../admin/css/style.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #61A3BA;

        }

        header {
            background-color: #333;
            color: #fff;
            text-align: center;
        }

        .trangchu {
            text-align: center;
            margin-top: 0px;
        }

        .trangchu img {
            width: 100%;
            max-width: 100%;
            height: auto;
        }

        .gioithieu {
            padding: 0px;
            margin: 20px auto;
            max-width: 800px;
            text-align: center;
        }
        .gioithieu h2{
            color: #FFFFDD;
            font-size: x-large;
        }
        .gioithieu p{
            font-weight: 700;
            font-size:large;
        }
    </style>
</head>
<body>
<?php include 'header.php'; ?>
<div class="trangchu" >
    <!-- <img src="/user/images/Helios-banner-compressed.gif" alt=""> -->
    <img src="./images/Helios-banner-compressed.gif" alt="">
</div>
<div class="gioithieu">
    <h2>Chào mừng bạn đến với Đồng Hồ Shop!</h2>
    <p>
        Đồng Hồ Shop cung cấp những mẫu đồng hồ chất lượng cao từ các thương hiệu uy tín trên thế giới.
        Với sự đa dạng về kiểu dáng và tính năng, chúng tôi tự tin đem đến cho bạn trải nghiệm mua sắm đồng hồ hoàn hảo.
    </p>
</div>


<script src="../admin/js/script.js"></script>
</body>
</html>