<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Book Ticket - BusTravel</title>
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
      <h1 class="page-title">Book Your Bus Ticket</h1>

      <div class="form-container">
        <form id="bookingForm" action="../backend/searchBackend.php" method="POST">
          <div class="form-group">
            <label for="passengerName">Name:</label>
            <input
              type="text"
              id="passengerName"
              name="passengerName"
              placeholder="Enter your name"
              required
            />
          </div>

          <div class="form-group">
            <label for="contactNumber">Contact Number:</label>
            <input
              type="tel"
              id="contactNumber"
              name="contactNumber"
              placeholder="Enter contact number"
              required
            />
          </div>
          <div class="form-group">
            <label for="passengers">Number of Passengers:</label>
            <select id="passengers" name="passengers" required>
              <option value="">Select no. of passengers</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6+</option>
            </select>
          </div>
          <div class="form-group">
            <label for="source">From (Source City):</label>
            <select id="source" name="source" required>
              <option value="">Select departure city</option>
              <option value="new-delhi">New Delhi</option>
              <option value="gangtok">Gangtok</option>
              <option value="patna">Patna</option>
              <option value="siliguri">Siliguri</option>
              <option value="agra">Agra</option>
              <option value="kolkata">Kolkata</option>
              <option value="gurgaon">Gurgaon</option>
            </select>
          </div>

          <div class="form-group">
            <label for="destination">To (Destination City):</label>
            <select id="destination" name="destination" required>
              <option value="">Select destination city</option>
              <option value="new-delhi">New Delhi</option>
              <option value="gangtok">Gangtok</option>
              <option value="patna">Patna</option>
              <option value="siliguri">Siliguri</option>
              <option value="agra">Agra</option>
              <option value="kolkata">Kolkata</option>
              <option value="gurgaon">Gurgaon</option>
            </select>
          </div>

          <div class="form-group">
            <label for="travelDate">Travel Date:</label>
            <input type="date" id="travelDate" name="travelDate" required />
          </div>
          <button type="submit" class="btn-submit">
            Search for Available Buses
          </button>
        </form>
      </div>
    </main>
  </body>
</html>
