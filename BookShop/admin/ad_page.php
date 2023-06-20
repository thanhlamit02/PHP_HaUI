<?php

include '../config.php';

session_start();

$admin_id = $_SESSION['admin_id']; //tạo session admin

if (!isset($admin_id)) { // session không tồn tại => quay lại trang đăng nhập
    header('location:../login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang quản trị</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="./admin_css/admin_page.css">

</head>

<body>

    <?php include '../admin/ad_header.php'; ?>


    <section class="dashboard">

        <h1 class="title">Bảng thông tin</h1>

        <div class="box-container">

            <div class="box">
                <?php
                $total_pendings = 0;
                $select_pending = mysqli_query($conn, "SELECT total_price FROM `orders` WHERE payment_status != 'Hoàn thành'") or die('query failed');
                if (mysqli_num_rows($select_pending) > 0) {
                    while ($fetch_pendings = mysqli_fetch_assoc($select_pending)) {
                        $total_price = $fetch_pendings['total_price'];
                        $total_pendings += $total_price;
                    };
                };
                ?>
                <i class='bx bxs-wallet-alt'></i>
                <h3><?php echo $total_pendings; ?> VND</h3>
                <p>Tổng tiền chờ xử lý</p>
            </div>

            <div class="box">
                <?php
                $total_completed = 0;
                $select_completed = mysqli_query($conn, "SELECT total_price FROM `orders` WHERE payment_status = 'Hoàn thành'") or die('query failed');
                if (mysqli_num_rows($select_completed) > 0) {
                    while ($fetch_completed = mysqli_fetch_assoc($select_completed)) {
                        $total_price = $fetch_completed['total_price'];
                        $total_completed += $total_price;
                    };
                };
                ?>
                <i class='bx bxs-wallet-alt'></i>
                <h3><?php echo $total_completed; ?> VND</h3>
                <p>Số tiền thanh toán</p>
            </div>

            <div class="box">
                <?php
                $select_orders = mysqli_query($conn, "SELECT * FROM `orders`") or die('query failed');
                $number_of_orders = mysqli_num_rows($select_orders);
                ?>
                <i class='bx bxs-shopping-bag-alt'></i>
                <h3><?php echo $number_of_orders; ?></h3>
                <p>Đơn hàng</p>
            </div>

            <div class="box">
                <?php
                $select_products = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
                $number_of_products = mysqli_num_rows($select_products);
                ?>
                <i class='bx bxs-book-open'></i>
                <h3><?php echo $number_of_products; ?></h3>
                <p>Sách</p>
            </div>
                
            <div class="box">
                <?php
                $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE user_type = 'user'") or die('query failed');
                $number_of_users = mysqli_num_rows($select_users);
                ?>
                <i class='bx bxs-user-account'></i>
                <h3><?php echo $number_of_users; ?></h3>
                <p>Người dùng thường</p>
            </div>

            <div class="box">
                <?php
                $select_admins = mysqli_query($conn, "SELECT * FROM `users` WHERE user_type = 'admin'") or die('query failed');
                $number_of_admins = mysqli_num_rows($select_admins);
                ?>
                <i class='bx bxs-user-circle'></i>
                <h3><?php echo $number_of_admins; ?></h3>
                <p>Admin</p>
            </div>

            <div class="box">
                <?php
                $select_account = mysqli_query($conn, "SELECT * FROM `users`") or die('query failed');
                $number_of_account = mysqli_num_rows($select_account);
                ?>
                <i class='bx bxs-bolt-circle'></i>
                <h3><?php echo $number_of_account; ?></h3>
                <p>Số tài khoản</p>
            </div>

            <div class="box">
                <?php
                $select_messages = mysqli_query($conn, "SELECT * FROM `message`") or die('query failed');
                $number_of_messages = mysqli_num_rows($select_messages);
                ?>
                <i class='bx bxs-message-dots'></i>
                <h3><?php echo $number_of_messages; ?></h3>
                <p>Tin nhắn mới</p>
            </div>

        </div>

    </section>

    <script src="js/admin_script.js"></script>

</body>

</html>