<?php
$page_title = "Search";
include_once "header.php";
require_once "controller/Search.php";
?>

<div class="main">
    <form action="" method="post" id="searchhouse" onsubmit="">
        <fieldset>
            <legend>
                <h1>Search</h1>
            </legend>
            <table>
                <tr>
                    <td align="right">House name:</td>
                    <td><input type="text" name="housename"></td>
                </tr>
                <tr>
                    <td align="right">Select Area:</td>
                    <td><select name="SelectArea">
                            <option selected disabled>--Select--</option>
                            <?php
                            foreach ($area as $a) {
                                if ($a == $SelectArea)
                                    echo "<option selected>$a</option>";
                                else
                                    echo "<option>$a</option>";
                            }
                            ?>
                        </select>
                    </td>
                    <td><span class="php-error"> <?php echo $err_SelectArea; ?> </span></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Search House" name="searchhouse">
                    </td>
                </tr>
            </table>
        </fieldset>
    </form>

    <?php if ($houses !== NULL) { ?>
        <fieldset>
            <legend>
                <h1>House list</h1>
            </legend>
            <table class="single-border">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Price</th>
                    <th>Apartment ID</th>
                </tr>
                <?php foreach ($houses as $house) { ?>
                    <tr>
                        <?php foreach ($house as $key => $value) { ?>
                            <?php
                            if ($key === 'status' || $key === 'ho_id')
                                continue;
                            ?>

                            <td><?php echo $value; ?></td>
                        <?php } ?>
                    </tr>
                <?php } ?>
            </table>
        </fieldset>
    <?php } ?>

</div>

<?php include_once "footer.php"; ?>