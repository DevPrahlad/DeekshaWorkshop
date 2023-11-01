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

// Retrieve regions from the database
$region_query = "SELECT * FROM regions";
$region_result = $conn->query($region_query);
?>

<!-- Region Dropdown -->
<label for="region">Select Region:</label>
<select name="region" id="region">
    <option value="">--Select Region--</option>
    <?php
    while ($row = $region_result->fetch_assoc()) {
        echo "<option value='" . $row['region_id'] . "'>" . $row['region_name'] . "</option>";
    }
    ?>
</select>

<!-- School Dropdown (Initially Empty) -->
<label for="school">Select School:</label>
<select name="school" id="school" multiple>
    <option value="">--Select School--</option>
</select>

<!-- JavaScript to handle dependent dropdown -->
<script>
    document.getElementById('region').addEventListener('change', function () {
        var regionId = this.value;
        var schoolDropdown = document.getElementById('school');

        // Clear existing options
        schoolDropdown.innerHTML = "<option value=''>--Select School--</option>";

        if (regionId) {
            // Fetch schools based on the selected region
            <?php
            $school_query = "SELECT school_name FROM schools WHERE region_id = ?";
            $stmt = $conn->prepare($school_query);
            $stmt->bind_param("i", $region_id);
            ?>

            fetchSchools(regionId);
        }
    });

    function fetchSchools(regionId) {
        var schoolDropdown = document.getElementById('school');
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'get_schools.php?region_id=' + regionId, true);

        xhr.onload = function () {
            if (xhr.status === 200) {
                var schools = JSON.parse(xhr.responseText);

                schools.forEach(function (school) {
                    schoolDropdown.innerHTML += "<option value='" + school.school_name + "'>" + school.school_name + "</option>";
                });
            }
        };

        xhr.send();
    }
</script>
