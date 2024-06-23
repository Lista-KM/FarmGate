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

// Query to fetch data from daily_feeding table
$query = "SELECT feed_date, item_name, quantity, group_name, unit, unit_price FROM daily_feeding";
$result = $conn->query($query);

// Predefined values
$unit = "kg";
$unit_price = 200;

// Array to store group-wise totals
$group_totals = array();

?>
<!DOCTYPE html>
<html lang="en">
<head>

</head>
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
<body></body>
<div class="p-4">
  <div class="flex justify-between items-center mb-4">
    <div>
      <label for="entries" class="mr-2">Show</label>
      <select id="entries" class="border rounded p-1">
        <option>10</option>
        <option>25</option>
        <option>50</option>
        <option>100</option>
      </select>
      <span class="ml-2">entries</span>
    </div>
    <div>
      <label for="search" class="mr-2">Search:</label>
      <input id="search" type="text" class="border rounded p-1" />
    </div>
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
              echo "<td class='py-3 px-4'>" . htmlspecialchars($unit_price) . "</td>";
              
              // Calculate consumption amount
              $consumption_ksh = $unit_price * $row['quantity'];
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
          echo "<tr><td colspan='5' class='py-3 px-6 text-left'>No records found</td></tr>";
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

  
