<div class="modal fade modal_user_create" id="modal_user_edit" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                Update User
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_edit_user">
                    <input type="hidden" id="id" value="">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">
                                    Username
                                    <span class="tx-danger">*</span>
                                </label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="username"
                                    disabled
                                >
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Email address</label>
                                <input
                                    type="email"
                                    class="form-control"
                                    name="email"
                                    id="email"
                                    placeholder="Enter Email"
                                />
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Full Name</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="full_name"
                                    name="full_name"
                                    placeholder="Enter Full name"
                                >
                            </div>
                        </div>
                        <div class="col-sm-12">
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
                        <div class="col-sm-12">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Address</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="address_user"
                                    name="address_user"
                                    placeholder="Enter Address"
                                >
                            </div>
                        </div>
                    </div>
                    <button type="button" id="btn_edit" class="btn btn-primary pull-right">Update User</button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
</div>
