<div class="card">
    <div class="card-body p-3">
        <div class="carpool mb-3">
            <h4 class="mb-2">Setting Form Carpool</h4>
            <div class="container">
                <div class="col-12">
                    <div class="row mb-1">
                        <div class="col-6">
                            <label for="carpool-tax" class="form-label">Tax</label>
                            <input type="text" class="form-control" id="carpool-tax" placeholder="Tax %" />
                        </div>
                        <div class="col-6">
                            <label for="carpool-admin-commission" class="form-label">Admin Commission</label>
                            <input type="text" class="form-control" id="carpool-admin-commission" placeholder="%%" />
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-6">
                            <label for="carpool-charge-passenger" class="form-label">Cancellation Charge Passenger %</label>
                            <input type="text" class="form-control" id="carpool-charge-passenger" placeholder="%" />
                        </div>
                        <div class="col-6">
                            <label for="carpool-charge-driver" class="form-label">Cancellation Charge Driver %</label>
                            <input type="text" class="form-control" id="carpool-charge-driver" placeholder="%%" />
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-6">
                            <label for="fuel-cost" class="form-label">Fuel Cost / Liter</label>
                            <input type="text" class="form-control" id="fuel-cost" placeholder="%" />
                        </div>
                        <div class="col-6">
                            <label for="departure-date" class="form-label">Cancel Ride Hours Before Departure date (Passenger) </label>
                            <input type="text" class="form-control" id="departure-date" placeholder="%%" />
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-6">
                            <label for="departure-time" class="form-label">Start Ride Hours Before Departure Time</label>
                            <input type="text" class="form-control" id="departure-time" placeholder="%" />
                        </div>
                        <div class="col-6">
                            <label for="current-time" class="form-label">Publish Ride Hours After Current Time</label>
                            <input type="text" class="form-control" id="current-time" placeholder="%%" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="taxi mb-3">
            <h4 class="mb-2">Setting Form Taxi</h4>
            <div class="container">
                <div class="col-12">
                    <div class="row mb-1">
                        <div class="col-6">
                            <label for="taxi-tax" class="form-label">Tax</label>
                            <input type="text" class="form-control" id="taxi-tax" placeholder="Tax %" />
                        </div>
                        <div class="col-6">
                            <label for="taxi-admin-commission" class="form-label">Admin Commission</label>
                            <input type="text" class="form-control" id="taxi-admin-commission" placeholder="%%" />
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-6">
                            <label for="taxi-charge-passenger" class="form-label">Cancellation Charge Passenger %</label>
                            <input type="text" class="form-control" id="taxi-charge-passenger" placeholder="%" />
                        </div>
                        <div class="col-6">
                            <label for="taxi-charge-driver" class="form-label">Cancellation Charge Driver %</label>
                            <input type="text" class="form-control" id="taxi-charge-driver" placeholder="%%" />
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-6">
                            <label for="distance-unit" class="form-label">Distance Unit</label>
                            <input type="text" class="form-control" id="distance-unit" placeholder="KM" />
                        </div>
                        <div class="col-6">
                            <label for="acceptence-timeout" class="form-label">Driver Acceptence Timeout </label>
                            <input type="text" class="form-control" id="acceptence-timeout" placeholder="%%" />
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-6">
                            <label for="waiting-timeout" class="form-label">Waiting Time Out</label>
                            <input type="text" class="form-control" id="waiting-timeout" placeholder="KM" />
                        </div>
                        <div class="col-6">
                            <label for="search-radius" class="form-label">Provider Search Radius</label>
                            <input type="text" class="form-control" id="search-radius" placeholder="%%" />
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-6">
                            <label for="emergency-number" class="form-label">Emergency Number</label>
                            <input type="text" class="form-control" id="emergency-number" placeholder="KM" />
                        </div>
                        <div class="col-6">
                            <label for="cancel-min" class="form-label">Ride Cancellation Minute(Second)</label>
                            <input type="text" class="form-control" id="cancel-min" placeholder="%%" />
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-6">
                            <label for="emergency-number" class="form-label">Emergency Number</label>
                            <input type="text" class="form-control" id="emergency-number" placeholder="KM" />
                        </div>
                        <div class="col-6">
                            <label for="cancel-min" class="form-label">Ride Cancellation Minute(Second)</label>
                            <input type="text" class="form-control" id="cancel-min" placeholder="%%" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="carpool mb-3">
            <h4 class="mb-2">Setting Form Marketplace</h4>
            <div class="container">
                <div class="col-12">
                    <div class="row mb-1">
                        <div class="col-6">
                            <label for="market-tax" class="form-label">Tax</label>
                            <input type="text" class="form-control" id="market-tax" placeholder="Tax %" />
                        </div>
                        <div class="col-6">
                            <label for="market-admin-commission" class="form-label">Admin Commission</label>
                            <input type="text" class="form-control" id="market-admin-commission" placeholder="%%" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 mt-2 pt-50 d-flex justify-content-end">
            <button type="button" class="btn btn-primary me-1">Submit</button>
            <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">
              Discard
            </button>
        </div>
    </div>
</div>
