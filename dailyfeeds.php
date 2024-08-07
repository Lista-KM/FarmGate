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

// Get today's date in YYYY-MM-DD format
$today = date('Y-m-d');

// Query to fetch data from daily_feeding table for today's date
$query = "SELECT df.feed_date, df.item_name, df.quantity, df.group_name, sl.unit_price 
          FROM daily_feeding df 
          JOIN stock_levels sl ON df.item_name = sl.feed_name
          WHERE df.feed_date = '$today'";
$result = $conn->query($query);

// Predefined value for unit of measure
$unit = "kg";

// Array to store group-wise totals
$group_totals = array();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daily Feeding Data</title>
    <!-- Add your CSS styles here -->
    <style>
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
</style>
</head>
<body>
<div class="p-4">
    <div class="flex justify-between items-center mb-4">
        <!-- Your filter and search options -->
    </div>
    <table class="min-w-full bg-white border">
        <thead>
        <tr class="bg-zinc-200 text-zinc-600 uppercase text-sm leading-normal">
            <th class="py-3 px-6 text-left">Date</th>
            <th class="py-3 px-6 text-left">Item</th>
            <th class="py-3 px-6 text-left">Consumed</th>
            <th class="py-3 px-6 text-left">Group</th>
            <th class="py-3 px-4 text-left">Unit</th>
            <th class="py-3 px-4 text-left">Unit Price</th>
            <th class="py-3 px-4 text-left">Consumption(Ksh)</th>
        </tr>
        </thead>
        <tbody class="text-zinc-600 text-sm font-light">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr class='border-b border-zinc-200 hover:bg-zinc-100'>";
                echo "<td class='py-3 px-6 text-left'>" . htmlspecialchars($row['feed_date']) . "</td>";
                echo "<td class='py-3 px-6 text-left'>" . htmlspecialchars($row['item_name']) . "</td>";
                echo "<td class='py-3 px-6 text-left'>" . htmlspecialchars($row['quantity']) . "</td>";
                echo "<td class='py-3 px-6 text-left'>" . htmlspecialchars($row['group_name']) . "</td>";
                echo "<td class='py-3 px-4'>" . htmlspecialchars($unit) . "</td>";
                echo "<td class='py-3 px-4'>" . htmlspecialchars($row['unit_price']) . "</td>";

                // Calculate consumption amount
                $consumption_ksh = $row['unit_price'] * $row['quantity'];
                echo "<td class='py-3 px-4'>" . htmlspecialchars($consumption_ksh) . "</td>";
                echo "</tr>";

                // Accumulate totals per group
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
        <tfoot>
        <?php
        // Display total consumption per group
        foreach ($group_totals as $group_name => $total) {
            echo "<tr>";
            echo "<td colspan='6' class='py-3 px-6 text-right font-bold'>Total Consumption for " . htmlspecialchars($group_name) . ":</td>";
            echo "<td class='py-3 px-4 font-bold'>" . htmlspecialchars($total) . "</td>";
            echo "</tr>";
        }
        ?>
        </tfoot>
    </table>

</div>
</body>
</html>
