{{--@extends('layouts.app')--}}
@extends('admin.auth.index')

@section('content')
    <div class="w-lg-600px bg-white rounded shadow-sm p-10 p-lg-15 mx-auto">
        <!--begin::Form-->
        <form class="form w-100" novalidate="novalidate" id="kt_sign_up_form" method="POST" action="{{ route('register') }}">
            @csrf
            <!--begin::Heading-->
            <div class="mb-10 text-center">
                <!--begin::Title-->
                <h1 class="text-dark mb-3">Create an Account</h1>
                <!--end::Title-->
                <!--begin::Link-->
                <div class="text-gray-400 fw-bold fs-4">Already have an account?
                    <a href="{{ route('login') }}" class="link-primary fw-bolder">Sign in here</a></div>
                <!--end::Link-->
            </div>
            <!--end::Heading-->
            <!--begin::Action-->
{{--            <button type="button" class="btn btn-light-primary fw-bolder w-100 mb-10">--}}
{{--                <img alt="Logo" src="{{ asset('assets/media/svg/brand-logos/google-icon.svg') }}" class="h-20px me-3" />Sign in with Google</button>--}}
            <!--end::Action-->
            <!--begin::Separator-->
            <div class="d-flex align-items-center mb-10">
                <div class="border-bottom border-gray-300 mw-50 w-100"></div>
                <span class="fw-bold text-gray-400 fs-7 mx-2">OR</span>
                <div class="border-bottom border-gray-300 mw-50 w-100"></div>
            </div>
            <!--end::Separator-->
            <!--begin::Input group-->
                <div class="fv-row mb-7">
                    <label class="form-label fw-bolder text-dark fs-6">Name</label>
                    <input class="form-control form-control-lg form-control-solid @error('name') is-invalid @enderror" type="text" placeholder="Enter your name" name="name" autocomplete="off"
                           value="{{ old('name') }}"  required/>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
{{--            <div class="row fv-row mb-7">--}}
                <!--begin::Col-->
{{--                <div class="col-xl-6">--}}
{{--                    <label class="form-label fw-bolder text-dark fs-6">First Name</label>--}}
{{--                    <input class="form-control form-control-lg form-control-solid" type="text" placeholder="" name="name" autocomplete="off" />--}}
{{--                </div>--}}
                <!--end::Col-->
                <!--begin::Col-->
{{--                <div class="col-xl-6">--}}
{{--                    <label class="form-label fw-bolder text-dark fs-6">Last Name</label>--}}
{{--                    <input class="form-control form-control-lg form-control-solid" type="text" placeholder="" name="last-name" autocomplete="off" />--}}
{{--                </div>--}}
                <!--end::Col-->
{{--            </div>--}}
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="fv-row mb-7">
                <label class="form-label fw-bolder text-dark fs-6">Email</label>
                <input class="form-control form-control-lg form-control-solid @error('email') is-invalid @enderror" value="{{ old('email') }}" type="email" placeholder="Enter your email" name="email" autocomplete="off" />
                @error('email')
                <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="mb-10 fv-row" data-kt-password-meter="true">
                <!--begin::Wrapper-->
                <div class="mb-1">
                    <!--begin::Label-->
                    <label class="form-label fw-bolder text-dark fs-6">Password</label>
                    <!--end::Label-->
                    <!--begin::Input wrapper-->
                    <div class="position-relative mb-3">
                        <input class="form-control form-control-lg form-control-solid @error('password') is-invalid @enderror" type="password" placeholder="" name="password" autocomplete="off" />
                        <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                            <i class="bi bi-eye-slash fs-2"></i>
                            <i class="bi bi-eye fs-2 d-none"></i>
                        </span>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <!--end::Input wrapper-->
                    <!--begin::Meter-->
                    <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                    </div>
                    <!--end::Meter-->
                </div>
                <!--end::Wrapper-->
                <!--begin::Hint-->
                <div class="text-muted">Use 8 or more characters with a mix of letters, numbers &amp; symbols.</div>
                <!--end::Hint-->
            </div>
            <!--end::Input group=-->
            <!--begin::Input group-->
            <div class="fv-row mb-5">
                <label class="form-label fw-bolder text-dark fs-6">Confirm Password</label>
                <input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="password_confirmation" autocomplete="off" />
            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
{{--            <div class="fv-row mb-10">--}}
{{--                <label class="form-check form-check-custom form-check-solid form-check-inline">--}}
{{--                    <input class="form-check-input" type="checkbox" name="toc" value="1" />--}}
{{--                    <span class="form-check-label fw-bold text-gray-700 fs-6">I Agree--}}
{{--									<a href="#" class="ms-1 link-primary">Terms and conditions</a>.</span>--}}
{{--                </label>--}}
{{--            </div>--}}
            <!--end::Input group-->
            <!--begin::Actions-->
            <div class="text-center">
                <button type="submit" id="kt_sign_up_submit" class="btn btn-lg btn-primary">
                    <span class="indicator-label">Submit</span>
                    <span class="indicator-progress">Please wait...
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                </button>
            </div>
            <!--end::Actions-->
        </form>
        <!--end::Form-->
    </div>
{{--<div class="container">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">{{ __('Register') }}</div>--}}

{{--                <div class="card-body">--}}
{{--                    <form method="POST" action="{{ route('register') }}">--}}
{{--                        @csrf--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>--}}

{{--                                @error('name')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">--}}

{{--                                @error('email')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">--}}

{{--                                @error('password')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row mb-0">--}}
{{--                            <div class="col-md-6 offset-md-4">--}}
{{--                                <button type="submit" class="btn btn-primary">--}}
{{--                                    {{ __('Register') }}--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
@endsection
