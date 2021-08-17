<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php if (isset($page_title)) : ?>
        <title><?php echo $page_title; ?></title>
    <?php else : ?>
        <title></title>
    <?php endif; ?>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="navigation">
        <div class="menu">
            <ul>
                <?php if (isset($_SESSION['type']) && $_SESSION['type'] == 'Admin') { ?>

                    <li id="user-details">
                        <font color="white"><b>Hi Admin,<br>Your Last Login Time: <?php echo date('m/d/Y H:i:s', $_COOKIE['timestamp']) ?></b></font>
                    </li>
                    <li><a href="AdminDashboard.php">Verify Student</a></li>
                    <li><a href="verify-houseowner.php">Verify House Owner</a></li>
                    <li><a href="students-list.php">Student List</a></li>
                    <li><a href="houseowners-list.php">House Owners List</a></li>
                    <li><a href="houses-list.php">Houses List</a></li>
                    <li><a href="add-user.php">Add User</a></li>
                    <li><a href="review.php">Check Ratings</a></li>
                    <li><a href="search.php">Search</a></li>
                    <li><a href="logout.php">Logout</a></li>


                <?php } else if (isset($_SESSION['type']) && $_SESSION['type'] == 'Student') { ?>

                    <li><a href="StudentDashboard.php">Rent House</a></li>
                    <li><a href="update-profile.php">Update Profile</a></li>
                    <li><a href="change-password.php">Change Password</a></li>
                    <li><a href="search-house.php">Search House</a></li>
                    <li><a href="review.php">Give Rating</a></li>
                    <?php if (isset($_SESSION['h_id']) && $_SESSION['h_id'] !== "NULL") { ?>
                        <li><a href="leave-house.php">Leave House</a></li>
                    <?php } ?>
                    <!-- <li><a href="payment.php">Payment</a></li> -->
                    <!-- <li><a href="help.php">Help</a></li> -->
                    <li><a href="logout.php">Logout</a></li>

                <?php } else if (isset($_SESSION['type']) && $_SESSION['type'] == 'FlatOwner') { ?>

                    <li><a href="update-user-info.php">Update user infoe</a></li>
                    <li><a href="addhouse.php">Add House</a></li>
                    <li><a href="help.php">Help</a></li>
                    <li><a href="logout.php">Logout</a></li>

                <?php } else { ?>

                    <?php if (isset($active_page)) : if ('login' === $active_page) : ?>
                            <li><a class="active" href="index.php">Login</a></li>
                        <?php else : ?>
                            <li><a href="index.php">Login</a></li>
                        <?php endif;
                        if ('registration' === $active_page) : ?>
                            <li><a class="active" href="registration.php">Registration</a></li>
                        <?php else : ?>
                            <li><a href="registration.php">Registration</a></li>
                        <?php endif;
                    else : ?>
                        <li><a href="index.php">Login</a></li>
                        <li><a href="registration.php">Registration</a></li>
                    <?php endif; ?>
                <?php } ?>
            </ul>
        </div>
    </div>