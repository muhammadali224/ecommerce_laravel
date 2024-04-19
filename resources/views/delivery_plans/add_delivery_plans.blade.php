@extends('layouts.master')
@section('title')
    إضافة خطة توصيل
@stop
@section('css')
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">خطط التوصيل</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ إضافة
                    خطة توصيل</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">

        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-header pb-0">


                    @if (session()->has('Add'))
                        <br>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">

                            <strong>{{ session()->get('Add') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @if (session()->has('Error'))
                        <br>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">

                            <strong>{{ session()->get('Error') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif


                </div>
                <div class="card-body">
                    <form action="{{ route('delivery_plans.store') }}" method="POST" enctype="multipart/form-data"
                        autocomplete="off">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col">
                                <label for="plan_name" class="control-label">إسم الخطة</label>
                                <input type="text" class="form-control" id="plan_name" name="plan_name" required>
                            </div>

                            <div class="col">
                                <label for ="base_price" class="control-label">السعر الافتتاحي </label>
                                <input name="base_price" id="base_price" class ="form-control" type="number" required>
                            </div>

                            <div class="col">
                                <label for ="charge" class="control-label">السعر لكل كيلومتر</label>
                                <input name="charge" id="charge" class ="form-control" type="number" required>
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col">
                                <label for="max_zone" class="control-label">مسافة منطقة التوصيل</label>
                                <input type="number" class="form-control" id="max_zone" name="max_zone" required>
                            </div>

                            <div class="col">
                                <label class="control-label">التوصيل ثابت</label>
                                <div class="row">

                                    <input type="radio" name="isFixed" id="isFixed_yes" class="form-check form-check-md"
                                        value="1" required>
                                    <label for="isFixed_yes" class="form-check-label"
                                        style="margin-right: 10px;">نعم</label>


                                    <span style="margin-right: 15px;"> </span>
                                    <input type="radio" name="isFixed" id="isFixed_no" class="form-check form-check-md"
                                        value="0" checked required>
                                    <label for="isFixed_no" class="form-check-label" style="margin-right: 10px;">لا</label>


                                </div>
                            </div>
                        </div>
                        <br>

                        <div class="row" id="fix_div" style="display: none;">
                            <div class="col">
                                <label for="fix_charge" class="control-label">قيمة التوصيل الثابت</label>
                                <input type="number" class="form-control" id="fix_charge" name="fix_charge">
                            </div>

                            <div class="col">
                                <label for ="fix_zone" class="control-label">مسافة التوصيل الثابت</label>
                                <input name="fix_zone" id="fix_zone" class ="form-control" type="number">
                            </div>


                        </div>
                        <br>

                        <button class="btn btn-primary btn-wave" type="submit"> إضافة</button>
                    </form>
                </div>
            </div>
        </div>




    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!-- Internal Data tables -->
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
    <!--Internal  Datatable js -->
    <script src="{{ URL::asset('assets/js/table-data.js') }}"></script>
    <script src="{{ URL::asset('assets/js/modal.js') }}"></script>
    <script>
        document.querySelectorAll('input[name="isFixed"]').forEach(function(radio) {
            var fix_charge = document.getElementById('fix_charge');
            var fix_zone = document.getElementById('fix_zone');
            radio.addEventListener('change', function() {
                if (this.value === '1') {
                    fix_charge.required = true;
                    fix_zone.required = true;
                    document.getElementById('fix_div').style.display = '';
                } else {
                    document.getElementById('fix_div').style.display = 'none';
                }
            });
        });
    </script>

@endsection
