<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="your-styles.css">
    <title>Faculty Panel</title>
    <style>
        /* body{
            margin:0;
            padding: 0px;
        } */
        .card {
            width: 100%;
            /* height: auto; */
            border: 1px solid black;
            margin: 5px;
            background-color: RGB(223, 237, 243);
            margin-right: 20px;
        }

        .sub-card {
            margin-left: 50px;
            font-size: 1.2rem;
            display: flex;
            place-items: center stretch;
            justify-content: space-between;

        }



        .card-link {
            margin-right: 50px;
            color: #363062;
            /* font-weight: bold; */
            font-size: 1.2rem;
            text-decoration: none;
            border: 2px solid #687EFF;
            padding: 8px;
            border-radius: 5px;
            transition: all 0.3s ease-in-out;
            cursor: pointer;
        }

        .card-link:hover {
            background-color: rgb(239, 244, 208);
            color: rgb(248, 80, 44);
            border: 2px solid #687EFF;
            padding: 8px;
            border-radius: 5px;
        }
    </style>
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

    // Prepare and execute a SELECT query to fetch all rows for the user with region_name
    $sql = "SELECT faculty_data.*, regions.region_name
        FROM faculty_data
        LEFT JOIN regions ON faculty_data.region_id = regions.region_id
        WHERE faculty_data.user_id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $userID);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Display the data in cards
            ?>
            <div class="card">
                <div class="sub-card">
                    <div>
                        <h2>User ID:
                            <?php echo $row["user_id"]; ?>
                        </h2>
                        <!-- Display other columns as needed -->
                        <p>Name:
                            <?php echo $row["name"]; ?>
                        </p>
                        <p>Department:
                            <?php echo $row["department"]; ?>
                        </p>
                        <p>Region:
                            <?php echo $row["region_name"]; ?>
                        </p>
                        <!-- Add more data fields as required -->
                    </div>
                    <div>
                        <a href="faculty_panel.php?id=<?php echo $row["id"]; ?>" class="card-link">View</a>
                    </div>

                </div>
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