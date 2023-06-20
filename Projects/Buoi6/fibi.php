<?php
/*
function fibonacci($n) {
    if($n == 0 || $n == 1) {
        return 1;
    }
    return fibonacci($n - 1) + fibonacci($n - 2);
}

$res = fibonacci(5);

for($i = 0; $i <= $res; $i++) {
    echo $i;
    echo "</br>";
}
*/

// isset && empty
// isset: kiểm tra có tồn tại hay không? 
// empty: kiểm tra có tồn tại hay không, có ktra null. =0, rỗng


$arr = [
    'add1' => 'html',
    'add2' => 'css',
    'add3' => 'js'
];

foreach ($arr as $item) {
    echo $item . " ";
}


array_push($arr, 'Ruby'); // thêm phần tử vào mảng

// sửa phần tử của mảng
$arr['add3'] = 'oop';

unset($arr['add1']); // xóa phần tử của mảng

if(is_array($arr)) { //kiểm tra xem biến có phải thuộc dữ liệu kiểu mảng hay không?
    foreach ($arr as $item) {
        echo $item . " ";
    }
}




$arr_daChieu = [
    'add_first' => [
        'name' => 'Nam Dinh',
        'number' => '18'
    ],

    'add_second' => [
        'fullname' => [
            'firstName' => 'Nguyễn',
            'lastName' => 'Lâm'
        ]
    ]
];


echo $arr_daChieu['add_second']['fullname']['firstName'] . " ở " . $arr_daChieu['add_first']['name'];


//xử lý datetime
//đặt múi giờ theo địa điểm
date_default_timezone_set('Asia/Ho_Chi_Minh');

$date = date('d-m-Y H:i:s');

echo "</br>" . $date;




