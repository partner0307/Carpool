<!-- Modal to add new record -->
<div class="modal modal-slide-in fade" id="admin-user">
    <div class="modal-dialog sidebar-sm">
        <form class="add-new-record modal-content pt-0" id="editAdmin" autocomplete="off">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
            <div class="modal-header mb-1">
                <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
            </div>
            <div class="modal-body flex-grow-1">
                <div class="mb-1">
                    <label class="form-label" for="photo">Photo</label>
                    <input type="file" class="form-control" id="photo" name="photo" data-msg="Please select photo" />
                </div>
                <div class="mb-1">
                    <label class="form-label" for="role">Role</label>
                    <select name="role" id="role" class="form-select" name="role" data-msg="Please select role">
                        <option value=""></option>
                        @foreach ($roles as $p)
                            <option value="{{$p->id}}">{{$p->role}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-1">
                    <label class="form-label" for="firstname">First Name</label>
                    <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First Name" data-msg="Please enter first name" />
                </div>
                <div class="mb-1">
                    <label class="form-label" for="lastname">Last Name</label>
                    <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last Name" data-msg="Please enter last name" />
                </div>
                <div class="mb-1">
                    <label class="form-label" for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Email" data-msg="Please enter email" />
                </div>
                <div class="mb-1">
                    <label class="form-label" for="company">Company</label>
                    <select name="company" id="company" class="form-select">
                        <option value="0">No Company</option>
                        @foreach ($companies as $p)
                            <option value="{{$p->id}}">{{$p->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-1">
                    <label class="form-label" for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" data-msg="Please enter password" />
                </div>
                <div class="mb-4">
                    <label class="form-label" for="confirm">Confirm Password</label>
                    <input type="password" class="form-control" id="confirm" name="confirm" placeholder="Confirm Password" data-msg="Please enter confirm password" />
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

                <button type="submit" class="btn btn-primary data-submit me-1">Submit</button>
                <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
        </form>
    </div>
</div>
