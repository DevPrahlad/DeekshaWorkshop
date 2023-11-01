<?php
// Database connection setup
$host = "localhost";
$username = "root";
$password = "";
$database = "erps";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if (isset($_GET['region_id'])) {
    $region_id = $_GET['region_id'];

    // Retrieve schools based on the selected region
    $school_query = "SELECT school_name FROM schools WHERE region_id = ?";
    $stmt = $conn->prepare($school_query);
    $stmt->bind_param("i", $region_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $schools = array();

    while ($row = $result->fetch_assoc()) {
        $schools[] = $row;
    }

    echo json_encode($schools);
} else {
    echo json_encode(array());
}
