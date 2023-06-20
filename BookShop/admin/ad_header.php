<?php
// session_start();
//nhúng vào các trang quản trị
if (isset($message)) {
    foreach ($message as $message) { //in ra thông báo trên cùng khi biến message được gán giá trị từ các trang quản trị
        echo '
         <div class="message">
            <span>' . $message . '</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
         </div>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="./admin_css/admin_header.css">
    <link rel="stylesheet" href="./admin_css/admin_toast.css">
</head>

<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        <div class="header_img">
            <i class='bx bxs-user-circle'>
                <div class="account">
                    <p>Tên người dùng : <span><?php echo $_SESSION['admin_name']; ?></span></p>
                    <p>Email : <span><?php echo $_SESSION['admin_email']; ?></span></p>
                </div>
            </i>
        </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div>
                <a href="#" class="nav_logo"><i class='bx bx-layer nav_logo-icon'></i><span class="nav_logo-name">BookWorm_Admin</span> </a>
                <div class="nav_list">
                    <a href="./ad_page.php" class="nav_link"> <i class='bx bx-grid-alt nav_icon' style="font-size: 24px"></i> <span class="nav_name">Trang chủ</span> </a>
                    <a href="./ad_products.php" class="nav_link"> <i class='bx bxs-book-alt' style="font-size: 24px"></i> <span class="nav_name">Sách</span> </a>
                    <a href="./ad_category.php" class="nav_link"> <i class='bx bx-message-square-detail nav_icon' style="font-size: 24px"></i> <span class="nav_name">Thể loại</span> </a>
                    <a href="./ad_orders.php" class="nav_link"> <i class='bx bx-cart-alt' style="font-size: 24px"></i> <span class="nav_name">Đơn hàng</span> </a>
                    <a href="./ad_users.php" class="nav_link"> <i class='bx bxs-user-detail' style="font-size: 24px"></i> <span class="nav_name">Người dùng</span> </a>
                    <a href="./ad_contact.php" class="nav_link"> <i class='bx bx-chat' style="font-size: 24px"></i> <span class="nav_name">Tin nhắn</span> </a>
                </div>
            </div>
            <a href="../logout.php" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Đăng xuất</span> </a>
        </nav>
    </div>
</body>
<script src="./admin_js/admin_home.js"></script>

</html>