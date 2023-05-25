<!-- Change Password -->
<div class="card">
    <h4 class="card-header">Change Password</h4>
    <div class="card-body">
        <form id="editPassword">
            <div class="alert alert-warning mb-2" role="alert">
                <h6 class="alert-heading">Ensure that these requirements are met</h6>
                <div class="alert-body fw-normal">Minimum 8 characters long, uppercase & symbol</div>
            </div>

            <div class="row">
                <div class="mb-2 col-md-6 form-password-toggle">
                    <label class="form-label" for="newPassword">New Password</label>
                    <div class="input-group input-group-merge form-password-toggle">
                        <input class="form-control" type="password" id="newPassword" name="newPassword" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                        <span class="input-group-text cursor-pointer">
                            <i data-feather="eye"></i>
                        </span>
                    </div>
                </div>

                <div class="mb-2 col-md-6 form-password-toggle">
                    <label class="form-label" for="confirmPassword">Confirm New Password</label>
                    <div class="input-group input-group-merge">
                        <input class="form-control" type="password" name="confirmPassword" id="confirmPassword" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                        <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                    </div>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary me-2">Change Password</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!--/ Change Password -->
