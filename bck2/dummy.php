<?php
session_start();
include('database.php');
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'user') {
    header("Location: index.php"); // Redirect to login page if not logged in or not a user
    exit();
}
$userID = $_SESSION['id'];


// Prepare and execute a SELECT query to fetch all rows for the user
$sql = "SELECT * FROM faculty_data WHERE user_id = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $userID);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Display the data in cards
        echo '<div class="card">';
		        echo '<a href="faculty_panel.php?id=' . $row["id"] . '" class="card">df</a>';

        echo '  <h2>User ID: ' . $row["user_id"] . '</h2>';
        // Display other columns as needed
        echo '  <p>Name: ' . $row["name"] . '</p>';
        echo '  <p>Email: ' . $row["department"] . '</p>';
        // Add more data fields as required
        echo '</div>';
    }
} else {
    echo "No records found for the user with user_id $user_id.";
}

// Close the database connection
$con->close();
?>
