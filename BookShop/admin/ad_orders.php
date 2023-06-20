<?php

include '../config.php';

session_start();

$admin_id = $_SESSION['admin_id']; //tạo session admin

if (!isset($admin_id)) { // session không tồn tại => quay lại trang đăng nhập
    header('location:login.php');
};

if (isset($_POST['update_order'])) { //cập nhật trạng thái đơn hàng từ submit='update_order'

    $order_update_id = $_POST['order_id'];
    $update_payment = $_POST['update_payment'];
    mysqli_query($conn, "UPDATE `orders` SET payment_status = '$update_payment' WHERE id = '$order_update_id'") or die('query failed');
    $message[] = 'Trạng thái đơn hàng đã được cập nhật!';
}


if (isset($_GET['cancel'])) { //hủy đơn hàng từ onclick <a></a> href='delete'
    $cancel_id = $_GET['cancel'];
    $status = $_GET['payment_status'];
    $total_products = $_GET['products'];
    if ($status == "Chờ xác nhận") {
        $products = explode(', ', $total_products); //tách riêng từng sách
        for ($i = 0; $i < count($products); $i++) {
            $quantity = explode('-', $products[$i]); //tách sách với số lượng tương ứng cần hủy
            $nums = mysqli_query($conn, "SELECT * FROM `products` WHERE name = '$quantity[0]'"); //lấy số lượng sách hiện có
            $res = mysqli_fetch_assoc($nums);
            $return_quantity = $quantity[1] + $res['quantity']; //tính số lượng sách sau hủy
            mysqli_query($conn, "UPDATE `products` SET quantity = '$return_quantity' WHERE name = '$quantity[0]' ") or die('query failed'); //đặt lại số lượng sách
        }
        $status = "Đã hủy"; //cập nhật trạng thái
        mysqli_query($conn, "UPDATE `orders` SET status = '$status' WHERE id = '$cancel_id'") or die('query failed');
        header('location:ad_orders.php');
    } else if ($status == "Đã hủy") {
        $message[] = "Đơn hàng đã được hủy trước đó!";
    } else {
        $message[] = "Không thể hủy đơn hàng đã qua xác nhận!";
    }
}

if (isset($_GET['return'])) { //khôi phục đơn hàng
    $return = $_GET['return'];
    $return_status = "Chờ xác nhận";

    $total_products = $_GET['products'];
    $products = explode(', ', $total_products); //tách riêng từng sách
    for ($i = 0; $i < count($products); $i++) {
        $quantity = explode('-', $products[$i]); //tách sách với số lượng tương ứng cần khôi phục
        $nums = mysqli_query($conn, "SELECT * FROM `products` WHERE name = '$quantity[0]'");
        $res = mysqli_fetch_assoc($nums);
        $return_quantity = $res['quantity'] - $quantity[1];
        mysqli_query($conn, "UPDATE `products` SET quantity = '$return_quantity' WHERE name = '$quantity[0]' ");
    }
    mysqli_query($conn, "UPDATE `orders` SET status = '$return_status' WHERE id = '$return'") or die('query failed');
    header('location:ad_orders.php');
}

if (isset($_GET['delete'])) { //xóa đơn hàng theo id đơn hàng
    $delete_id = $_GET['delete'];
    $status = $_GET['payment_status'];
    if ($status == "Đã hủy" || $status == "Hoàn thành") {
        mysqli_query($conn, "DELETE FROM `orders` WHERE id = '$delete_id'") or die('query failed');
        header('location:ad_orders.php');
    } else {
        $message[] = "Không thể xóa đơn hàng đang trong quá trình xử lý!";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đơn hàng</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="./admin_css/admin_orders.css">

</head>

<body>

    <?php include '../admin/ad_header.php'; ?>

    <section class="orders">

        <h1 class="title">Đơn đặt hàng</h1>

        <div class="box-container">
            <?php
            $select_orders = mysqli_query($conn, "SELECT * FROM `orders`") or die('query failed');
            if (mysqli_num_rows($select_orders) > 0) {
                while ($fetch_orders = mysqli_fetch_assoc($select_orders)) {
            ?>
                    <div class="box">
                        <h2> ID người dùng : <span><?php echo $fetch_orders['user_id']; ?></span> </h2>
                        <h2> Ngày đặt : <span><?php echo $fetch_orders['placed_on']; ?></span> </h2>
                        <h2> Tên : <span><?php echo $fetch_orders['name']; ?></span> </h2>
                        <h2> Số điện thoại : <span><?php echo $fetch_orders['number']; ?></span> </h2>
                        <h2> Email : <span><?php echo $fetch_orders['email']; ?></span> </h2>
                        <h2> Địa chỉ : <span><?php echo $fetch_orders['address']; ?></span> </h2>
                        <h2> Ghi chú : <span><?php echo $fetch_orders['note']; ?></span> </h2>
                        <h2> Tổng sách : <span><?php echo $fetch_orders['total_products']; ?></span> </h2>
                        <h2> Tổng giá : <span><?php echo $fetch_orders['total_price']; ?> VND</span> </h2>
                        <h2> Phương thức thanh toán : <span><?php echo $fetch_orders['method']; ?></span> </h2>
                        <form action="" method="post">
                            <input type="hidden" name="order_id" value="<?php echo $fetch_orders['id']; ?>">
                            <?php
                            if ($fetch_orders['payment_status'] == "Đã hủy") {
                                echo "<p class='empty' style='color:red'>Đã hủy đơn hàng này.</p>";
                            ?>
                                <a href="./ad_orders.php?= $fetch_orders['id'] ?>& products=<?= $fetch_orders['total_products'] ?>" onclick="return confirm('Khôi phục đơn hàng này?');" class="option-btn">Khôi phục</a>
                            <?php
                            } else {
                            ?>
                            <div class="form-container">

                                <select name="update_payment" class="box-input" required>
                                    <option value="" selected disabled><?php echo $fetch_orders['payment_status']; ?></option>
                                    <!-- <option value="Chờ xác nhận">Chờ xác nhận</option> -->
                                    <option value="Đã xác nhận">Đã xác nhận</option>
                                    <option value="Đang xử lý">Đang xử lý</option>
                                    <option value="Hoàn thành">Hoàn thành</option>
                                </select>
                                <input type="submit" value="Cập nhật" name="update_order" class="option-btn">
                            </div>
                            <?php
                            }
                            ?>
                            <a href="./ad_orders.php?cancel=<?= $fetch_orders['id'] ?>&payment_status=<?= $fetch_orders['payment_status'] ?>& products=<?= $fetch_orders['total_products'] ?>" onclick="return confirm('Hủy đơn hàng này?');" class="delete-btn option-btn mt-3">Hủy</a>
                            <a href="./ad_orders.php?delete=<?= $fetch_orders['id'] ?>&payment_status=<?= $fetch_orders['payment_status'] ?>" onclick="return confirm('Xóa đơn hàng này?');" class="delete-btn option-btn mt-3">Xóa</a>
                        </form>
                    </div>
            <?php
                }
            } else {
                echo '<p class="empty">Không có đơn đặt hàng nào!</p>';
            }
            ?>
        </div>

    </section>

    <script src="js/admin_script.js"></script>

</body>

</html>