<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="your-styles.css">
    <title>Faculty Panel</title>
</head>

<body>
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
    ?>
            <div class="card">
                <a href="faculty_panel.php?id=<?php echo $row["id"]; ?>" class="card-link">Click to view details</a>
                <h2>User ID: <?php echo $row["user_id"]; ?></h2>
                <!-- Display other columns as needed -->
                <p>Name: <?php echo $row["name"]; ?></p>
                <p>Email: <?php echo $row["department"]; ?></p>
                <!-- Add more data fields as required -->
            </div>
    <?php
        }
    } else {
        echo "No records found for the user with user_id $user_id.";
    }

    // Close the database connection
    $con->close();
    ?>
</body>

</html>
