 <?php
session_start();

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Define predefined username and password
    $valid_username = "admin";
    $valid_password = "password";

    // Get username and password from the form
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Check if entered username and password match the predefined values
    if ($username === $valid_username && $password === $valid_password) {
        // Authentication successful, redirect to progress.html
        $_SESSION["username"] = $username; // Store username in session
        header("Location: dash.html");
        exit();
    } else {
        // Authentication failed, set error message
        $error_message = "Invalid username or password. Please try again.";
    }
}

?>