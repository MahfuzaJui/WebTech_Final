<?php
require_once "model/db_config.php"; //db credentials
$page_title = "Check Reviews";
include_once "header.php";


$conn = new mysqli($db_server, $db_uname, $db_pass, $db_name); //connection with DB

//to calculate average of array
function average($array)
{
    $total = 0;
    foreach ($array as $item) {
        $total += $item['review'];
    };
    return $total / count($array);
}


if ($_SESSION['type'] == "Admin") {

    $sql = "SELECT * FROM house_owners";

    $flatowners = $conn->query($sql);

    if (isset($_POST['submit'])) {
        echo "<div class='review-updates'>";


        $flatowner_id = $_POST['flatowner_id'];

        //functions to check reviews using flatowners_id
        $sql = "SELECT review FROM review_students WHERE flatowner_id = $flatowner_id";

        $total_reviews_dump = $conn->query($sql);

        $total_reviews = [];

        while ($row = $total_reviews_dump->fetch_assoc()) {
            $total_reviews[] = $row;
        }

        $total_reviews_count = count($total_reviews);

        if ($total_reviews_count <= 0) {

            echo '<p style="text-align:center;background: #f6f6f6;padding: 4px;">No reviews found</p>';
        } else {

            echo '<p><b>Total Reviews of this flatowner:</b> ' . $total_reviews_count . '</p>';

            echo '<p><b>Average Rating:</b> ' . average($total_reviews) . '</p>';

            echo '<p><a class="goback-btn" href="review.php"><< Go Back</a></p>';

            die();
        }
    }
} else if ($_SESSION['type'] == "Student") {

    if (isset($_POST['submit'])) {
        $flatowner_id = $_POST['flatowner_id']; //use this from database

        $student_id = $_SESSION['id'];

        $review = $_POST['review']; // get this from html form

        if ($review > 5) {
            echo "<script>alert('Sorry Review Shouldnt Be More Than 5')</script>";
        } else {
            $sql = "INSERT INTO review_students (flatowner_id, student_id, review) VALUES($flatowner_id, $student_id, $review)";

            $dump_data = $conn->query($sql);

            if ($dump_data == True) {
                echo 'Review Submitted';
                echo '<br>';
                echo '<a href="review.php">Go Back</a>';
                die();
            } else {
                echo 'DB Error';
                var_dump($dump_data);
            }
        }
    } else {
        $sql = "SELECT * FROM house_owners";

        $flatowners = $conn->query($sql);
    }
    echo "</div>";
}
