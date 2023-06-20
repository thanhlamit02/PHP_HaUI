<!DOCTYPE html>
<html>

<head>
    <title>Công thức khai triển Mac-Laurin của sin(x)</title>
</head>

<body>
    <h1>Công thức khai triển Mac-Laurin của sin(x)</h1>
    <?php

    function sin_x($x, $e)
    {
        $eps = 1;
        $s = 0;
        $i = 1;

        while ($eps >= $e) {
            $t = pow(-1, $i - 1) * pow($x, 2 * $i - 1) / factorial(2 * $i - 1);
            $s += $t;
            $eps = abs($t / $s);
            $i++;
        }

        return $s;
    }

    function factorial($n)
    {
        $result = 1;
        for ($i = 2; $i <= $n; $i++) {
            $result *= $i;
        }
        return $result;
    }
    $x = '';
    $e = '';
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $x = $_POST['x'];
        $e = $_POST['e'];
        $result = sin_x($x, $e);
    }

    ?>
    <form method="post">
        <label for="x">Nhập giá trị của x:</label>
        <input type="number" step="0.01" id="x" name="x" value="<?= $x ?>"><br>
        <label for="e">Nhập sai số e:</label>
        <input type="number" step="0.01" id="e" name="e" value="<?= $e ?>"><br>
        <label for="sin">Kết Quả:</label>
        <input type="number" id="sin" name="sin" value="<?= $result ?>"><br>
        <input type="submit" value="Tính">
    </form>
</body>

</html>