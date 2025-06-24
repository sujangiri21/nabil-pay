<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advanced Booking Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.7.1.min.js" --}}
    {{--     integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
    <style>

    </style>
</head>

<body class="bg-light">

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="p-4 bg-white rounded shadow-sm p-md-5">

                    <form id="registration-form" action="{{ route('registration.store') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <!-- Personal Details -->
                        <h4 class="mb-4">Your Details</h4>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="first_name" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="first_name" name="first_name" required>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="last_name" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="last_name" name="last_name" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="mb-3">
                            <label for="visa_formalities" class="form-label">Visa Formalities</label>
                            <select class="form-select" id="visa_formalities" name="visa_formalities" required>
                                <option value="" disabled selected>Select Visa Status</option>
                                <option value="Arranged">Arranged</option>
                                <option value="In Progress">In Progress</option>
                                <option value="Not Started">Not Started</option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="flight_arrival_date" class="form-label">Flight Arrival Date</label>
                                <input type="datetime-local" class="form-control" id="flight_arrival_date"
                                    name="flight_arrival_date">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="flight_departure_date" class="form-label">Flight Departure Date</label>
                                <input type="datetime-local" class="form-control" id="flight_departure_date"
                                    name="flight_departure_date">
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="flight_airline" class="form-label">Flight Airline</label>
                                <input type="text" class="form-control" id="flight_airline" name="flight_airline">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="flight_number" class="form-label">Flight Number</label>
                                <input type="text" class="form-control" id="flight_number" name="flight_number">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="food_preferences" class="form-label">Food Preferences</label>
                            <select class="form-select" id="food_preferences" name="food_preferences" required>
                                <option value="" disabled selected>Select Food Preference</option>
                                <option value="Vegetarian">Vegetarian</option>
                                <option value="Non-Vegetarian">Non-Vegetarian</option>
                                <option value="Vegan">Vegan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="food_allergies" class="form-label">Food Allergies</label>
                            <textarea class="form-control" id="food_allergies" name="food_allergies" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="hotel_booking_status" class="form-label">Hotel Booking Status</label>
                            <select class="form-select" id="hotel_booking_status" name="hotel_booking_status">
                                <option value="" disabled selected>Select Hotel Status</option>
                                <option value="Booked">Booked</option>
                                <option value="Not Booked">Not Booked</option>
                                <option value="Pending">Pending</option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-4">
                                <label for="tshirt_size" class="form-label">T-Shirt Size</label>
                                <select class="form-select" id="tshirt_size" name="tshirt_size">
                                    <option value="" disabled selected>Select Size</option>
                                    <option value="S">Small</option>
                                    <option value="M">Medium</option>
                                    <option value="L">Large</option>
                                    <option value="XL">XL</option>
                                    <option value="XXL">XXL</option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-12">
                                <img src="{{ asset('images/tshirt_size_m.jpg') }}" class="img-fluid" alt="...">
                                <img src="{{ asset('images/tshirt_size_f.jpg') }}" class="img-fluid" alt="...">
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-4">
                                <label for="jacket_size" class="form-label">Jacket Size</label>
                                <select class="form-select" id="jacket_size" name="jacket_size">
                                    <option value="" disabled selected>Select Size</option>
                                    <option value="S">Small</option>
                                    <option value="M">Medium</option>
                                    <option value="L">Large</option>
                                    <option value="XL">XL</option>
                                    <option value="XXL">XXL</option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-12">
                                <img src="{{ asset('images/jacket_size_m.jpg') }}" class="img-fluid" alt="...">
                                <img src="{{ asset('images/jacket_size_f.jpg') }}" class="img-fluid" alt="...">
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-4">
                                <label for="cultural_dress_size" class="form-label">Cultural Dress Size</label>
                                <select class="form-select" id="cultural_dress_size" name="cultural_dress_size">
                                    <option value="" disabled selected>Select Size</option>
                                    <option value="S">Small</option>
                                    <option value="M">Medium</option>
                                    <option value="L">Large</option>
                                    <option value="XL">XL</option>
                                    <option value="XXL">XXL</option>
                                </select>
                            </div>

                            <div class="mb-3 col-md-12">
                                <x-size.culture-dress-f />
                                <x-size.culture-dress-m />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="weight_kg" class="form-label">Weight (kg)</label>
                            <input type="number" class="form-control" id="weight_kg" name="weight_kg"
                                step="0.01" min="0">
                        </div>

                        <!-- Applicant's Breakfast Choice -->
                        <div class="mb-4">
                            <label class="form-label d-block">Your Everest Champagne Breakfast?</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="breakfast"
                                    id="applicantBreakfastYes" value="1">
                                <label class="form-check-label" for="applicantBreakfastYes">Yes (+ US$ 1,500)</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="breakfast"
                                    id="applicantBreakfastNo" value="0" checked>
                                <label class="form-check-label" for="applicantBreakfastNo">No</label>
                            </div>
                        </div>

                        <!-- Accompanied Question -->
                        <div class="mb-3">
                            <label class="form-label d-block">Are you being accompanied by anyone?</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="accompanied"
                                    id="accompaniedYes" value="yes">
                                <label class="form-check-label" for="accompaniedYes">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="accompanied" id="accompaniedNo"
                                    value="no" checked>
                                <label class="form-check-label" for="accompaniedNo">No</label>
                            </div>
                        </div>

                        <!-- Companion Details Section (Initially Hidden) -->
                        <div id="companion-section" class="p-3 mb-3 rounded border bg-light d-none">
                            <div class="mb-3">
                                <label for="num-companions" class="form-label fw-bold">Number of Companions</label>
                                <select class="form-select" id="num-companions">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <div id="companion-cards">
                                <!-- Companion cards will be generated here by JS -->
                            </div>
                        </div>

                        <!-- Template for Companion Card -->
                        <template id="companion-template">
                            <div class="mb-3 companion-card card">
                                <div class="card-header">
                                    <h5 class="card-title">Companion <span class="companion-number"></span></h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">First Name</label>
                                            <input type="text" class="form-control"
                                                name="companions[][first_name]" required>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Last Name</label>
                                            <input type="text" class="form-control" name="companions[][last_name]"
                                                required>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Food Preferences</label>
                                        <select class="form-select" name="companions[][food_preferences]" required>
                                            <option value="" disabled selected>Select Food Preference</option>
                                            <option value="Vegetarian">Vegetarian</option>
                                            <option value="Non-Vegetarian">Non-Vegetarian</option>
                                            <option value="Vegan">Vegan</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Food Allergies</label>
                                        <textarea class="form-control" name="companions[][food_allergies]" rows="3"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Hotel Booking Status</label>
                                        <select class="form-select" name="companions[][hotel_booking_status]">
                                            <option value="" disabled selected>Select Hotel Status</option>
                                            <option value="Booked">Booked</option>
                                            <option value="Not Booked">Not Booked</option>
                                            <option value="Pending">Pending</option>
                                        </select>
                                    </div>
                                    <div class="row">
                                        <div class="mb-3 col-md-4">
                                            <label class="form-label">T-Shirt Size</label>
                                            <select class="form-select" name="companions[][tshirt_size]">
                                                <option value="" disabled selected>Select Size</option>
                                                <option value="S">Small</option>
                                                <option value="M">Medium</option>
                                                <option value="L">Large</option>
                                                <option value="XL">XL</option>
                                                <option value="XXL">XXL</option>
                                            </select>
                                        </div>
                                        <div class="mb-3 col-md-4">
                                            <label class="form-label">Jacket Size</label>
                                            <select class="form-select" name="companions[][jacket_size]">
                                                <option value="" disabled selected>Select Size</option>
                                                <option value="S">Small</option>
                                                <option value="M">Medium</option>
                                                <option value="L">Large</option>
                                                <option value="XL">XL</option>
                                                <option value="XXL">XXL</option>
                                            </select>
                                        </div>
                                        <div class="mb-3 col-md-4">
                                            <label class="form-label">Cultural Dress Size</label>
                                            <select class="form-select" name="companions[][cultural_dress_size]">
                                                <option value="" disabled selected>Select Size</option>
                                                <option value="S">Small</option>
                                                <option value="M">Medium</option>
                                                <option value="L">Large</option>
                                                <option value="XL">XL</option>
                                                <option value="XXL">XXL</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Weight (kg)</label>
                                        <input type="number" class="form-control" name="companions[][weight_kg]"
                                            step="0.01" min="0">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label d-block">Everest Champagne Breakfast?</label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input companion-breakfast-radio" type="radio"
                                                name="companions[][breakfast]" value="1">
                                            <label class="form-check-label">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input companion-breakfast-radio" type="radio"
                                                name="companions[][breakfast]" value="0" checked>
                                            <label class="form-check-label">No</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </template>

                        <!-- Detailed Cost Overview -->
                        <div class="pt-3 mt-4 border-top">
                            <h4 class="mb-3">Cost Summary</h4>
                            <div id="cost-overview" class="p-3 rounded border">
                                <div class="d-flex justify-content-between">
                                    <span>Booking Fee (<span id="summary-people">1</span> Person(s) x US$ 2,590)</span>
                                    <span id="summary-booking-cost">US$ 2,590</span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span>Everest Breakfast (<span id="summary-breakfast-count">0</span> Person(s) x
                                        US$ 1,500)</span>
                                    <span id="summary-breakfast-cost">US$ 0</span>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-between fw-bold fs-5">
                                    <span>Total Cost</span>
                                    <span id="summary-total-cost" class="text-success">US$ 2,590</span>
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="mt-4">
                            <button type="submit" class="btn btn-danger btn-lg w-100">Book Your Place</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="script.js"></script>
</body>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const BASE_COST_PER_PERSON = 2590;
        const BREAKFAST_COST_PER_PERSON = 1500;

        const form = document.getElementById('registration-form');
        const accompaniedRadios = document.querySelectorAll('input[name="accompanied"]');
        const companionSection = document.getElementById('companion-section');
        const numCompanionsSelect = document.getElementById('num-companions');
        const companionCardsContainer = document.getElementById('companion-cards');
        const companionTemplate = document.getElementById('companion-template').content;

        const summaryPeople = document.getElementById('summary-people');
        const summaryBookingCost = document.getElementById('summary-booking-cost');
        const summaryBreakfastCount = document.getElementById('summary-breakfast-count');
        const summaryBreakfastCost = document.getElementById('summary-breakfast-cost');
        const summaryTotalCost = document.getElementById('summary-total-cost');

        function formatCurrency(amount) {
            return `US$ ${amount.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}`;
        }

        function generateCompanionCards() {
            const count = parseInt(numCompanionsSelect.value, 10);
            companionCardsContainer.innerHTML = ''; // Clear existing cards

            for (let i = 0; i < count; i++) {
                const card = document.importNode(companionTemplate, true);
                card.querySelector('.companion-number').textContent = i + 1;

                // Update all form fields with correct indexed names
                card.querySelectorAll('[name]').forEach(input => {
                    const originalName = input.getAttribute('name');

                    // Skip if no name or already indexed properly
                    if (!originalName.includes('companions[')) return;

                    // Extract the field name inside the brackets
                    const match = originalName.match(/\[\]\[([^\]]+)\]/);
                    if (match && match[1]) {
                        const field = match[1];
                        const newName = `companions[${i}][${field}]`;
                        input.setAttribute('name', newName);

                        // If input is radio, also update id and label
                        if (input.type === 'radio') {
                            const newId = `companion-${i + 1}-breakfast-${input.value}`;
                            input.id = newId;
                            if (input.nextElementSibling?.tagName === 'LABEL') {
                                input.nextElementSibling.setAttribute('for', newId);
                            }
                        }
                    }
                });

                companionCardsContainer.appendChild(card);
            }
        }

        function updateCostAndSummary() {
            // 1. Calculate number of people
            const isAccompanied = document.querySelector('input[name="accompanied"]:checked').value === 'yes';
            const numCompanions = isAccompanied ? parseInt(numCompanionsSelect.value, 10) : 0;
            const totalPeople = 1 + numCompanions;

            // 2. Calculate breakfast count
            let breakfastCount = 0;
            if (document.querySelector('input[name="breakfast"]:checked').value === 'yes') {
                breakfastCount++;
            }
            if (isAccompanied) {
                const companionBreakfastRadios = document.querySelectorAll(
                    '.companion-breakfast-radio:checked');
                companionBreakfastRadios.forEach(radio => {
                    if (radio.value === 'yes') {
                        breakfastCount++;
                    }
                });
            }

            // 3. Calculate costs
            const totalBookingCost = totalPeople * BASE_COST_PER_PERSON;
            const totalBreakfastCost = breakfastCount * BREAKFAST_COST_PER_PERSON;
            const grandTotal = totalBookingCost + totalBreakfastCost;

            // 4. Update the summary display
            summaryPeople.textContent = totalPeople;
            summaryBookingCost.textContent = formatCurrency(totalBookingCost);
            summaryBreakfastCount.textContent = breakfastCount;
            summaryBreakfastCost.textContent = formatCurrency(totalBreakfastCost);
            summaryTotalCost.textContent = formatCurrency(grandTotal);
        }

        // --- Event Listeners ---
        form.addEventListener('change', function(event) {
            const target = event.target;

            // If the "accompanied" radio is changed
            if (target.name === 'accompanied') {
                if (target.value === 'yes') {
                    companionSection.classList.remove('d-none');
                    generateCompanionCards();
                } else {
                    companionSection.classList.add('d-none');
                    companionCardsContainer.innerHTML = ''; // Clear cards
                }
            }

            // If the number of companions is changed
            if (target.id === 'num-companions') {
                generateCompanionCards();
            }

            // Recalculate costs after any change
            updateCostAndSummary();
        });

        // --- Form Submission ---
        //form.addEventListener('submit', function(event) {
        //    event.preventDefault();
        //    const formData = new FormData(form);
        //    const data = {
        //        registration: {
        //            first_name: formData.get('first_name'),
        //            last_name: formData.get('last_name'),
        //            email: formData.get('email') || null,
        //            visa_formalities: formData.get('visa_formalities'),
        //            flight_arrival_date: formData.get('flight_arrival_date') || null,
        //            flight_departure_date: formData.get('flight_departure_date') || null,
        //            flight_airline: formData.get('flight_airline') || null,
        //            flight_number: formData.get('flight_number') || null,
        //            food_preferences: formData.get('food_preferences'),
        //            food_allergies: formData.get('food_allergies') || null,
        //            hotel_booking_status: formData.get('hotel_booking_status') || null,
        //            tshirt_size: formData.get('tshirt_size') || null,
        //            jacket_size: formData.get('jacket_size') || null,
        //            cultural_dress_size: formData.get('cultural_dress_size') || null,
        //            weight_kg: formData.get('weight_kg') || null,
        //            breakfast: formData.get('breakfast')
        //        },
        //        companions: []
        //    };

        //    // Collect companion data
        //    const companionCards = document.querySelectorAll('.companion-card');
        //    companionCards.forEach((card, index) => {
        //        const companion = {
        //            first_name: card.querySelector(
        //                `input[name="companions[${index}][first_name]"]`).value,
        //            last_name: card.querySelector(
        //                `input[name="companions[${index}][last_name]"]`).value,
        //            food_preferences: card.querySelector(
        //                `select[name="companions[${index}][food_preferences]"]`).value,
        //            food_allergies: card.querySelector(
        //                    `textarea[name="companions[${index}][food_allergies]"]`)
        //                .value || null,
        //            hotel_booking_status: card.querySelector(
        //                    `select[name="companions[${index}][hotel_booking_status]"]`)
        //                .value || null,
        //            tshirt_size: card.querySelector(
        //                    `select[name="companions[${index}][tshirt_size]"]`).value ||
        //                null,
        //            jacket_size: card.querySelector(
        //                    `select[name="companions[${index}][jacket_size]"]`).value ||
        //                null,
        //            cultural_dress_size: card.querySelector(
        //                    `select[name="companions[${index}][cultural_dress_size]"]`)
        //                .value || null,
        //            weight_kg: card.querySelector(
        //                `input[name="companions[${index}][weight_kg]"]`).value || null,
        //            breakfast: card.querySelector(
        //                `input[name="companions[${index}][breakfast]"]:checked`).value
        //        };
        //        data.companions.push(companion);
        //    });

        //    fetch("{{ route('registration.store') }}", {
        //            method: 'POST',
        //            headers: {
        //                'Content-Type': 'application/json',
        //                'X-CSRF-TOKEN': '{{ csrf_token() }}'
        //            },
        //            body: JSON.stringify(data)
        //        })
        //        .then(response => response.json())
        //        .then(result => {
        //            if (result.success) {
        //                alert('Registration successful!');
        //                form.reset();
        //                companionCardsContainer.innerHTML = '';
        //                companionSection.classList.add('d-none');
        //                updateCostAndSummary();
        //            } else {
        //                alert('Error: ' + (result.message || 'Registration failed'));
        //            }
        //        })
        //        .catch(error => {
        //            console.log('Error: ' + error.message);
        //        });
        //});

        // --- Initial State ---
        updateCostAndSummary();
    });
</script>

</html>
