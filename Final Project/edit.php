<?php
session_start();

if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == false) {
    header("Location: index.php");
}

if ($_SESSION['type'] != 'Admin') {
    header("Location: logout.php");
}
require_once "controller/EditUserController.php";

?>

<?php include_once "header.php"; ?>

<div class="main">
    <form action="" method="post" id="registration" onsubmit="return registrationValidation();">
        <fieldset>
            <legend>
                <h1>Edit User </h1>
            </legend>
            <table>
                <tr>
                    <td align="center" colspan="4"><span class="php-error" style="color:red"> <?php echo $err_success; ?> </span></td>
                </tr>
                <tr>
                    <td align="right">Name:</td>
                    <td><input id="reg-name" type="text" name="Name" value="<?php echo $User["name"]; ?>"></td>
                    <td> <span id="js-error-name"></span></td>
                    <td><span class="php-error"> <?php echo $err_Name; ?> </span></td>
                </tr>
                <tr>
                    <td align="right">Phone Number:</td>
                    <td><input id="reg-phone-number" type="text" name="Phone" value="<?php echo $User["phone"]; ?>"></td>
                    <td> <span id="js-error-phone-number"></span></td>
                    <td><span class="php-error"> <?php echo $err_Phone; ?> </span></td>
                </tr>
                <tr>
                    <td align="right">AIUB-ID/NID:</td>
                    <td><input id="reg-aiub-id_nid" type="text" name="id" value="<?php echo $User["aiub_nid_id"]; ?>"></td>
                    <td> <span id="js-error-aiubid_nid"></span></td>
                    <td><span class="php-error"> <?php echo $err_id; ?> </span></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input class="login-btn" type="submit" value="Update" name="update">
                    </td>
                </tr>

            </table>
        </fieldset>
    </form>
</div>

<?php include_once "footer.php" ?>