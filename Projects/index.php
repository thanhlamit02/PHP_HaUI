<?php
// define("Base_Salary", 1490000);
// $salaryRate = 2.34;
// $salary = $salaryRate * Base_Salary;
// echo "<h1>Lương của tôi khi ra trường: $salary</h1>";
// var_dump($salary);

    $x = 100;
    $y = 50;
    function test() {
        //Cách 1: Global $x
       /* echo "<h1?>Giá trị biến toàn cục x: $x</h1>";*/
        //Cách 2: dùng mảng global
        $total = $GLOBALS['x'] + $GLOBALS['y'];
        echo "<h1>Tổng: $total</h1>";
    }

    test();

?>
