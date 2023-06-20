<?php

   include 'config.php';

   session_start();

   $user_id = $_SESSION['user_id']; //tạo session người dùng thường

   if(!isset($user_id)){// session không tồn tại => quay lại trang đăng nhập
      header('location:login.php');
   }

   if(isset($_POST['update_cart'])){//cập nhật giỏ hàng từ form submit name='update_cart'
      $cart_id = $_POST['cart_id'];
      $cart_quantity = $_POST['cart_quantity'];
      mysqli_query($conn, "UPDATE `cart` SET quantity = '$cart_quantity' WHERE id = '$cart_id'") or die('query failed');
      $message[] = 'Giỏ hàng đã được cập nhật!';
   }

   if(isset($_GET['delete'])){//xóa sách khỏi giỏ hàng từ onclick href='delete'
      $delete_id = $_GET['delete'];
      mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$delete_id'") or die('query failed');
      header('location:cart.php');
   }

   if(isset($_GET['delete_all'])){//xóa tất cả sách khỏi giỏ hàng của người dùng từ onclick href='delete_all'
      mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
      header('location:cart.php');
   }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>

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
    <link rel="stylesheet" href="css/cart.css">

</head>

<body>

    <?php include 'header.php'; ?>

    <!-- <div class="heading">
   <h3>Giỏ hàng</h3>
   <p> <a href="home.php">Trang chủ</a> / Giỏ hàng </p>
</div> -->

    <section class="shopping-cart">

        <div class="page-title title-buttons mb-4 container">
            <div class="page-title-container">
                <h1 style="display: inline-block;width: auto;">Giỏ hàng</h1>

            </div>
        </div>
        <div class="cart-ui-content container">
            <div class="col-sm-8 col-xs-12 me-4">

                <div class="header-cart-item  ps-5" style="display: flex; ">
                    <a href="cart.php?delete_all" onclick="return confirm('Xóa tất cả giỏ hàng?');">
                        <button type="button" class="btn h6 btn-primary">Xóa tất cả</button>
                    </a>
                    <div class="ms-4 me-5">Số lượng</div>
                    <div>Thành tiền</div>
                    <div></div>
                </div>

                <?php
               $grand_total = 0;
               $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');//lấy ra giỏ hàng tương ứng với id người dùng
               if(mysqli_num_rows($select_cart) > 0){
                  while($fetch_cart = mysqli_fetch_assoc($select_cart)){ 
                     $name_product = $fetch_cart['name'];
                     $select_quantity = mysqli_query($conn, "SELECT * FROM `products` WHERE name='$name_product'");
                     $fetch_quantity = mysqli_fetch_assoc($select_quantity); 
            ?>

                <div class="product-cart-left">
                    <div class="item-product-cart">
                        <div class="img-product-cart ps-5">
                            <a class="product-image" href="https://www.fahasa.com/ninja-rantaro-tap-8.html"><img
                                    src="uploaded_img/<?php echo $fetch_cart['image']; ?>" width="120" height="120"
                                    alt="Ninja Rantaro - Tập 8" /></a>
                        </div>
                        <div class="group-product-info">
                            <div class="info-product-cart">
                                <div>
                                    <h2 class="product-name-full-text">
                                        <a
                                            href="https://www.fahasa.com/ninja-rantaro-tap-8.html"><?= $name_product ?></a>
                                    </h2>
                                </div>
                                <div class="price-original">
                                    <div class="cart-price">
                                        <div class="cart-fhsItem-price">
                                            <div><span
                                                    class="price"><?php echo number_format($fetch_cart['price'], 0, '', '.'); ?>đ</span>
                                            </div>
                                            <div class="fhsItem-price-old">
                                                <span
                                                    class="price"><?php echo number_format($fetch_cart['price'] + 30000, 0, '', '.'); ?>đ</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="number-product-cart">
                                <div class="product-view-quantity-box">
                                    <input type="number"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        min="1" max="<?=$fetch_quantity['quantity']?>" name="cart_quantity"
                                        value="<?php echo $fetch_cart['quantity']; ?>" required>
                                </div>
                                <div class="cart-price-total">
                                    <span class="cart-price"><span
                                            class="price"><?php echo number_format($fetch_cart['price'], 0, '', '.'); ?>đ</span></span>
                                </div>
                                <div class="div-of-btn-remove-cart">
                                    <a href="cart.php?delete=<?php echo $fetch_cart['id']; ?>"
                                        onclick="return confirm('Xóa khỏi giỏ hàng?');" class="btn-remove-desktop-cart">
                                        <i class="fa-solid fa-trash" style="font-size: 22px"></i>

                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="border-product"></div>
                </div>
                <!-- <div class="box">
                        <a href="cart.php?delete=<?php echo $fetch_cart['id']; ?>" class="fas fa-times" onclick="return confirm('Xóa khỏi giỏ hàng?');"></a>
                        <img src="uploaded_img/<?php echo $fetch_cart['image']; ?>" alt="">
                        <div class="name"><?php echo $fetch_cart['name']; ?></div>
                        <div class="price"><?php echo $fetch_cart['price']; ?> VND (SL: <?php echo $fetch_quantity['quantity']; ?>)</div>
                        <form action="" method="post">
                           <input type="hidden" name="cart_id" value="<?php echo $fetch_cart['id']; ?>">
                           <input type="number" min="1" max="<?=$fetch_quantity['quantity']?>" name="cart_quantity" value="<?php echo $fetch_cart['quantity']; ?>">
                           <input type="submit" name="update_cart" value="Cập nhật" class="option-btn">
                        </form>
                     </div> -->
                <?php
                    $sub_total = ($fetch_cart['quantity'] * $fetch_quantity['newprice']);
                     $grand_total += $sub_total;
                  }
               }else{
                  echo '<p class="empty">Giỏ hàng của bạn trống!</p>';
               }
               ?>
            </div>

            <div class="col-sm-4 hidden-max-width-992">
                <div class="total-cart-right">
                    <div class="block-total-cart">
                        <div class="block-totals-cart-page">
                            <div class="total-cart-page">
                                <div class="title-cart-page-left">Thành tiền</div>
                                <div class="number-cart-page-right">
                                    <span class="price">
                                        <?php echo number_format($grand_total, 0, '', '.'); ?> VNĐ
                                </div>
                            </div>
                            <div class="border-product"></div>
                            <div class="total-cart-page title-final-total">
                                <div class="title-cart-page-left">Tổng Số Tiền (gồm VAT)</div>
                                <div class="number-cart-page-right">
                                    <span class="price">
                                        <?php echo number_format($grand_total, 0, '', '.'); ?> VNĐ
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="checkout-type-button-cart" style="text-align: center">
                            <div class="method-button-cart">
                                <a href="checkout.php">
                                    <button type="button" title="Thanh toán" class="btn btn-primary">
                                        <span><span>Thanh toán</span></span>
                                    </button>
                                </a>
                                <div class="retail-note">
                                    <a href="https://www.fahasa.com/chinh-sach-khach-si/" target="_blank">(Giảm giá trên
                                        web chỉ áp dụng cho bán lẻ)</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="fhs_error_message_cart" style="
                  margin-top: 10px;
                  background: white;
                  padding: 10px;
                  display: none;
               "></div>
                </div>
            </div>
        </div>
        </div>

    </section>

    <?php include 'footer.php'; ?>

    <script src="js/script.js"></script>

</body>

</html>