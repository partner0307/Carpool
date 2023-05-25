<!-- Edit User Modal -->
<div class="modal fade" id="payout" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-transparent">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-5 px-sm-5 pt-50">
                <div class="text-center mb-2">
                    <h1 class="mb-1">Payout</h1>
                    <p>Edit Payout information.</p>
                </div>
                <form id="editPayout" class="row gy-1 pt-75">
                    <div class="col-12">
                        <label class="form-label" for="amount">Amount</label>
                        <input type="text" class="form-control" id="amount" name="amount" placeholder="Amount" data-msg="Please enter amount" />
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="charge">Charge</label>
                        <input type="text" class="form-control" id="charge" name="charge" placeholder="Charge" data-msg="Please enter charge" />
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
                            <label class="form-check-label fw-bolder" for="country-status">Pay status</label>
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
