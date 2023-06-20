<?php 
    if(!empty($_SERVER['REQUEST_METHOD'])) {
        echo '<pre>';
        print_r($_FILES);
        echo '</pre>';
    }

    $res = move_uploaded_file($_FILES['uploadFiles']['tmp_name'], 'E:/Documents/Giao trinh hoc online/3rd year/Web PHP/Projects/Buoi6/uploadFiles/upload/' . $_FILES['uploadFiles']['name']);
    var_dump($res);
?>  