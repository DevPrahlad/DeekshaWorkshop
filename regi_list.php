<!DOCTYPE html>
<html>
<head>
    <title>Registered Users</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>List of Registered Users</h1>

        <!-- User Department Dropdown -->
        <form method="GET" action="regi_list.php">
            <div class="form-group">
                <label for="departmentSelect">Select User by Department:</label>
                <select class="form-control" id="departmentSelect" name="selected_department">
                    <option value="">Select a Department</option>

                    <?php
                    include 'database.php'; // Include the database connection

                    // Query to fetch all distinct departments
                    $sql = "SELECT DISTINCT department FROM usersss";
                    $result = $con->query($sql);

                    // Get the selected department value from the form
                    $selectedDepartment = isset($_GET['selected_department']) ? $_GET['selected_department'] : '';

                    while ($row = $result->fetch_assoc()) {
                        $department = $row["department"];
                        $selected = ($department === $selectedDepartment) ? 'selected' : '';
                        echo "<option value='$department' $selected>$department</option>";
                    }

                    $con->close();
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>

        <?php
        include 'database.php'; // Include the database connection

        if (isset($_GET['selected_department'])) {
            $selectedDepartment = $_GET['selected_department'];

            // Query to fetch users from the 'users' table based on selected department
            $sql = "SELECT * FROM usersss WHERE department = '$selectedDepartment'";
            $result = $con->query($sql);

            if ($result->num_rows > 0) {
                echo '<h2>Search Results in ' . $selectedDepartment . ' Department</h2>';

                while ($row = $result->fetch_assoc()) {
        ?>
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">User ID: <?php echo $row["id"]; ?></h5>
                <p class="card-text">Username: <?php echo $row["username"]; ?></p>
                <p class="card-text">Department: <?php echo $row["department"]; ?></p>
                <a href="allotment.php?id=<?php echo $row["id"]; ?>" class="btn btn-primary">allotment</a>
            </div>
        </div>
        <?php
                }
            } else {
                echo "No users found in the selected department.";
            }
        }

        // Display all users by default
        $sql = "SELECT * FROM usersss";
        $result = $con->query($sql);

        if ($result->num_rows > 0 && !isset($_GET['selected_department'])) {
            echo '<h2>All Users</h2>';

            while ($row = $result->fetch_assoc()) {
        ?>
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">User ID: <?php echo $row["id"]; ?></h5>
                <p class="card-text">Username: <?php echo $row["username"]; ?></p>
                <p class="card-text">Department: <?php echo $row["department"]; ?></p>
                <a href="allotment.php?id=<?php echo $row["id"]; ?>" class="btn btn-primary">View Profile</a>
            </div>
        </div>
        <?php
            }
        } elseif ($result->num_rows === 0 && !isset($_GET['selected_department'])) {
            echo "No users found.";
        }

        $con->close();
        ?>
    </div>
</body>
</html>
