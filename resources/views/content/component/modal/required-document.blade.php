<div class="modal fade text-start" id="required-document" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-transparent">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-5 px-sm-5 pt-50">
                <div class="text-center mb-2">
                    <h4 class="modal-title text-center mb-4">Edit Required Document</h4>
                </div>
                <form id="editDocument" class="row gy-1 pt-75">
                    <div class="col-12">
                        <label class="form-label" for="name">Document Name: </label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Document Name" data-msg="Please enter document name" />
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="type">Type</label>
                        <select class="select2 form-select" id="type" name="type" data-msg="Please select type">
                            <option value="1">Driver</option>
                            <option value="2">Passenger</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <div class="d-flex align-items-center mt-1">
                          <div class="form-check form-switch form-check-primary">
                            <input type="checkbox" class="form-check-input" id="status" value="" />
                            <label class="form-check-label" for="status">
                              <span class="switch-icon-left"><i data-feather="check"></i></span>
                              <span class="switch-icon-right"><i data-feather="x"></i></span>
                            </label>
                          </div>
                          <label class="form-check-label fw-bolder" for="status">Active</label>
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
