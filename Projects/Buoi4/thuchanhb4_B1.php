<?php
$a = rand(-10, 10);
$b = rand(-10, 10);
$c = rand(-10, 10);

$delta = $b * $b - 4 * $a * $c;

if($a == 0) {
    if($b == 0) {
        if($c == 0) {
            echo ("Phương trình có vô số nghiệm.");
        }
        else {
            echo ("Phương trinh vô nghiệm.");
        }
    }
    else {
        $x = -$c / $b;
        echo ("Phương trình có nghiệm x = ". $x);
    }
}

else {
    if($delta < 0) {
        echo ("Phương trình vô nghiệm.");
    }
    else if($delta == 0) {
        $x = -$b / (2 * $a);
        echo ("Phương trình có nghiệm kép x1 = x2 = " . $x);
    }
    else {
        $x1 = (-$b + sqrt($delta)) / (2 * $a);
        $x2 = (-$b - sqrt($delta)) / (2 * $a);
        echo ("Phương trình có 2 nghiệm x1 = " . $x1 . " x2 = " . $x2);
    }
}

?>
