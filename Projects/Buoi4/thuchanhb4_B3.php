<?php
$markValue = rand(0.1, 10);
if($markValue >= 8.5) {
    echo ($markValue . " là điểm A");
}

else if($markValue >= 8) {
    echo ($markValue . " là điểm B+");
}

else if($markValue >= 7) {
    echo ($markValue . " là điểm B");
}

else if($markValue >= 6) {
    echo ($markValue . " là điểm C+");
}

else if($markValue >= 5) {
    echo ($markValue . " là điểm C");
}

else if($markValue > 4.5) {
    echo ($markValue . " là điểm D+");
}

else if($markValue >= 4 && $markValue <= 4.5) {
    echo ($markValue . " là điểm D");
}

else {
    echo ($markValue . " là điểm F");
}
?>

