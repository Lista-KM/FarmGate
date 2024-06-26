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

// Fetch parameters from the request
$entries = isset($_GET['entries']) ? (int)$_GET['entries'] : 10;
$search = isset($_GET['search']) ? $_GET['search'] : '';

// Query to fetch data from daily_feeding table and join with stock_levels table
$query = "SELECT df.feed_date, df.item_name, df.quantity, df.group_name, sl.unit, sl.unit_price 
          FROM daily_feeding df
          JOIN stock_levels sl ON df.item_name = sl.item_name
          WHERE df.item_name LIKE '%$search%'
          LIMIT $entries";
$result = $conn->query($query);

// Array to store group-wise totals
$group_totals = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $feed_date = htmlspecialchars($row['feed_date']);
        $item_name = htmlspecialchars($row['item_name']);
        $quantity = htmlspecialchars($row['quantity']);
        $group_name = htmlspecialchars($row['group_name']);
        $unit = htmlspecialchars($row['unit']);
        $unit_price = htmlspecialchars($row['unit_price']);
        $consumption_ksh = $unit_price * $quantity;

        echo "<tr class='border-b border-zinc-200 hover:bg-zinc-100'>";
        echo "<td class='py-3 px-6 text-left'>$feed_date</td>";
        echo "<td class='py-3 px-6 text-left'>$item_name</td>";
        echo "<td class='py-3 px-6 text-left'>$quantity</td>";
        echo "<td class='py-3 px-6 text-left'>$group_name</td>";
        echo "<td class='py-3 px-4'>$unit</td>";
        echo "<td class='py-3 px-4'>$unit_price</td>";
        echo "<td class='py-3 px-4'>" . htmlspecialchars($consumption_ksh) . "</td>";
        echo "</tr>";

        // Accumulate totals per group
        if (!isset($group_totals[$group_name])) {
            $group_totals[$group_name] = 0;
        }
        $group_totals[$group_name] += $consumption_ksh;
    }

    // Display total consumption per group
    foreach ($group_totals as $group_name => $total) {
        echo "<tr>";
        echo "<td colspan='6' class='py-3 px-6 text-right font-bold'>Total Consumption for " . htmlspecialchars($group_name) . ":</td>";
        echo "<td class='py-3 px-4 font-bold'>" . htmlspecialchars($total) . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='7' class='py-3 px-6 text-left'>No records found</td></tr>";
}

$conn->close();
?>
