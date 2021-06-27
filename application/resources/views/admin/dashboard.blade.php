@extends('admin.layouts.app')

@section('content')
    {{--    @dd(json_encode($day_value))--}}
{{--    <div class="fixed-top"--}}
{{--         style="margin-top: 80px;background: #ffffff;border-bottom: 1px solid #eee;z-index: 5;padding: 15px 0px;">--}}
        <div class="container">
            <div class="filter-bar">
                <div class="">
                    <span class="mr-2">Filter by: </span>
                    <div role="group" class="mr-2 btn-group btn-group-toggle">
                        <a href="{{ url('/') }}"
                           class="btn-actual btn-outline-primary font-weight-bold btn-sm mr-1">
                            All
                        </a>
                        <a href="{{ url('/admin/today') }}"
                           class="btn-actual btn-outline-primary font-weight-bold btn-sm mr-1">
                            Today
                        </a>
                        <a href="{{ url('/admin/this-week') }}"
                           class="btn-actual btn-outline-primary font-weight-bold btn-sm mr-1">
                            This Week
                        </a>
                        <a href="{{ url('/admin/this-month') }}"
                           class="btn-actual btn-outline-primary font-weight-bold btn-sm mr-1">
                            This Month
                        </a>
                        <a href="{{ url('/admin/this-year') }}"
                           class="btn-actual btn-outline-primary font-weight-bold btn-sm mr-1">
                            This Year
                        </a>
                        {{--                        <label class="btn text-dark-75 font-weight-bolder border btn-sm">--}}
                        {{--                            <input name="options" type="radio" autocomplete="off" value="6">--}}
                        {{--                            <div class="react-bootstrap-daterangepicker-container" style="display: inline-block;">--}}
                        {{--                                <span id="kt_daterangepicker_1_modal">Select Date</span>--}}
                        {{--                            </div>--}}
                        {{--                        </label>--}}
                    </div>
                    <button type="button" class="btn btn-primary font-weight-bolder btn-sm">Filter</button>
                </div>
            </div>
        </div>
{{--    </div>--}}
    <div class="content d-flex flex-column flex-column-fluid custom-background mt-15" id="kt_content">
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Dashboard-->

                <!--TOP BOX-->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-custom gutter-b">
                            <div class="card-header">
                                <div class="card-title">
                                    <div class="card-title-left mr-5">
                                        <span>TOTAL BLOG</span>
                                        <h3 class="text-success">BDT {{@$total_sale}}</h3>
                                    </div>

                                </div>
                            </div>
                            <!--begin::Card-->
                            <div class="card card-custom">
                                <div id="kt_flotcharts_1" style="display: none;"></div>
                                <div id="kt_flotcharts_2" style="display: none;"></div>
                                <div class="card-body">
                                    <div id="" class="MonthlyOrderStats" style="height: 300px; padding: 0px; position: relative;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Dashboard-->
        </div>
        <div class="container">

            <div class="card card-custom gutter-b">
                <!--begin::Row-->
            <!--                <div class="row">
                    <div class="col-xl-12">
                        <div class="card card-custom">
                            &lt;!&ndash;begin::Header&ndash;&gt;
                            <div class="card-header">
                                <div class="card-title">
                                    <div class="left mr-5">
                                        <p class="total-order">TOTAL SALES</p>
                                        <h3 class="total-order-amount text-success">BDT {{@$total_sale}}</h3>
                                    </div>
                                    <div class="right">
                                        <p class="total-cancel">TOTAL ORDERS</p>
                                        <h3 class="total-cancel-amount text-primary">{{@$total_order_count}}</h3>
                                    </div>
                                </div>
                            </div>
                            &lt;!&ndash;end::Header&ndash;&gt;
                            <div class="card-body">
                                <div id="kt_flotcharts_6" style="height: 300px;"></div>
                            </div>
                        </div>
                    </div>
                </div>-->
                <!--End::Row-->
            </div>
            {{--<span class="day_value">{{$day_value}}</span>--}}


        </div>
        <!--end::Entry-->
    </div>
@endsection

@section('style')
    <link href="{{ asset('/') }}assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet"
          type="text/css"/>
@endsection

@section('script')
    {{--    <script>
          var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";

        </script>
        <!--begin::Global Config(global config for global JS scripts)-->
        <script>
          var KTAppSettings = {
            "breakpoints": {
              "sm": 576,
              "md": 768,
              "lg": 992,
              "xl": 1200,
              "xxl": 1200
            },
            "colors": {
              "theme": {
                "base": {
                  "white": "#ffffff",
                  "primary": "#6993FF",
                  "secondary": "#E5EAEE",
                  "success": "#1BC5BD",
                  "info": "#8950FC",
                  "warning": "#FFA800",
                  "danger": "#F64E60",
                  "light": "#F3F6F9",
                  "dark": "#212121"
                },
                "light": {
                  "white": "#ffffff",
                  "primary": "#E1E9FF",
                  "secondary": "#ECF0F3",
                  "success": "#C9F7F5",
                  "info": "#EEE5FF",
                  "warning": "#FFF4DE",
                  "danger": "#FFE2E5",
                  "light": "#F3F6F9",
                  "dark": "#D6D6E0"
                },
                "inverse": {
                  "white": "#ffffff",
                  "primary": "#ffffff",
                  "secondary": "#212121",
                  "success": "#ffffff",
                  "info": "#ffffff",
                  "warning": "#ffffff",
                  "danger": "#ffffff",
                  "light": "#464E5F",
                  "dark": "#ffffff"
                }
              },
              "gray": {
                "gray-100": "#F3F6F9",
                "gray-200": "#ECF0F3",
                "gray-300": "#E5EAEE",
                "gray-400": "#D6D6E0",
                "gray-500": "#B5B5C3",
                "gray-600": "#80808F",
                "gray-700": "#464E5F",
                "gray-800": "#1B283F",
                "gray-900": "#212121"
              }
            },
            "font-family": "Poppins"
          };

        </script>--}}
    <!--end::Global Config-->

    <script src="{{ asset('/') }}assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
    <!--begin::Global Theme Bundle(used by all pages)-->
    {{--    <script src="{{ asset('/') }}assets/plugins/global/plugins.bundle.js"></script>--}}
    <script src="{{ asset('/') }}assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
    <script src="{{ asset('/') }}assets/js/scripts.bundle.js"></script>
    <script src="{{ asset('/') }}assets/js/pages/crud/forms/widgets/bootstrap-daterangepicker.js"></script>

    <script src="{{ asset('/') }}assets/js/pages/crud/forms/widgets/select2.js"></script>

    <!--    <script src="//www.amcharts.com/lib/3/plugins/tools/polarScatter/polarScatter.min.js"></script>
    <script src="//www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
    <script src="{{ asset('/') }}assets/js/pages/features/charts/amcharts/charts.js"></script>
    <script src="//www.amcharts.com/lib/3/plugins/animate/animate.min.js"></script>
    <script src="//www.amcharts.com/lib/3/amcharts.js"></script>
    <script src="//www.amcharts.com/lib/3/serial.js"></script>
    <script src="//www.amcharts.com/lib/3/radar.js"></script>
    <script src="//www.amcharts.com/lib/3/pie.js"></script>-->
    <!--end::Global Theme Bundle-->



    <!--begin::Global Theme Bundle(used by all pages)-->
    <!--end::Global Theme Bundle-->
    <!--begin::Page Scripts(used by this page)-->
    <script src="{{ asset('/') }}assets/js/pages/widgets.js"></script>

    <script>
        const primary = '#6993FF';
        const success = '#1BC5BD';
        const info = '#8950FC';
        const warning = '#FFA800';
        const danger = '#F64E60';

        $(function () {
            'use strict'

            let values = {!! $day_value!!}

            {{--let values = [--}}
            {{--  {--}}
            {{--    name: 'Monthly Sale',--}}
            {{--    data: [--}}
            {{--      {x: 'January', y: {{@$monthly_data['January']}} },--}}
            {{--      {x: 'February', y:  {{@$monthly_data['February']}} },--}}
            {{--      {x: 'March', y:  {{@$monthly_data['March']}} },--}}
            {{--      {x: 'April', y: {{@$monthly_data['April']}} },--}}
            {{--      {x: 'May', y: {{@$monthly_data['May']}} },--}}
            {{--      {x: 'June', y: {{@$monthly_data['June']}} },--}}
            {{--      {x: 'July', y: {{@$monthly_data['July']}} },--}}
            {{--      {x: 'August', y: {{@$monthly_data['August']}} },--}}
            {{--      {x: 'September', y: {{@$monthly_data['September']}} },--}}
            {{--      {x: 'October', y: {{@$monthly_data['October']}} },--}}
            {{--      {x: 'November', y: {{@$monthly_data['November']}} },--}}
            {{--      {x: 'December', y: {{@$monthly_data['December']}} }--}}
            {{--    ]--}}
            {{--  }--}}
            {{--]--}}

            lineChart('.MonthlyOrderStats', values)
            pieChart('.userStats',
                [{{@$registered_user_count}}, {{@$transacting_user_count}}, {{@$non_transacting_user_count}}, {{@$registered_merchant_count}}, {{@$pending_merchant_count}} ],
                ['Registered User', 'Transacting User', 'Non Transacting User','Registered Merchant','Pending Merchant'],
                [primary, info,danger, success,warning])

            pieChart('.orderStats',
                [{{@$total_order_count}}, {{@$completed_order_count}}, {{@$cancel_order_count}}, {{@$order_need_approve_count}} ],
                ['Total Order', 'Completed Order','Canceled Order','Pending Order'],
                [primary, info,danger,warning])
        })

        function lineChart(element, values) {
            let options = {
                series: values,
                chart: {
                    height: 350,
                    type: 'area',
                    toolbar: {
                        show: false
                    }
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'smooth',
                    width: 1
                },
                colors: [primary, success]
            };

            let chart = new ApexCharts(document.querySelector(element), options);
            chart.render();
        }

        function pieChart(element, values = [], labels = [], colors = []) {
            let options = {
                series: values,
                chart: {
                    height: 244,
                    type: 'pie',
                },
                labels: labels,
                legend: {
                    horizontalAlign: 'center',
                    position: 'right'
                },
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 200
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }],
                colors: colors
            };

            let chart = new ApexCharts(document.querySelector(element), options);
            chart.render();
        }
    </script>
@endsection
