<?php

   include 'config.php';

   session_start();

   $user_id = $_SESSION['user_id']; //tạo session người dùng thường

   if(!isset($user_id)){// session không tồn tại => quay lại trang đăng nhập
      header('location:login.php');
   }

   if(isset($_POST['send'])){//lưu tin nhắn từ form submit name='send'

      $name = mysqli_real_escape_string($conn, $_POST['name']);
      $email = mysqli_real_escape_string($conn, $_POST['email']);
      $number = $_POST['number'];
      $msg = mysqli_real_escape_string($conn, $_POST['message']);

      $select_message = mysqli_query($conn, "SELECT * FROM `message` WHERE name = '$name' AND email = '$email' AND number = '$number' AND message = '$msg'") or die('query failed');

      if(mysqli_num_rows($select_message) > 0){
         $message[] = 'Tin nhắn đã được gửi trước đó!';
      }else{
         mysqli_query($conn, "INSERT INTO `message`(user_id, name, email, number, message) VALUES('$user_id', '$name', '$email', '$number', '$msg')") or die('query failed');
         $message[] = 'Tin nhắn đã được gửi thành công!';
      }

   }

?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Contact V10</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
   
   <link rel="stylesheet" href="css/cssContaxt.css">
   
<meta name="robots" content="noindex, follow">
</head>
<body>
    <?php include 'header.php'; ?>
    <form action="" method="post">
       <div class="container-contact100">
        <div class="wrap-contact100">
            <form class="contact100-form validate-form">
                <span class="contact100-form-title">
                    Send Us A Message
                </span>
                <div class="wrap-input100 validate-input" data-validate="Please enter your name">
                    <input class="input100" type="text" name="name" placeholder="Full Name">
                    <span class="focus-input100"></span>
                </div>
                <div class="wrap-input100 validate-input" data-validate="Please enter your email: e@a.x">
                    <input class="input100" type="email" name="email" placeholder="Email">
                    <span class="focus-input100"></span>
                </div>
                    <div class="wrap-input100 validate-input" data-validate="Please enter your phone">
                    <input class="input100" type="number" name="number" placeholder="Phone">
                <span class="focus-input100"></span>
                </div>
                    <div class="wrap-input100 validate-input" data-validate="Please enter your message">
                    <textarea class="input100" name="message" placeholder="Your Message"></textarea>
                <span class="focus-input100"></span>
                </div>
                    <div class="container-contact100-form-btn" >
                    <button class="contact100-form-btn" name="send" class="btn">
                        <span>
                            <i class="fa fa-paper-plane-o m-r-6" aria-hidden="true"></i>
                            Send
                        </span>
                    </button>
                </div>
            </form>
        </div>
    </div>
    </form>
    <div id="dropDownSelect1"></div>
    <?php include 'footer.php'; ?>

    <script src="js/script.js"></script>
</body>
</html>
