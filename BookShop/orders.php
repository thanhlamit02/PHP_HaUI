<?php

   include 'config.php';

   session_start();

   $user_id = $_SESSION['user_id']; //tạo session người dùng thường

   if(!isset($user_id)){// session không tồn tại => quay lại trang đăng nhập
      header('location:login.php');
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
        integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/order_detail.css">

</head>

<body>

    <?php include 'header.php'; ?>

    <div class="heading">
        <h3>Đơn hàng của bạn</h3>
        <p> <a href="home.php">Trang chủ</a> / Đơn hàng </p>
    </div>

    <section class="placed-orders">

        <h1 class="title">Đặt hàng</h1>

        <div class="container-fluid">

            <div class="container">
                <!-- Title -->
                <div class="d-flex justify-content-between align-items-center py-3">
                    <!-- <h2 class="h5 mb-0 text-bold"><a href="#" class="text-muted"></a> Order #16123</h2> -->
                </div>

                <!-- Main content -->
                <?php
                  $order_query = mysqli_query($conn, "SELECT * FROM `orders` WHERE user_id = '$user_id'") or die('query failed');
                  if(mysqli_num_rows($order_query) > 0) {
                     while($fetch_orders = mysqli_fetch_assoc($order_query)) {
                        $products = explode(",",$fetch_orders['total_products'])
                  ?>
                <div class="row">
                    <div class="col-lg-8">
                        <!-- Details -->
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="mb-3 d-flex justify-content-between">
                                    <div>
                                        <span class="me-3"><?php echo $fetch_orders['placed_on']; ?></span>
                                        <span class="me-3">#16123</span>
                                        <!-- <span class="me-3">Visa -1234</span> -->
                                        <span class="badge rounded-pill bg-info">SHIPPING</span>
                                    </div>
                                    <div class="d-flex">
                                        <!-- <button class="btn btn-link p-0 me-3 d-none d-lg-block btn-icon-text"><i class="bi bi-download"></i> <span class="text">Invoice</span></button> -->
                                        <div class="dropdown">
                                            <button class="btn btn-link p-0 text-muted" type="button"
                                                data-bs-toggle="dropdown">
                                                <i class="bi bi-three-dots-vertical"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a class="dropdown-item" href="#"><i class="bi bi-pencil"></i>
                                                        Edit</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="bi bi-printer"></i>
                                                        Print</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <table class="table table-borderless">
                                    <tbody>
                                        <?php
                                       foreach ($products as $value) {
                                          ?>
                                        <tr>
                                            <td colspan="3">
                                                <div class="d-flex mb-2">
                                                    <div class="flex-shrink-0">
                                                        <img src="https://cdn0.fahasa.com/media/catalog/product//n/i/ninja-rantaro_bia_tap-8.jpg"
                                                            alt="" width="50px" class="img-fluid">
                                                    </div>
                                                    <div class="flex-lg-grow-1 ms-3">
                                                        <h6 class="small mb-0"><a href="#"
                                                                class="text-reset"><?= $value ?></a></h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td colspan="2">1</td>
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="2">Tổng tiền</td>
                                            <td class="text-end"><?php echo $fetch_orders['total_price']; ?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">Phí ship</td>
                                            <td class="text-end">10000đ</td>
                                        </tr>
                                        <tr class="fw-bold">
                                            <td colspan="2">Thành tiền</td>
                                            <td class="text-end"><?php echo $fetch_orders['total_price'] - 10000; ?>đ
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <!-- Payment -->
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <h3 class="h6">Phương thức thanh toán</h3>
                                        <p> Trạng thái : <span
                                                style="color:<?php if($fetch_orders['payment_status'] == 'Hoàn thành'){ echo 'green'; }else if($fetch_orders['payment_status'] == 'Chờ xác nhận'){ echo 'red'; }else{ echo 'orange'; } ?>;"><?php echo $fetch_orders['payment_status']; ?></span>
                                        </p>
                                    </div>
                                    <div class="col-lg-6">
                                        <h3 class="h6">Địa chỉ thanh toán</h3>
                                        <address>
                                            <strong><?php echo $fetch_orders['name']; ?></strong><br>
                                            <?php echo $fetch_orders['address']; ?><br>
                                            <!-- San Francisco, CA 94103<br> -->
                                            <p title="Phone">SĐT: <?php echo $fetch_orders['number']; ?></p>
                                        </address>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <!-- Customer Notes -->
                        <div class="card mb-4">
                            <div class="card-body">
                                <p class="h6">Chú thích</p>
                                <p><?php echo $fetch_orders['note']; ?></p>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <!-- Shipping information -->
                            <div class="card-body">
                                <h3 class="h6">Thông tin ship</h3>
                                <strong>Mã ship</strong>
                                <span><a href="#" class="text-decoration-underline" target="_blank">FF1234567890</a> <i
                                        class="bi bi-box-arrow-up-right"></i> </span>
                                <hr>
                                <h3 class="h6">Địa Chỉ</h3>
                                <address>
                                    <strong><?php echo $fetch_orders['name']; ?></strong><br>
                                    <?php echo $fetch_orders['address']; ?><br>
                                    <!-- San Francisco, CA 94103<br> -->
                                    <p title="Phone">SĐT: <?php echo $fetch_orders['number']; ?></p>
                                </address>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="box">
                     <p> Ngày đặt hàng : <span><?php echo $fetch_orders['placed_on']; ?></span> </p>
                     <p> Họ tên : <span><?php echo $fetch_orders['name']; ?></span> </p>
                     <p> Số điện thoại : <span><?php echo $fetch_orders['number']; ?></span> </p>
                     <p> Email : <span><?php echo $fetch_orders['email']; ?></span> </p>
                     <p> Địa chỉ : <span><?php echo $fetch_orders['address']; ?></span> </p>
                     <p> Ghi chú : <span><?php echo $fetch_orders['note']; ?></span> </p>
                     <p> Phương thức thanh toán : <span><?php echo $fetch_orders['method']; ?></span> </p>
                     <p> Đơn hàng : <span><?php echo $fetch_orders['total_products']; ?></span> </p>
                     <p> Tổng giá : <span><?php echo $fetch_orders['total_price']; ?> VND</span> </p>
                     <p> Trạng thái  : <span style="color:<?php if($fetch_orders['payment_status'] == 'Hoàn thành'){ echo 'green'; }else if($fetch_orders['payment_status'] == 'Chờ xác nhận'){ echo 'red'; }else{ echo 'orange'; } ?>;"><?php echo $fetch_orders['payment_status']; ?></span> </p>
                     </div> -->
                <?php
                  }
                  } else {
                     echo '<p class="empty">Chưa có đơn hàng được đặt!</p>';
                 }
               ?>

            </div>
        </div>

    </section>

    <?php include 'footer.php'; ?>

    <script src="js/script.js"></script>

</body>

</html>