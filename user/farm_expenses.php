<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Financial Summary</title>
    <style>
        /* Basic reset for all elements */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
        }

        /* Container for the page content */
        .p-4 {
            padding: 1rem;
            width: 100%;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 0.5rem;
        }

        /* Headings */
        h2 {
            font-size: 1.5rem; /* Reduced font size */
            font-weight: bold;
            margin-bottom: 0.5rem; /* Reduced margin */
        }

        /* Flexbox utility classes */
        .flex {
            display: flex;
            align-items: center;
        }

        .space-x-4 > * + * {
            margin-left: 1rem;
        }

        /* Grid utility classes */
        .grid {
            display: grid;
        }

        .grid-cols-3 {
            grid-template-columns: repeat(3, 1fr);
        }

        .gap-4 {
            gap: 1rem;
        }

        /* Input styling */
        input[type="date"] {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #38a169; /* green border */
            border-radius: 0.25rem;
            background-color: #fff;
            color: #333;
        }

        /* Button styling */
        button {
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 0.25rem;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .bg-yellow-500 {
            background-color: #f59e0b;
        }

        .bg-yellow-500:hover {
            background-color: #d97706;
        }

        .bg-gray-500 {
            background-color: #6b7280;
        }

        .bg-gray-500:hover {
            background-color: #4b5563;
        }

        .bg-blue-500 {
            background-color: #3b82f6;
        }

        .bg-blue-500:hover {
            background-color: #2563eb;
        }

        .bg-purple-500 {
            background-color: #8b5cf6;
        }

        .bg-purple-500:hover {
            background-color: #7c3aed;
        }

        .bg-green-500 {
            background-color: #10b981;
        }

        .bg-green-500:hover {
            background-color: #059669;
        }

        .bg-zinc-800 {
            background-color: #27272a;
        }

        .text-white {
            color: #fff;
        }

        .text-blue-500 {
            color: #3b82f6;
        }

        .text-blue-500:hover {
            text-decoration: underline;
        }

        .rounded {
            border-radius: 0.25rem;
        }

        .rounded-t {
            border-top-left-radius: 0.25rem;
            border-top-right-radius: 0.25rem;
        }

        .border {
            border: 1px solid #d1d5db; /* default border color */
        }

        .border-b {
            border-bottom: 1px solid #d1d5db; /* bottom border */
        }

        .border-zinc-300 {
            border-color: #d1d5db; /* gray border color */
        }

        /* Padding and margin utilities */
        .p-2 {
            padding: 0.5rem;
        }

        .p-4 {
            padding: 1rem;
        }

        .mb-4 {
            margin-bottom: 1rem;
        }

        /* Miscellaneous utility classes */
        .float-right {
            float: right;
        }

        /* Define a new class for grid layout */
        .grid-two {
            display: grid;
            grid-template-columns: 1fr 1fr; /* Two columns of equal width */
            gap: 1rem; /* Gap between the two columns */
        }

        /* Ensure both income and expenses tables are side by side */
        .income-section,
        .expenses-section {
            width: 100%; /* Ensure each section takes full width of its grid cell */
        }

        /* Additional styles for Feeding Expense section */
        .feeding-expense {
            margin-top: 1rem; /* Adjusted margin */
            padding: 1rem;
            background-color: #fff;
            border-radius: 0.5rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .feeding-expense h2 {
            font-size: 1.5rem; /* Same font size as other sections */
            font-weight: bold;
            margin-bottom: 0.5rem; /* Same margin as other sections */
        }

        .feeding-expense table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #d1d5db; /* gray border */
            margin-top: 1rem; /* Adjusted margin */
        }

        .feeding-expense th,
        .feeding-expense td {
            border: 1px solid #d1d5db; /* gray border */
            padding: 0.5rem;
            text-align: left;
        }

        .feeding-expense .mt-4 {
            margin-top: 1rem; /* Adjusted margin */
        }

        .feeding-expense h3 {
            font-size: 1.25rem; /* Same font size as other sections */
            font-weight: bold;
            margin-bottom: 0.5rem; /* Same margin as other sections */
        }

        .feeding-expense .list-disc {
            margin-top: 0.5rem; /* Adjusted margin */
            padding-left: 1rem;
        }

        /* Table styling */
table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 1rem; /* Adjust as needed */
}

/* Table header row */
thead tr {
    background-color: #f2f4f8; /* Adjust background color */
    color: #4b5563; /* Adjust text color */
    text-transform: uppercase;
    font-size: 0.875rem; /* Adjust font size */
    font-weight: bold;
    line-height: 1.5;
}

/* Table body rows */
tbody tr {
    border-bottom: 1px solid #cbd5e0; /* Adjust bottom border color */
}

/* Hover effect */
tbody tr:hover {
    background-color: #edf2f7; /* Adjust hover background color */
}

/* Table cells */
th, td {
    padding: 0.75rem 1rem; /* Adjust padding */
    text-align: left;
}

/* Footer row */
tfoot {
    font-weight: bold;
}

tfoot tr {
    background-color: #e2e8f0; /* Adjust background color */
    color: #1a202c; /* Adjust text color */
}
.summary {
            background: #2C478D;
            color: #FFFFFF;
            padding: 20px;
            margin-top: 30px;
            border-radius: 15px;
        }

        .summary h2 {
            font-weight: 800;
            font-size: 1.5rem;
            margin: 0 0 10px 0;
        }

        .summary p {
            font-size: 1rem;
            margin: 4px 0;
        }

    </style>
</head>
<body>
<div class="p-4">
    <h2 class="text-xl font-semibold mb-4">Financial Summary</h2>
    <div class="flex justify-end mb-4">
        <button onclick="navigateToAddExpense()" class="bg-yellow-500 text-white px-6 py-3 rounded-lg">Add Other Expenses</button>
    </div>
    <div class="flex justify-end mb-4">
    <button onclick="navigateToAddIncome()" class="bg-yellow-500 text-white px-6 py-3 rounded-lg">Add Other Income</button>
</div>
    <div class="grid grid-cols-3 gap-4 mb-4">
        <!-- Total Expenses, Total Income, Profit margin sections -->
        <div class="bg-blue-500 text-white p-4 rounded">
            <div class="flex items-center">
                <div class="flex-1">
                    <p id="total-expenses" class="text-xl">Ksh 0.00</p>
                    <p>Farm's Gross Margin</p>
                </div>
            </div>
        </div>
        <div class="bg-yellow-500 text-white p-4 rounded">
            <div class="flex items-center">
                <div class="flex-1">
                    <p id="total-income" class="text-xl">Ksh 0.00</p>
                    <p>Total Income</p>
                </div>
            </div>
        </div>
        <div class="bg-purple-500 text-white p-4 rounded">
            <div class="flex items-center">
                <div class="flex-1">
                    <p id="profit-margin" class="text-xl">Ksh 0.00</p>
                    <p>Profit margin</p>
                </div>
            </div>
        </div>
    </div>

    

    
    <div class="container">
        <div class="header">
           <!-- <h1>Milk Records</h1>
        </div>
        
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Name</th>
                        <th>Morning</th>
                        <th>Noon</th>
                        <th>Evening</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody> -->
                    <?php
                    include("../includes/config.php");

                    $currentDate = date('Y-m-d');

                    // Predefined price per liter
                    $pricePerLiter = 55; // Example price

                    // SQL query with deviation calculations for the current date
                    $milkQuery = "
                    SELECT mr.date, c.name, 
                           SUM(mr.morning) AS morning, 
                           SUM(mr.noon) AS noon, 
                           SUM(mr.evening) AS evening,
                           SUM(mr.morning + mr.noon + mr.evening) AS total,
                           COALESCE(SUM(mr.morning) - (
                               SELECT SUM(morning) 
                               FROM milk_records mr2 
                               WHERE mr2.name = mr.name AND mr2.date = DATE_SUB(mr.date, INTERVAL 1 DAY)
                               GROUP BY mr2.name
                           ), 0) AS morning_dev,
                           COALESCE(SUM(mr.noon) - (
                               SELECT SUM(noon) 
                               FROM milk_records mr2 
                               WHERE mr2.name = mr.name AND mr2.date = DATE_SUB(mr.date, INTERVAL 1 DAY)
                               GROUP BY mr2.name
                           ), 0) AS noon_dev,
                           COALESCE(SUM(mr.evening) - (
                               SELECT SUM(evening) 
                               FROM milk_records mr2 
                               WHERE mr2.name = mr.name AND mr2.date = DATE_SUB(mr.date, INTERVAL 1 DAY)
                               GROUP BY mr2.name
                           ), 0) AS evening_dev,
                           COALESCE((SUM(mr.morning + mr.noon + mr.evening)) - (
                               SELECT SUM(morning + noon + evening) 
                               FROM milk_records mr2 
                               WHERE mr2.name = mr.name AND mr2.date = DATE_SUB(mr.date, INTERVAL 1 DAY)
                               GROUP BY mr2.name
                           ), 0) AS total_dev
                    FROM milk_records mr 
                    JOIN cows c ON mr.name = c.id
                    WHERE mr.date = '$currentDate'
                    GROUP BY mr.date, c.name
                    ORDER BY c.name ASC"; 

                    $milkResult = $conn->query($milkQuery);

                    $dailySummary = [
                        'total' => 0,
                        'count' => 0,
                        'yields' => []
                    ];

                    while ($record = $milkResult->fetch_assoc()) {
                        $date = $record['date'];
                        $name = $record['name'];
                        $morning = $record['morning'];
                        $noon = $record['noon'];
                        $evening = $record['evening'];
                        $total = $record['total'];
                        $morning_dev = $record['morning_dev'];
                        $noon_dev = $record['noon_dev'];
                        $evening_dev = $record['evening_dev'];
                        $total_dev = $record['total_dev'];

                        $dailySummary['total'] += $total;
                        $dailySummary['count'] += 1;
                        $dailySummary['yields'][] = $total;

                        
                    }

                    // Calculate summary data
                    $totalYields = array_sum($dailySummary['yields']);
                    $numberOfCows = $dailySummary['count'];
                    $lowestYield = min($dailySummary['yields']);
                    $highestYield = max($dailySummary['yields']);
                    $averageYield = $totalYields / $numberOfCows;

                    // Calculate production value
                    $productionValue = $totalYields * $pricePerLiter;

                    ?>
                </tbody>
            </table>
        </div>

        <div class="summary">
            <h2>Daily Summary for <?php echo $currentDate; ?></h2>
            <p>Total Yields: <?php echo $totalYields; ?></p>
            <p>No of Cows: <?php echo $numberOfCows; ?></p>
            <p>Lowest Yield: <?php echo $lowestYield; ?></p>
            <p>Highest Yield: <?php echo $highestYield; ?></p>
            <p>Average Yield: <?php echo number_format($averageYield, 2); ?></p>
            <p>Production Value: <?php echo number_format($productionValue, 2); ?></p>
        </div>
    </div>
    
</body>
</html>
<body class="bg-gray-100">

<div class="container mx-auto mt-8">
    <h1 class="text-2xl font-bold mb-4">Daily Feeding Summary</h1>
    <table class="min-w-full bg-white border border-gray-300">
        <thead>
            <tr class="w-full bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                <th class="py-3 px-6 text-left">Date</th>
                <th class="py-3 px-6 text-left">Item Name</th>
                <th class="py-3 px-6 text-left">Quantity</th>
                <th class="py-3 px-6 text-left">Group</th>
                <th class="py-3 px-4">Unit</th>
                <th class="py-3 px-4">Unit Price</th>
                <th class="py-3 px-4">Consumption (Ksh)</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "dfsms";

            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $currentDate = date('Y-m-d');

            $query = "SELECT df.feed_date, df.item_name, df.quantity, df.group_name, sl.unit_price 
                      FROM daily_feeding df 
                      JOIN stock_levels sl ON df.item_name = sl.feed_name
                      WHERE df.feed_date = '$currentDate'";
            $result = $conn->query($query);

            $unit = "kg";
            $group_totals = array();

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr class='border-b border-zinc-200 hover:bg-zinc-100'>";
                    echo "<td class='py-3 px-6 text-left'>" . htmlspecialchars($row['feed_date']) . "</td>";
                    echo "<td class='py-3 px-6 text-left'>" . htmlspecialchars($row['item_name']) . "</td>";
                    echo "<td class='py-3 px-6 text-left'>" . htmlspecialchars($row['quantity']) . "</td>";
                    echo "<td class='py-3 px-6 text-left'>" . htmlspecialchars($row['group_name']) . "</td>";
                    echo "<td class='py-3 px-4'>" . htmlspecialchars($unit) . "</td>";
                    echo "<td class='py-3 px-4'>" . htmlspecialchars($row['unit_price']) . "</td>";

                    $consumption_ksh = $row['unit_price'] * $row['quantity'];
                    echo "<td class='py-3 px-4'>" . htmlspecialchars($consumption_ksh) . "</td>";
                    echo "</tr>";

                    $group_name = $row['group_name'];
                    if (!isset($group_totals[$group_name])) {
                        $group_totals[$group_name] = 0;
                    }
                    $group_totals[$group_name] += $consumption_ksh;
                }
            } else {
                echo "<tr><td colspan='7' class='py-3 px-6 text-left'>No records found for today</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <div class="summary mt-8">
        <h2 class="text-xl font-bold">Group-wise Consumption Totals</h2>
        <?php if (!empty($group_totals)): ?>
            <?php foreach ($group_totals as $group_name => $consumption_total): ?>
                <p><?php echo htmlspecialchars($group_name); ?>: Ksh <?php echo number_format($consumption_total, 2); ?></p>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No data</p>
        <?php endif; ?>
    </div>

    
    <div class="summary mt-8">
    <h2 class="text-xl font-bold">Group-wise Profit Margins</h2>
    <?php
    // Include the milk production value section
    include("../includes/config.php");

    $pricePerLiter = 55; // Example price

    // Query to fetch production value from milk records
    $milkQuery = "
    SELECT SUM(mr.morning + mr.noon + mr.evening) AS total
    FROM milk_records mr 
    WHERE mr.date = '$currentDate'"; 

    $milkResult = $conn->query($milkQuery);
    $productionValue = 0;

    if ($milkResult->num_rows > 0) {
        $record = $milkResult->fetch_assoc();
        $totalYields = $record['total'];
        $productionValue = $totalYields * $pricePerLiter;
    }

    if (!empty($group_totals)) {
        foreach ($group_totals as $group_name => $consumption_total) {
            // Initialize total expenses for the group
            $total_group_expenses = 0;

            // Initialize income for each group
            $income = 0;

            // Assign income based on group
            if ($group_name === "milker") {
                // Calculate income for milkers based on milk production
                $income = $productionValue;
            } else {
                // Fetch income from other_income table for non-milkers
                $sql_other_income = "SELECT income_amount FROM other_income WHERE cow_group_id = (SELECT id FROM cow_groups WHERE group_name = '$group_name') AND income_date = '$currentDate'";
                $result_other_income = $conn->query($sql_other_income);

                if ($result_other_income->num_rows > 0) {
                    $row = $result_other_income->fetch_assoc();
                    $income = $row['income_amount'];
                }
                // If no income found for non-milker, income remains 0
            }

            // Query to fetch expenses for the current group
            $sql_group_expenses = "SELECT SUM(e.expense_amount) AS total_amount 
                                   FROM expenses e
                                   INNER JOIN cow_groups cg ON e.cow_group_id = cg.id
                                   WHERE cg.group_name = '$group_name'
                                   AND DATE(e.expense_date) = '$currentDate'";

            $result_group_expenses = $conn->query($sql_group_expenses);

            if ($result_group_expenses->num_rows > 0) {
                $row = $result_group_expenses->fetch_assoc();
                $total_group_expenses = $row['total_amount'];
            }
            // If no expenses found, total_group_expenses remains 0

            // Calculate profit margin for each group
            $profit_margin = $income - ($consumption_total + $total_group_expenses);

            // Output profit margin in separate div for each group
            echo '<div class="group-profit-margin">';
            echo "<h3>" . htmlspecialchars($group_name) . " Profit Margin:</h3>";
            echo "<p>Ksh " . number_format($profit_margin, 2) . "</p>";
            echo '</div>';
        }
    } else {
        echo "<p>No data in \$group_totals array</p>"; // Debug message if $group_totals is empty
    }
    ?>
</div>








</body>
<div class="grid-two">
    <div class="expenses-section">
        <div class="bg-zinc-800 text-white p-2 rounded-t">Expenses breakdown</div>
        <?php
        $sql_expenses = "SELECT cg.group_name, e.expense_type, SUM(e.expense_amount) AS total_amount 
                         FROM expenses e
                         INNER JOIN cow_groups cg ON e.cow_group_id = cg.id
                         WHERE DATE(e.expense_date) = '$currentDate'
                         GROUP BY e.expense_type, e.cow_group_id";
        $result_expenses = $conn->query($sql_expenses);

        $total_expenses = 0;

        if ($result_expenses->num_rows > 0) {
            while ($row = $result_expenses->fetch_assoc()) {
                $group_name = $row['group_name'];
                $expense_type = $row['expense_type'];
                $total_amount = $row['total_amount'];
                $total_expenses += $total_amount;
                if (!isset($group_expenses[$group_name])) {
                    $group_expenses[$group_name] = 0;
                }
                $group_expenses[$group_name] += $total_amount;
        ?>
        <div class="bg-blue-100 p-2 border-b border-zinc-300">
            <?php echo $expense_type; ?> (<?php echo $group_name; ?>) 
            <span class="float-right">Ksh <?php echo number_format($total_amount, 2); ?></span>
        </div>
        <?php
            }
        } else {
            echo '<div class="bg-blue-100 p-2">No data</div>';
        }
        ?>
        <div class="bg-blue-100 p-2" id="total-expenses">
            Total Expenses <span class="float-right">Ksh <?php echo number_format($total_expenses, 2); ?></span>
        </div>
    </div>

    <div class="income-section">
    <div class="bg-zinc-800 text-white p-2 rounded-t">Income breakdown</div>
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

    // Get current date
    $currentDate = date("Y-m-d");

    // Query to get total income from other sources for the current date
    $sql_other_income = "SELECT oi.income_type, oi.income_amount, oi.cow_group_id, cg.group_name
                         FROM other_income oi
                         LEFT JOIN cow_groups cg ON oi.cow_group_id = cg.id
                         WHERE oi.income_date = '$currentDate'";
    $result_other_income = $conn->query($sql_other_income);

    if ($result_other_income === false) {
        echo "Error: " . $conn->error;
    }

    // Initialize variables
    $total_other_income = 0;
    $other_income_rows = [];

    if ($result_other_income->num_rows > 0) {
        while ($row = $result_other_income->fetch_assoc()) {
            $other_income_rows[] = $row;
            $total_other_income += $row['income_amount'];
        }
    }

    // Display income from milk sale
    $sql_milk_income = "SELECT SUM(total) AS total_milk_income
                        FROM milk_records
                        WHERE date = '$currentDate'";
    $result_milk_income = $conn->query($sql_milk_income);

    if ($result_milk_income === false) {
        echo "Error: " . $conn->error;
    }

    $total_milk_income = 0;
    if ($result_milk_income->num_rows > 0) {
        $row_milk_income = $result_milk_income->fetch_assoc();
        $total_milk_income = $row_milk_income['total_milk_income'];
    }

    // Close connection
    $conn->close();
    ?>

   

    <?php if (!empty($other_income_rows)): ?>
        <?php foreach ($other_income_rows as $row): ?>
            <div class="bg-blue-100 p-2">
                <?php
                $incomeType = $row['income_type'];
                $groupName = $row['group_name'];
                $incomeAmount = number_format($row['income_amount'], 2);
                ?>
                <?php echo $incomeType; ?> (Group: <?php echo $groupName; ?>): Ksh <?php echo $incomeAmount; ?>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="bg-blue-100 p-2">
            Income from other sources: No data
        </div>
    <?php endif; ?>

    <div class="bg-blue-100 p-2">
        Total Other Income: Ksh <?php echo number_format($total_other_income, 2); ?>
    </div>
</div>


  
   
<script>
    // Function to calculate total consumption by group
    function calculateTotalConsumption() {
        const table = document.getElementById('feeding-expense-table');
        if (!table) return; // Ensure the table exists

        const rows = table.getElementsByTagName('tr');
        let heiferTotal = 0;
        let milkerTotal = 0;
        let calfTotal = 0;

        // Iterate through each row (skipping header row)
        for (let i = 1; i < rows.length; i++) {
            const cells = rows[i].getElementsByTagName('td');
            if (cells.length < 4) continue; // Ensure there are enough cells

            const quantity = parseFloat(cells[2].textContent);
            const group = cells[3].textContent.toLowerCase().trim(); // Normalize group name

            // Accumulate totals based on group
            switch (group) {
                case 'heifer':
                    heiferTotal += quantity;
                    break;
                case 'milker':
                    milkerTotal += quantity;
                    break;
                case 'calf':
                    calfTotal += quantity;
                    break;
                default:
                    break;
            }
        }

        // Display totals
        document.getElementById('heifer-total').innerText = `Total Consumption for Heifer: Ksh ${heiferTotal.toFixed(2)}`;
        document.getElementById('milker-total').innerText = `Total Consumption for Milker: Ksh ${milkerTotal.toFixed(2)}`;
        document.getElementById('calf-total').innerText = `Total Consumption for Calf: Ksh ${calfTotal.toFixed(2)}`;
    }

    // Call the function when the page is loaded
    window.addEventListener('load', calculateTotalConsumption);
</script>

<script>
    // Function to calculate profit margins for each group
    function calculateProfitMargins() {
        // Mock fetching income values from backend or HTML elements
        const incomeHeifer = parseFloat(document.getElementById('income-heifer').innerText.replace('Ksh', '').trim());
        const incomeMilker = parseFloat(document.getElementById('income-milker').innerText.replace('Ksh', '').trim());
        const incomeCalf = parseFloat(document.getElementById('income-calf').innerText.replace('Ksh', '').trim());

        // Fetching expense values from previously calculated totals
        const expensesHeifer = parseFloat(document.getElementById('heifer-total').innerText.replace('Ksh', '').trim());
        const expensesMilker = parseFloat(document.getElementById('milker-total').innerText.replace('Ksh', '').trim());
        const expensesCalf = parseFloat(document.getElementById('calf-total').innerText.replace('Ksh', '').trim());

        // Calculating profit margins
        const profitHeifer = incomeHeifer - expensesHeifer;
        const profitMilker = incomeMilker - expensesMilker;
        const profitCalf = incomeCalf - expensesCalf;

        // Updating the profit margin display
        document.getElementById('profit-heifer').innerText = `Profit Margin for Heifer: Ksh ${profitHeifer.toFixed(2)}`;
        document.getElementById('profit-milker').innerText = `Profit Margin for Milker: Ksh ${profitMilker.toFixed(2)}`;
        document.getElementById('profit-calf').innerText = `Profit Margin for Calf: Ksh ${profitCalf.toFixed(2)}`;
    }

    // Call the function when the page is loaded
    window.addEventListener('load', calculateProfitMargins);
</script>
<script>
    function navigateToAddExpense() {
        // Redirect to addexpenses.php
        window.location.href = 'addexpenses.php';
    }
</script>
<script>
    function navigateToAddIncome() {
        // Replace 'addotherincome.php' with the actual URL of your add other income page
        window.location.href = 'addotherincome.php';
    }
</script>
</body>
</html>
