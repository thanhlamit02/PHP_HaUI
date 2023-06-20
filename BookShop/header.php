<?php
//nhúng vào các trang bán hàng
if (isset($message)) { //hiển thị thông báo sau khi thao tác với biến message được gán giá trị
   foreach ($message as $message) {
      echo '
         <div class="message">
            <span>' . $message . '</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
         </div>'; //đóng thẻ này
   }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <title>Document</title>
   <link rel="stylesheet" href="./css/header.css">
</head>

<body>
   <header>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
         <div class="container">
            <a class="navbar-brand" href="home.php">
               <img src="./images/logo.png" class="logo" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02"
               aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
               <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                     <a class="nav-link" href="about.php">Giới thiệu</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="shop.php">Cửa hàng</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="contact.php">Liên hệ</a>
                  </li>

               </ul>
               <form class="d-flex col-6 form-search" method="post" action="search_page.php">
                  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
                  <button class="btn btn-outline-success m-0 px-4 py-3" type="submit" name="submit">Search</button>
               </form>

               <!-- <?php
               if (isset($_POST['submit'])) { // Kiểm tra xem nút Submit đã được nhấn hay chưa
                  $search_item = $_POST['search'];
                  $select_products = mysqli_query($conn, "SELECT * FROM `products` WHERE name LIKE '%{$search_item}%'") or die('Query failed');
                  if (mysqli_num_rows($select_products) > 0) {
                     while ($fetch_products = mysqli_fetch_assoc($select_products)) {
                        ?>
                        <form action="" method="post" class="box">
                           <img class="image" src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
                           <div class="name">
                              <?php echo $fetch_products['name']; ?> (
                              <?php echo $fetch_products['category']; ?>)
                           </div>
                           <div class="name">
                              <?php echo $fetch_products['describes']; ?>
                           </div>
                           <div class="price">
                              <?php echo $fetch_products['newprice']; ?>/<span style="text-decoration-line:line-through">
                                 <?php echo $fetch_products['price']; ?>
                              </span> VND (
                              <?php echo $fetch_products['discount']; ?>% SL:
                              <?php echo $fetch_products['quantity']; ?>)
                           </div>
                           <input type="number" min="<?= ($fetch_products['quantity'] > 0) ? 1 : 0 ?>"
                              max="<?php echo $fetch_products['quantity']; ?>" name="product_quantity"
                              value="<?= ($fetch_products['quantity'] > 0) ? 1 : 0 ?>" class="qty">
                           <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
                           <input type="hidden" name="product_category" value="<?php echo $fetch_products['category']; ?>">
                           <input type="hidden" name="product_price" value="<?php echo $fetch_products['newprice']; ?>">
                           <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
                           <input type="submit" value="Thêm vào giỏ hàng" name="add_to_cart" class="btn">
                        </form>
                        <?php
                     }
                  } else {
                     echo '<p class="empty">Không tìm thấy!</p>';
                  }
               }
               ?> -->


               <div class="cart">
                  <?php
                  $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
                  $cart_rows_number = mysqli_num_rows($select_cart);
                  $total = 0;
                  while ($fetch_total = mysqli_fetch_assoc($select_cart)) {
                     $total += $fetch_total['quantity'] * $fetch_total['price'];
                  }
                  ?>

                  <a href="cart.php" class="position-relative">
                     <i class="fas fa-shopping-cart pl-3"></i>
                     <p class="amount-in-cart">
                        <?php echo $cart_rows_number; ?>
                     </p>
                  </a>
               </div>
               <div class="dropdown">
                  <button class="btn bg-light text-dark dropdown-toggle border-0 m-0" type="button"
                     id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                     <img src="https://haycafe.vn/wp-content/uploads/2022/03/anh-meo-cute-trai-tim-600x600.jpg"
                        class="avatar_icon" alt="">
                  </button>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                     <li><a class="dropdown-item" href="orders.php">Đơn mua</a></li>
                     <li><a class="dropdown-item" href="logout.php">Đăng xuất</a></li>
                  </ul>
               </div>
            </div>
         </div>
      </nav>

      <!-- <div class="header-2">
      <div class="flex">
         <a href="home.php" class="logo">Bookly.</a>
         
         <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <a href="search_page.php" class="fas fa-search"></a>
            <div id="user-btn" class="fas fa-user"></div>
            <?php
            $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
            $cart_rows_number = mysqli_num_rows($select_cart);
            $total = 0;
            while ($fetch_total = mysqli_fetch_assoc($select_cart)) {
               $total += $fetch_total['quantity'] * $fetch_total['price'];
            }
            ?>
            <a href="cart.php"> <i class="fas fa-shopping-cart"></i> <span>(<?php echo $cart_rows_number; ?>)</span> <span>(<?php echo $total; ?> VND)</span> </a>
         </div>

         <div class="user-box">
            <p>Tên người dùng : <span><?php echo $_SESSION['user_name']; ?></span></p>
            <p>Email : <span><?php echo $_SESSION['user_email']; ?></span></p>
            <a href="logout.php" class="delete-btn">Đăng xuất</a>
         </div>
      </div>
   </div> -->
   </header>
</body>

</html>