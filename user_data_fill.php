<?php
include('database.php'); // Include the database connection

// Check if the user is logged in or authorized (you can use your authentication logic here)
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'user') {
    header("Location: index.php"); // Redirect to the login page if not logged in or not authorized
    exit();
}

// Check if the ID parameter is set in the URL
if (isset($_GET['id'])) {
    $userID = $_SESSION['id']; // Get the user's ID from the session
    $dataID = $_GET['id'];

    // Query to retrieve the data with the given ID and user ID
    $sql = "SELECT * FROM faculty_fill_data WHERE user_id = $userID AND id = $dataID";
    $result = $con->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        // Display the data for the specific ID
        echo "<html><head><title>View Data</title></head><body>";
        echo "<h1>View Data</h1>";
        echo "<h2>Faculty Name: " . $row["pname"] . "</h2>";
        echo "<p>Department: " . $row["tgtcont"] . "</p>";
        // Add other data fields here...

        echo "<a href='display_data.php'>Back to Data</a>"; // Link to go back to the data listing page
        echo "</body></html>";
    } else {
        echo "Data not found.";
    }
} else {
    echo "Invalid data ID.";
}
?>
