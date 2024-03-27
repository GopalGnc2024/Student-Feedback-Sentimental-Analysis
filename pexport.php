<?php
// Connect to your database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "feedbacks";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch unique data from your database (deleting duplicate rows)
$sql = "SELECT DISTINCT * FROM project";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output CSV headers
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="exported_data.csv"');

    // Output CSV content
    $output = fopen('php://output', 'w');
    while ($row = $result->fetch_assoc()) {
        fputcsv($output, $row);
    }
    fclose($output);
} else {
    echo "No data found";
}
$conn->close();
?>
