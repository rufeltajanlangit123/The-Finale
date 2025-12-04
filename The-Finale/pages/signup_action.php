<?php
$conn = new mysqli("localhost", "root", "", "library_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$firstname = $_POST['firstname'];
$lastname  = $_POST['Lastname'];
$email     = $_POST['email'];
$password  = password_hash($_POST['password'], PASSWORD_DEFAULT);


$check = $conn->query("SELECT * FROM users WHERE email='$email'");
if ($check->num_rows > 0) {
    echo "<h2>Email already registered. Try logging in.</h2>";
    exit();
}


$sql = "INSERT INTO users (firstname, lastname, email, password)
        VALUES ('$firstname', '$lastname', '$email', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "<h2>Signup successful! Redirecting to login...</h2>";
    echo "<script>
            setTimeout(function() {
                window.location.href = 'Login.php';
            }, 2000);
          </script>";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
