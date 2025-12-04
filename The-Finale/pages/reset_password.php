<?php
$conn = new mysqli("localhost", "root", "", "library_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $code = $_POST["code"];
    $newpass = password_hash($_POST["newpass"], PASSWORD_DEFAULT);

    // Get the stored reset code and expiration time
    $sql = "SELECT reset_code, reset_code_expiry FROM users WHERE email='$email'";
    $res = $conn->query($sql);

    if ($res->num_rows > 0) {
        $row = $res->fetch_assoc();
        $stored_code = $row["reset_code"];
        $expiry_time = $row["reset_code_expiry"];

        // Check if the code matches and if it hasn't expired
        if ($stored_code == $code) {
            if (strtotime($expiry_time) > time()) {
                // Code is valid and hasn't expired, reset the password
                $conn->query("UPDATE users SET password='$newpass', reset_code='', reset_code_expiry=NULL WHERE email='$email'");
                $msg = "Password updated successfully. You can log in now.";
            } else {
                $msg = "The reset code has expired. Please request a new one.";
            }
        } else {
            $msg = "Invalid code or email.";
        }
    } else {
        $msg = "Email not found.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
</head>
<body>

<h2>Reset Password</h2>

<form method="post">
    <label>Email</label><br>
    <input type="email" name="email" required><br><br>

    <label>Reset Code</label><br>
    <input type="text" name="code" required><br><br>

    <label>New Password</label><br>
    <input type="password" name="newpass" required><br><br>

    <button type="submit">Reset Password</button>
</form>

<p><?php echo $msg; ?></p>

</body>
</html>
