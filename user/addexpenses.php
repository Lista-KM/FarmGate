<?php
// Check if form data is received
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize inputs (for security, do proper validation and sanitization)
    $expense_type = $_POST['expense_type'];
    $expense_amount = $_POST['expense_amount'];
    $expense_date = $_POST['expense_date'];
    $cow_group = $_POST['cow_group'];

    // Database connection details
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

    // Prepare SQL statement to insert data
    $sql = "INSERT INTO expenses (expense_type, expense_amount, expense_date, cow_group_id)
            VALUES ('$expense_type', '$expense_amount', '$expense_date', '$cow_group')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to farm_expenses.php on successful submission
        header("Location: farm_expenses.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Expenses</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <style>
        /* Style for the popup container */
        .popup-container {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            width: 300px; /* Adjust width as needed */
        }
        /* Style for the form elements */
        .form-input {
            margin-bottom: 10px;
            width: calc(100% - 20px);
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }
        /* Style for the buttons */
        .btn-submit {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 10px;
        }
        .btn-close {
            background-color: #ccc;
            color: black;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<!-- Popup Form Container -->
<div id="popupForm" class="popup-container">
    <h2 class="text-center mb-4">Add Expenses</h2>
    <form id="expensesForm" class="text-center" method="POST" action="addexpenses.php">
        <select name="expense_type" class="form-input" required>
            <option value="" disabled selected>Select Expense Type</option>
            <option value="feeding">Feeding Expenses</option>
            <option value="breeding">Breeding Expenses</option>
            <option value="health">Health Expenses</option>
            <option value="fuel">Fuel Expenses</option>
            <option value="salaries">Salaries</option>
            <option value="other">Other Expense</option>
        </select>
        <br>
        <input type="number" name="expense_amount" placeholder="Enter Amount" class="form-input" required>
        <br>
        <input type="date" name="expense_date" class="form-input" required>
        <br>
        <select name="cow_group" class="form-input" required>
            <option value="" disabled selected>Select Cow Group</option>
            <?php
            // PHP code to fetch cow groups from the database
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

            // SQL query to fetch cow groups
            $sql = "SELECT * FROM cow_groups";
            $result = $conn->query($sql);

            // Display options for cow groups
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '<option value="' . $row['id'] . '">' . $row['group_name'] . '</option>';
                }
            }

            $conn->close();
            ?>
        </select>
        <br>
        <button type="submit" class="btn-submit">Submit</button>
        <button type="button" onclick="closePopup()" class="btn-close">Close</button>
    </form>
</div>

<!-- JavaScript to handle popup display -->
<script>
    // Function to show the popup
    function showPopup() {
        document.getElementById('popupForm').style.display = 'block';
    }

    // Function to close the popup and redirect
    function closePopup() {
        document.getElementById('popupForm').style.display = 'none';
        window.location.href = 'farm_expenses.php'; // Redirect to farm_expenses.php on close
    }

    // Call showPopup() to display the popup initially (optional)
    showPopup();
</script>

</body>
</html>
