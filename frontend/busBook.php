<?php
include '../backend/users.php';
if (!isset($_SESSION['date'])) {
    header("Location: booking.php");
    exit();
}

$bookedSeats = [];
$datetime = $_SESSION['source'] == 'Ravangla' ? $_SESSION['date'] . " 06:00" : $_SESSION['date'] . " 13:00";

$stmt = $conn->prepare("SELECT seat FROM bookings WHERE doj = ?");
$stmt->bind_param("s", $datetime);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    $bookedSeats[] = $row['seat'];
}
$stmt->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Seats - BusTravel</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <nav class="navbar">
        <div class="nav-container">
            <a href="../index.php" class="nav-logo">BusTravel</a>
        </div>
    </nav>
    <main class="main-content">
        <h1 class="page-title">Select Your Seats</h1>
        <p style="text-align:center; margin-bottom: 20px;">
            Journey: <strong><?php echo htmlspecialchars($_SESSION['source']); ?> to
                <?php echo htmlspecialchars($_SESSION['dest']); ?></strong> on
            <strong><?php echo htmlspecialchars($_SESSION['date']); ?></strong>
        </p>

        <div class="form-container">
            <div class="seat-legend">
                <div class="legend-item">
                    <div class="seat"></div><span>Available</span>
                </div>
                <div class="legend-item">
                    <div class="seat selected"></div><span>Selected</span>
                </div>
                <div class="legend-item">
                    <div class="seat booked"></div><span>Booked</span>
                </div>
            </div>

            <div class="bus-layout">
                <?php
                $seatLayout = [
                    'A1',
                    'A2',
                    'aisle',
                    'A3',
                    'A4',
                    'B1',
                    'B2',
                    'aisle',
                    'B3',
                    'B4',
                    'C1',
                    'C2',
                    'aisle',
                    'C3',
                    'C4',
                    'D1',
                    'D2',
                    'aisle',
                    'D3',
                    'D4',
                    'E1',
                    'E2',
                    'aisle',
                    'E3',
                    'E4',
                    'F1',
                    'F2',
                    'aisle',
                    'F3',
                    'F4'
                ];
                foreach ($seatLayout as $seatNum) {
                    if ($seatNum == 'aisle') {
                        echo '<div class="seat aisle"></div>';
                    } else {
                        $isBooked = in_array($seatNum, $bookedSeats);
                        $class = 'seat' . ($isBooked ? ' booked' : '');
                        echo "<div class='$class' data-seat='$seatNum'>$seatNum</div>";
                    }
                }
                ?>
            </div>

            <form action="../backend/ticketBooking.php" method="POST" id="bookingForm">
                <input type="hidden" name="selectedSeats" id="selectedSeats" required>
                <div id="passenger-inputs"></div>
                <button type="submit" class="btn-submit" style="margin-top: 20px;">Proceed to Book</button>
            </form>
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const seats = document.querySelectorAll('.seat:not(.aisle):not(.booked)');
            const selectedSeatsInput = document.getElementById('selectedSeats');
            const passengerInputsDiv = document.getElementById('passenger-inputs');
            let selected = [];

            seats.forEach(seat => {
                seat.addEventListener('click', () => {
                    const seatNum = seat.dataset.seat;
                    if (seat.classList.contains('selected')) {
                        seat.classList.remove('selected');
                        selected = selected.filter(s => s !== seatNum);
                    } else {
                        seat.classList.add('selected');
                        selected.push(seatNum);
                    }
                    updateForm();
                });
            });

            function updateForm() {
                selectedSeatsInput.value = selected.join(',');
                passengerInputsDiv.innerHTML = '';
                if (selected.length > 0) {
                    selected.forEach((seatNum, index) => {
                        const inputHTML = `
                            <div class="form-group">
                                <label for="passenger${index}">Passenger Name (Seat ${seatNum}):</label>
                                <input type="text" id="passenger${index}" name="passenger[]" placeholder="Enter full name" required>
                            </div>
                        `;
                        passengerInputsDiv.innerHTML += inputHTML;
                    });
                }
            }
        });
    </script>
</body>

</html>
