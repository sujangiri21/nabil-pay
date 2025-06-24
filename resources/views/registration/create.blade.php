@extends('layouts.app')

@section('content')
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
                                <label for="first_name" class="form-label requried-label">First Name</label>
                                <input type="text" class="form-control @error('first_name') is-invalid @enderror"
                                    id="first_name" name="first_name" value="{{ old('first_name') }}" required>
                                @error('first_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="last_name" class="form-label">Last Name</label>
                                <input type="text" class="form-control @error('last_name') is-invalid @enderror"
                                    id="last_name" name="last_name" value="{{ old('last_name') }}" required>
                                @error('last_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                name="email" value="{{ old('email') }}">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="visa_formalities" class="form-label">Visa Formalities</label>
                            <select class="form-select @error('visa_formalities') is-invalid @enderror"
                                id="visa_formalities" name="visa_formalities" required>
                                <option value="" disabled {{ old('visa_formalities') ? '' : 'selected' }}>
                                    Select Visa Status</option>
                                <option value="Arranged" {{ old('visa_formalities') === 'Arranged' ? 'selected' : '' }}>
                                    Arranged</option>
                                <option value="In Progress"
                                    {{ old('visa_formalities') === 'In Progress' ? 'selected' : '' }}>In Progress
                                </option>
                                <option value="Not Started"
                                    {{ old('visa_formalities') === 'Not Started' ? 'selected' : '' }}>Not Started
                                </option>
                            </select>
                            @error('visa_formalities')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="flight_arrival_date" class="form-label">Flight Arrival Date</label>
                                <input type="datetime-local"
                                    class="form-control @error('flight_arrival_date') is-invalid @enderror"
                                    id="flight_arrival_date" name="flight_arrival_date"
                                    value="{{ old('flight_arrival_date') ? \Carbon\Carbon::parse(old('flight_arrival_date'))->format('Y-m-d\TH:i') : '' }}">
                                @error('flight_arrival_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="flight_departure_date" class="form-label">Flight Departure Date</label>
                                <input type="datetime-local"
                                    class="form-control @error('flight_departure_date') is-invalid @enderror"
                                    id="flight_departure_date" name="flight_departure_date"
                                    value="{{ old('flight_departure_date') ? \Carbon\Carbon::parse(old('flight_departure_date'))->format('Y-m-d\TH:i') : '' }}">
                                @error('flight_departure_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="flight_airline" class="form-label">Flight Airline</label>
                                <input type="text" class="form-control @error('flight_airline') is-invalid @enderror"
                                    id="flight_airline" name="flight_airline" value="{{ old('flight_airline') }}">
                                @error('flight_airline')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="flight_number" class="form-label">Flight Number</label>
                                <input type="text" class="form-control @error('flight_number') is-invalid @enderror"
                                    id="flight_number" name="flight_number" value="{{ old('flight_number') }}">
                                @error('flight_number')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="food_preferences" class="form-label">Food Preferences</label>
                            <select class="form-select @error('food_preferences') is-invalid @enderror"
                                id="food_preferences" name="food_preferences" required>
                                <option value="" disabled {{ old('food_preferences') ? '' : 'selected' }}>
                                    Select Food Preference</option>
                                <option value="Vegetarian"
                                    {{ old('food_preferences') === 'Vegetarian' ? 'selected' : '' }}>Vegetarian
                                </option>
                                <option value="Non-Vegetarian"
                                    {{ old('food_preferences') === 'Non-Vegetarian' ? 'selected' : '' }}>
                                    Non-Vegetarian</option>
                                <option value="Vegan" {{ old('food_preferences') === 'Vegan' ? 'selected' : '' }}>
                                    Vegan</option>
                            </select>
                            @error('food_preferences')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="food_allergies" class="form-label">Food Allergies</label>
                            <textarea class="form-control @error('food_allergies') is-invalid @enderror" id="food_allergies"
                                name="food_allergies" rows="3">{{ old('food_allergies') }}</textarea>
                            @error('food_allergies')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="hotel_booking_status" class="form-label">Hotel Booking Status</label>
                            <select class="form-select @error('hotel_booking_status') is-invalid @enderror"
                                id="hotel_booking_status" name="hotel_booking_status">
                                <option value="" disabled {{ old('hotel_booking_status') ? '' : 'selected' }}>
                                    Select Hotel Status
                                </option>
                                <option value="Booked" {{ old('hotel_booking_status') === 'Booked' ? 'selected' : '' }}>
                                    Booked
                                </option>
                                <option value="Not Booked"
                                    {{ old('hotel_booking_status') === 'Not Booked' ? 'selected' : '' }}>Not Booked
                                </option>
                                <option value="Pending" {{ old('hotel_booking_status') === 'Pending' ? 'selected' : '' }}>
                                    Pending
                                </option>
                            </select>
                            @error('hotel_booking_status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-4">
                                <label for="tshirt_size" class="form-label">T-Shirt Size</label>
                                <select class="form-select @error('tshirt_size') is-invalid @enderror" id="tshirt_size"
                                    name="tshirt_size">
                                    <option value="" disabled {{ old('tshirt_size') ? '' : 'selected' }}>
                                        Select Size</option>
                                    <option value="S" {{ old('tshirt_size') === 'S' ? 'selected' : '' }}>
                                        Small</option>
                                    <option value="M" {{ old('tshirt_size') === 'M' ? 'selected' : '' }}>
                                        Medium</option>
                                    <option value="L" {{ old('tshirt_size') === 'L' ? 'selected' : '' }}>
                                        Large</option>
                                    <option value="XL" {{ old('tshirt_size') === 'XL' ? 'selected' : '' }}>XL
                                    </option>
                                    <option value="XXL" {{ old('tshirt_size') === 'XXL' ? 'selected' : '' }}>
                                        XXL</option>
                                </select>
                                @error('tshirt_size')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-12">
                                <img src="{{ asset('images/tshirt_size_m.jpg') }}" class="img-fluid"
                                    alt="T-Shirt Size Male">
                                <img src="{{ asset('images/tshirt_size_f.jpg') }}" class="img-fluid"
                                    alt="T-Shirt Size Female">
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-4">
                                <label for="jacket_size" class="form-label">Jacket Size</label>
                                <select class="form-select @error('jacket_size') is-invalid @enderror" id="jacket_size"
                                    name="jacket_size">
                                    <option value="" disabled {{ old('jacket_size') ? '' : 'selected' }}>
                                        Select Size</option>
                                    <option value="S" {{ old('jacket_size') === 'S' ? 'selected' : '' }}>
                                        Small</option>
                                    <option value="M" {{ old('jacket_size') === 'M' ? 'selected' : '' }}>
                                        Medium</option>
                                    <option value="L" {{ old('jacket_size') === 'L' ? 'selected' : '' }}>
                                        Large</option>
                                    <option value="XL" {{ old('jacket_size') === 'XL' ? 'selected' : '' }}>XL
                                    </option>
                                    <option value="XXL" {{ old('jacket_size') === 'XXL' ? 'selected' : '' }}>
                                        XXL</option>
                                </select>
                                @error('jacket_size')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-12">
                                <img src="{{ asset('images/jacket_size_m.jpg') }}" class="img-fluid"
                                    alt="Jacket Size Male">
                                <img src="{{ asset('images/jacket_size_f.jpg') }}" class="img-fluid"
                                    alt="Jacket Size Female">
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-4">
                                <label for="cultural_dress_size" class="form-label">Cultural Dress Size</label>
                                <select class="form-select @error('cultural_dress_size') is-invalid @enderror"
                                    id="cultural_dress_size" name="cultural_dress_size">
                                    <option value="" disabled {{ old('cultural_dress_size') ? '' : 'selected' }}>
                                        Select Size</option>
                                    <option value="S" {{ old('cultural_dress_size') === 'S' ? 'selected' : '' }}>
                                        Small</option>
                                    <option value="M" {{ old('cultural_dress_size') === 'M' ? 'selected' : '' }}>
                                        Medium</option>
                                    <option value="L" {{ old('cultural_dress_size') === 'L' ? 'selected' : '' }}>
                                        Large</option>
                                    <option value="XL" {{ old('cultural_dress_size') === 'XL' ? 'selected' : '' }}>XL
                                    </option>
                                    <option value="XXL" {{ old('cultural_dress_size') === 'XXL' ? 'selected' : '' }}>
                                        XXL</option>
                                </select>
                                @error('cultural_dress_size')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-12">
                                <x-size.culture-dress-f />
                                <x-size.culture-dress-m />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="weight_kg" class="form-label">Weight (kg)</label>
                            <input type="number" class="form-control @error('weight_kg') is-invalid @enderror"
                                id="weight_kg" name="weight_kg" step="0.01" min="0"
                                value="{{ old('weight_kg') }}">
                            @error('weight_kg')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Applicant's Breakfast Choice -->
                        <div class="mb-4">
                            <label class="form-label d-block">Your Everest Champagne Breakfast?</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input @error('breakfast') is-invalid @enderror" type="radio"
                                    name="breakfast" id="applicantBreakfastYes" value="1"
                                    {{ old('breakfast') === '1' ? 'checked' : '' }}>
                                <label class="form-check-label" for="applicantBreakfastYes">Yes (+ US$
                                    1,500)</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input @error('breakfast') is-invalid @enderror" type="radio"
                                    name="breakfast" id="applicantBreakfastNo" value="0"
                                    {{ old('breakfast', '0') === '0' ? 'checked' : '' }}>
                                <label class="form-check-label" for="applicantBreakfastNo">No</label>
                            </div>
                            @error('breakfast')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Accompanied Question -->
                        <div class="mb-3">
                            <label class="form-label d-block">Are you being accompanied by anyone?</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input @error('accompanied') is-invalid @enderror" type="radio"
                                    name="accompanied" id="accompaniedYes" value="yes"
                                    {{ old('accompanied') === 'yes' ? 'checked' : '' }}>
                                <label class="form-check-label" for="accompaniedYes">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input @error('accompanied') is-invalid @enderror" type="radio"
                                    name="accompanied" id="accompaniedNo" value="no"
                                    {{ old('accompanied', 'no') === 'no' ? 'checked' : '' }}>
                                <label class="form-check-label" for="accompaniedNo">No</label>
                            </div>
                            @error('accompanied')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Companion Details Section -->
                        <div id="companion-section"
                            class="p-3 mb-3 rounded border bg-light {{ old('accompanied') === '1' ? '' : 'd-none' }}">
                            <div class="mb-3">
                                <label for="num-companions" class="form-label fw-bold">Number of
                                    Companions</label>
                                <select class="form-select @error('num-companions') is-invalid @enderror"
                                    id="num-companions" name="num-companions">
                                    <option value="1" {{ old('num-companions', 1) == 1 ? 'selected' : '' }}>1
                                    </option>
                                    <option value="2" {{ old('num-companions') == 2 ? 'selected' : '' }}>2
                                    </option>
                                    <option value="3" {{ old('num-companions') == 3 ? 'selected' : '' }}>3
                                    </option>
                                    <option value="4" {{ old('num-companions') == 4 ? 'selected' : '' }}>4
                                    </option>
                                    <option value="5" {{ old('num-companions') == 5 ? 'selected' : '' }}>5
                                    </option>
                                </select>
                                @error('num-companions')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div id="companion-cards">
                                <!-- Companion cards will be generated by JS -->
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
                                            <input type="text" class="form-control" name="companions[][first_name]"
                                                required>
                                            <div class="invalid-feedback"></div>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Last Name</label>
                                            <input type="text" class="form-control" name="companions[][last_name]"
                                                required>
                                            <div class="invalid-feedback"></div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Food Preferences</label>
                                        <select class="form-select" name="companions[][food_preferences]" required>
                                            <option value="" disabled selected>Select Food Preference
                                            </option>
                                            <option value="Vegetarian">Vegetarian</option>
                                            <option value="Non-Vegetarian">Non-Vegetarian</option>
                                            <option value="Vegan">Vegan</option>
                                        </select>
                                        <div class="invalid-feedback"></div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Food Allergies</label>
                                        <textarea class="form-control" name="companions[][food_allergies]" rows="3"></textarea>
                                        <div class="invalid-feedback"></div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Hotel Booking Status</label>
                                        <select class="form-select" name="companions[][hotel_booking_status]">
                                            <option value="" disabled selected>Select Hotel Status</option>
                                            <option value="Booked">Booked</option>
                                            <option value="Not Booked">Not Booked</option>
                                            <option value="Pending">Pending</option>
                                        </select>
                                        <div class="invalid-feedback"></div>
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
                                            <div class="invalid-feedback"></div>
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
                                            <div class="invalid-feedback"></div>
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
                                            <div class="invalid-feedback"></div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Weight (kg)</label>
                                        <input type="number" class="form-control" name="companions[][weight_kg]"
                                            step="0.01" min="0">
                                        <div class="invalid-feedback"></div>
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
                                        <div class="invalid-feedback d-block"></div>
                                    </div>
                                </div>
                            </div>
                        </template>

                        <!-- Detailed Cost Overview -->
                        <div class="pt-3 mt-4 border-top">
                            <h4 class="mb-3">Cost Summary</h4>
                            <div id="cost-overview" class="p-3 rounded border">
                                <div class="d-flex justify-content-between">
                                    <span>Booking Fee (<span id="summary-people">1</span> Person(s) x US$
                                        2,590)</span>
                                    <span id="summary-booking-cost">US$ 2,590</span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span>Everest Breakfast (<span id="summary-breakfast-count">0</span> Person(s)
                                        x US$ 1,500)</span>
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
                if (document.querySelector('input[name="breakfast"]:checked').value === '1') {
                    breakfastCount++;
                }
                if (isAccompanied) {
                    const companionBreakfastRadios = document.querySelectorAll(
                        '.companion-breakfast-radio:checked');
                    companionBreakfastRadios.forEach(radio => {
                        if (radio.value === '1') {
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
@endsection
