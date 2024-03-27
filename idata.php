<?php
// MySQLi configuration
$servername = "localhost"; // Change this to your MySQL server hostname
$username = "root"; // Change this to your MySQL username
$password = ""; // Change this to your MySQL password
$database = "feedbacks"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to select desired columns from the "seminar" table
$sql = "SELECT Excellent, Very_Good, Good, Poor, Very_Poor FROM internship";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Variables to store feedback counts
    $total_feedbacks = 0;
    $total_excellent = 0;
    $total_very_good = 0;
    $total_good = 0;
    $total_poor = 0;
    $total_very_poor = 0;

    // Iterate through each row
    while ($row = $result->fetch_assoc()) {
        // Summing up feedback counts
        $total_excellent += $row['Excellent'];
        $total_very_good += $row['Very_Good'];
        $total_good += $row['Good'];
        $total_poor += $row['Poor'];
        $total_very_poor += $row['Very_Poor'];

        // Incrementing total feedback count
        $total_feedbacks += array_sum($row);
    }

    // Calculate percentages
    $percentage_excellent = ($total_excellent / $total_feedbacks) * 100;
    $percentage_very_good = ($total_very_good / $total_feedbacks) * 100;
    $percentage_good = ($total_good / $total_feedbacks) * 100;
    $percentage_poor = ($total_poor / $total_feedbacks) * 100;
    $percentage_very_poor = ($total_very_poor / $total_feedbacks) * 100;
    $total_feedbacks = 0;
    $total_feedbacks =$result->num_rows;
    // Prepare data to send to the HTML page
    $feedback_data = [
        'total_feedbacks' => $total_feedbacks ,
        'excellent' => number_format($percentage_excellent, 2),
        'verygood' => number_format($percentage_very_good, 2),
        'good' => number_format($percentage_good, 2),
        'poor' => number_format($percentage_poor, 2),
        'verypoor' => number_format($percentage_very_poor, 2)
    ];

    // Output as JSON
    header('Content-Type: application/json');
    echo json_encode($feedback_data);
} else {
    // Output error message as JSON
    echo json_encode(['error' => 'No data available']);
}

$conn->close();
?>
