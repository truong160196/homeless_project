@extends('layout_admin.main')

@section('page_title')
{{--{{$page_title}}--}}
    Donate
@endsection

@section('css')
    <link href="{{asset('assets/css_admin/page/donate.css')}}" rel="stylesheet">
@endsection

@section('page_content')
     <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div
                    class="button-actions"
                >
                    <a
                        type="button"
                        class="btn btn-success"
                        href="{{route('admin.page.donate.create')}}"
                    >
                     <i class="material-icons">add_box</i> Create Charity Fund
                    </a>
                </div>
                <div class="card card-stats">
                    <div class="card-body">
                        <table class="table" id="donate_table">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Goal</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Category</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
     </div>
@endsection

@section('js')
    <script src="{{asset('assets/js_admin/page/donate.js')}}"></script>
@endsection
