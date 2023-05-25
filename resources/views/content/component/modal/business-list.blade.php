<!-- Edit User Modal -->
<div class="modal fade" id="business-list" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-transparent">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-5 px-sm-5 pt-50">
                <div class="text-center mb-2">
                    <h1 class="mb-1">Business List</h1>
                    <p>Add new list for your cars.</p>
                </div>
                <form id="editBusiness" class="row gy-1 pt-75">
                    <div class="col-12">
                        <div class="d-flex align-items-center flex-column">
                            <img src="{{asset('images/temp/sample.png')}}" id="icon-upload-img" class="rounded me-50" alt="profile image" height="100" width="100" />
                            <!-- upload and reset button -->
                            <div class="d-flex mt-2">
                                <div>
                                    <label for="icon" class="btn btn-sm btn-primary mb-75 me-75">Upload</label>
                                    <input type="file" id="icon" name="icon" hidden accept="image/*" />
                                    <button type="button" id="icon-reset" class="btn btn-sm btn-outline-secondary mb-75">Reset</button>
                                </div>
                            </div>
                            <!--/ upload and reset button -->
                        </div>
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" data-msg="Please enter category name" />
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" data-msg="Please enter email" />
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Address" data-msg="Please enter address" />
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
                        <button type="submit" class="btn btn-primary me-1" id="btn-submit">Submit</button>
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
