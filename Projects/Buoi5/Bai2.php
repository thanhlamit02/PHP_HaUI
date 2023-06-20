<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Thông tin sinh viên</title>
</head>

<style>
    table {
        border-collapse: collapse;
    }

    td {
        padding: 10px;
    }
</style>

<body>
    <?php
    $people = array(
        array("id" => "1", "name" => "Nguyen Van A", "hometown" => "Ha Noi", "gender" => "Male", "year_of_birth" => 1995),
        array("id" => "2", "name" => "Tran Thi B", "hometown" => "Hai Phong", "gender" => "Female", "year_of_birth" => 1997),
        array("id" => "3", "name" => "Le Van C", "hometown" => "Da Nang", "gender" => "Male", "year_of_birth" => 1990),
        array("id" => "4", "name" => "Hoang Thi D", "hometown" => "Ho Chi Minh", "gender" => "Female", "year_of_birth" => 1993),
        array("id" => "5", "name" => "Pham Van E", "hometown" => "Can Tho", "gender" => "Male", "year_of_birth" => 1998)
    );

    echo "<table border='1'>
            <tr>
            <th>STT</th>
            <th>Name</th>
            <th>Hometown</th>
            <th>Gender</th>
            <th>Year of Birth</th>
            </tr>";
            
    foreach ($people as $person) {
        echo "<tr>";
        echo "<td>" . $person['id'] . "</td>";
        echo "<td>" . $person['name'] . "</td>";
        echo "<td>" . $person['hometown'] . "</td>";
        echo "<td>" . $person['gender'] . "</td>";
        echo "<td>" . $person['year_of_birth'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    ?>
</body>

</html>