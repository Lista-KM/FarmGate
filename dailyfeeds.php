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
$sql = "SELECT id, feed_date, item_name, quantity, group_name FROM daily_feeding";
$result = $conn->query($sql);

// Close the database connection
$conn->close();
?>

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
        <th class="py-3 px-6 text-left">Quantity</th>
        <th class="py-3 px-6 text-left">Group</th>
        <!-- <th class="py-3 px-6 text-left">Actions</th> -->
      </tr>
    </thead>
    <tbody class="text-zinc-600 text-sm font-light">
      <?php
      if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
              echo "<tr class='border-b border-zinc-200 hover:bg-zinc-100'>";
              echo "<td class='py-3 px-6 text-left'>" . $row['feed_date'] . "</td>";
              echo "<td class='py-3 px-6 text-left'>" . $row['item_name'] . "</td>";
              echo "<td class='py-3 px-6 text-left'>" . $row['quantity'] . "</td>";
              echo "<td class='py-3 px-6 text-left'>" . $row['group_name'] . "</td>";
              echo "<td class='py-3 px-6 text-left'>";
              // Edit button with pencil icon
              // echo "<button class='text-zinc-600 hover:text-zinc-900 mr-2' onclick='editRecord(" . $row['id'] . ")'>";
              // echo "<svg xmlns='http://www.w3.org/2000/svg' class='h-5 w-5' viewBox='0 0 20 20' fill='currentColor'>";
              // echo "<path fill-rule='evenodd' d='M10.707 3.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-9 9a1 1 0 01-.553.289l-3.5 1a1 1 0 01-1.3-1.3l1-3.5a1 1 0 01.289-.553l9-9z' clip-rule='evenodd' />";
              // echo "</svg>";
              // echo "</button>";
              // Delete button with X icon
              // echo "<button class='text-red-600 hover:text-red-900' onclick='confirmDelete(" . $row['id'] . ")'>";
              // echo "<svg xmlns='http://www.w3.org/2000/svg' class='h-5 w-5' viewBox='0 0 20 20' fill='currentColor'>";
             //  echo "<path fill-rule='evenodd' d='M5.293 5.293a1 1 0 011.414 0L10 8.586l3.293-3.293a1 1 0 111.414 1.414L11.414 10l3.293 3.293a1 1 0 01-1.414 1.414L10 11.414l-3.293 3.293a1 1 0 01-1.414-1.414L8.586 10 5.293 6.707a1 1 0 010-1.414z' clip-rule='evenodd' />";
             //  echo "</svg>";
             //  echo "</button>";
             //  echo "</td>";
            //  echo "</tr>";
          }
      } else {
          echo "<tr><td colspan='5' class='py-3 px-6 text-left'>No records found</td></tr>";
      }
      ?>
    </tbody>
  </table>
  <div class="flex justify-between items-center mt-4">
    <div>
      <span>Showing 1 to 1 of 1 entries</span>
    </div>
    <div>
      <button class="bg-blue-500 text-white p-2 rounded">1</button>
    </div>
  </div>
</div>

<script>
  // Function to confirm deletion
  function confirmDelete(id) {
    if (confirm("Are you sure you want to delete this record?")) {
      deleteRecord(id);
    } else {
      return false;
    }
  }

  // Function to handle delete action
  function deleteRecord(id) {
    // Create an XMLHttpRequest object
    const xhr = new XMLHttpRequest();

    // Configure it: POST-request for the URL 'delete_record.php'
    xhr.open('POST', 'delete_record.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    // Send the request
    xhr.onload = function() {
      if (xhr.status === 200) {
        // Handle success response
        const response = JSON.parse(xhr.responseText);
        if (response.success) {
          // Delete row from the table or update UI as needed
          const deletedRow = document.getElementById('row_' + id);
          if (deletedRow) {
            deletedRow.remove(); // Remove the row from UI
          }
          alert('Record deleted successfully.');
        } else {
          alert('Failed to delete record: ' + response.message);
        }
      } else {
        // Handle error response
        alert('Error: ' + xhr.statusText);
      }
    };

    // Handle network errors
    xhr.onerror = function() {
      alert('Network Error');
    };

    // Send the DELETE request with the record ID
    xhr.send('id=' + id);
  }

  // Function to handle edit action
  function editRecord(id) {
    alert("Edit record with ID: " + id);
    // Implement your edit logic here (e.g., open a modal for editing)
  }
</script>
