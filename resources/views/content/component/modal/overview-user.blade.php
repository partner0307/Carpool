<!-- Edit User Modal -->
<div class="modal fade" id="editUser" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-transparent">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-5 px-sm-5 pt-50">
                <div class="text-center mb-2">
                    <h1 class="mb-1">Edit User Information</h1>
                    <p>Updating user details will receive a privacy audit.</p>
                </div>
                <input type="hidden" id="user_id" value="{{$user->id}}">
                <form id="editProfile" class="row gy-1 pt-75">
                    <div class="col-12">
                        <div class="d-flex align-items-center flex-column">
                            <img src="{{asset($user->photo)}}" id="icon-upload-img" class="rounded me-50" alt="profile image" height="100" width="100" />
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
                        <label class="form-label" for="firstname">First Name</label>
                        <input type="text" class="form-control" id="firstname" value="{{$user->firstname}}" name="firstname" placeholder="First Name" data-msg="Please enter first name" />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="lastname">Last Name</label>
                        <input type="text" class="form-control" id="lastname" value="{{$user->lastname}}" name="lastname" placeholder="Last Name" data-msg="Please enter last name" />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="email">Email</label>
                        <input type="email" class="form-control" id="email" value="{{$user->email}}" name="email" placeholder="Email" data-msg="Please enter email" />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="company-email">Company Email</label>
                        <input type="email" class="form-control" id="company-email" value="{{$user->company_email}}" name="company-email" placeholder="Company Email" data-msg="Please enter company email" />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="mobile">Mobile</label>
                        <input type="text" class="form-control" id="mobile" value="{{$user->phonenumber}}" name="mobile" placeholder="Mobile" data-msg="Please enter mobile" />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="gender">Gender</label>
                        <select class="form-select" name="gender" id="gender">
                            <option value=""></option>
                            @if ($user->gender === 0)
                                <option value="0" selected>Male</option>
                                <option value="1">Female</option>
                            @else
                                <option value="0">Male</option>
                                <option value="1" selected>Female</option>
                            @endif
                        </select>
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="country">Country</label>
                        <select class="form-select" name="country" id="country">
                            <option value=""></option>
                            @foreach ($countries as $p)
                                @if ($p->id === $user->country)
                                    <option value="{{$p->id}}" selected>{{$p->country}}</option>
                                @endif
                                <option value="{{$p->id}}">{{$p->country}}</option>
                            @endforeach
                        </select>
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
