@extends('layout_admin.main')

@section('page_title')
    {{--{{$page_title}}--}}
    Auction
@endsection

@section('css')
    <link href="{{asset('assets/css_admin/page/auction.css')}}" rel="stylesheet">
@endsection

@section('page_content')
    <form id="form_create_donate" enctype="multipart/form-data">
        <input type="hidden" id="auction_id" name="donate_id" value="{{$auction->id}}">
        <div class="card">
            <div class="card-header">
                <h3>Auction Information</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating">
                                Title
                                <span class="tx-danger">*</span>
                            </label>
                            <input
                                type="text"
                                class="form-control"
                                id="auction_title"
                                name="auction_title"
                                autocomplete="off"
                                data-parsley-validation-threshold="1"
                                data-parsley-trigger="keyup"
                                required
                                data-parsley-required-message="Username is required."
                                data-parsley-minlength="3"
                                value="{{$auction->auction_title}}" >
                        </div>
                    </div>
                    <div class="col-md-12 margin-top-10">
                        <label>
                            Description
                        </label>
                        <textarea
                            class="form-control"
                            rows="3"
                            id="auction_detail"
                            name="auction_detail"
                        >{{$auction->auction_detail}}</textarea>
                    </div>
                    <div class="col-sm-12 margin-top-10 row" style="margin-top: 15px">
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Start Date</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="start_date"
                                    name="start_date"
                                    value="{{$auction->auction_start_time}}"
                                >
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">End Date</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="end_date"
                                    name="end_date"
                                    value="{{$auction->auction_end_time}}"
                                >
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12  margin-top-10">
                        <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating">
                                Raise
                            </label>
                            <input
                                type="number"
                                id="raised"
                                name="raised"
                                min="0"
                                class="form-control"
                                value="{{$auction->auction_raised}}"
                            />
                        </div>
                    </div>
                    <div class="col-md-12 margin-top-10">
                        <label>
                            Description
                        </label>
                        <div class="description-scroll">
                            <div id="auction_description">
                                {!! $auction->auction_content !!}}
                            </div>
                        </div>
                        <button
                            id="edit_auction"
                            class="btn btn-info"
                            type="button"
                            style="display: block"
                        >
                            Edit Desciption
                        </button>
                        <button
                            id="save_auction"
                            class="btn btn-success"
                            type="button"
                            style="display: none"
                        >
                            Save Content
                        </button>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h3>Product Information</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating">
                                Title
                                <span class="tx-danger">*</span>
                            </label>
                            <input
                                type="text"
                                class="form-control"
                                id="product_title"
                                name="product_title"
                                autocomplete="off"
                                data-parsley-validation-threshold="1"
                                data-parsley-trigger="keyup"
                                required
                                data-parsley-required-message="Username is required."
                                data-parsley-minlength="3"
                                value="{{$auction->product_title}}"
                            >
                        </div>
                    </div>
                    <div class="col-md-12 margin-top-10">
                        <label>
                            Author
                        </label>
                        <input
                            type="text"
                            class="form-control"
                            id="production_author"
                            name="production_author"
                            autocomplete="off"
                            value="{{$auction->production_author}}"
                        >
                    </div>
                    <div class="col-sm-12 margin-top-10">
                        <div class="form-group">
                            <label>
                                Product Image
                            </label>
                        </div>
                        <div class="uploader">
                            <input id="avatar" name="avatar" type="file"  accept="image/*" />
                            <label for="avatar" id="file-drag">
                                <img
                                    id="file-image"
                                    name="file-image"
                                    src="{{asset($auction->product_image)}}"
                                    width="320px"
                                    height="320px"
                                    alt="Preview"
                                    class="hidden">
                                <div id="start">
                                    <i class="fa fa-download" aria-hidden="true"></i>
                                    <div>Chọn một hình 320 x 320</div>
                                    <div id="notimage" class="hidden">Hãy chọn một hình</div>
                                    <span id="file-upload-btn" class="btn btn-primary">Chọn một file</span>
                                </div>
                                <div id="response" class="hidden">
                                    <div id="messages"></div>
                                </div>
                            </label>
                        </div>
                    </div>
                    <div class="col-md-12 margin-top-10">
                        <label>
                            Detail
                        </label>
                        <div class="description-scroll">
                            <div id="product_detail">{{$auction->product_detail}}</div>
                        </div>
                        <button
                            id="edit_product"
                            class="btn btn-info"
                            type="button"
                            style="display: block"
                        >
                            Edit Desciption
                        </button>
                        <button
                            id="save_product"
                            class="btn btn-success"
                            type="button"
                            style="display: none"
                        >
                            Save Content
                        </button>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="card-footer">
                <button type="button" id="btn_create_donate" class="btn btn-primary pull-right">Update Fund</button>
            </div>
        </div>
    </form>

@endsection

@section('js')
    <script src="{{asset('assets/js_admin/page/auction.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js_admin/file-upload.js')}}"></script>
@endsection

