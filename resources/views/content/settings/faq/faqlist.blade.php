<div>
    <div class="card mb-5">
        <div class="card-body p-2">
            <form id="editMessage">
                <h4 class="mb-2">Create Faq</h4>
                <div class="col-4 mb-2">
                    <select class="form-select" name="originTitle" id="originTitle">
                    </select>
                </div>
                <div class="col-10">
                    <label for="message" class="form-label">Message</label>
                    <textarea class="form-control" id="message" name="message" placeholder="Message" data-msg="Please enter message"></textarea>
                </div>
                <div class="col-12 mt-2 pt-50 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary me-1">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <div class="basic-datatable">
        <div class="col-12">
            <div class="card">
                <div class="table-responsive">
                    <table class="faq-list table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Message</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
