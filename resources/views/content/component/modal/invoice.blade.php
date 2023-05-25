<!-- Edit User Modal -->
<div class="modal fade" id="previewInvoice" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-transparent">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-5 px-sm-5 pt-50">
                <div class="text-center border-bottom mb-2">
                    <h1 class="mb-1">Invoice #<span id="invoice-title-id"></span></h1>
                    <p>Below you will find the invoice information.</p>
                </div>
                <form id="editCategory" class="row gy-1 pt-75">
                    <div class="col-12 col-md-6 mb-2">
                        <h4 class="text-uppercase">Invoice</h4>
                        <small id="invoice-id"></small>
                    </div>
                    <div class="col-12 col-md-6 mb-2">
                        <h4 class="text-uppercase">Date of issue</h4>
                        <small id="invoice-date"></small>
                    </div>
                    <div class="col-12 col-md-6 mb-2">
                        <h4>Driver</h4>
                        <div class="d-flex justify-content-left align-items-center">
                            <div class="avatar-wrapper">
                                <div class="avatar bg-light-danger me-1" id="invoice-user-photo">
                                </div>
                            </div>
                            <div class="d-flex flex-column">
                                <a href="" class="text-truncate text-body">
                                    <span class="fw-folder" id="invoice-user-name"></span>
                                </a>
                                <small class="text-muted" id="invoice-user-email"></small>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 mb-2">
                        <h4>Payment Method</h4>
                        <small id="invoice-payment"></small>
                    </div>
                    <div class="col-12 col-md-6 mb-2">
                        <h4>Pick up</h4>
                        <small id="invoice-pickup"></small>
                    </div>
                    <div class="col-12 col-md-6 mb-2">
                        <h4>Arrival</h4>
                        <small id="invoice-arrival"></small>
                    </div>
                    <div class="col-12">
                        <h4 class="font-weight-bolder">Information</h4>
                    </div>
                    <h4 class="col-12 col-md-6 text-uppercase">Article</h4>
                    <h4 class="col-12 col-md-6 text-center text-uppercase">Amount</h4>
                    <div class="row pt-50 border-top">
                        <small class="col-12 col-md-6" id="invoice-trip-type"></small>
                        <small class="col-12 col-md-6 text-center" id="invoice-amount"></small>
                    </div>
                    <div class="row pt-50 border-top">
                        <small class="col-12 col-md-6 offset-6 text-center">Charged: <span id="invoice-total"></span></small>
                    </div>
                </form>
            </div>
        </div>
    </div>
  </div>
<!--/ Edit User Modal -->
