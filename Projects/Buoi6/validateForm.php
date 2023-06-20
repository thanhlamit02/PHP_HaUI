

<?php
if (!empty($_POST)) {

    $error = [];

    if (empty($_POST['fullname'])) {
        $error['fullname']['required'] = "*Tên người dùng không được để trống!";
    }

    else {
        if(strlen($_POST['fullname']) < 6) {
            $error['fullname']['min_length'] = "*Tên người dùng phải lớn hơn 6 kí tự!";
        }
    }

    if(empty($_POST['email'])) {
        $error['email']['required'] = "*Email không được để trống!";
    }

    else {
        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $error['email']['format'] = "*Email không đúng định dạng";
        }
    }

    if(empty($error)) {
        echo "Đăng nhập thành công";
    } 
    else {
        echo "Đăng nhập không thành công";
    }
}
?>

<!-- Validate Form -->

<form method="post" action="">
    <h1>ĐĂNG NHẬP</h1>

    <!-- Username Validate -->
    <label for="">Tên người dùng:</label>
    </br>   
    <input type="text" name="fullname" id="" placeholder="VD: lamnt2002">
    <?php echo !empty($error['fullname']['required']) ? '<p style="color: red; font-size: 4px">' . $error['fullname']['required'] . '</p>' : '' ;?>
    <?php echo !empty($error['fullname']['min_length']) ? '<p style="color: red; font-size: 4px">' . $error['fullname']['min_length'] . '</p>' : '';?>
    </br> 
    
    <!-- Email Validate -->
    <label for="">Email:</label>
    </br>   
    <input type="email" name="email" value="" placeholder="VD: Admin@gmail.com">
    <?php echo !empty($error['email']['required']) ? '<p style="color: red; font-size: 4px">' . $error['email']['required'] . '</p>' : '' ;?>
    <?php echo !empty($error['email']['format']) ? '<p style="color: red; font-size: 4px">' . $error['email']['format'] . '</p>' : '' ;?>
    </br>
    <button type="submit">Gửi</button>
</form>