<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Log In</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/login.css">
</head>
<body>

<div class="login-container">
    <div class="login-box">
        <h1>Welcome Back</h1>
        <p class="subtitle">Log in to access the Online Library</p>

        <form action="login_action.php" method="post">

            <div class="input-group">
                <label>Email</label>
                <input type="email" name="email" placeholder="Enter your email" required>
            </div>

            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="Enter your password" required>
            </div>
                        
            <button type="submit" class="login-btn">Log In</button>

            <p class="forgot">
                <a href="forgot_password.php">Forgot Password?</a>
            </p>

            <p class="signup-link">
                Don’t have an account? <a href="./Signup.php">Sign Up</a>
            </p>

        </form>
    </div>
</div>

</body>
</html>
