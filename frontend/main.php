<?php
    if(session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if(!isset($_SESSION['email'])) {
        header("Location: login.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home - BusTravel</title>
    <link rel="stylesheet" href="/B240155ME_3/frontend/styles.css" />
  </head>
  <body>
    <nav class="navbar">
      <div class="nav-container">
        <a href="../index.php" class="nav-logo">BusTravel</a>
        <ul class="nav-links">
          <li><a href="main.php">Home</a></li>
          <li><a href="booking.php">Book Ticket</a></li>
          <li><a href="bookings.php">My Bookings</a></li>
          <li><a href="#"><?php echo htmlspecialchars($_SESSION['name']); ?></a></li>
          <li><a href="../backend/logoutBackend.php">Logout</a></li>
        </ul>
      </div>
    </nav>

    <main class="main-content">
      <h1 class="page-title">Welcome, <?php echo htmlspecialchars($_SESSION['name']); ?>!</h1>

      <section class="content-section">
        <h2 class="section-title">About Our Bus Reservation Service</h2>
        <p class="section-description">
          We provide comfortable, reliable, and affordable bus travel solutions
          across the country. Our modern fleet of buses ensures your journey is
          safe and enjoyable. With easy online booking, flexible scheduling, and
          excellent customer service, we make travel planning simple and
          convenient.
        </p>
      </section>

      <section class="content-section">
        <h2 class="section-title">Why Choose BusTravel?</h2>
        <div class="services-container">
          <div class="service-card">
            <div class="card-icon">⭐</div>
            <h3>Comfort & Safety</h3>
            <p>
              Modern buses with comfortable seating, air conditioning, and all
              safety features for a pleasant journey.
            </p>
          </div>
          <div class="service-card">
            <div class="card-icon">💰</div>
            <h3>Best Prices</h3>
            <p>
              Competitive pricing with no hidden charges. Get the best value for
              your money with our transparent pricing.
            </p>
          </div>
          <div class="service-card">
            <div class="card-icon">📱</div>
            <h3>Easy Booking</h3>
            <p>
              Simple online booking process. Book your tickets in just a few
              clicks from anywhere, anytime.
            </p>
          </div>
          <div class="service-card">
            <div class="card-icon">🚌</div>
            <h3>Wide Network</h3>
            <p>
              Extensive route network covering major cities and destinations
              across the country.
            </p>
          </div>
        </div>
      </section>

      <section class="content-section">
        <h2 class="section-title">Ready to Travel?</h2>
        <p class="section-description">
          Start your journey today! Book your bus ticket now and enjoy
          comfortable travel at affordable prices.
        </p>
        <div style="text-align: center; margin-top: 30px">
          <a class="btn-submit" href="booking.php">Book Your Ticket Now</a>
        </div>
      </section>
    </main>
  </body>
</html>
