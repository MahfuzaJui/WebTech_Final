<?php
session_start();

if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == false) {
    header("Location: index.php");
}

if ($_SESSION['type'] != 'Admin') {
    header("Location: logout.php");
}
$Name = "";
$err_Name = "";
$Email = "";
$err_Email = "";
$Phone = "";
$err_Phone = "";
$Password = "";
$err_Password = "";
$ConfirmPassword = "";
$err_ConfirmPassword = "";
$type = "";
$err_type = "";
$id = "";
$err_id = "";

$err_success = "";

$hasError = false;

if (isset($_POST["Add"])) {
    if (empty($_POST["Name"])) {
        $hasError = true;
        $err_Name = "Name Required";
    } elseif (strlen($_POST["Name"]) <= 2) {
        $hasError = true;
        $err_Name = "Name must be greater than 2 characters";
    } else {
        $Name = htmlspecialchars($_POST["Name"]);
    }

    if (empty($_POST["Email"])) {
        $hasError = true;
        $err_Email = "Email Required";
    } else if (strpos($_POST["Email"], "@") == false || strpos($_POST["Email"], ".") == false) {
        $hasError = true;
        $err_Email = "Email must contain @ character and . character";
    } else {
        $Email = htmlspecialchars($_POST["Email"]);
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

    if (empty($_POST["Password"])) {
        $hasError = true;
        $err_Password = "Password Required";
    } elseif (strlen($_POST["Password"]) <= 7) {
        $hasError = true;
        $err_Password = "Password must contain at least 8 character";
    } elseif (strpos($_POST["Password"], '#') == false && strpos($_POST['Password'], '?') == false) {
        $hasError = true;
        $err_Password = "Password must contain # character or one ? character";
    } else {
        $upper = 0;
        $lower = 0;
        $number = 0;
        $arr = str_split($_POST["Password"]);
        foreach ($arr as $a) {
            if (ctype_upper($a))
                $upper++;
            elseif (ctype_lower($a))
                $lower++;
            elseif (ctype_digit($a))
                $number++;
        }
        if ($upper >= 1 && $lower >= 1 && $number >= 1) {
            $Password = htmlspecialchars($_POST["Password"]);
        } else {
            $err_Password = "Password must contain 1 number and combination of uppercase and lowercase alphabet";
        }
    }

    if (empty($_POST["ConfirmPassword"])) {
        $hasError = true;
        $err_ConfirmPassword = "Confirm Password Required";
    } else if ($_POST["Password"] !== $_POST["ConfirmPassword"]) {
        $hasError = true;
        $err_ConfirmPassword = "Password and Confirm Password not match";
    } else {
        $ConfirmPassword = htmlspecialchars($_POST["ConfirmPassword"]);
    }

    if (!isset($_POST["type"])) {
        $hasError = true;
        $err_type = "User type Required";
    } else {
        $type = $_POST["type"];
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

    if (!$hasError && $type == "Student") {

        require_once "./controller/StudentController.php";
        $data = false;

        if (getStudent($Email) === NULL) {
            $data = insertStudent($Name, $Email, $Phone, $Password, $id, "NULL");
            header("Location: index.php");
        } else {
            $err_success = "Duplicate email Registration unsuccessful";
        }
    } else if (!$hasError && $type == "FlatOwner") {

        require_once "./controller/HouseOwnerController.php";
        $data = false;

        if (getHouseOwner($Email) === NULL) {
            $data = insertHouseOwner($Name, $Email, $Phone, $Password, $id, "NULL");
            header("Location: index.php");
        } else {
            $err_success = "Duplicate email Registration unsuccessful";
        }
    }
}
