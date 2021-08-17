<?php
session_start();

if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == false) {
    header("Location: index.php");
}

if ($_SESSION['type'] != 'Admin') {
    header("Location: logout.php");
}

require_once "controller/HouseController.php";

$area = array("Bashundhara R/A", "Kuratoli", "Nikunjo");

$houses = NULL;
$hasError = false;

$housename = "";
$err_housename = "";
$SelectArea = "";
$err_SelectArea = "";

if (isset($_POST['searchhouse'])) {
    $housename = htmlspecialchars($_POST["housename"]);

    if (empty($_POST["SelectArea"])) {
        $hasError = true;
        $err_SelectArea = "Select Area Required";
    } else {
        $SelectArea = htmlspecialchars($_POST["SelectArea"]);
    }

    if ($hasError === false) {
        $houses = getAvailableHouses($housename, $SelectArea);
    }
}
