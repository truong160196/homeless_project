<div class="modal fade modal_user_create" id="modal_user_create" tabindex="-1" role="dialog">
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
                                    <span class="tx-danger">*</span></label>
                                </label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">
                                    Password
                                    <span class="tx-danger">*</span></label>
                                </label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Email address</label>
                                <input type="email" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row margin-top-10">
                        <div class="col-md-6">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Full Name</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">birthday</label>
                                <input type="text" id="birthday" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row margin-top-10">
                        <div class="col-md-12">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Adress</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row margin-top-10">
                        <div class="col-md-4">
                            <div class="form-group bmd-form-group">
                                <select class="form-control">
                                    <option value="">Select role</option>
                                    <option>User</option>
                                    <option>System Admin</option>
                                    <option>Homeless</option>
                                    <option>Store</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group bmd-form-group">
                                <select class="form-control">
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
                                <select class="form-control">
                                    <option value="">Select Type Wallet</option>
                                    <option value="usd">USD</option>
                                    <option value="eth">ETH</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Create User</button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
</div>