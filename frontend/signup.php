<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - BusTravel</title>
    <link rel="stylesheet" href="styles.css">
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
        <h1 class="page-title">Create New Account</h1>

        <div class="form-container">
            <form id="signupForm" action="../backend/signupBackend.php" method="POST">
                <div class="form-group">
                    <label for="fullName">Full Name:</label>
                    <input type="text" id="fullName" name="name" placeholder="Enter your full name" required>
                </div>

                <div class="form-group">
                    <label for="email">Email Address:</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email address" required>
                </div>

                <div class="form-group">
                    <label for="phone">Phone Number:</label>
                    <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" required>
                </div>

                <div class="form-group">
                    <label for="dateOfBirth">Date of Birth:</label>
                    <input type="date" id="dateOfBirth" name="dateOfBirth" required>
                </div>

                <div class="form-group">
                    <label for="gender">Gender:</label>
                    <select id="gender" name="gender" required>
                        <option value="">Select gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                        <option value="prefer-not-to-say">Prefer not to say</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" placeholder="Create a strong password" required>
                </div>

                <div class="form-group">
                    <label for="confirmPassword">Confirm Password:</label>
                    <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm your password" required>
                </div>

                <button type="submit" class="btn-submit">Create Account</button>

                <div style="text-align: center; margin-top: 20px;">
                    <p>Already have an account? 
                        <a href="login.php" style="color: #ff6b35; text-decoration: none; font-weight: bold;">Sign In Here</a>
                    </p>
                </div>
            </form>
        </div>
    </main>
</body>
</html>
