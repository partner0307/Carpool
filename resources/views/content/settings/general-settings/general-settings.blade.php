<div class="card">
    <div class="card-body p-3">
        <div class="form form-vertical">
            <div class="col-6">
                <div class="mb-1">
                    <label for="title" class="form-label">Title Site</label>
                    <input type="text" class="form-control" id="title" placeholder="Title site">
                </div>
                <div class="mb-1">
                    <label for="logo" class="form-label">Site Logo</label>
                    <input type="text" class="form-control" id="logo" placeholder="Site logo">
                </div>
            </div>
            <div class="col-8">
                <div class="mb-1 row">
                    <div class="col-4"><label for="currency" class="form-label">Default Currency</label></div>
                    <div class="col-4">
                        <select class="form-control" id="currency">
                            <option value="">USD</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="mb-1 row">
                    <div class="col-4"><label for="payment" class="form-label">Trip Default Payment Method</label></div>
                    <div class="col-4">
                        <select class="form-control" id="payment">
                            <option value="">CASH</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="mb-1 row">
                    <div class="col-4"><label for="language" class="form-label">Default Language</label></div>
                    <div class="col-4">
                        <select class="form-control" id="language">
                            <option value="">English</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="mb-1 row">
                    <div class="col-4"><label for="countrycode" class="form-label">Country Code</label></div>
                    <div class="col-4">
                        <select class="form-control" id="countrycode">
                            <option value="">Panama</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="row mb-1">
                    <div class="col-6">
                        <label for="userDiscountType" class="form-label">User Discount Type</label>
                        <input type="text" class="form-control" id="userDiscountType" placeholder="%" />
                    </div>
                    <div class="col-6">
                        <label for="userDiscountAmount" class="form-label">User Discount Amount</label>
                        <input type="text" class="form-control" id="userDiscountAmount" placeholder="%%" />
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="row mb-1">
                    <div class="col-6">
                        <label for="referDiscountType" class="form-label">User Discount Type</label>
                        <input type="text" class="form-control" id="referDiscountType" placeholder="%" />
                    </div>
                    <div class="col-6">
                        <label for="referDiscountAmount" class="form-label">User Discount Amount</label>
                        <input type="text" class="form-control" id="referDiscountAmount" placeholder="%%" />
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="row mb-1">
                    <div class="d-flex justify-content-between">
                        <label class="form-check-label mb-50" for="facebook">Facebook Login</label>
                        <div class="form-check form-switch form-check-primary">
                            <input type="checkbox" class="form-check-input" id="facebook" checked />
                            <label class="form-check-label" for="facebook">
                                <span class="switch-icon-left"><i data-feather="check"></i></span>
                                <span class="switch-icon-right"><i data-feather="x"></i></span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row mb-1">
                    <div class="d-flex justify-content-between">
                        <label class="form-check-label mb-50" for="google">Google Login</label>
                        <div class="form-check form-switch form-check-primary">
                            <input type="checkbox" class="form-check-input" id="google" checked />
                            <label class="form-check-label" for="google">
                                <span class="switch-icon-left"><i data-feather="check"></i></span>
                                <span class="switch-icon-right"><i data-feather="x"></i></span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row mb-1">
                    <label for="otp-verify" class="form-label"></label>
                    <div class="d-flex justify-content-between">
                        <label class="form-check-label mb-50" for="otp-verify">Otp Verification</label>
                        <div class="form-check form-switch form-check-primary">
                            <input type="checkbox" class="form-check-input" id="otp-verify" checked />
                            <label class="form-check-label" for="otp-verify">
                                <span class="switch-icon-left"><i data-feather="check"></i></span>
                                <span class="switch-icon-right"><i data-feather="x"></i></span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row mb-1">
                    <div class="d-flex justify-content-between">
                        <label class="form-check-label mb-50" for="covid">Covid Feature</label>
                        <div class="form-check form-switch form-check-primary">
                            <input type="checkbox" class="form-check-input" id="covid" checked />
                            <label class="form-check-label" for="covid">
                                <span class="switch-icon-left"><i data-feather="check"></i></span>
                                <span class="switch-icon-right"><i data-feather="x"></i></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="row align-items-end mb-1">
                    <div class="col-6">
                        <label for="mapFirebaseKey" class="form-label">Google Map & Firebase Key</label>
                        <input type="text" class="form-control" id="mapFirebaseKey" placeholder="Google Map Key" />
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control" placeholder="FCM Server Key" />
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="row align-items-end mb-1">
                    <div class="col-6">
                        <label for="twilo" class="form-label">Twilo Keys</label>
                        <input type="text" class="form-control" id="twilo" placeholder="Twilo Server Key" />
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control" placeholder="Twilo Verify Service" />
                    </div>
                </div>
                <div class="row align-items-end mb-1">
                    <div class="col-6">
                        <input type="text" class="form-control" placeholder="Twilo Auth Token" />
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control" placeholder="Twilo Contact Number" />
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="row align-items-end mb-1">
                    <div class="col-6">
                        <label for="firebase" class="form-label">Firebase</label>
                        <input type="text" class="form-control" id="firebase" placeholder="FCM Server Key" />
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control" placeholder="FCM Sender Id" />
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
</div>
