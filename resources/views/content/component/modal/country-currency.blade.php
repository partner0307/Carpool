<!-- Edit User Modal -->
<div class="modal fade" id="country-currency-modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-transparent">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-5 px-sm-5 pt-50">
                <div class="text-center mb-2">
                    <h1 class="mb-1">Country Currency</h1>
                    <p>Add new country and currency information.</p>
                </div>
                <form id="editCountry" class="row gy-1 pt-75">
                    <div class="col-12">
                        <label class="form-label" for="country-name">Country name</label>
                        <input type="text" class="form-control" id="country-name" name="country-name" placeholder="Country Name" data-msg="Please enter country name" />
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="code">Currency code</label>
                        <input type="text" class="form-control" id="code" name="code" placeholder="Currency code (USD | $)" data-msg="Please enter currency code" />
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="rate-to-usd">Rate to usd</label>
                        <input type="number" class="form-control" id="rate-to-usd" name="rate-to-usd" placeholder="Rate to usd" data-msg="Please enter rate" />
                    </div>
                    <div class="col-12">
                        <div class="d-flex align-items-center mt-1">
                            <div class="form-check form-switch form-check-primary">
                            <input type="checkbox" class="form-check-input" id="country-status" value="" />
                            <label class="form-check-label" for="country-status">
                                <span class="switch-icon-left"><i data-feather="check"></i></span>
                                <span class="switch-icon-right"><i data-feather="x"></i></span>
                            </label>
                            </div>
                            <label class="form-check-label fw-bolder" for="country-status">Active</label>
                        </div>
                    </div>
                    <div class="col-12 text-center mt-2 pt-50 justify-content-center">
                        <button type="submit" class="add-new btn btn-primary me-1" id="btn-submit">Submit</button>
                        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">
                            Discard
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
  </div>
<!--/ Edit User Modal -->
