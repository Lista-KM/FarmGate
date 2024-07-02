<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Other Income Table</title>
    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: #f7f7f7; /* Light Gray */
            border-radius: 8px;
        }
        .header {
            padding: 10px;
            background-color: #d1d5db; /* Gray-300 */
            border-radius: 8px 8px 0 0;
            text-align: center;
        }
        .table-container {
            width: 100%;
            margin: 20px 0;
            overflow-x: auto;
            background-color: #f7f7f7;
        }
        .table-header {
            background-color: #d1d5db; /* Gray-300 */
            color: black;
        }
        .table-row:nth-child(even) {
            background-color: #e5e7eb; /* Gray-200 */
        }
        .table-row:nth-child(odd) {
            background-color: #f9fafb; /* Gray-50 */
        }
        .summary {
            margin-top: 20px;
            padding: 10px;
            background-color: #d1d5db; /* Gray-300 */
            border-radius: 0 0 8px 8px;
        }
    </style>
</head>
<body class="bg-gray-100">
<div class="flex justify-end mb-4">
    <button onclick="navigateToAddIncome()" class="bg-yellow-500 text-white px-6 py-3 rounded-lg">Add Other Income</button>
</div>

<div class="container">
    <div class="header">
        <h1>Other Income Records</h1>
    </div>
    
    <div class="table-container">
        <div class="table-header p-4 text-xl">Other Income</div>
        <table class="min-w-full">
            <thead class="bg-gray-300 text-black">
                <tr>
                    <th class="py-2 px-4">ID</th>
                    <th class="py-2 px-4">Income Type</th>
                    <th class="py-2 px-4">Income Amount</th>
                    <th class="py-2 px-4">Income Date</th>
                    <th class="py-2 px-4">Cow Group Name</th>
                </tr>
            </thead>
            <tbody>
                <?php
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

                // Get the current date
                $currentDate = date('Y-m-d');

                // Query to get data from other_income table for the current date
                $sql = "SELECT oi.id, oi.income_type, oi.income_amount, oi.income_date, cg.group_name 
                        FROM other_income oi
                        JOIN cow_groups cg ON oi.cow_group_id = cg.id
                        WHERE oi.income_date = '$currentDate'";
                $result = $conn->query($sql);

                if ($result === false) {
                    echo "<tr><td colspan='5' class='text-center py-2'>Error: " . $conn->error . "</td></tr>";
                } else {
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr class='table-row'>";
                            echo "<td class='py-2 px-4 text-center'>" . $row['id'] . "</td>";
                            echo "<td class='py-2 px-4 text-center'>" . $row['income_type'] . "</td>";
                            echo "<td class='py-2 px-4 text-center'>Ksh " . number_format($row['income_amount'], 2) . "</td>";
                            echo "<td class='py-2 px-4 text-center'>" . $row['income_date'] . "</td>";
                            echo "<td class='py-2 px-4 text-center'>" . $row['group_name'] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5' class='text-center py-2'>No data available for the current date</td></tr>";
                    }
                }

                // Close connection
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
    
    <div class="summary">
        <h2>Total Income per Cow Group</h2>
        <?php
        // Reconnect to the database
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // SQL query to calculate the total income for each cow group for the current date
        $incomeQuery = "
        SELECT cg.group_name, SUM(oi.income_amount) AS total_income
        FROM other_income oi
        JOIN cow_groups cg ON oi.cow_group_id = cg.id
        WHERE oi.income_date = '$currentDate'
        GROUP BY oi.cow_group_id";

        $incomeResult = $conn->query($incomeQuery);

        if ($incomeResult->num_rows > 0) {
            echo "<table class='min-w-full mt-4'>
                    <thead class='bg-gray-300 text-black'>
                        <tr>
                            <th class='py-2 px-4'>Cow Group Name</th>
                            <th class='py-2 px-4'>Total Income (Ksh)</th>
                        </tr>
                    </thead>
                    <tbody>";
            while ($row = $incomeResult->fetch_assoc()) {
                echo "<tr class='table-row'>";
                echo "<td class='py-2 px-4 text-center'>" . $row['group_name'] . "</td>";
                echo "<td class='py-2 px-4 text-center'>Ksh " . number_format($row['total_income'], 2) . "</td>";
                echo "</tr>";
            }
            echo "</tbody></table>";
        } else {
            echo "<p class='text-center'>No income data available for cow groups for the current date.</p>";
        }

        $conn->close();
        ?>
    </div>
</div>

<script>
    function navigateToAddIncome() {
        // Replace 'addotherincome.php' with the actual URL of your add other income page
        window.location.href = 'addotherincome.php';
    }
</script>
</body>
</html>
