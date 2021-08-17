<?php
$active_page = "login";
$page_title = "Login";
include_once "header.php";
require_once "controller/UserController.php";


?>

<div class="main">
    <form action="" method="post" id="login" onsubmit="return loginValidation();">
        <fieldset>
            <legend>
                <h1>Login</h1>
            </legend>
            <table>
                <tr>
                    <td align="center" colspan="4"><span class="php-error" style="color:red"> <?php echo $err_success; ?> </span></td>
                </tr>
                <tr>
                    <td align="right">Email:</td>
                    <td><input id="login-email" type="text" name="Email" value="<?php echo $Email; ?>" placeholder="john@doe.com"></td>
                    <td> <span id="js-error-email"></span></td>
                    <td><span class="php-error"> <?php echo $err_Email; ?> </span></td>
                </tr>
                </tr>
                <tr>
                    <td align="right">Password:</td>
                    <td><input id="login-password" type="Password" name="Password" value="<?php echo $Password; ?>" placeholder="your password"></td>
                    <td> <span id="js-error-password"></span></td>
                    <td><span class="php-error"> <?php echo $err_Password; ?> </span></td>

                </tr>
                <td align="right">User type: </td>
                <td>
                    <input id="admin" type="radio" value="Admin" <?php if ($type == "Admin") echo "checked"; ?> name="type"> <label for="admin">Admin</label>
                    <input id="student" type="radio" value="Student" <?php if ($type == "Student") echo "checked"; ?> name="type"> <label for="student">Student</label>
                    <input id="flat-owner" type="radio" value="FlatOwner" <?php if ($type == "FlatOwner") echo "checked"; ?> name="type"> <label for="flat-owner">Flat Owner</label>
                </td>
                <td> <span id="js-error-type"></span></td>
                <td><span class="php-error"> <?php echo $err_type; ?> </span></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Login" name="login">
                    </td>
                </tr>
            </table>
        </fieldset>
    </form>
</div>

<?php include_once "footer.php" ?>