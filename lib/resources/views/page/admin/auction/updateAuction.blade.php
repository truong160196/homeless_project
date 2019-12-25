@extends('layout_admin.main')

@section('page_title')
    {{--{{$page_title}}--}}
    Donate
@endsection

@section('css')
    <link href="{{asset('assets/css_admin/page/auction.css')}}" rel="stylesheet">
@endsection

@section('page_content')
    <div class="card">
        <div class="card-body">
            <form id="form_update_donate" enctype="multipart/form-data">
                <input type="hidden" id="donate_id" name="donate_id" value="{{$donate->id}}">
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
                                id="donate_title"
                                name="donate_title"
                                autocomplete="off"
                                data-parsley-validation-threshold="1"
                                data-parsley-trigger="keyup"
                                required
                                data-parsley-required-message="Username is required."
                                data-parsley-minlength="3"
                                value="{{$donate->donate_title}}"
                            >
                        </div>
                    </div>
                    <div class="col-sm-12 margin-top-10 row">
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Start Date</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="start_date"
                                    name="start_date"
                                    value="{{$donate->donate_start_time}}"
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
                                    value="{{$donate->donate_end_time}}"
                                >
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12  margin-top-10">
                        <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating">
                                Goal
                            </label>
                            <input
                                type="number"
                                id="goal"
                                name="goal"
                                min="0"
                                class="form-control"
                                value="{{$donate->donate_goal}}"
                            />
                        </div>
                    </div>
                    <div class="col-sm-12 margin-top-10">
                        <div class="form-group">
                            <label>
                                Image
                            </label>
                        </div>
                        <div class="uploader">
                            <input id="avatar" name="avatar" type="file"  accept="image/*" />
                            <label for="avatar" id="file-drag">
                                <img
                                    id="file-image"
                                    name="file-image"
                                    src="{{asset($donate->donate_image)}}"
                                    width="320px"
                                    height="320px"
                                    alt="Preview"
                                    class="block"
                                >
                                <div id="start" class="hidden">
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
                            Description
                        </label>
                        <div class="description-scroll">
                            <div id="summernote">
                                {!! $donate->donate_detail !!}
                            </div>
                        </div>
                        <button
                            id="edit"
                            class="btn btn-info"
                            type="button"
                            style="display: block"
                        >
                            Edit Desciption
                        </button>
                        <button
                            id="save"
                            class="btn btn-success"
                            type="button"
                            style="display: none"
                        >
                            Save Conent
                        </button>
                    </div>
                </div>
                <div class="clearfix"></div>
            </form>
        </div>
        <div class="card-footer">
            <button type="button" id="btn_update_donate" class="btn btn-primary pull-right">Update Fund</button>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{asset('assets/js_admin/page/auction.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js_admin/file-upload.js')}}"></script>
@endsection

