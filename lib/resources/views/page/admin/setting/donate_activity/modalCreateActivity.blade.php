<div class="modal fade modal_user_create" id="modal_activity_create" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6>Create New User</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_create_user">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">
                                    Username
                                    <span class="tx-danger">*</span>
                                </label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="username"
                                    name="username"
                                    autocomplete="off"
                                    data-parsley-validation-threshold="1"
                                    data-parsley-trigger="keyup"
                                    maxlength="255"
                                    required
                                    data-parsley-required-message="Username is required."
                                    data-parsley-minlength="3"
                                    data-parsley-maxlength="16"
                                >
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">
                                    Password
                                    <span class="tx-danger">*</span>
                                </label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="password"
                                    name="password"
                                    autocomplete="new-password"
                                    data-parsley-validation-threshold="1"
                                    data-parsley-trigger="keyup"
                                    maxlength="255"
                                    required
                                    data-parsley-required-message="Password is required."
                                    data-parsley-minlength="6"
                                    data-parsley-maxlength="32"
                                >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Email address</label>
                                <input
                                    type="email"
                                    class="form-control"
                                    name="email"
                                    id="email"
                                />
                            </div>
                        </div>
                    </div>
                    <div class="row margin-top-10">
                        <div class="col-md-6">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Full Name</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="full_name"
                                    name="full_name"
                                >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">birthday</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="birthday"
                                    name="birthday"
                                >
                            </div>
                        </div>
                    </div>
                    <div class="row margin-top-10">
                        <div class="col-md-12">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Address</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="address_user"
                                    name="address_user"
                                >
                            </div>
                        </div>
                    </div>
                    <div class="row margin-top-10">
                        <div class="col-md-4">
                            <div class="form-group bmd-form-group">
                                <select
                                    class="form-control"
                                    id="role_id"
                                    name="role_id"
                                >
                                    <option value="">Select role</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group bmd-form-group">
                                <select class="form-control"
                                        id="status"
                                        name="status"
                                >
                                    <option value="">Select Status</option>
                                    <option>Active</option>
                                    <option>Lock</option>
                                    <option>Homeless Pending</option>
                                    <option>Homeless Approve</option>
                                    <option>Homeless Cancel</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group bmd-form-group">
                                <select
                                    class="form-control"
                                    id="token"
                                    name="token"
                                >
                                    <option value="">Select Type Wallet</option>
                                    <option value="usd">USD</option>
                                    <option value="eth">ETH</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <button type="button" id="btn_submit_activity" class="btn btn-primary pull-right">Create Activity</button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
</div>
