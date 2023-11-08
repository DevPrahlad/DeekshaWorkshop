<?php
include('database.php'); // Include the database connection

// Check if the user is logged in or authorized (you can use your authentication logic here)
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: index.php"); // Redirect to the login page if not logged in or not authorized
    exit();
}



// Query to retrieve the unique names from the faculty_data table (modify the column name as needed)
$sql = "SELECT DISTINCT name ,user_id FROM faculty_fill_data ";
$result = $con->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Persons</title>
</head>
<body>
    <h1>View Persons</h1>

    <?php
    // Check if there are unique names to display
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Display names in cards with a "View" button
            echo "<div style='border: 1px solid #ccc; padding: 10px; margin: 10px;'>";
            echo "<h2>Person Name: " . $row["name"] . "</h2>";
			 echo "<h2>User Id: " . $row["user_id"] . "</h2>";
            echo "<a href='dummy3.php?user_id=" . $row['user_id'] . "'>View</a>";
            echo "</div>";
        }
    } else {
        echo "No persons found.";
    }
    ?>

    <!-- Add a link to go back to the previous page if needed -->
    <a href="display_data.php">Go Back</a>
</body>
</html>
