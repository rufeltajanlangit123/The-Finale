<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Sign Up</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../assets/Signup.css">
</head>
<body>
  <div class="container">
    <div class="form">
      <h1>Sign In</h1>
      <p>Get your free open library and borrow digital books from the nonprofit internet archive</p>
    </div>

    <div class="form1">
      <form action="signup_action.php" method="post">

        <button type="button" class="google-button">Sign in with Google</button>

        <div class="form2">
          -----------<span>OR</span>-------------
        </div>

        <label for="firstname">First name</label>
        <input type="firstname" id="firstname" name="firstname" placeholder="First name" required>

        <label for="Lastname">Last name</label>
        <input type="Lastname" id="Lastname" name="Lastname" placeholder="Last name" required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Email" required>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Password" required>

        <button type="submit" class="login-button">Sign up with Email</button>

        <p class="test">
          By signing up, you agree to 
          <a href="https://www.lacrosselibrary.org/sites/default/files/u48/privacy_policy_.pdf">
            Terms of Privacy
          </a>
        </p>

        <div class="LogIn">
          <p class="Login">Have a account? <a href="./Login.php">Log in</a></p>
        </div>

      </form>
    </div>
  </div>
</body>
</html>
