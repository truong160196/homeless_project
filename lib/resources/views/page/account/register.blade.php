@extends('layout_admin.mainLogin')

@section('page_title')
{{--{{$page_title}}--}}
    Dashboard
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('assets/css_admin/login.css')}}">
@endsection

@section('page_content')
    <div class="limiter">
        <div class="container-login100" style="background-image: url({{asset('assets/images/bg-01.jpg')}})">
            <div class="wrap-login100">
                <form
                    class="login100-form validate-form"
                    id="form_register"
                    autocomplete="off"
                >
                <span class="login100-form-logo">
                    <i class="zmdi zmdi-landscape"></i>
                </span>

                    <span class="login100-form-title p-b-34 p-t-27">
                    Register
                </span>
                    <div class="login-body">
                        <div class="wrap-input100 validate-input" data-validate = "Enter username">
                            <input
                                    class="form-control input100"
                                    type="text"
                                    id="username"
                                    name="username"
                                    placeholder="Username"
                                    autocomplete="off"
                                    data-parsley-validation-threshold="1"
                                    data-parsley-trigger="keyup"
                                    maxlength="255"
                                    required
                                    data-parsley-required-message="Username is required."
                                    data-parsley-minlength="3"
                                    data-parsley-maxlength="16"
                            >
                            <span class="focus-input100">
                            <i class="fas fa-user"></i>
                        </span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate="Enter password">
                            <input
                                    class="form-control input100"
                                    type="password"
                                    id="password"
                                    name="password"
                                    placeholder="Password"
                                    autocomplete="new-password"
                                    data-parsley-validation-threshold="1"
                                    data-parsley-trigger="keyup"
                                    maxlength="255"
                                    required
                                    data-parsley-required-message="Password is required."
                                    data-parsley-minlength="6"
                                    data-parsley-maxlength="32"
                            >
                            <span class="focus-input100">
                            <i class="fas fa-unlock-alt"></i>
                        </span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate="Enter password">
                            <input
                                class="form-control input100"
                                type="password"
                                id="confirm_password"
                                name="confirm_password"
                                placeholder="Confirm Password"
                                autocomplete="off"
                                data-parsley-validation-threshold="1"
                                data-parsley-trigger="keyup"
                                maxlength="255"
                                required
                                data-parsley-required-message="Confirm password is required."
                                data-parsley-equalto="#password"
                                data-parsley-equalto-message="Password not match"
                                data-parsley-minlength="6"
                            >
                            <span class="focus-input100">
                            <i class="fas fa-unlock-alt"></i>
                        </span>
                        </div>
                    </div>
                </form>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn" id="btn_register">
                        Register
                    </button>
                </div>

                <div class="text-center p-t-90">
                    <strong class="text-strong">Already Login?</strong>
                    <a class="txt1" href="{{route('account.page.login')}}">
                        Login
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div id="dropDownSelect1"></div>
@endsection

@section('js')
    <script src="{{asset('assets/js_admin/login.js')}}"></script>
@endsection
