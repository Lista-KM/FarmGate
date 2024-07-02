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
        .grid-two {
            display: grid;
            grid-template-columns: 1fr;
            gap: 20px;
            width: 100%;
            padding: 20px;
            background-color: #f7f7f7; /* Light Gray */
            border-radius: 8px;
        }
        .expenses-section, .income-section {
            background-color: #f7f7f7; /* Light Gray */
            border-radius: 8px;
            padding: 20px;
            width: 100%;
        }
        .expenses-section .bg-zinc-800, .income-section .bg-zinc-800 {
            background-color: #d1d5db; /* Gray-300 */
        }
        .expenses-section .bg-blue-100, .income-section .bg-blue-100 {
            background-color: #e5e7eb; /* Gray-200 */
        }
        .border-zinc-300 {
            border-color: #d1d5db; /* Gray-300 */
        }

    </style>
</head>
<bo>
<div class="p-4">
    <h2 class="text-xl font-semibold mb-4">Financial Summary</h2>
    <div class="flex justify-end mb-4">
        <button onclick="navigateToAddExpense()" class="bg-yellow-500 text-white px-6 py-3 rounded-lg">Add Other Expenses</button>
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

</body>


    
<div class="grid-two">
        <div class="expenses-section">
            <div class="bg-zinc-800 text-black p-2 rounded-t"> Other Expenses breakdown</div>
            <?php
            include("../includes/config.php");

            $currentDate = date('Y-m-d');

            $sql_expenses = "SELECT cg.group_name, e.expense_type, SUM(e.expense_amount) AS total_amount 
                             FROM expenses e
                             INNER JOIN cow_groups cg ON e.cow_group_id = cg.id
                             WHERE DATE(e.expense_date) = '$currentDate'
                             GROUP BY e.expense_type, e.cow_group_id";
            $result_expenses = $conn->query($sql_expenses);

            $total_expenses = 0;
            $group_expenses = [];

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
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total Expenses by Cow Group</title>
    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .grid-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            padding: 20px;
        }
        .expense-block {
            background-color: #f7f7f7; /* Light Gray */
            border: 1px solid #d1d5db; /* Gray-300 */
            border-radius: 8px;
            padding: 20px;
            text-align: center;
        }
        .expense-block h3 {
            margin-bottom: 10px;
        }
        .expense-block p {
            font-size: 1.2em;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto my-10">
        <h1 class="text-3xl font-bold mb-6 text-center">Total Expenses by Cow Group</h1>
        <div class="grid-container">
            <!-- PHP calculations and results -->
            <?php
            // Initialize total expenses array
            $totalExpenses = [];

            // Iterate through group totals from feeding and other expenses
            foreach ($group_totals as $group_name => $consumption_total) {
                // Fetch other expenses total for the current group
                $otherExpensesTotal = isset($group_expenses[$group_name]) ? $group_expenses[$group_name] : 0;

                // Calculate total expenses (consumption + other expenses)
                $totalGroupExpenses = $consumption_total + $otherExpensesTotal;

                // Store total expenses for the group
                $totalExpenses[$group_name] = $totalGroupExpenses;
            }
            ?>

            <div class="grid-two">
                <?php foreach ($totalExpenses as $group_name => $total_expense_amount): ?>
                    <div class="expenses-section">
                        <div class="bg-zinc-800 text-black p-2 rounded-t"><?php echo htmlspecialchars($group_name); ?> Expenses</div>
                        <div class="bg-blue-100 p-2 border-b border-zinc-300">
                            Total Expenses <span class="float-right">Ksh <?php echo number_format($total_expense_amount, 2); ?></span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</body>
</html>

   
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

</body>
</html>
