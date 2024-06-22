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
    </style>
</head>
<body>
    <div class="p-4">
        <h2 class="text-xl font-semibold mb-4">Financial Summary</h2>
        <!-- <div class="flex space-x-4 mb-4">
            <input type="date" class="border border-green-500 p-2 rounded" placeholder="From date" />
            <input type="date" class="border border-green-500 p-2 rounded" placeholder="To date" />
            <button class="bg-yellow-500 text-white p-2 rounded">Retrieve</button>
        </div> -->
        <div class="grid grid-cols-3 gap-4 mb-4">
            <div class="bg-blue-500 text-white p-4 rounded">
                <div class="flex items-center">
                    <div class="flex-1">
                        <p class="text-xl">Ksh 0.00</p>
                        <p>Total Expenses</p>
                    </div>
                </div>
            </div>
            <div class="bg-yellow-500 text-white p-4 rounded">
                <div class="flex items-center">
                    <div class="flex-1">
                        <p class="text-xl">Ksh 0.00</p>
                        <p>Total Income</p>
                    </div>
                </div>
            </div>
            <div class="bg-purple-500 text-white p-4 rounded">
                <div class="flex items-center">
                    <div class="flex-1">
                        <p class="text-xl">Ksh 0.00</p>
                        <p>Profit margin</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Feeding Expense section -->
        <div class="feeding-expense">
            <h2 class="text-xl font-bold mb-4">Feeding Expenses</h2>
            <table class="w-full border-collapse border border-zinc-500">
                <thead>
                    <tr>
                        <th class="border border-zinc-500 p-2">Feed</th>
                        <th class="border border-zinc-500 p-2">Quantity</th>
                        <th class="border border-zinc-500 p-2">Group</th>
                        <th class="border border-zinc-500 p-2">Total Costs</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border border-zinc-500 p-2"></td>
                        <td class="border border-zinc-500 p-2"></td>
                        <td class="border border-zinc-500 p-2"></td>
                        <td class="border border-zinc-500 p-2"></td>
                    </tr>
                    <tr>
                        <td class="border border-zinc-500 p-2"></td>
                        <td class="border border-zinc-500 p-2"></td>
                        <td class="border border-zinc-500 p-2"></
                        <td class="border border-zinc-500 p-2"></td>
                    </tr>
                </tbody>
            </table>
            <div class="mt-4">
                <h3 class="text-lg font-semibold">Total Cost by Group:</h3>
                <ul class="list-disc list-inside">
                    <li>Helper:</li>
                    <li>Milker:</li>
                    <li>Calf:</li>
                </ul>
            </div>
        </div>

        <!-- Wrap income and expenses sections in a grid container -->
        <div class="grid-two">
            <!-- Expenses breakdown -->
            <div class="expenses-section">
                <div class="bg-zinc-800 text-white p-2 rounded-t">Expenses breakdown</div>
                
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
                <div class="bg-blue-100 p-2 border-b border-zinc-300">
                    Income from milk sale <span class="float-right">Ksh 0.00</span>
                </div>
                <div class="bg-blue-100 p-2 border-b border-zinc-300">
                    Income from cow sale <span class="float-right">Ksh 0.00</span>
                </div>
                <div class="bg-blue-100 p-2">
                    Income from other sources <span class="float-right">Ksh 0.00</span>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
