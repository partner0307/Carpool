<!-- Edit User Modal -->
<div class="modal fade" id="promo-code" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-promocode">
      <div class="modal-content">
        <div class="modal-header bg-transparent">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body pb-5 px-sm-5 pt-50">
          <div class="text-center mb-2">
            <h1 class="mb-1">Promocode</h1>
            <p>Create promotional codes in the system</p>
          </div>
          <form id="editPromocode" class="row gy-1 pt-75">
            <div class="col-12 col-md-6">
              <label class="form-label" for="promocode">Promocode</label>
              <input type="text" class="form-control" id="promocode" name="promocode" placeholder="Promocode" data-msg="Please enter promocode" />
            </div>
            <div class="col-12 col-md-6">
              <label class="form-label" for="usage-limit">Usage Limit/User</label>
              <input type="number" class="form-control" id="usage-limit" name="usage-limit" placeholder="Usage Limit/User" data-msg="Please enter usage limit/user" />
            </div>
            <div class="col-12">
              <label class="form-label" for="description">Promocode Description</label>
              <input type="text" class="form-control" id="description" name="description" placeholder="Promocode Description" data-msg="Please enter promocode description" />
            </div>
            <div class="col-12 col-md-6">
              <label class="form-label" for="order-amount">Min Order Amount</label>
              <input type="number" class="form-control" id="order-amount" name="order-amount" placeholder="Min Order Amount" data-msg="Please enter min order amount" />
            </div>
            <div class="col-12 col-md-6">
              <label class="form-label" for="discount-amount">Max Discount Amount</label>
              <input type="number" class="form-control" id="discount-amount" name="discount-amount" placeholder="Max Discount Amount" data-msg="Please enter max discount amount" />
            </div>
            <div class="col-12 col-md-6">
              <label class="form-label" for="discount">Discount</label>
              <input type="number" class="form-control modal-edit-tax-id" id="discount" name="discount" placeholder="Discount" data-msg="Please enter discount" />
            </div>
            <div class="col-12 col-md-6">
              <label class="form-label" for="expiry">Expiry Date</label>
              <input type="date" class="form-control flatpickr-basic" id="expiry" name="expiry" placeholder="Expiry Date" data-msg="Please select expiry date" />
            </div>
            <div class="col-12 col-md-6">
              <label class="form-label" for="discount-type">Discount Type</label>
              <select class="select2 form-select" id="discount-type" name="discount-type" data-msg="Please select discount type">
                <option value="Percentage">Percentage</option>
              </select>
            </div>
            <div class="col-12 col-md-6">
              <label class="form-label" for="usertype">User Type</label>
              <select class="select2 form-select" id="usertype" name="usertype" data-msg="Please select user type">
                <option value="Google">Google</option>
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
  <!--/ Edit User Modal -->
