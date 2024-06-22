<?php
// Database connection (replace with your database credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dfsms";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $feed_date = $_POST['feed_date'];
    $item_name = $_POST['item_name'];
    $quantity = $_POST['quantity'];
    $group_name = $_POST['group_name'];

    // Insert data into daily_feeding table
    $insertQuery = "INSERT INTO daily_feeding (feed_date, item_name, quantity, group_name) 
                    VALUES ('$feed_date', '$item_name', '$quantity', '$group_name')";

    if ($conn->query($insertQuery) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $insertQuery . "<br>" . $conn->error;
    }

    // Retrieve current stock levels for the selected item
    $selectQuery = "SELECT id, quantity, consumed FROM stock_levels WHERE feed_name = '$item_name'";
    $result = $conn->query($selectQuery);

    if ($result->num_rows > 0) {
        // Assuming there's only one row per item_name in stock_levels
        $row = $result->fetch_assoc();
        $current_quantity = $row['quantity'];
        $current_consumed = $row['consumed'];

        // Calculate new quantities
        $new_quantity = $current_quantity - $quantity;
        $new_consumed = $current_consumed + $quantity;

        // Update stock_levels table
        $updateQuery = "UPDATE stock_levels SET quantity = '$new_quantity', consumed = '$new_consumed' WHERE id = '" . $row['id'] . "'";
        if ($conn->query($updateQuery) === TRUE) {
            echo "Stock levels updated successfully";
        } else {
            echo "Error updating stock levels: " . $conn->error;
        }
    } else {
        echo "No stock information found for item: " . $item_name;
    }

    // Close the database connection
    $conn->close();
}
?>
<?php
// Database connection (replace with your database credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dfsms";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $feed_date = $_POST['feed_date'];
    $item_name = $_POST['item_name'];
    $quantity = $_POST['quantity'];
    $group_name = $_POST['group_name'];

    // Insert data into daily_feeding table
    $insertQuery = "INSERT INTO daily_feeding (feed_date, item_name, quantity, group_name) 
                    VALUES ('$feed_date', '$item_name', '$quantity', '$group_name')";

    if ($conn->query($insertQuery) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $insertQuery . "<br>" . $conn->error;
    }

    // Retrieve current stock levels for the selected item
    $selectQuery = "SELECT id, quantity, consumed FROM stock_levels WHERE feed_name = '$item_name'";
    $result = $conn->query($selectQuery);

    if ($result->num_rows > 0) {
        // Assuming there's only one row per item_name in stock_levels
        $row = $result->fetch_assoc();
        $current_quantity = $row['quantity'];
        $current_consumed = $row['consumed'];

        // Calculate new quantities
        $new_quantity = $current_quantity - $quantity;
        $new_consumed = $current_consumed + $quantity;

        // Update stock_levels table
        $updateQuery = "UPDATE stock_levels SET quantity = '$new_quantity', consumed = '$new_consumed' WHERE id = '" . $row['id'] . "'";
        if ($conn->query($updateQuery) === TRUE) {
            echo "Stock levels updated successfully";
        } else {
            echo "Error updating stock levels: " . $conn->error;
        }
    } else {
        echo "No stock information found for item: " . $item_name;
    }

    // Close the database connection
    $conn->close();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Item Popup</title>
    <style>
        /* Styling for the feeding form */
        .max-w-lg {
            max-width: 30rem;
        }

        .mx-auto {
            margin-left: auto;
            margin-right: auto;
        }

        .dark\:bg-zinc-800 {
            background-color: white; /* Adjust the color code accordingly */
        }

        .shadow-md {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }

        .rounded-lg {
            border-radius: 0.5rem;
        }

        .p-6 {
            padding: 1.5rem;
        }

        .flex {
            display: flex;
        }

        .justify-between {
            justify-content: space-between;
        }

        .items-center {
            align-items: center;
        }

        .mb-4 {
            margin-bottom: 1rem;
        }

        .mr-2 {
            margin-right: 0.5rem;
        }

        .text-lg {
            font-size: 1.125rem;
        }

        .text-black {
            color: #000000; /* Dark black color */
        }

        .border-b {
            border-bottom-width: 1px;
        }

        .border-zinc-300 {
            border-color: #d1d5db; /* Adjust the color code accordingly */
        }

        .dark\:border-zinc-700 {
            border-color: #9ca3af; /* Adjust the color code accordingly */
        }

        .text-center {
            text-align: center;
        }

        .text-blue-500 {
            color: #3b82f6; /* Adjust the color code accordingly */
        }

        .dark\:text-blue-400 {
            color: #93c5fd; /* Adjust the color code accordingly */
        }

        .grid {
            display: grid;
        }

        .grid-cols-1 {
            grid-template-columns: repeat(1, minmax(0, 1fr));
        }

        .md\:grid-cols-2 {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .gap-4 {
            gap: 1rem;
        }

        .border {
            border-width: 1px;
        }

        .rounded {
            border-radius: 0.375rem;
        }

        .p-2 {
            padding: 0.5rem;
        }

        .w-full {
            width: 100%;
        }

        .focus\:outline-none:focus {
            outline: none;
        }

        .justify-end {
            justify-content: flex-end;
        }

        .bg-yellow-500 {
            background-color: #f59e0b;
        }

        .text-white {
            color: #fff;
        }

        .py-2 {
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
        }

        .px-4 {
            padding-left: 1rem;
            padding-right: 1rem;
        }

        /* Overlay styling */
        body {
            margin: 0;
            padding: 0;
        }

        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent black overlay */
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>
<body>
    <div class="overlay">
        <div class="max-w-lg mx-auto dark:bg-zinc-800 shadow-md rounded-lg p-6">
            <div class="flex justify-between items-center mb-4">
                <div class="flex items-center">
                    <h2 class="text-black text-lg">Enter daily feeding</h2>
                </div>
                <a href="feeds.php">
                    <button class="text-zinc-500 dark:text-zinc-400">&times;</button>
                </a>
            </div>
            <div class="border-b border-zinc-300 dark:border-zinc-700 mb-4"></div>
            <div class="text-center mb-4">
                <h3 class="text-blue-500 dark:text-blue-400">Feeding details</h3>
            </div>
            <form method="POST" action="">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div class="flex items-center border border-zinc-300 dark:border-zinc-700 rounded p-2">
                        <input id="datepicker" type="date" name="feed_date" class="w-full bg-transparent focus:outline-none" />
                    </div>
                    <div class="flex items-center border border-zinc-300 dark:border-zinc-700 rounded p-2">
                        <select id="itemSelect" name="item_name" class="w-full bg-transparent focus:outline-none">
                            <?php
                            // PHP code to populate options dynamically from database
                            $conn = new mysqli($servername, $username, $password, $dbname);
                            $feedQuery = "SELECT id, feed_name FROM stock_levels";
                            $feedResult = $conn->query($feedQuery);
                            while ($feed = $feedResult->fetch_assoc()) {
                                echo "<option value='" . $feed['feed_name'] . "'>" . $feed['feed_name'] . "</option>";
                            }
                            $conn->close();
                            ?>
                        </select>
                    </div>
                    <div class="flex items-center border border-zinc-300 dark:border-zinc-700 rounded p-2">
                        <input id="quantityInput" type="text" name="quantity" placeholder="Quantity" class="w-full bg-transparent focus:outline-none" />
                    </div>
                    <div class="flex items-center border border-zinc-300 dark:border-zinc-700 rounded p-2">
                    <select id="groupSelect" name="group_name" class="w-full bg-transparent focus:outline-none">
    <?php
    // PHP code to populate options dynamically from database
    $conn = new mysqli($servername, $username, $password, $dbname);
    $groupQuery = "SELECT id, group_name FROM cow_groups";
    $groupResult = $conn->query($groupQuery);
    while ($group = $groupResult->fetch_assoc()) {
        echo "<option value='" . $group['group_name'] . "'>" . $group['group_name'] . "</option>";
    }
    $conn->close();
    ?>
</select>

                    </div>
                </div>
                <div class="flex justify-end">
                    <button id="submitButton" class="bg-yellow-500 text-white px-4 py-2 rounded">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        // Function to close the popup
        function closePopup() {
            window.location.href = 'feeds.php'; // Redirect to feeds.php when closing
        }

        // Event listener for close button
        document.querySelector('.overlay').addEventListener('click', function (event) {
            if (event.target.classList.contains('overlay')) {
                closePopup();
            }
        });

        // Form validation function
        function validateForm() {
            const date = document.getElementById('datepicker').value;
            const itemId = document.getElementById('itemSelect').value;
            const quantity = document.getElementById('quantityInput').value;
            const group = document.getElementById('groupSelect').value;

            if (date === '' || itemId === '' || quantity === '' || group === '') {
                alert('Please fill in all fields.');
                return false;
            }

            return true;
        }

        // Event listener for form submission
        document.getElementById('submitButton').addEventListener('click', function (event) {
            event.preventDefault();

            if (validateForm()) {
                const formData = new FormData();
                formData.append('feed_date', document.getElementById('datepicker').value);
                formData.append('item_name', document.getElementById('itemSelect').value);
                formData.append('quantity', document.getElementById('quantityInput').value);
                formData.append('group_name', document.getElementById('groupSelect').value);

                const xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            closePopup();
                        } else {
                            alert('Error: ' + xhr.statusText);
                        }
                    }
                };

                xhr.open('POST', '<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>', true);
                xhr.send(formData);
            }
        });
    </script>
</body>
</html>
