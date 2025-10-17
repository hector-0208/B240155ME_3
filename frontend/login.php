<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign In - BusTravel</title>
    <link rel="stylesheet" href="styles.css" />
  </head>
  <body>
    <nav class="navbar">
      <div class="nav-container">
        <a href="../index.php" class="nav-logo">BusTravel</a>
        <ul class="nav-links">
          <li><a href="main.php">Home</a></li>
          <li><a href="booking.php">Book Ticket</a></li>
          <li><a href="bookings.php">My Bookings</a></li>
          <li><a href="login.php">Account</a></li>
        </ul>
      </div>
    </nav>

    <main class="main-content">
      <h1 class="page-title">Sign In to Your Account</h1>
      <div class="form-container">
        <form action="../backend/loginBackend.php" method="POST">
          <div class="form-group">
            <label for="loginEmail">Email Address:</label>
            <input
              type="email"
              id="loginEmail"
              name="email"
              placeholder="Enter your email address"
              required
            />
          </div>

          <div class="form-group">
            <label for="loginPassword">Password:</label>
            <input
              type="password"
              id="loginPassword"
              name="loginPassword"
              placeholder="Enter your password"
              required
            />
          </div>

          <div
            class="form-group"
            style="display: flex; align-items: center; gap: 10px"
          >
            <input type="checkbox" id="rememberMe" name="rememberMe" />
            <label for="rememberMe" style="margin: 0"
              >Remember me on this device</label
            >
          </div>

          <button type="submit" class="btn-submit">Sign In</button>

          <div style="text-align: center; margin-top: 20px">
            <p>
              <a
                href="#"
                onclick="alert('Password recovery is not implemented yet.')"
                style="color: #ff6b35; text-decoration: none"
                >Forgot your password?</a
              >
            </p>
            <p>
              Don't have an account?
              <a
                href="signup.php"
                style="color: #ff6b35; text-decoration: none; font-weight: bold"
                >Create Account</a
              >
            </p>
          </div>
        </form>
      </div>
    </main>
  </body>
</html>
