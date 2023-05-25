<!-- Edit User Modal -->
<div class="modal fade" id="payment-settings" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-transparent">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-5 px-sm-5 pt-50">
                <div class="text-center mb-2">
                    <h1 class="mb-1">Payment Settings</h1>
                    <p>Create promotional codes in the system</p>
                </div>
                <form id="editSettings" class="row gy-1 pt-75">
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
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Title" data-msg="Please enter title" />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="type">Type</label>
                        <select class="select2 form-select" id="type" name="type" data-msg="Please select type">
                            <option value="1">Paypal</option>
                            <option value="2">Cash</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="public_key">Public key</label>
                        <input type="text" class="form-control" id="public_key" name="public_key" placeholder="Promocode public key" data-msg="Please enter public key" />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="private_key">Private key</label>
                        <input type="text" class="form-control" id="private_key" name="private_key" placeholder="Private key" data-msg="Please enter private key" />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="salt_key">Salt Key</label>
                        <input type="text" class="form-control" id="salt_key" name="salt_key" placeholder="Salt Key" data-msg="Please enter salt key" />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="merchantId">Merchant ID</label>
                        <input type="text" class="form-control" id="merchantId" name="merchantId" placeholder="Merchant ID" data-msg="Please enter merchant ID" />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="cclw">CCLW</label>
                        <input type="text" class="form-control" id="cclw" name="cclw" placeholder="CCLW" data-msg="Please enter CCLW" />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="api_key">Api Key</label>
                        <input type="text" class="form-control" id="api_key" name="api_key"  placeholder="Api Key" data-msg="Please enter api key" />
                    </div>
                    <div class="col-12 col-sm-6">
                    <div class="d-flex align-items-center mt-1">
                        <div class="form-check form-switch form-check-primary">
                            <input type="checkbox" class="form-check-input" id="status" checked />
                            <label class="form-check-label" for="status">
                                <span class="switch-icon-left"><i data-feather="check"></i></span>
                                <span class="switch-icon-right"><i data-feather="x"></i></span>
                            </label>
                        </div>
                        <label class="form-check-label fw-bolder" for="status">Active</label>
                    </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="d-flex align-items-center mt-1">
                            <div class="form-check form-switch form-check-primary">
                                <input type="checkbox" class="form-check-input" id="driver_plan" checked />
                                <label class="form-check-label" for="driver_plan">
                                    <span class="switch-icon-left"><i data-feather="check"></i></span>
                                    <span class="switch-icon-right"><i data-feather="x"></i></span>
                                </label>
                            </div>
                            <label class="form-check-label fw-bolder" for="driver_plan">Subscription plan driver</label>
                        </div>
                    </div>
                    <div class="col-12 text-center mt-2 pt-50 justify-content-center">
                        <button type="submit" class="btn btn-primary me-1">Submit</button>
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
