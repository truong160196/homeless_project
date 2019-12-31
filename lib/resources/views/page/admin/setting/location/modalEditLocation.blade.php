<div class="modal fade modal_location_edit" id="modal_location_edit" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6>Edit Location</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_edit_location">
                <input
                        type="hidden"
                        class="form-control"
                        id="id_edit_location"
                        name="id_edit_location"
                    />
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating ">
                                     Location Name
                                    <span class="tx-danger">*</span>

                                </label>

                                <input
                                    type="text"
                                    class="form-control"
                                    id="location_name_edit"
                                    name="location_name_edit"
                                    required
                                    data-parsley-required-message="Location name is required."
                                />
                            </div>
                        </div>

                    </div>
                    <div class="row margin-top-10">
                        <div class="col-md-12">
                            <div class="form-group bmd-form-group">
                                <button type="button" id="btn_update_location" class="btn btn-primary pull-right">Edit Category</button>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
    </div>