<?php
include('database.php'); // Include the database connection

// Check if the user is logged in or authorized (you can use your authentication logic here)
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'user') {
    header("Location: index.php"); // Redirect to login page if not logged in or not authorized
    exit();
}

$userID = $_SESSION['id'];

// Query to retrieve the inserted data for the specific user
$sql = "SELECT * FROM faculty_fill_data WHERE user_id = $userID";
$result = $con->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Inserted Data</title>
</head>
<body>
    <h1>Inserted Data</h1>

    <?php
    // Check if there is data to display
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Display data in a card format
            echo "<div style='border: 1px solid #ccc; padding: 10px; margin: 10px;'>";
            echo "<h2>Faculty Name: " . $row["tgtname"] . "</h2>";
            echo "<p>Department: " . $row["tgtcont"] . "</p>";
			echo "<p>Department: " . $row["pname"] . "</p>";
            // Add other data fields here...

            // You can also add an edit or delete link for each card
            echo "<a href='user_data_fill.php?id=" . $row['id'] . "'>View</a>";
          
            echo "</div>";
        }
    } else {
        echo "No data found.";
    }
    ?>

    <!-- Add a link to go back to the previous page if needed -->
 
</body>
</html>
