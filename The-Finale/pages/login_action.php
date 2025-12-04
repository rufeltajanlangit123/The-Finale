<?php
session_start();

$conn = new mysqli("localhost", "root", "", "library_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_POST['email'];
$password = $_POST['password'];

// Check user in database
$sql = "SELECT * FROM users WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $user = $result->fetch_assoc();

    // Verify password
    if (password_verify($password, $user['password'])) {
        // Store user info in session
        $_SESSION['user'] = $user['firstname'];
        $_SESSION['email'] = $user['email'];

        // Redirect directly to Thankyou.php
        header("Location: Thankyou.php");
        exit();

    } else {
        echo "<h3>Incorrect password!</h3>";
        echo "<a href='Login.php'>Back to login</a>";
        exit();
    }
} else {
    echo "<h3>No account found with that email.</h3>";
    echo "<a href='Signup.php'>Sign up</a>";
    exit();
}

$conn->close();
?>
