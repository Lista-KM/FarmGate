<?php
// Define database connection details
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

// Define current date
$currentDate = date('Y-m-d');

// Fetch total income for each cow group
$incomeQuery = "
    SELECT cg.group_name, COALESCE(SUM(oi.income_amount), 0) AS total_income
    FROM cow_groups cg
    LEFT JOIN other_income oi ON cg.id = oi.cow_group_id AND oi.income_date = '$currentDate'
    GROUP BY cg.group_name";

$incomeResult = $conn->query($incomeQuery);

$income_totals = [];
while ($row = $incomeResult->fetch_assoc()) {
    $income_totals[$row['group_name']] = $row['total_income'];
}

// Fetch production value and other yield data
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

// Fetch total expenses for each cow group
$expenseQuery = "
    SELECT cg.group_name, COALESCE(SUM(e.expense_amount), 0) AS total_expense
    FROM cow_groups cg
    LEFT JOIN expenses e ON cg.id = e.cow_group_id AND e.expense_date = '$currentDate'
    GROUP BY cg.group_name";

$expenseResult = $conn->query($expenseQuery);

$expense_totals = [];
while ($row = $expenseResult->fetch_assoc()) {
    $expense_totals[$row['group_name']] = $row['total_expense'];
}

// Close connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profit Margins by Cow Group</title>
    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .grid-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            padding: 20px;
        }
        .profit-block {
            background-color: #f7f7f7; /* Light Gray */
            border: 1px solid #d1d5db; /* Gray-300 */
            border-radius: 8px;
            padding: 20px;
            text-align: center;
        }
        .profit-block h3 {
            margin-bottom: 10px;
        }
        .profit-block p {
            font-size: 1.2em;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto my-10">
        <h1 class="text-3xl font-bold mb-6 text-center">Profit Margins by Cow Group</h1>
        <div class="grid-container">
            <!-- Display profit margins for each cow group -->
            <?php
            // Example array of cow groups (you can fetch this from database too)
            $cow_groups = [
                ['group_name' => 'MILKERS', 'profit_margin' => 'Calculating...'],
                ['group_name' => 'CALF', 'profit_margin' => 'Calculating...'],
                ['group_name' => 'HEIFERS', 'profit_margin' => 'Calculating...'],
                // Add more groups as needed
            ];

            foreach ($cow_groups as $group) {
                $group_name = $group['group_name'];
                $total_income = isset($income_totals[$group_name]) ? $income_totals[$group_name] : 0;
                $total_expense = isset($expense_totals[$group_name]) ? $expense_totals[$group_name] : 0;
                $profit_margin = $total_income - $total_expense;
            ?>
            <div class="profit-block">
                <h3><?php echo $group_name; ?></h3>
                <p>Profit Margin: Ksh <?php echo number_format($profit_margin, 2); ?></p>
            </div>
            <?php } ?>
        </div>
    </div>
</body>
</html>
