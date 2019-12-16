@extends('layout_admin.main')

@section('page_title')
{{--{{$page_title}}--}}
    Order
@endsection

@section('css')
    <link href="{{asset('assets/css_admin/page/auction.css')}}" rel="stylesheet">
@endsection

@section('page_content')
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card card-stats">
                                <div class="card-body table-responsive">
                                    <div class="col-lg-3 col-md-12 col-sm-12 mg-b-10" id="filter_search">
                                        <div class="input-group">
                                            <input autocomplete="off" type="text" class="form-control" id="filter_text" placeholder="Search..." aria-label="Filter..." aria-describedby="basic-addon2">
                                            <span class="input-group-btn">
                                                <button class="btn btn-white btn-round btn-just-icon" id="filter_text_btn" type="button"><i class="fa fa-search"></i></button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card card-stats">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table" id="order_table">
                                            <thead class="text-primary">
                                            <tr>
                                                <th>
                                                    ID
                                                </th>
                                                <th>
                                                    Name
                                                </th>
                                                <th>
                                                    Country
                                                </th>
                                                <th>
                                                    City
                                                </th>
                                                <th>
                                                    Salary
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>
                                                    1
                                                </td>
                                                <td>
                                                    Dakota Rice
                                                </td>
                                                <td>
                                                    Niger
                                                </td>
                                                <td>
                                                    Oud-Turnhout
                                                </td>
                                                <td class="text-primary">
                                                    $36,738
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    2
                                                </td>
                                                <td>
                                                    Minerva Hooper
                                                </td>
                                                <td>
                                                    Curaçao
                                                </td>
                                                <td>
                                                    Sinaai-Waas
                                                </td>
                                                <td class="text-primary">
                                                    $23,789
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    3
                                                </td>
                                                <td>
                                                    Sage Rodriguez
                                                </td>
                                                <td>
                                                    Netherlands
                                                </td>
                                                <td>
                                                    Baileux
                                                </td>
                                                <td class="text-primary">
                                                    $56,142
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
@endsection

@section('js')
    <script src="{{asset('assets/js_admin/page/auction.js')}}"></script>
@endsection
