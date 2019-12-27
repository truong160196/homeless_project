<div class="modal fade modal_order_view" id="modal_order_view" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6>View Detail</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_create_user">
                    <div class="row margin-top-10">                   
                        <div class="col-md-4">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Order ID</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="id_order"
                                    name="id_order"
                                >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Order Total</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="order_total"
                                    name="order_total"
                                >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Order Tax</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="order_tax"
                                    name="order_tax"
                                >
                            </div>
                        </div> 
                    </div>                   
                    <div class="row margin-top-10">
                        <div class="col-md-12">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Hash</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="order_hash"
                                    name="order_hash"
                                >
                            </div>
                        </div>                      
                    </div>
                    <div class="row margin-top-10">
                        <div class="col-md-12">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Status</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="order_status"
                                    name="order_status"
                                >
                            </div>
                        </div>                      
                    </div>
                    <div class="row margin-top-10">
                        <div class="col-md-12">                           
                            <div class="form-group bmd-form-group">
                                <ul style="list-style-type:none;" class="text-left">
                                    <table width="100%" cellpadding="0" cellspacing="0">
                                        <tr>
                                            <th>Product Name</th>
                                            <th>Quantity</th> 
                                            <th>Price</th>
                                        </tr>
                                        <tr>
                                            <td><li id="product_name"></li></td>
                                            <td><li id="product_quantity"></li></td>
                                            <td><li id="product_price"></li></td>
                                        </tr>
                                    </table>
                                </ul>
                            </div> 
                        </div>                      
                    </div>   
          
                    <div class="clearfix"></div>
                </form>
            </div>

            
        </div>
    </div>
</div>