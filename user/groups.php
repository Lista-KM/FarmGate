<?php
include("../header.php");
?>
<?php
include("../includes/config.php");


// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $group_name = $_POST['group_name'];
    $description = $_POST['description'];

    // Insert into database
    $sql_insert = "INSERT INTO cow_groups (group_name, description) VALUES ('$group_name', '$description')";

    if ($conn->query($sql_insert) === TRUE) {
        echo '<script>alert("New group added successfully.");</script>';
        // Refresh the page to display the updated group list
        echo '<script>window.location.href = "groups.php";</script>';
    } else {
        echo "Error: " . $sql_insert . "<br>" . $conn->error;
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cow Groups</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border-radius: 8px;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .header h2 {
            margin: 0;
            font-size: 24px;
            color: #333;
        }
        .add-button {
            background-color: #f59e0b;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        .add-button:hover {
            background-color: #e89e0a;
        }
        .groups-list {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .groups-list th,
        .groups-list td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        .groups-list th {
            background-color: #f2f2f2;
            font-weight: bold;
            color: #333;
        }
        .group-item {
            background-color: #fff;
            transition: background-color 0.3s ease;
        }
        .group-item:hover {
            background-color: #f9f9f9;
        }
        .group-item td {
            vertical-align: top;
        }
        .popup-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 100;
            display: none;
        }
        .popup-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            width: 400px;
            max-width: 90%;
        }
        .popup-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #ddd;
            margin-bottom: 10px;
            padding-bottom: 10px;
        }
        .popup-header h2 {
            margin: 0;
            font-size: 20px;
            color: #333;
        }
        .close-btn {
            background-color: #f59e0b;
            color: #fff;
            border: none;
            padding: 8px 16px;
            border-radius: 5px;
            cursor: pointer;
        }
        .close-btn:hover {
            background-color: #e89e0a;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .form-group input[type="text"],
        .form-group input[type="number"] {
            width: 100%;
            padding: 8px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .form-group select {
            width: 100%;
            padding: 8px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .form-group button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .form-group button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Cow Groups</h2>
            <button class="add-button" onclick="togglePopup()">Add Group</button>
        </div>

        <table class="groups-list">
            <thead>
                <tr>
                    <th>Group Name</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Fetch cow groups from database
                $sql = "SELECT id, group_name, description FROM cow_groups";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo '<tr class="group-item">';
                        echo '<td>' . $row['group_name'] . '</td>';
                        echo '<td>' . $row['description'] . '</td>';
                        echo '</tr>';
                    }
                } else {
                    echo '<tr><td colspan="2">No groups found.</td></tr>';
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Popup Form for Adding Group -->
    <div class="popup-overlay" id="popup">
        <div class="popup-content">
            <div class="popup-header">
                <h2>Add New Group</h2>
                <button class="close-btn" onclick="togglePopup()">Close</button>
            </div>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="form-group">
                    <label for="group_name">Group Name:</label>
                    <input type="text" id="group_name" name="group_name" required>
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <input type="text" id="description" name="description">
                </div>
                <div class="form-group">
                    <button type="submit">Add Group</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Function to toggle popup visibility
        function togglePopup() {
            var popup = document.getElementById("popup");
            popup.style.display = popup.style.display === "block" ? "none" : "block";
        }
    </script>
</body>
</html>
