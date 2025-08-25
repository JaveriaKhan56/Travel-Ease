<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Form</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        .form-group {
            flex: 1 1 calc(50% - 1rem);
            min-width: 200px;
        }
        @media (max-width: 768px) {
            .form-group {
                flex: 1 1 100%;
            }
        }
    </style>
</head>
<body>
    <form action="customizeProcess.php" method="POST" class="bg-white p-8 rounded-lg shadow-md w-full max-w-4xl">
        <div class="flex flex-wrap gap-4">
            <div class="form-group">
                <label for="packageName" class="block text-sm font-medium text-gray-700">Package Name:</label>
                <select id="packageName" name="packageName" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                    <option value="" disabled selected>Select a package</option>
                    <option value="Basic" data-price="3000">Basic</option>
                    <option value="Standard" data-price="4500">Standard</option>
                    <option value="Premium" data-price="6000">Premium</option>
                </select>
            </div>

            <div class="form-group">
                <label for="details" class="block text-sm font-medium text-gray-700">Details:</label>
                <input type="text" id="details" name="details" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
            </div>

            <div class="form-group">
                <label for="price" class="block text-sm font-medium text-gray-700">Price:</label>
                <input type="number" id="price" name="price" step="0.01" required readonly class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 bg-gray-100">
            </div>

            <div class="form-group">
                <label for="duration" class="block text-sm font-medium text-gray-700">Duration (Days):</label>
                <select id="duration" name="duration" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                </select>
            </div>

            <div class="form-group">
                <label for="numOfPeople" class="block text-sm font-medium text-gray-700">Number of People:</label>
                <select id="numOfPeople" name="numOfPeople" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>

            <div class="form-group">
                <label for="startDate" class="block text-sm font-medium text-gray-700">Start Date:</label>
                <input type="date" id="startDate" name="StartDate" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
            </div>

            <div class="form-group">
                <label for="endDate" class="block text-sm font-medium text-gray-700">End Date:</label>
                <input type="date" id="endDate" name="EndDate" required readonly class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 bg-gray-100">
            </div>

            <div class="form-group w-full">
                <button type="submit" id="submitBtn" class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-md w-full mt-6">Submit</button>
            </div>
        </div>
    </form>

    <script>
        const packageName = document.getElementById('packageName');
        const duration = document.getElementById('duration');
        const numOfPeople = document.getElementById('numOfPeople');
        const price = document.getElementById('price');
        const startDate = document.getElementById('startDate');
        const endDate = document.getElementById('endDate');

        function updatePrice() {
            const selectedPackage = packageName.options[packageName.selectedIndex];
            let basePrice = parseFloat(selectedPackage.getAttribute('data-price')) || 0;
            let durationDays = parseInt(duration.value) || 1;
            let numberOfPeople = parseInt(numOfPeople.value) || 1;

            if (durationDays > 1) {
                basePrice += basePrice * 0.05 * (durationDays - 1);
            }
            if (numberOfPeople > 2) {
                basePrice += basePrice * 0.50;
            } else if (numberOfPeople === 2) {
                basePrice += basePrice * 0.25;
            }

            price.value = basePrice.toFixed(2);
        }

        function updateEndDate() {
            const startDateValue = new Date(startDate.value);
            const durationDays = parseInt(duration.value) || 1;
            const endDateValue = new Date(startDateValue);
            endDateValue.setDate(startDateValue.getDate() + durationDays - 1);
            endDate.value = endDateValue.toISOString().split('T')[0];
        }

        packageName.addEventListener('change', updatePrice);
        duration.addEventListener('change', () => {
            updatePrice();
            updateEndDate();
        });
        numOfPeople.addEventListener('change', updatePrice);
        startDate.addEventListener('change', updateEndDate);

        const today = new Date().toISOString().split('T')[0];
        startDate.setAttribute('min', today);
        endDate.setAttribute('min', today);
    </script>
</body>
</html>
