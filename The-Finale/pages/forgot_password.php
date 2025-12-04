<?php

$conn = new mysqli("localhost", "root", "", "library_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];

    // Check email
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        // Create reset code
        $code = rand(100000, 999999);

        
        $conn->query("UPDATE users SET reset_code='$code' WHERE email='$email'");

        
        $message = "Your reset code is: <b>$code</b>";
    } else {
        $message = "<span style='color:red;'>Email not found.</span>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
</head>
<body style="
    font-family: Arial, sans-serif;
    background: #f5f5f5;
    tex-decoration:
    margin: 0;
    padding: 0;
">

<div style="
    width: 100%;
    max-width: 420px;
    background: white;
    margin: 60px auto;
    padding: 25px;
    border-radius: 10px;
    text-decoration:none;
    box-shadow: 0 3px 10px rgba(0,0,0,0.15);
">

    <h2 style="
        text-align: center;
        color: #333;
        margin-bottom: 20px;
        text-decoration: none;
    ">Forgot Password</h2>

    <form method="post">
        <label style="font-size: 14px; color: #555;">Enter your email</label><br>
        <input type="email" name="email" required style="
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 15px;
        ">

        <button type="submit" style="
            width: 100%;
            padding: 12px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            text-decoration: none;
        ">Send Reset Code</button>
    </form>

    <p style="
        margin-top: 20px;
        text-align: center;
        color: #333;
        font-size: 15px;
    ">
        <?php echo $message; ?>
    </p>

</div>

</body>
</html>
