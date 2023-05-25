<!-- Modal to add new record -->
<div class="modal modal-slide-in fade" id="user">
    <div class="modal-dialog sidebar-sm">
        <form class="add-new-record modal-content pt-0" id="editUser">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
            <div class="modal-header mb-1">
                <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
            </div>
            <div class="modal-body flex-grow-1">
                <div class="mb-1">
                    <label class="form-label" for="icon">Photo</label>
                    <input type="file" class="form-control" id="icon" name="icon" data-msg="Please select photo" />
                </div>
                <div class="mb-1">
                    <label class="form-label" for="firstname">First Name</label>
                    <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First name" data-msg="Please enter first name" />
                </div>
                <div class="mb-1">
                    <label class="form-label" for="lastname">Last Name</label>
                    <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last name" data-msg="Please enter last name" />
                </div>
                <div class="mb-1">
                    <label class="form-label" for="gender">Gender</label>
                    <select class="form-select" name="gender" id="gender">
                        <option value=""></option>
                        <option value="0">Male</option>
                        <option value="1">Female</option>
                    </select>
                </div>
                <div class="mb-1">
                    <label class="form-label" for="birthday">Birthday</label>
                    <input type="date" class="form-control flatpickr-basic" id="birthday" name="birthday" placeholder="Birthday" data-msg="Please select birthday" />
                </div>
                <div class="mb-1">
                    <label class="form-label" for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Email" data-msg="Please enter email" />
                </div>
                <div class="mb-1">
                    <label class="form-label" for="email-company">Email Company</label>
                    <input type="text" class="form-control" id="email-company" name="email-company" placeholder="Email Company" data-msg="Please enter email company" />
                </div>
                <div class="mb-1">
                    <label class="form-label" for="mobile">Mobile</label>
                    <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Phone Number" data-msg="Please enter mobile" />
                </div>
                <div class="mb-1">
                    <label class="form-label" for="company">Company</label>
                    <select name="company" id="company" class="form-select">
                        <option value="">= Select Company =</option>
                        @foreach ($companies as $p)
                            <option value="{{$p->id}}">{{$p->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-1">
                    <label for="country" class="form-label">Country</label>
                    <select name="country" id="country" class="form-select">
                        <option value="">= Select Country =</option>
                        @foreach ($countries as $p)
                            <option value="{{$p->id}}">{{$p->country}}</option>
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
                <button type="submit" class="btn btn-primary data-submit me-1">Submit</button>
                <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
        </form>
    </div>
</div>
