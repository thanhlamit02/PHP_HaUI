<?php
   //đăng ksy tài khoản người dùng
   include 'config.php';

   if(isset($_POST['submit'])){

      $name = mysqli_real_escape_string($conn, $_POST['name']);
      $email = mysqli_real_escape_string($conn, $_POST['email']);
      $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
      $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
      // $user_type = $_POST['user_type'];
      $user_type = 'user';

      $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email'") or die('query failed');

      if(mysqli_num_rows($select_users) > 0){//kiểm tra email đã tồn tại chưa
         $message[] = 'Tài khoản đã tồn tại!';
      }else{//chưa thì kiểm tra mật khẩu xác nhận và tạo tài khoản
         if($pass != $cpass){
            $message[] = 'Mật khẩu không khớp!';
         }else{
            mysqli_query($conn, "INSERT INTO `users`(name, email, password, role) VALUES('$name', '$email', '$cpass', '$user_type')") or die('query failed');
            $message[] = 'Đăng ký thành công!';
            header('location:login.php');
         }
      }

   }

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Đăng ký</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="css/toast_message.css">
   <link rel="stylesheet" href="css/register.css">

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
   <!-- Lớp overlay -->
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Chào mừng quay trở lại!</h1>
				<p>Để giữ liên hệ với chúng tôi, hãy đăng nhập bằng tài khoản của bạn...</p>
				<button class="ghost" id="signIn">
               <a href="login.php" style="color: white;">Đăng nhập</a>
            </button>
			</div>
		</div>
	</div>

   <!-- Form đăng ký -->
	<div class="form-container sign-up-container">
		<form action="#" method="post">
			<h1>Tạo tài khoản của bạn!</h1>
			<input type="text" name="name" placeholder="Nhập họ tên" >
         <input type="email" name="email" placeholder="Nhập email" >
         <input type="password" name="password" placeholder="Nhập mật khẩu" >
         <input type="password" name="cpassword" placeholder="Nhập lại mật khẩu" >
			<button type="submit" name="submit" value="Đăng ký ngay" style="margin-top: 12px;">Đăng ký</button>
		</form>
	</div>
</div>

<script src="./js/toast_message.js"></script>

</body>
</html>