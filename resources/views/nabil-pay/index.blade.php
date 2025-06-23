<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advanced Booking Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* A little style to make the hidden section transition smoothly */
        #companion-section {
            transition: all 0.3s ease-in-out;
            overflow: hidden;
            max-height: 0;
            opacity: 0;
        }
        #companion-section.show {
            max-height: 1000px; /* A large enough value to not clip content */
            opacity: 1;
        }
    </style>
</head>
<body class="bg-light">

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="bg-white p-4 p-md-5 rounded shadow-sm">

                    <form id="booking-form">
                        <!-- Personal Details -->
                        <h4 class="mb-4">Your Details</h4>
                                               <div class="mb-3">
                            <label for="fullName" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="fullName">
                        </div>

                        <!-- Country/Chapter Name -->
                        <div class="mb-3">
                            <label for="country" class="form-label">Country/Chapter Name</label>
                            <input type="text" class="form-control" id="country">
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email">
                        </div>

                        <!-- Whatsapp Number -->
                        <div class="mb-3">
                            <label for="whatsapp" class="form-label">Whatsapp Number</label>
                            <input type="tel" class="form-control" id="whatsapp">
                        </div>

                        <!-- Wechat Number -->
                        <div class="mb-4">
                            <label for="wechat" class="form-label">Wechat Number</label>
                            <input type="tel" class="form-control" id="wechat">
                        </div>
                        <!-- ... other personal fields like Whatsapp, etc. ... -->


                        <!-- Applicant's Breakfast Choice -->
                        <div class="mb-4">
                            <label class="form-label d-block">Your Everest Champagne Breakfast?</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="applicantBreakfast" id="applicantBreakfastYes" value="yes">
                                <label class="form-check-label" for="applicantBreakfastYes">Yes (+ US$ 1,500)</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="applicantBreakfast" id="applicantBreakfastNo" value="no" checked>
                                <label class="form-check-label" for="applicantBreakfastNo">No</label>
                            </div>
                        </div>

                        <!-- Accompanied Question -->
                        <div class="mb-3">
                            <label class="form-label d-block">Are you being accompanied by anyone?</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="accompanied" id="accompaniedYes" value="yes">
                                <label class="form-check-label" for="accompaniedYes">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="accompanied" id="accompaniedNo" value="no" checked>
                                <label class="form-check-label" for="accompaniedNo">No</label>
                            </div>
                        </div>

                        <!-- Companion Details Section (Initially Hidden) -->
                        <div id="companion-section" class="p-3 mb-3 bg-light rounded border">
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
                            <div id="companion-breakfast-options">
                                <!-- Companion breakfast choices will be generated here by JS -->
                            </div>
                        </div>

                        <!-- Other fields like comments -->
                        <div class="mb-3">
                            <label for="comments" class="form-label">Additional Comments</label>
                            <textarea class="form-control" id="comments" rows="3"></textarea>
                        </div>

                        <!-- Detailed Cost Overview -->
                        <div class="mt-4 pt-3 border-top">
                            <h4 class="mb-3">Cost Summary</h4>
                            <div id="cost-overview" class="p-3 border rounded">
                                <div class="d-flex justify-content-between">
                                    <span>Booking Fee (<span id="summary-people">1</span> Person(s) x US$ 2,590)</span>
                                    <span id="summary-booking-cost">US$ 2,590</span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span>Everest Breakfast (<span id="summary-breakfast-count">0</span> Person(s) x US$ 1,500)</span>
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
    // --- Cost Constants ---
    const BASE_COST_PER_PERSON = 2590;
    const BREAKFAST_COST_PER_PERSON = 1500;

    // --- DOM Elements ---
    const form = document.getElementById('booking-form');
    const accompaniedRadios = document.querySelectorAll('input[name="accompanied"]');
    const companionSection = document.getElementById('companion-section');
    const numCompanionsSelect = document.getElementById('num-companions');
    const companionBreakfastOptionsContainer = document.getElementById('companion-breakfast-options');

    // --- Summary Display Elements ---
    const summaryPeople = document.getElementById('summary-people');
    const summaryBookingCost = document.getElementById('summary-booking-cost');
    const summaryBreakfastCount = document.getElementById('summary-breakfast-count');
    const summaryBreakfastCost = document.getElementById('summary-breakfast-cost');
    const summaryTotalCost = document.getElementById('summary-total-cost');

    // --- Helper function to format numbers as currency ---
    function formatCurrency(amount) {
        return `US$ ${amount.toLocaleString()}`;
    }

    // --- Function to generate breakfast fields for companions ---
    function generateCompanionFields() {
        const count = parseInt(numCompanionsSelect.value, 10);
        let html = '';
        for (let i = 1; i <= count; i++) {
            html += `
                <div class="mt-3 border-top pt-2">
                    <label class="form-label">#${i} Everest Champagne Breakfast?</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input companion-breakfast-radio" type="radio" name="companion-${i}-breakfast" id="companion-${i}-yes" value="yes">
                        <label class="form-check-label" for="companion-${i}-yes">Yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input companion-breakfast-radio" type="radio" name="companion-${i}-breakfast" id="companion-${i}-no" value="no" checked>
                        <label class="form-check-label" for="companion-${i}-no">No</label>
                    </div>
                </div>
            `;
        }
        companionBreakfastOptionsContainer.innerHTML = html;
    }

    // --- The Main Calculation Function ---
    function updateCostAndSummary() {
        // 1. Calculate number of people
        const isAccompanied = document.querySelector('input[name="accompanied"]:checked').value === 'yes';
        const numCompanions = isAccompanied ? parseInt(numCompanionsSelect.value, 10) : 0;
        const totalPeople = 1 + numCompanions;

        // 2. Calculate breakfast count
        let breakfastCount = 0;
        if (document.querySelector('input[name="applicantBreakfast"]:checked').value === 'yes') {
            breakfastCount++;
        }
        if (isAccompanied) {
            const companionBreakfastRadios = document.querySelectorAll('.companion-breakfast-radio:checked');
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

    // Listen for changes on the ENTIRE form for simplicity
    form.addEventListener('change', function(event) {
        // The target of the event
        const target = event.target;

        // If the "accompanied" radio is changed
        if (target.name === 'accompanied') {
            if (target.value === 'yes') {
                companionSection.classList.add('show');
                generateCompanionFields();
            } else {
                companionSection.classList.remove('show');
                companionBreakfastOptionsContainer.innerHTML = ''; // Clear fields
            }
        }

        // If the number of companions is changed
        if (target.id === 'num-companions') {
            generateCompanionFields();
        }

        // After any change, recalculate everything
        updateCostAndSummary();
    });

    // --- Initial State ---
    // Run once on page load to set the initial summary correctly
    updateCostAndSummary();
});
</script>
</html>


