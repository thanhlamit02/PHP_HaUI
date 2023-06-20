<?php
function isPrime($n) {
    if($n < 2) {
        return false;
    }
    $squareRoot = sqrt($n);
    for($i = 2; $i <= $squareRoot; $i++) {
        if($n % $i == 0) {
            return false;
        }
    }
    return true;
}

$n = isPrime(8);
if($n == true) {
    echo ("Đây là số nguyên tố\n");
}
else {
    echo ("Đây không phải số nguyên tố\n");
}

echo ("So nguyen to nho hon 100: ");
for($i = 0; $i < 100; $i++) {
    if(isPrime($i)) {
        echo ($i . " ");
    }
}
?>