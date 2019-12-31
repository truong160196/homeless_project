<div class="modal fade modal_category_edit" id="modal_category_edit" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6>Edit Category</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_edit_category">
                <input
                        type="hidden"
                        class="form-control"
                        id="id_edit"
                        name="id_edit"
                    />
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating ">
                                    Category Name
                                    <span class="tx-danger">*</span>

                                </label>

                                <input
                                    type="text"
                                    class="form-control"
                                    id="category_name_edit"
                                    name="category_name_edit"
                                    required
                                    data-parsley-required-message="Category name is required."
                                />
                            </div>
                        </div>

                    </div>
                    <div class="row margin-top-10">
                        <div class="col-md-12">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Detail Category</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="category_detail_edit"
                                    name="category_detail_edit"
                                />
                            </div>
                        </div>
                    </div>
                    <div class="row margin-top-10">
                        <div class="col-md-12">
                            <div class="form-group bmd-form-group">
                                <button type="button" id="btn_update_category" class="btn btn-primary pull-right">Edit Category</button>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
    </div>