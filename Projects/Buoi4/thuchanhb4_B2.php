<?php
$a1 = rand(-10, 10);
$b1 = rand(-10, 10);
$c1 = rand(-10, 10);

$a2 = rand(-10, 10);
$b2 = rand(-10, 10);
$c2 = rand(-10, 10);

$d = $a1 * $b2 - $a2 * $b1;
$dx = $c1 * $b2 - $c2 * $b1;
$dy = $a1 * $c2 - $a2 * $c1;

if($d == 0) {
    if($dx + $dy == 0) {
        echo ("Hệ phương trình có vô số nghiệm.");
    }
    else {
        echo ("Phương trình vô nghiệm.");
    }
}

else {
    $x = $dx / $d;
    $y = $dy / $d;

    echo ("Phương trình có nghiệm x = " . $x . " y = " . $y);
}

?>