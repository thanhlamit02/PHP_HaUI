<!-- SESSION -->

<?php
session_start();

$_SESSION['username'] = 'thanhlamit02';

echo '<pre>';
print_r($_SESSION['username']);
echo '</pre>';