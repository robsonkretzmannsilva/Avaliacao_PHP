<?php
require __DIR__ . "/../source/autoload.php";

use Source\Models\Colors;

$colors = new Colors();
if (filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT)) {
    $id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
    $colors->destroy("id = " . $id);
    header("location: cores.php");
}