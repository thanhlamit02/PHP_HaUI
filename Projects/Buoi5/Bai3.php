<!DOCTYPE html>
<html>

<head>
    <title>Tìm số nguyên tố</title>
    <style type="text/css">
        body {
            font-family: Arial, sans-serif;
            font-size: 16px;
        }

        h1 {
            margin: 20px;
        }

        form {
            padding: 40px;
            background-color: steelblue;
        }

        table {
            border-collapse: collapse;
        }

        section {
            margin: 8px;
        }

        #number,
        #result {
            height: 40px;
            width: 20rem;
            border-radius: 4px;
        }

        .lable {
            margin-right: 40px;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
            padding: 10px;
        }

        th {
            background-color: #f2f2f2;
        }

        .btn {
            border: none;
            outline: none;
            padding: 12px;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <?php
    function isPrime($n)
    {
        if ($n <= 1) {
            return false;
        }
        for ($i = 2; $i <= sqrt($n); $i++) {
            if ($n % $i == 0) {
                return false;
            }
        }
        return true;
    }
    $s = '';
    $number = '';
    if (isset($_POST['submit'])) {
        $number = $_POST['number'];
        for ($i = 2; $i <= $number; $i++) {
            if (isPrime($i)) {
                $s .= $i . " ";
            }
        }
    }
    ?>
    <form method="post" action="">
        <label for="number">Nhập số nguyên</label>
        <input type="number" id="number" name="number" value="<?= $number ?>" required><br><br>
        <label for="number">Kết Quả</label>
        <input type="text" id="result" value="<?= $s ?>"><br><br>
        <input class="btn" type="submit" value="Tìm" name="submit">
        <input class="btn" type="submit" value="Bỏ Qua" name="exit">
    </form>
</body>

</html>