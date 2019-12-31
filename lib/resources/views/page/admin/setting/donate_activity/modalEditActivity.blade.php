<div class="modal fade modal_activity_edit" id="modal_activity_edit" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6>Edit Activity</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_edit_activity">
                <input
                        type="hidden"
                        class="form-control"
                        id="id_edit_activity"
                        name="id_edit_activity"
                    />
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating ">
                                    Activity Name
                                    <span class="tx-danger">*</span>

                                </label>

                                <input
                                    type="text"
                                    class="form-control"
                                    id="activity_name_edit"
                                    name="activity_name_edit"
                                    required
                                    data-parsley-required-message="Activity name is required."
                                />
                            </div>
                        </div>

                    </div>
                    <div class="row margin-top-10">
                        <div class="col-md-5">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Detail Activity</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="activity_detail_edit"
                                    name="activity_detail_edit"
                                />
                            </div>
                        </div>
                     
                    </div>
                   
                    <button type="button" id="btn_update_activity" class="btn btn-primary pull-right">Edit Activity</button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
    </div>