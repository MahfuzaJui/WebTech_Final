<?php
session_start();

require_once "controller/ReviewController.php";

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {


	if ($_SESSION['type'] == "Admin") //this is to check the views for the user
	{

?>

		<?php $page_title = "Check Reviews";
		include_once "header.php"; ?>

		<div class="review">
			<form method="POST">
				<label for="flatowners">Choose Flatowners: </label>
				<select id="flatowners" name="flatowner_id">

					<?php

					foreach ($flatowners as $data) {
						echo '<option value="' . $data['id'] . '">' . $data['name'] . '</option>"';
					}
					?>
				</select>
				<br>
				<input type="submit" name="submit">
			</form>
		</div>
		</body>

		</html>

	<?php
	} else if ($_SESSION['type'] == "Student") {
		//views for students
	?>

		<?php $page_title = "Review Your Flatowner";
		include_once "header.php"; ?>

		<div class="review">
			<form method="POST">
				<label for="flatowners">Choose Your Flatowners ID:</label>
				<select id="flatowners" name="flatowner_id">

					<?php

					foreach ($flatowners as $data) {
						echo '<option value="' . $data['id'] . '">' . $data['name'] . '</option>"';
					}
					?>
				</select>
				<br>
				<lable>Please Rate Your Flatowner Out Of 5</lable><br>
				<label for="review1">1</label>
				<input type="radio" id="review1" name="review" value="1">
				<label for="review2">2</label>
				<input type="radio" id="review2" name="review" value="2">
				<label for="review3">3</label>
				<input type="radio" id="review3" name="review" value="3">
				<label for="review4">4</label>
				<input type="radio" id="review4" name="review" value="4">
				<label for="review5">5</label>
				<input type="radio" id="review5" name="review" value="5">

				<br>

				<input class="login-btn" type="submit" name="submit">
			</form>
		</div>
		</body>

		</html>

<?php
	}
} else if ($_SESSION['type'] == "FlatOwner") {
	echo 'you are a Flatowner';
} else {

	header('Location: StudentDashboard.php');
}

?>