@extends('user.layouts.app')

@section('content')

    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid " id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container">
            <div class="row">
                <div class="col-xl-8">
                    <!--begin::Post card-->
                    <div class="card">
                        <!--begin::Body-->
                        <div class="card-body p-lg-20 pb-lg-0">
                            <!--begin::Layout-->
                            <div class="d-flex flex-column flex-xl-row">
                                <!--begin::Content-->
                                <div class="flex-lg-row-fluid me-xl-15">
                                    <!--begin::Post content-->
                                    <div class="mb-17">
                                        <!--begin::Wrapper-->
                                        <div class="mb-8">
                                            <!--begin::Info-->
                                            <div class="d-flex flex-wrap mb-6">
                                                <!--begin::Item-->
                                                <div class="me-9 my-1">
                                                    <!--begin::Label-->
                                                    <div class="d-flex flex-stack flex-wrap">
                                                        <!--begin::Item-->
                                                        <div class="d-flex align-items-center pe-2">
                                                            <!--begin::Svg Icon | path: icons/duotone/Layout/Layout-4-blocks.svg-->
                                                            <span class="svg-icon svg-icon-primary svg-icon-2 me-1">
                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                        <rect x="0" y="0" width="24" height="24" />
                                                                        <rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5" />
                                                                        <path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" fill="#000000" opacity="0.3" />
                                                                    </g>
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                            <!--begin::Avatar-->
                                                            <div class="symbol symbol-35px symbol-circle me-3">
                                                                <img alt="" src="{{ "application/storage/app/public/profile_images/" . $user->image }}" />
                                                            </div>
                                                            <!--end::Avatar-->
                                                            <!--begin::Text-->
                                                            <div class="fs-5 fw-bolder">
                                                                <a href="#" class="text-gray-700 text-hover-primary">

                                                                    {{ $user->name }}
                                                                </a>
                                                                <span class="text-muted">on {{ $blog->created_at->format('d F Y') }}</span>
                                                            </div>
                                                            <!--end::Text-->
                                                        </div>
                                                        <!--end::Item-->

                                                    </div>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Item-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Title-->
                                            <a href="#" class="text-dark text-hover-primary fs-2 fw-bolder">{{ $blog->title }}
                                                </a>
                                            <!--end::Title-->
                                            <!--begin::Container-->
                                            <div class="overlay mt-8">
                                                <!--begin::Image-->
                                                <div class="bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-350px" style="background-image:url( {{ "application/storage/app/public/blog_images/". $blog->image }} )"></div>
                                                <!--end::Image-->

                                            </div>
                                            <!--end::Container-->
                                        </div>
                                        <!--end::Wrapper-->
                                        <!--begin::Description-->
                                        <div class="fs-5 fw-bold text-gray-600">
                                            <!--begin::Text-->
                                            <p class="mb-8">{{ $blog->description }}
{{--                                                <button style="border: none"><span class="fw-bolder text-muted fs-5 ps-1">Read More</span></button>--}}
                                            </p>
                                            <!--end::Text-->
                                        </div>
                                        <!--end::Description-->
                                    </div>
                                    <!--end::Post content-->
                                </div>
                                <!--end::Content-->
                            </div>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Post card-->
                </div>
                <div class="col-xl-4 ">
                    <!--begin::Post card-->
                    <div class="card">
                        <!--begin::Body-->
                        <div class="card-body p-lg-20 pb-lg-0">
                            <!--begin::Layout-->
                            <div class="d-flex flex-column flex-xl-row">

                                <!--begin::Sidebar-->
                                <div class="flex-column flex-lg-row-auto w-100 w-xl-300px mb-10">
                                    <!--begin::Search blog-->
                                    <div class="mb-16">
                                        <h4 class="text-black mb-7">Search Blog</h4>
                                        <!--begin::Input group-->
                                        <div class="position-relative">
                                            <!--begin::Svg Icon | path: icons/duotone/General/Search.svg-->
                                            <span class="svg-icon svg-icon-3 svg-icon-gray-500 position-absolute top-50 translate-middle ms-6">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                            <rect x="0" y="0" width="24" height="24" />
                                                                            <path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                                            <path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero" />
                                                                        </g>
                                                                    </svg>
                                                                </span>
                                            <!--end::Svg Icon-->
                                            <input type="text" class="form-control form-control-solid ps-10" name="search" value="" placeholder="Search" />
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <!--end::Search blog-->
                                    <!--begin::Catigories-->

                                    <!--end::Catigories-->
                                    <!--begin::Recent posts-->
                                    <div class="m-0">
                                        <h4 class="text-black mb-7">Recent Posts</h4>
                                        @php
                                          $c = 0;
                                        @endphp
                                        @foreach($blogs as $blog)
                                            @php
                                                $c++;
                                                if($c > 5)
                                                {
                                                    break;
                                                }
                                            @endphp
                                        <!--begin::Item-->
                                        <div class="d-flex flex-stack mb-7">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-60px symbol-2by3 me-4">
                                                <div class="symbol-label" style="background-image: url({{ "application/storage/app/public/blog_images/" . $blog->image }})"></div>
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Title-->
                                            <div class="m-0">
                                                <a href="#" class="text-dark fw-bolder text-hover-primary fs-6">{{ $blog->title }}</a>
                                                <span class="text-gray-600 fw-bold d-block pt-1 fs-7">{!! \Illuminate\Support\Str::words($blog->description, 9,'....')  !!}</span>
                                            </div>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Item-->
                                        @endforeach
                                    </div>
                                    <!--end::Recent posts-->
                                </div>
                                <!--end::Sidebar-->
                            </div>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Post card-->
                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
    <br><br>
    <div class="row">
        <div class="col-8">

        </div>
        <div class="col-4">

        </div>
    </div>
    @php  $single = 1;   @endphp
    @forelse($blogs as $blog)
        @if($single == 1)
            @php  $single = 0;   @endphp
            @continue;
        @endif
        <div class="post d-flex flex-column-fluid " id="kt_post">
                <!--begin::Container-->
                <div id="kt_content_container" class="container">
                    <div class="row">
                        <div class="col-xl-8">
                            <!--begin::Post card-->
                            <div class="card">
                                <!--begin::Body-->
                                <div class="card-body p-lg-20 pb-lg-0">
                                    <!--begin::Layout-->
                                    <div class="d-flex flex-column flex-xl-row">
                                        <!--begin::Content-->
                                        <div class="flex-lg-row-fluid me-xl-15">
                                            <!--begin::Post content-->
                                            <div class="mb-17">
                                                <!--begin::Wrapper-->
                                                <div class="mb-8">
                                                    <!--begin::Info-->
                                                    <div class="d-flex flex-wrap mb-6">
                                                        <!--begin::Item-->
                                                        <div class="me-9 my-1">
                                                            <!--begin::Label-->
                                                            <div class="d-flex flex-stack flex-wrap">
                                                                <!--begin::Item-->
                                                                <div class="d-flex align-items-center pe-2">
                                                                    <!--begin::Svg Icon | path: icons/duotone/Layout/Layout-4-blocks.svg-->
                                                                    <span class="svg-icon svg-icon-primary svg-icon-2 me-1">
                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                        <rect x="0" y="0" width="24" height="24" />
                                                                        <rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5" />
                                                                        <path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" fill="#000000" opacity="0.3" />
                                                                    </g>
                                                                </svg>
                                                            </span>
                                                                    <!--end::Svg Icon-->
                                                                    @foreach($users as $user)
                                                                        @if($user->id == $blog->user_id)
                                                                    <!--begin::Avatar-->
                                                                    <div class="symbol symbol-35px symbol-circle me-3">
                                                                        <img alt="" src="{{ "application/storage/app/public/profile_images/" . $user->image }}" />
                                                                    </div>
                                                                    <!--end::Avatar-->
                                                                    <!--begin::Text-->
                                                                    <div class="fs-5 fw-bolder">
                                                                        <a href="#" class="text-gray-700 text-hover-primary">

                                                                            {{ $user->name }}
                                                                        </a>
                                                                        <span class="text-muted">on {{ $blog->created_at->format('d F Y') }}</span>
                                                                    </div>
                                                                    <!--end::Text-->
                                                                    @endif
                                                                    @endforeach
                                                                </div>
                                                                <!--end::Item-->
                                                            </div>
                                                            <!--end::Label-->
                                                        </div>
                                                        <!--end::Item-->
                                                    </div>
                                                    <!--end::Info-->

                                                    <!--begin::Title-->
                                                    <a href="#" class="text-dark text-hover-primary fs-2 fw-bolder">{{ $blog->title }}
                                                    </a>
                                                    <!--end::Title-->
                                                    <!--begin::Container-->
                                                    <div class="overlay mt-8">
                                                        <!--begin::Image-->
                                                        <div class="bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-350px" style="background-image:url( {{ "application/storage/app/public/blog_images/". $blog->image }} )"></div>
                                                        <!--end::Image-->

                                                    </div>
                                                    <!--end::Container-->
                                                </div>
                                                <!--end::Wrapper-->
                                                <!--begin::Description-->
                                                <div class="fs-5 fw-bold text-gray-600">
                                                    <!--begin::Text-->
                                                    <p class="mb-8">{{ $blog->description }}
                                                        {{--                                                <button style="border: none"><span class="fw-bolder text-muted fs-5 ps-1">Read More</span></button>--}}
                                                    </p>
                                                    <!--end::Text-->
                                                </div>
                                                <!--end::Description-->
                                            </div>
                                            <!--end::Post content-->
                                        </div>
                                        <!--end::Content-->
                                    </div>
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::Post card-->
                        </div>

                    </div>
                </div>
                <!--end::Container-->
            </div>
    @empty
        <p style="text-align: center"  class="mt-5 text-gray-800 text-hover-primary fs-6 fw-bolder">No post found</p>
    @endforelse
    {{ @$blogs->links('pagination::bootstrap-4') }}
@endsection
@section('script')

@endsection
