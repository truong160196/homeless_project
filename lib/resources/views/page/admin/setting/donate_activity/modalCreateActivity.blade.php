<div class="modal fade modal_activity_create"  id="modal_activity_create" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6>Create New Activity</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_create_activity">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">
                                    Activity Name
                                    <span class="tx-danger">*</span>

                                </label>

                                <input
                                    type="text"
                                    class="form-control"
                                    id="activity_name"
                                    name="activity_name"
                                    required
                                    data-parsley-required-message="Activity name is required."
                                >
                            </div>
                        </div>

                    </div>
                    <div class="row margin-top-10">
                        <div class="col-md-12">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Detail Activity</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="activity_detail"
                                    name="activity_detail"
                                >
                            </div>
                        </div>
                     
                    </div>
                    <div class="row margin-top-10">
                        <div class="col-md-12">
                            <div class="form-group bmd-form-group">
                                    <button type="button" id="btn_submit_activity" class="btn btn-primary pull-right">Create Activity</button>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
</div>
