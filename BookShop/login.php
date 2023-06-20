<?php

   include 'config.php';
   session_start();

   if(isset($_POST['submit'])){//lấy thông tin đăng nhập từ form submit name='submit'

      $email = mysqli_real_escape_string($conn, $_POST['email']);
      $pass = mysqli_real_escape_string($conn, md5($_POST['password']));


      $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');

      if(mysqli_num_rows($select_users) > 0){//kiểm tra tài khoản có tồn tại không

         $row = mysqli_fetch_assoc($select_users);
         //kiểm tra quyền của tài khoản và đưa đến trang tương ứng
         if($row['user_type'] == 'admin'){

            $_SESSION['admin_name'] = $row['name'];
            $_SESSION['admin_email'] = $row['email'];
            $_SESSION['admin_id'] = $row['id'];
            header('location:admin/ad_page.php');

         }elseif($row['user_type'] == 'user'){

            $_SESSION['user_name'] = $row['name'];
            $_SESSION['user_email'] = $row['email'];
            $_SESSION['user_id'] = $row['id'];
            header('location:home.php');

         }

      }else{
         $message[] = 'Email hoặc mật khẩu không chính xác!';
      }

   }

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Đăng nhập</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="css/toast_message.css">
   <link rel="stylesheet" href="css/login.css">

</head>
<body>

<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="toast">
         <div class="toast-content">
            <i class="fa-solid fa-circle-exclamation"></i>
         
            <div class="message">
               <span class="text text-1">Warning!</span>
               <span class="text text-2">'.$message.'</span>
            </div>
         </div>
         <i class="fa-solid fa-xmark close"></i>
         <div class="progress active"></div>
    </div>
   ';
   }
}
?>

<div class="container" id="container">
   <!-- Form đăng nhập -->
	<div class="form-container sign-in-container">
		<form action="#" method="post">
			<h1>Đăng nhập</h1>
			<input type="email" name="email" placeholder="Email" required />
			<input type="password" name="password" placeholder="Password" required/>
			<!-- <a href="#">Bạn đã quên mật khẩu?</a> -->
         <button type="submit" name="submit" value="Đăng nhập" style="margin-top: 12px;">Đăng nhập</button>
		</form>
	</div>

   <!-- Lớp overlay -->
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-right">
				<h1>Xin chào!</h1>
				<p>Hãy điền thông tin của bạn để bắt đầu cùng chúng tôi!</p>
				<button class="ghost" id="signUp">
               <a href="register.php" style="color: white;">Đăng ký</a>
            </button>
			</div>
		</div>
	</div>
</div>

<script src="js/toast_message.js"></script>
</body>
</html>