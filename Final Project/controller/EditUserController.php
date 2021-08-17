<?php

$User = null;
if (isset($_GET["id"]) && isset($_GET["t"])) {
    if ($_GET["t"] == "Student") {
        require_once("controller/StudentController.php");
        $User = getStudentbyID($_GET["id"]);
    } elseif ($_GET["t"] == "FlatOwner") {
        require_once("controller/HouseOwnerController.php");
        $User = getHouseOwnerbyID($_GET["id"]);
    }
}
$Name = "";
$err_Name = "";
$Email = "";
$err_Email = "";
$Phone = "";
$err_Phone = "";
$id = "";
$err_id = "";

$err_success = "";

$hasError = false;

if (isset($_POST["update"])) {
    if (empty($_POST["Name"])) {
        $hasError = true;
        $err_Name = "Name Required";
    } elseif (strlen($_POST["Name"]) <= 2) {
        $hasError = true;
        $err_Name = "Name must be greater than 2 characters";
    } else {
        $Name = htmlspecialchars($_POST["Name"]);
    }

    if (empty($_POST["Phone"])) {
        $hasError = true;
        $err_Phone = "Phone number Required";
    } else if (is_numeric($_POST["Phone"]) == false) {
        $hasError = true;
        $err_Phone = "Phone number contain number";
    } else if (strlen($_POST["Phone"]) != 11) {
        $hasError = true;
        $err_Phone = "Phone number must contain at least 11 number";
    } else {
        $Phone = htmlspecialchars($_POST["Phone"]);
    }

    if (empty($_POST["id"])) {
        $hasError = true;
        $err_id = "AIUB ID / National ID number Required";
    } elseif (is_numeric($_POST["id"]) == false) {
        $hasError = true;
        $err_id = "AIUB ID / National ID number must contain number";
    } else {
        $id = htmlspecialchars($_POST["id"]);
    }

    if (strlen($_POST["id"]) == 8 || strlen($_POST["id"]) == 10) {
        $err_id = "";
    } else {
        $err_id = "Not a valid id";
        $id = "";
    }

    if (!$hasError && $_GET["t"] == "Student") {

        require_once "./controller/StudentController.php";
        $data = false;

        if (getStudent($Email) === NULL) {
            $data = updateProfile($User["id"], $Name, $Phone, $id);
            $User = getStudentbyID($_GET["id"]);
            $err_success = "Successfully Edited";
        }
    } else if (!$hasError && $_GET["t"] == "FlatOwner") {

        require_once "./controller/HouseOwnerController.php";
        $data = false;

        if (getHouseOwner($Email) === NULL) {
            $data = updateHouseOwner($User["id"], $Name, $Phone, $id);
            $User = getHouseOwnerbyID($_GET["id"]);
            $err_success = "Successfully Edited";
        }
    }
}
