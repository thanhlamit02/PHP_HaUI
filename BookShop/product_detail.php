<?php

   include 'config.php';

   session_start();

   $user_id = $_SESSION['user_id']; //tạo session người dùng thường

   if(!isset($user_id)){// session không tồn tại => quay lại trang đăng nhập
      header('location:login.php');
   }

   if(isset($_POST['add_to_cart'])){//thêm sách vào giỏi hàng từ form submit name='add_to_cart'

      $product_name = $_POST['product_name'];
      $product_price = $_POST['product_price'];
      $product_image = $_POST['product_image'];
      $product_quantity = $_POST['product_quantity'];

      if($product_quantity==0){
         $message[] = 'sách đã hết hàng!';
      }
      else{
         $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

         if(mysqli_num_rows($check_cart_numbers) > 0){//kiểm tra sách có trong giỏ hàng chưa và tăng số lượng
            $result=mysqli_fetch_assoc($check_cart_numbers);
            $num=$result['quantity']+$product_quantity;
            $select_quantity = mysqli_query($conn, "SELECT * FROM `products` WHERE name='$product_name'");
            $fetch_quantity = mysqli_fetch_assoc($select_quantity);
            if($num>$fetch_quantity['quantity']){
               $num=$fetch_quantity['quantity'];
            }
            mysqli_query($conn, "UPDATE `cart` SET quantity='$num' WHERE name = '$product_name' AND user_id = '$user_id'");
            $message[] = 'Sách đã có trong giỏ hàng và được thêm số lượng!';
         }else{
            mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, quantity, image) VALUES('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
            $message[] = 'Sách đã được thêm vào giỏ hàng!';
        }
        header('location:cart.php');
      }
   }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
        integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="./css/product_detail.css">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>

    <?php include 'header.php'; ?>

    <section>
        <div class="products">
            <div class="product-essential-media">
                <div class="product-image">
                    <img src="uploaded_img/e8f3f59815e82a7b1cab64e5f8645414.jpg" alt="Ảnh sản phẩm">
                    <div class="product-image_preview">
                        <img src="uploaded_img/e8f3f59815e82a7b1cab64e5f8645414.jpg" alt="Ảnh sản phẩm">
                        <img src="uploaded_img/e8f3f59815e82a7b1cab64e5f8645414.jpg" alt="Ảnh sản phẩm">
                    </div>
                </div>
                <div class="product-btn">
                    <?php  
         $select_products = mysqli_query($conn, "SELECT * FROM `products` ORDER BY id DESC  LIMIT 1") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
        ?>
                    <form action="" method="post" class="">
                        <input type="number" name="product_quantity" value="<?=($fetch_products['quantity']>0) ? 1:0 ?>"
                            class="qty d-none">

                        <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">

                        <input type="hidden" name="product_category" value="<?php echo $fetch_products['category']; ?>">

                        <input type="hidden" name="product_price" value="<?php echo $fetch_products['newprice']; ?>">

                        <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
                        <button class="product-btn_add btn-effect" name="add_to_cart">
                            <p>Thêm giỏ hàng</p>
                            <i class="fa-solid fa-cart-plus text-white"></i>
                        </button>
                        <button class="product-btn_buy btn-effect" name="add_to_cart">
                            <p>Mua ngay</p>
                        </button>
                    </form>
                    <?php
            }
         }else{
            echo '<p class="empty">Chưa có sách được bán!</p>';
         }
        ?>

                </div>
            </div>

            <div class="product-essential-detail">
                <h1 class="product-title">Harry Potter và Chiếc cốc lửa (Truyen)</h1>
                <div class="product-madeBy">
                    <span>Nhà xuất bản : J. K. Rowling</span>
                    <span>Tác giả : J. K. Rowling</span>
                    <span>Hình thức bìa: Bìa mềm</span>
                </div>
                <h1 class="product-price_title">Giá bán:</h1>
                <div class="product-price">
                    <span class="product-price_new">15.500đ</span>
                    <span class="product-price_old">31.000</span>
                    <span class="product-price_sale">-50%</span>
                </div>
                <div class="product-quantity">
                    <span class="product-quantity_text">Số lượng:</span>
                    <input type="number" class="product-quantity_number" value="1">
                </div>
            </div>
        </div>

    </section>

    <?php include 'footer.php'; ?>

    <script src="js/script.js"></script>
</body>

</html>