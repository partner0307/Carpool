<div class="modal fade text-start" id="bank-modal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-transparent">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-5 px-sm-5 pt-50">
                <div class="text-center mb-2">
                    <h4 class="modal-title text-center mb-4">Edit Supported Bank</h4>
                </div>
                <form id="editBank" class="row gy-1 pt-75">
                    <div class="col-12">
                        <label class="form-label" for="bank-name">Name: </label>
                        <input type="text" class="form-control" id="bank-name" name="bank-name" placeholder="Bank Name" data-msg="Please enter bank name" />
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="bank-country">Country</label>
                        <select class="select2 form-select" id="bank-country" name="bank-country" data-msg="Please select country">
                            <option value=""></option>
                            <option value="1">Panama</option>
                            <option value="2">United State</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <div class="d-flex align-items-center mt-1">
                          <div class="form-check form-switch form-check-primary">
                            <input type="checkbox" class="form-check-input" id="bank-status" value="" />
                            <label class="form-check-label" for="bank-status">
                              <span class="switch-icon-left"><i data-feather="check"></i></span>
                              <span class="switch-icon-right"><i data-feather="x"></i></span>
                            </label>
                          </div>
                          <label class="form-check-label fw-bolder" for="bank-status">Active</label>
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
