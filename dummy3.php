<?php
include('database.php'); // Include the database connection

// Check if the user is logged in or authorized (you can use your authentication logic here)
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: index.php"); // Redirect to the login page if not logged in or not authorized
    exit();
}



if (isset($_GET['user_id'])) {
    $name = $_GET['user_id'];

    // Query to retrieve all data entries for the specific user based on their identifier (e.g., name)
    $sql = "SELECT * FROM faculty_fill_data WHERE user_id = $name";
    $result = $con->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Data for <?php echo $name; ?></title>
</head>
<body>
    <h1>View Data for <?php echo $name; ?></h1>

    <?php
    // Check if there is data to display
    if ($result->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr><th>Faculty Name</th><th>Department</th><th>... (other columns) ...</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["schools"] . "</td>";
            // Add other data fields here...

            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No data found for $name.";
    }
}
    ?>

    <!-- Add a link to go back to the previous page if needed -->
    <a href="view_persons.php">Go Back</a>
</body>
</html>
