<div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
    <!-- User Card -->
    <div class="card">
      <div class="card-body">
        <div class="user-avatar-section">
          <div class="d-flex align-items-center flex-column">
            <img class="img-fluid rounded mt-3 mb-2" id="card-photo" src="{{asset($user->photo)}}" height="110" width="110" alt="{{$user->firstname . ' ' . $user->lastname}}" />
            <div class="user-info text-center">
              <h4 id="card-title-name">{{$user->firstname . ' ' . $user->lastname}}</h4>
              <span class="badge bg-light-secondary" id="card-role">{{$user->role === 1 ? 'Driver' : 'Passenger'}}</span>
            </div>
          </div>
        </div>
        <div class="d-flex justify-content-around my-2 pt-75">
          <div class="d-flex align-items-start me-2">
            <span class="badge bg-light-primary p-75 rounded">
              <i data-feather="check" class="font-medium-2"></i>
            </span>
            <div class="ms-75">
              <h4 class="mb-0">1.23k</h4>
              <small>Tasks Done</small>
            </div>
          </div>
          <div class="d-flex align-items-start">
            <span class="badge bg-light-primary p-75 rounded">
              <i data-feather="briefcase" class="font-medium-2"></i>
            </span>
            <div class="ms-75">
              <h4 class="mb-0">568</h4>
              <small>Projects Done</small>
            </div>
          </div>
        </div>
        <h4 class="fw-bolder border-bottom pb-50 mb-1">Details</h4>
        <div class="info-container">
          <ul class="list-unstyled">
            <li class="mb-75">
              <span class="fw-bolder me-25">Name:</span>
              <span id="card-name">{{$user->firstname . ' ' . $user->lastname}}</span>
            </li>
            <li class="mb-75">
              <span class="fw-bolder me-25">Email:</span>
              <span id="card-email">{{$user->email}}</span>
            </li>
            <li class="mb-75">
              <span class="fw-bolder me-25">Plan:</span>
              <span class="badge bg-light-success">Driver</span>
            </li>
            <li class="mb-75">
              <span class="fw-bolder me-25">Role:</span>
              <span>User</span>
            </li>
            <li class="mb-75">
              <span class="fw-bolder me-25">Contact:</span>
              <span id="card-phonenumber">{{$user->phonenumber}}</span>
            </li>
            <li class="mb-75">
              <span class="fw-bolder me-25">Email company:</span>
              <span id="card-campany-email">{{$user->company_email}}</span>
            </li>
          </ul>
          <div class="d-flex justify-content-center pt-2">
            <a href="javascript:;" class="btn btn-primary me-1" data-bs-target="#editUser" data-bs-toggle="modal">
              Edit
            </a>
          </div>
        </div>
      </div>
    </div>
    <!-- /User Card -->
    <!-- Wallet Card -->
    <div class="card border-primary">
        <div class="card-body">
            <div class="d-flex justify-content-start align-items-start">
                <span class="badge bg-light-primary">Wallet</span>
            </div>
            <div class="d-flex justify-content-center my-2">
                <sup class="h5 pricing-currency text-primary mt-1 mb-0 me-3">$</sup>
                <span class="fw-bolder display-5 mb-0 text-primary">99</span>
                <sub class="pricing-duration font-small-4 ms-25 mt-auto mb-2">/month</sub>
            </div>
            <div class="d-flex justify-content-center align-items-center">
                <button class="btn btn-primary me-2">Accredit</button>
                <button class="btn btn-outline-primary">Debit</button>
            </div>
        </div>
    </div>
    <!-- /Wallet Card -->
</div>
