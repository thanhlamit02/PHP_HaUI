<?php
$firstName = $_GET['firstName'];
if (isset($firstName)) {
    echo "firstnam field is set" . "<br>";
} else {
    echo "The field is not set" . "<br>";
}
