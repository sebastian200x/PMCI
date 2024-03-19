<?php

require "config.php";

function connect()
{
	$mysqli = new mysqli(SERVER, USERNAME, PASSWORD, DATABASE);

	// Error checker
	if ($mysqli->connect_errno != 0) {

		// error retriever
		$error = $mysqli->connect_error;

		// Date of error
		$error_date = date("F j, Y, g:i a");

		// Error message with date
		$message = "{$error} | {$error_date} \r\n";

		// Put the error in db-log.txt
		file_put_contents("db-log.txt", $message, FILE_APPEND);

		return false;
	} else {
		// Connection Successful
		$mysqli->set_charset("utf8mb4");

		return $mysqli;
	}
}

function register($admin_user, $admin_pass, $name, $email, $username, $password, $confirm_password)
{
	// Establish a database connection.
	$mysqli = connect();

	// If there's an error in database the program will stop function
	if (!$mysqli) {
		return false;
	}

	// Trim whitespace from input values.
	$admin_user = trim($admin_user);
	$admin_pass = trim($admin_pass);
	$name = trim($name);
	$email = trim($email);

	$username = trim($username);
	$password = trim($password);

	$confirm_password = trim($confirm_password);


	// Check if any field is empty.
	$args = func_get_args();
	foreach ($args as $value) {
		if (empty ($value)) {
			// If any field is empty, return an error message.
			return "All fields are required";
		}
	}

	// Check for disallowed characters (< and >).
	foreach ($args as $value) {
		if (preg_match("/([<|>])/", $value)) {
			// If disallowed characters are found, 
			// return an error message.
			return "< and > characters are not allowed";
		}
	}

	// Validate email format.
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		// If email is not valid, return an error message.
		return "Email is not valid";
	}

	// Admin account checker
	$admin_user = filter_var($admin_user, FILTER_SANITIZE_STRING);
	$admin_pass = filter_var($admin_pass, FILTER_SANITIZE_STRING);

	$sql = "SELECT username, password FROM account WHERE username = ?";
	$stmt = $mysqli->prepare($sql);

	$stmt->bind_param("s", $admin_user);
	$stmt->execute();

	$result = $stmt->get_result();
	$data = $result->fetch_assoc();

	if ($data == NULL) {
		return "Account not found";
	}

	if (password_verify($admin_pass, $data["password"]) == FALSE) {
		return "Wrong Admin Password";
	}


	// Check if the email already exists in the database.
	$stmt = $mysqli->prepare("SELECT email FROM account WHERE email = ?");
	$stmt->bind_param("s", $email);
	$stmt->execute();
	$result = $stmt->get_result();
	$data = $result->fetch_assoc();
	if ($data != NULL) {
		// If email already exists, return an error message.
		return "Email already exists";
	}

	// Check if the username is too long. 
	if (strlen($username) > 12) {
		// If username is too long, return an error message.
		return "Username must contain max 12 characters only";
	}

	// Check if the username already exists in the database.
	$stmt = $mysqli->prepare("SELECT username FROM account WHERE username = ?");
	$stmt->bind_param("s", $username);
	$stmt->execute();
	$result = $stmt->get_result();
	$data = $result->fetch_assoc();
	if ($data != NULL) {
		// If username already exists, return an error message.
		return "Username already exists, please use a different username";
	}

	// Check if the password is too long.
	if (strlen($password) < 8) {
		// If password is too long, return an error message.
		return "Password is too short, must be 8-24 characters";
	}

	if (strlen($password) > 24) {
		// If password is too long, return an error message.
		return "Password is too long, must be 8-24 characters ";
	}

	// Check if the passwords match.
	if ($password != $confirm_password) {
		// If passwords don't match, return an error message.
		return "Passwords doesn't match";
	}

	// Hash the password for security.
	$hashed_password = password_hash($password, PASSWORD_DEFAULT);

	// Insert user data into the 'account' table.
	$stmt = $mysqli->prepare("INSERT INTO account (username, password, email, name) VALUES (?, ?, ?, ?)");
	$stmt->bind_param("ssss", $username, $hashed_password, $email, $name);
	$stmt->execute();


	// Check if the insertion was successful.
	if ($stmt->affected_rows != 1) {
		// If an error occurred during insertion, return an error message.
		return "An error occurred. Please try again";
	} else {
		// If successful, return a success message.
		return "success";
	}

}

function login($username, $password)
{
	// Establish a database connection.
	$mysqli = connect();

	// If there's an error in database the program will stop function
	if (!$mysqli) {
		return false;
	}

	// Trim leading and trailing whitespaces 
	// from username and password.
	$username = trim($username);
	$password = trim($password);

	// Check if either username or password is empty.
	if ($username == "" || $password == "") {
		return "Both fields are required";
	}

	// Sanitize username and password to prevent SQL injection.
	$username = filter_var($username, FILTER_SANITIZE_STRING);
	$password = filter_var($password, FILTER_SANITIZE_STRING);

	// Prepare SQL statement to select username 
	// and password from account table.
	$sql = "SELECT username, password, id FROM account WHERE username = ?";
	$stmt = $mysqli->prepare($sql);

	// Bind the username parameter to the prepared statement.
	$stmt->bind_param("s", $username);

	// Execute the prepared statement to query the database.
	$stmt->execute();

	// Get the result set from the executed statement.
	$result = $stmt->get_result();

	// Fetch the associative array representing the first
	// row of the result set.
	$data = $result->fetch_assoc();

	// Check if the username exists in the database.
	if ($data == NULL) {
		return "Username not recognized";
	}

	// Verify the provided password against the 
	// hashed password in the database.
	if (password_verify($password, $data["password"]) == FALSE) {
		return "Wrong password";
	} else {
		// If authentication is successful, 
		// set the user session and redirect to account page.
		$id = $data["id"];
		$_SESSION["admin"] = $id;
		header("location: home.php");
		exit();
	}
}

function uploadImage($file, $title, $description, $date)
{

	// Establish a database connection.
	$mysqli = connect();

	// If there's an error in database the program will stop function
	if (!$mysqli) {
		return false;
	}

	$targetDir = "newspics/";
	$imageFileType = strtolower(pathinfo($file["name"], PATHINFO_EXTENSION));
	$titlewospaces = str_replace(' ', '', $title);
	$newFileName = $titlewospaces . '.' . $imageFileType;
	$targetFile = $targetDir . basename($newFileName);

	// Check if image file is an actual image or fake image
	$check = getimagesize($file["tmp_name"]);
	if ($check === false) {
		return "File is not an image.";
	}

	// Check if file already exists
	if (file_exists($targetFile)) {
		return "Sorry, file already exists.";
	}

	// Check file size, 25mb max
	if ($file["size"] > 25 * 1024 * 1024) {
		return "Sorry, your file is too large. Please upload up to 25mb only";
	}

	// Allow certain file formats
	$allowedFormats = array("jpg", "jpeg", "png", "webp");
	if (!in_array($imageFileType, $allowedFormats)) {
		return "Sorry, only WEBP, JPG, JPEG & PNG files are allowed.";
	}

	// Move uploaded file to target directory
	if (move_uploaded_file($file["tmp_name"], $targetFile)) {
		$sql = "INSERT INTO news (image_path, title, description, reg_date) VALUES (?, ?, ?, ?)";
		$stmt = $mysqli->prepare($sql);
		$stmt->bind_param("ssss", $targetFile, $title, $description, $date);
		$stmt->execute();
		$result = $stmt->affected_rows;
		if ($result > 0) {
			$stmt->close();
			return "success";
		} else {
			return "Sorry, there was an error uploading the news.";
		}
	} else {
		return "Sorry, there was an error uploading your file.";
	}
}



function getnews()
{
	// Establish a database connection.
	$mysqli = connect();

	// If there's an error in the database, the program will stop function
	if (!$mysqli) {
		return false;
	}

	$sql = "SELECT * FROM news ORDER BY reg_date ASC";
	$result = $mysqli->query($sql);

	if ($result->num_rows > 0) {
		$news = '';
		while ($row = $result->fetch_assoc()) {

			$regDate = new DateTime($row['reg_date']);
			$readabledate = $regDate->format('F j, Y'); // Format the date as desired

			$fetchedDate = $row['reg_date'];
			$valuedate = date('Y-m-d', strtotime($fetchedDate));

			$news .= '<div class="news">
							<div class="del">
								<!-- Edit button -->
								<button onclick="editmodal(' . $row['id'] . ')" class="editbtn"><i class="fas fa-edit"></i> Edit</button>
								<button class="delbtn"><i class="fas fa-trash-alt"></i> Delete</button>
							</div>
							<div class="news-img">
								<img src="' . $row['image_path'] . '" alt="" draggable="false">
							</div>
							<div class="details">
								<h1>' . $row['title'] . '</h1>
								<H3> [' . $readabledate . '] </H3> <br>
								<p>' . $row['description'] . '</p>
							</div>
						</div>

                    <div id="myModal' . $row['id'] . '" class="modal">
						<!-- Modal content -->
						<div class="modal-content">
							<span class="close" onclick="closeModal(' . $row['id'] . ')">&times;</span>
							<h2>Modal Form</h2>
							<form id="myForm' . $row['id'] . '" action="" method="POST">
                                

                                <label for="title">TITLE</label>
                                <input class="title" type="text" name="title" id="title" value="' . $row['title'] . '"
                                    placeholder="Title of the News" required><br>

                                <label for="description">DESCRIPTION</label>
                                <textarea name="description" class="desc" id="description" placeholder="Description of the News"
                                    required>' . $row['description'] . '</textarea>

                                <label for="date">DATE</label>
                                <input type="date" name="date" id="date" class="date" value="' . $valuedate . '" required><br>

                                <div class="sub">
									<input class="submit" type="submit" value="Edit" id="edit_submit_' . $row['id'] . '" name="edit_submit_' . $row['id'] . '">
                                </div>
                            </form>
                        </div>
                    </div>
                    <script>
						// Function to open the modal
						function editmodal(id) {
							var modal = document.getElementById("myModal" + id);
							modal.style.display = "block";
						}

						// Function to close the modal
						function closeModal(id) {
							var modal = document.getElementById("myModal" + id);
							modal.style.display = "none";
						}

						// Close the modal when the user clicks the close button
						function closeOnClick(id) {
							var modal = document.getElementById("myModal" + id);
							modal.style.display = "none";
						}

						// Close the modal when the user clicks anywhere outside of it
						window.onclick = function(event) {
							if (event.target.className === "modal") {
								event.target.style.display = "none";
							}
						}
					</script>';
			if (isset ($_POST['edit_submit_' . $row['id']])) {
				$id = $row['id'];
				$title = $_POST['title'];
				$description = $_POST['description'];
				$date = $_POST['date'];

				// Process the edited news data and update the database accordingly
				$sql_update = "UPDATE news SET title='$title', description='$description', reg_date='$date' WHERE id='$id'";
				if ($mysqli->query($sql_update) === TRUE) {
					echo "Record updated successfully";
					header("Location: " . $_SERVER['REQUEST_URI']); // Redirect to the same page
					exit();
				} else {
					echo "Error updating record: " . $mysqli->error;
				}
			}
		}


		return $news;
	} else {
		echo "<h1>No news found.</h1>";
		return '';
	}

}


function news()
{
	// Establish a database connection.
	$mysqli = connect();

	// If there's an error in database the program will stop function
	if (!$mysqli) {
		return false;
	}

	$sql = "SELECT * FROM news ORDER BY reg_date ASC";
	$result = $mysqli->query($sql);

	if ($result->num_rows > 0) {
		$news = '';
		while ($row = $result->fetch_assoc()) {

			$regDate = new DateTime($row['reg_date']);
			$formattedDate = $regDate->format('F j, Y'); // Format the date as desired

			$news .= '<div class="news">
                        <div class="news-img">
                            <img src="./ADMIN/' . $row['image_path'] . '" alt="news" draggable="false" >
                        </div>
                        <div class="details">
                            <h1>' . $row['title'] . '</h1>
                            <H3> [' . $formattedDate . '] </H3> <br>
                            <p>' . $row['description'] . '</p>
                        </div>
                    </div>';
		}
		return $news;
	} else {
		echo "<h1> No news found.</h1>";
		return '';
	}
}


function accountinfo()
{
	if (isset ($_SESSION['admin'])) {
		$mysqli = connect();

		if ($mysqli === false) {
			return false;
		}

		$sql = "SELECT * FROM account WHERE id = ?";
		$stmt = $mysqli->prepare($sql);
		$stmt->bind_param("i", $_SESSION['admin']);
		$stmt->execute();
		$result = $stmt->get_result();

		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return [
				'name' => $row['name'],
				'email' => $row['email'],
				'username' => $row['username']
			];
		}
	}
	return false;
}


function editprofile($name, $email, $username)
{
	if (isset ($_SESSION['admin'])) {

		$mysqli = connect();

		if (!$mysqli) {
			return false;
		}
		$id = $_SESSION['admin'];
		$sql = "UPDATE account SET name = '$name', email = '$email', username = '$username' WHERE id = $id";
		$result = $mysqli->query($sql);

		if ($result) {
			header("Location: ./profile.php");
			return "success";

		} else {
			header("Location: ./profile.php");
			return "Database Failed, please try again.";
		}
	} else {
		header("Location: ./index.php");
		exit();
	}
}




function logout()
{
	session_destroy();
	header("Location: ./index.php");
	exit();
}

// function updatenews($image, $title, $description, $date){



//    // Establish a database connection.
// $mysqli = connect();

//    // If there's an error in database the program will stop function
// if (!$mysqli) {
// 	return false;
// }

// 	$image = trim($image);
// 	$title = trim($title);
// 	$description = trim($description);
// 	$date = trim($date) . " 00:00:00";


//     // Check if any field is empty.
// 	$args = func_get_args();
// 	foreach ($args as $value) {
// 		if (empty($value)) {
//             // If any field is empty, return an error message.
// 			return "All fields are required";
// 		}
// 	}

//     // Check for disallowed characters (< and >).
// 	foreach ($args as $value) {
// 		if (preg_match("/([<|>])/", $value)) {
//             // If disallowed characters are found, 
//             // return an error message.
// 			return "< and > characters are not allowed";
// 		}
// 	}


//     // Handle file upload
// 	$target_dir = "uploads/";
// 	$target_file = $target_dir . basename($_FILES["image"]["name"]);
// 	$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

//     // Check if image file is a actual image or fake image
// 	$check = getimagesize($_FILES["image"]["tmp_name"]);
// 	if ($check !== false) {
// 		move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
// 	} else {
// 		return "File is not an image.";
// 	}

//     // Insert news into database
// 	$sql = "INSERT INTO news (image_path, title, description, reg_date) VALUES (?, ?, ?, ?)";
// 	$stmt = $mysqli->prepare($sql);
// 	$stmt->bind_param("ssss", $target_file, $title, $description, $date);

// 	if ($stmt->execute()) {
// 		return "News uploaded successfully.";
// 	} else {
// 		return "Error uploading news, there's a problem in the server.";
// 	}

// 	$stmt->close();
// 	$mysqli->close();
// }
