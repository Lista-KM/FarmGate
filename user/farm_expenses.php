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

    </style>
</head>
<body>
    <div class="p-4">
        <h2 class="text-xl font-semibold mb-4">Financial Summary</h2>
        <div class="grid grid-cols-3 gap-4 mb-4">
            <!-- Total Expenses, Total Income, Profit margin sections -->
            <div class="bg-blue-500 text-white p-4 rounded">
                <div class="flex items-center">
                    <div class="flex-1">
                        <p id="total-expenses" class="text-xl">Ksh 0.00</p>
                        <p>Total Expenses</p>
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
        <table id="feeding-expense-table" class="min-w-full bg-white border">
<!-- Placeholder rows for group-wise totals -->
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

</table>

        <!-- Grid layout for income and expenses sections -->
        <div class="grid-two">
            <!-- Expenses breakdown -->
            <div class="expenses-section">
                <div class="bg-zinc-800 text-white p-2 rounded-t">Expenses breakdown</div>
                <!-- <div class="bg-blue-100 p-2 border-b border-zinc-300">
                    Feeding Expenses <span class="float-right">Ksh 0.00</span>
                </div> -->
                <div class="bg-blue-100 p-2 border-b border-zinc-300">
                    Breeding Expenses <span class="float-right">Ksh 0.00</span>
                </div>
                <div class="bg-blue-100 p-2 border-b border-zinc-300">
                    Health Expenses <span class="float-right">Ksh 0.00</span>
                </div>
                <div class="bg-blue-100 p-2 border-b border-zinc-300">
                    Fuel Expenses <span class="float-right">Ksh 0.00</span>
                </div>
                <div class="bg-blue-100 p-2 border-b border-zinc-300">
                    Salaries <span class="float-right">Ksh 0.00</span>
                </div>
                <div class="bg-blue-100 p-2">Other Expense <span class="float-right">Ksh 0.00</span></div>
                <div class="bg-blue-100 p-2">Total Expenses <span class="float-right">Ksh 0.00</span></div>
            </div>

            <!-- Income breakdown -->
            <div class="income-section">
                <div class="bg-zinc-800 text-white p-2 rounded-t">Income breakdown</div>
                <!-- Placeholder rows for income breakdown -->
                <div class="bg-blue-100 p-2 border-b border-zinc-300">
                    Income from milk sale: Ksh 0.00
                </div>
                <div class="bg-blue-100 p-2">
                    Income from cow sale: Ksh 0.00
                </div>
                <div class="bg-blue-100 p-2">
                    Income from other sources: Ksh 0.00
                </div>
            </div>
        </div>
    </div>

    

    <script>
    // Function to calculate total consumption by group
    function calculateTotalConsumption() {
        const table = document.getElementById('feeding-expense-table');
        if (!table) return; // Ensure the table exists

        const rows = table.getElementsByTagName('tr');
        let helperTotal = 0;
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
                case 'helper':
                    helperTotal += quantity;
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

        // Update totals in the UI
        document.getElementById('helper-total').textContent = `Helper: ${helperTotal.toFixed(2)} kg`;
        document.getElementById('milker-total').textContent = `Milker: ${milkerTotal.toFixed(2)} kg`;
        document.getElementById('calf-total').textContent = `Calf: ${calfTotal.toFixed(2)} kg`;
    }

    // Call the function when the page is loaded
    window.addEventListener('load', calculateTotalConsumption);
</script>

</body>
</html>
