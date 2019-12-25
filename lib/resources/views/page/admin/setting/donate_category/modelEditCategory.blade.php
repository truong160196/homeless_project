<div class="modal fade modal_category_edit" id="modal_category_edit" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6>Create New Category</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_edit_category">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">
                                    Category Name
                                    <span class="tx-danger">*</span>

                                </label>

                                <input
                                    type="text"
                                    class="form-control"
                                    id="category_name"
                                    name="category_name"
                                    required
                                    data-parsley-required-message="Category name is required."
                                >
                            </div>
                        </div>

                    </div>
                    <div class="row margin-top-10">
                        <div class="col-md-5">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Detail Category</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="category_detail"
                                    name="category_detail"
                                >
                            </div>
                        </div>
                     
                    </div>
                   
                    <button type="button" id="btn_submit_category" class="btn btn-primary pull-right">Edit Category</button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
</div>
