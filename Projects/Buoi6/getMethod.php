<!-- $_GET method -->


<!-- // if (isset($_GET['action'])) {
//     echo "<pre>";
//     print_r($_GET['action']);
//     echo "</pre>";
// } -->

<!-- $_POST method -->

<form method="post" action="">
    <input type="text" name="fullname" id="" placeholder="Họ tên">
    <input type="email" name="email" value="" placeholder="Email">
    <button type="submit">Gửi</button>
</form>

<?php
    if(isset($_POST['fullname']) && $_POST['email']) {
        echo "Họ tên: " . $_POST['fullname'] . "<br>";
        echo "Email: " . $_POST['email'] . "<br>";
    }
