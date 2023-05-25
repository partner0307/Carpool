<!-- Edit Subscription Modal -->
<div class="modal fade" id="subscription-modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered modal-edit-car-category">
        <div class="modal-content">
            <div class="modal-header bg-transparent">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-5 px-sm-5 pt-50">
                <div class="text-center mb-2">
                    <h1 class="mb-1">Subscription</h1>
                    <p>Edit your subscription.</p>
                </div>
                <form id="editSub" class="row gy-1 pt-75">
                    <div class="col-12">
                        <div class="d-flex align-items-center flex-column">
                            <img src="{{asset('images/temp/sample.png')}}" id="sub-icon-upload-img" class="rounded me-50" alt="profile image" height="100" width="100" />
                            <!-- upload and reset button -->
                            <div class="d-flex mt-2">
                                <div>
                                    <label for="sub-icon" class="btn btn-sm btn-primary mb-75 me-75">Upload</label>
                                    <input type="file" id="sub-icon" name="sub-icon" hidden accept="image/*" />
                                    <button type="button" id="sub-icon-reset" class="btn btn-sm btn-outline-secondary mb-75">Reset</button>
                                </div>
                            </div>
                            <!--/ upload and reset button -->
                        </div>
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="sub-title">Title</label>
                        <input type="text" class="form-control" id="sub-title" name="sub-title" placeholder="Title" data-msg="Please enter title" />
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="sub-description">Description</label>
                        <input type="text" class="form-control" id="sub-description" name="sub-description" placeholder="Description" data-msg="Please enter description" />
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="sub-cost">Cost</label>
                        <input type="number" class="form-control" id="sub-cost" name="sub-cost" placeholder="Cost" data-msg="Please enter cost" />
                    </div>
                    <div class="col-12">
                        <div class="d-flex align-items-center mt-1">
                            <div class="form-check form-switch form-check-primary">
                            <input type="checkbox" class="form-check-input" id="sub-status" value="" />
                            <label class="form-check-label" for="sub-status">
                                <span class="switch-icon-left"><i data-feather="check"></i></span>
                                <span class="switch-icon-right"><i data-feather="x"></i></span>
                            </label>
                            </div>
                            <label class="form-check-label fw-bolder" for="sub-status">Active</label>
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
<!--/ Edit Subscription Modal -->
